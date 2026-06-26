<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// ob_start();
// session_start();
// date_default_timezone_set('US/Eastern');

// require_once $_SERVER['DOCUMENT_ROOT']."/Functions/Database.php";

// require_once "/home1/massdoors/public_html/Functions/Database.php";

$path = getcwd(); // /home/user/public_html/test/test.php.   
$path = substr($path, 0, strpos($path, "public_html"));
$root = $path . "public_html/";

require_once $root."Functions/Database.php";

$db = new Database();
$conn = $db->getConnection();

function createAndGetConversionsCSV($conversionData)
{

    $adHost = ( isset($conversionData["conversion_data"][0]["ad_host"]) ? $conversionData["conversion_data"][0]["ad_host"] : "");
 
    if($adHost == "Google") 
    {
        $conversionName = "Call (Twilio)";
        $userCSVData = "Google Click ID,Conversion Name,Conversion Time,Conversion Value,Conversion Currency\n";
    }
    else
    {
        $conversionName = "Twilio Call";
        $userCSVData = "Parameters:TimeZone=-0500;,,,,\n";
        $userCSVData .= "Microsoft Click ID,Conversion Name,Conversion Time,Conversion Value,Conversion Currency\n";
    } 

    $lastRow = "";
    $totalConversionCount = count($conversionData['conversion_data']);
    foreach ( $conversionData['conversion_data'] as $row ) 
    {
        $adHost = $row["ad_host"];
        if($row["has_called"] == 1)
        {
            $conversionTime = $row["call_start_time"];
            $conversionTime .= ($adHost == "Google") ? " America/New_York" : "";
        
            $userCSVData .= $row["verification_token"]. ",".$conversionName."," . $conversionTime. ",0,USD\n";

            $lastRow = $row["id"];
        }
    }

    $todayDate  = date('Y-m-d');
    $siteName = str_replace(" ","_",$conversionData['site_name']);
    $fileName = $siteName.'_'.$adHost.'_conversion_list_new'.$todayDate.'.csv';
    $getCurrentWorkingDir = getcwd();
    $filePath = $getCurrentWorkingDir."/".$fileName;

    // Remove any same name file if exist
    if(file_exists($filePath))
    {
        unlink($filePath);
    }
    $fp = fopen($filePath, 'w+');
    fwrite($fp, $userCSVData); 
    fclose($fp);

    $returnDataArr = [
        'site_name' => $conversionData['site_name'],
        'ad_host' => $adHost,
        'last_row' => $lastRow,
        'total_conversion_count' => $totalConversionCount,
        'file_name' => $fileName,
        'file_path' => $filePath
    ];

    return $returnDataArr;
}


function sendConversionMail($attachmentsArr, $domain, $conversionsFound)
{
    $siteName = ( count($attachmentsArr) > 0 ) ? $attachmentsArr[0]["site_name"] : "Mass Garage Doors Expert";
    $todayDate  = date('Y-m-d');
    $mailto = 'alon@codereliable.com'; 
    // $mailto = 'j94saha@gmail.com'; 
    $subject = $siteName.' site conversions attachment of '.$todayDate;
    // $message = 'The conversions of '.$todayDate.' has been attached with this mail';

    // a random hash will be necessary to send mixed content
    $separator = md5(time());

    // carriage return type (RFC)
    $eol = "\r\n";

    // main header (multipart mandatory)
    $headers = "From: \"$siteName site conversions\" <no-reply@$domain>". $eol; 
    $headers .= 'Cc: jyotirmoy@codereliable.com'. $eol;
    $headers .= "MIME-Version: 1.0" . $eol;
    $headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol;
    $headers .= "Content-Transfer-Encoding: 7bit" . $eol;
    $headers .= "This is a MIME encoded message." . $eol;

    // message
    $body = "--" . $separator . $eol;
    $body .= "Content-Type: text/plain; charset=\"iso-8859-1\"" . $eol;
    $body .= "Content-Transfer-Encoding: 8bit" . $eol;
    // $body .= $message . $eol;

    if( $conversionsFound == "true" )
    {
        $message = 'The conversions of '.$todayDate.' has been attached with this mail';
        $body .= $message . $eol;

        // Adding attachments with mail body
        foreach ($attachmentsArr as $attachmentsDetails) 
        {
            $file = $attachmentsDetails["file_path"];
            $fileName = $attachmentsDetails["file_name"];
            $content = file_get_contents($file);
            $content = chunk_split(base64_encode($content));

            // attachment
            $body .= "--" . $separator . $eol;
            $body .= "Content-Type: application/octet-stream; name=\"" . $fileName . "\"" . $eol;
            $body .= "Content-Transfer-Encoding: base64" . $eol;
            $body .= "Content-Disposition: attachment" . $eol;
            $body .= $content . $eol;
            $content = "";
        }
        $body .= "--" . $separator . "--";
    }
    else
    {
        $message = 'No new conversions found today! [ '.$todayDate.' ].';
        $body .= $message . $eol;
    }

    mail($mailto, $subject, $body, $headers);
}



function filterAdHostBasedConversions($adHost, $array) 
{
    foreach ($array as $key => $val) 
    {
        if ($val['ad_host'] != $adHost) 
        {
            unset($array[$key]);
        }
    }
    return $array;
}



// Fetch the last maximum row fetched last time from visitor_number_assignments table

$lastEmailDataSql = "SELECT max(last_row_id) AS last_row_id FROM cronjob_conversion_emails ORDER BY id DESC LIMIT 1";
$lastEmailDataResult = $conn->query($lastEmailDataSql);
$lastEmailDataResult->setFetchMode(PDO::FETCH_ASSOC);
$lastEmailDataRow = $lastEmailDataResult->fetch();

$whereClauseAddon = "";
if( $lastEmailDataRow == NULL )
{
    $whereClauseAddon = "na.has_called = 1";
} 
else
{
    $lastFetchedId = $lastEmailDataRow["last_row_id"];
    $whereClauseAddon = "na.has_called = 1 AND na.id > '$lastFetchedId'";
}

// Get conversions data by joining tables
$siteArray = [];
$siteBasedConversionDataArr = [];

$parentDataSql = "SELECT na.*, si.name AS site_name, si.domain AS domain_name, np.ad_host_name AS ad_host
                FROM visitor_number_assignments AS na 
                LEFT JOIN number_groups AS np
                ON na.number_groups_id = np.id
                LEFT JOIN sites AS si
                ON np.site_id = si.id WHERE ".$whereClauseAddon;

$parentDataResult = $conn->query($parentDataSql);
$parentDataResult->setFetchMode(PDO::FETCH_ASSOC);

while ($parentDataRow = $parentDataResult->fetch())
{
    if(!in_array($parentDataRow['site_name'], $siteArray)) 
    {
        // Create array based on site conversions

        $newData = [
            'site_name' => $parentDataRow['site_name'],
            'domain_name' => $parentDataRow['domain_name'],
            'conversion_data' => [ $parentDataRow ]
        ];
        array_push($siteBasedConversionDataArr, $newData);
        array_push($siteArray, $parentDataRow['site_name']);
    } 
    else
    {
        // Insert conversions data into already created site based conversion array

        foreach ($siteBasedConversionDataArr as $key => $val) 
        {
            if ($val['site_name'] == $parentDataRow['site_name']) 
            {
                $siteBasedConversionDataArr[$key]['conversion_data'][] = $parentDataRow;
            }
        }
    }
}


// Run the processes if there are new conversions recorded after last mail

if(count($siteBasedConversionDataArr) > 0)
{
    $siteConversionBasedArr = [];

    // Site specific conversions

    foreach ($siteBasedConversionDataArr as $siteConversion) 
    {
        // Fetch unique Ad_hosts from fetched conversions data
        $allAdHosts = array_column($siteConversion['conversion_data'], 'ad_host');
        $uniqueAdHosts = array_unique($allAdHosts);

        // Ad_host based conversions under each Site
        foreach ($uniqueAdHosts as $adHost) 
        {
            $adHostBasedConversion = $siteConversion;
            $adHostBasedConversion['conversion_data'] = filterAdHostBasedConversions($adHost, $siteConversion['conversion_data']);
            
             // Create and Get created conversion CSV data
            $createdConversionData = createAndGetConversionsCSV($adHostBasedConversion);

            // Push site conversion based data
            array_push($siteConversionBasedArr, $createdConversionData);

        }

        // Send conversion mail with different ad_host based attachments
        sendConversionMail($siteConversionBasedArr, $siteConversion['domain_name'], "true");

    }

    // Insert conversion related mail logs into database & remove created CSV file

    foreach ($siteConversionBasedArr as $data)
    {
        $siteName = $data['site_name'];
        $adHostName = $data['ad_host'];
        $lastRow = $data['last_row'];
        $totalConversionCount = $data['total_conversion_count'];
        $date = new DateTime();
        $currentTime = $date->format('Y-m-d H:i:s');

        $sql = "INSERT INTO cronjob_conversion_emails (site_name, ad_host_name, last_row_id, total_conversions_count, created_at) 
                VALUES ('$siteName', '$adHostName', '$lastRow', '$totalConversionCount', '$currentTime')";
        if ($conn->query($sql) == TRUE) 
        {
            echo "New record created successfully! <br/>";
        } 
        else 
        {
            echo "Something went wrong. Please Contact Admin! <br/>";
        }

        // Remove the csv which had been created

        if(file_exists($data['file_path']))
        {
            unlink($data['file_path']);
        }
    }

}
else
{
    $domain = "massgaragedoorsexpert.com";
    sendConversionMail([], $domain, "false");

    echo "No new conversions found!";
}
