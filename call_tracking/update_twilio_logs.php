<?php

ob_start();
session_start();
date_default_timezone_set('US/Eastern');

require_once "../Functions/Database.php";

require_once "../Functions/curl.php";

$db = new Database();
$conn = $db->getConnection();

function convertPSTToEST($pstTime)
{
    $date = new DateTime($pstTime, new DateTimeZone('PST'));
    $date->setTimezone(new DateTimeZone('US/Eastern'));
    return $date->format('Y-m-d H:i:s');
}

// For updating call logs

if( !empty(["ParentCallSid"]) )
{
    $callTo = $_GET["ForwardedFrom"];
    $callFrom = $_GET["Caller"];
    $callStatus = $_GET["CallStatus"];

    $updateSql = "UPDATE 
                    visitor_number_assignments as na
                    SET 
                    na.call_status = '$callStatus',
                    na.call_from_no = '$callFrom',
                    na.has_called = '1',
                "; 
    

    if( $_GET["CallStatus"] == "initiated" || $_GET["CallStatus"] == "ringing" || $_GET["CallStatus"] == "in-progress" )
    {
        $callStartTime = convertPSTToEST($_GET["Timestamp"]);
        $updateSql .= "na.call_start_time = '$callStartTime',";
    }


    if( $_GET["CallStatus"] == "completed" || $_GET["CallStatus"] == "failed" || $_GET["CallStatus"] == "no-answer")
    {
        $callEndTime = convertPSTToEST($_GET["Timestamp"]);
        $updateSql .= "na.call_end_time = '$callEndTime',";

        
        $sid = $_GET["ParentCallSid"];

        $filteredCallFrom = str_replace("+1","", $callFrom);
        $filteredCallTo = str_replace("+1","", $callTo);
        $curl_data = "https://hooks.zapier.com/hooks/catch/8989795/bsmff9e?caller=".$filteredCallFrom."&calledTo=".$filteredCallTo."&dateTime=".urlencode($callEndTime)."&callSid=".$sid."&callStatus=".urlencode($callStatus);

		// $curl_data = "https://hooks.zapier.com/hooks/catch/8989795/bsmff9e?caller=".$callFrom."&calledTo=".$callTo."&dateTime=".$callEndTime."&callSid=".$sid."&callStatus=".$callStatus;
		// echo $curl_data;
		$ccurl = new Curl($curl_data);
	    
	    //$ccurl->__construct($curl_data);

	    $ccurl->__set(CURLOPT_RETURNTRANSFER, true);

	    $res = json_decode($ccurl->exec(),true);
	    // if(!empty($_GET['test']))
        if($res['status']== "OK")
	    {
	        // echo $curl_data;
	        // print_r($res);
	        echo 'done';
	    }
        else
        {
            // echo $curl_data;
	        // print_r($res);
	        echo 'error occured';
        }

    }

    if(!empty($_GET["CallDuration"]))
    {
        $callDuraion = $_GET["CallDuration"];
        $updateSql .= "na.call_duration = '$callDuraion',";
    }

      
    $updateSql = trim($updateSql, ',');
    $updateSql .= "WHERE na.number_pool_id = (
                        SELECT id FROM number_pool WHERE phone_no = '$callTo'
                    )
                    ORDER BY na.id DESC 
                    LIMIT 1
                ";

    if ($conn->query($updateSql) === TRUE)
    {
        $postResult = "Record updated successfully!";
    }
    else
    {
        $postResult = "Something went wrong. Please Contact Admin!";
    }
}

// For updating message logs

if( !empty($_GET["action_type"]) && $_GET["action_type"] == "message" )
{
    $msgTo = $_GET["msg_to"];
    $msgFrom = $_GET["msg_from"];
    $msgBody = $_GET["msg_content"];
    $msgAt = convertPSTToEST($_GET["msg_at"]);

    $updateSql = "UPDATE 
                    visitor_number_assignments as na
                    SET 
                    na.msg_at = '$msgAt',
                    na.msg_content = '$msgBody',
                    na.msg_from_no = '$msgFrom',
                    na.has_messaged = '1',
                    WHERE na.tracking_number_id = (
                        SELECT id FROM number_pool WHERE phone_no = '$msgTo'
                    )
                    ORDER BY na.id DESC 
                    LIMIT 1
                ";
 
    if ($conn->query($updateSql) === TRUE) 
    {
        $postResult = "Record updated successfully!";
    } 
    else 
    {
        $postResult = "Something went wrong. Please Contact Admin!";
    }
}
