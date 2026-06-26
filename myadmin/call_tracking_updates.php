<?php
    session_start();
    require_once 'classes/CallTrackingController.php';
    $callTracking = new CallTrackingController();

    function getFormattedNumber($no)
    {
        $calledNo = $no;
        $calledNo = str_replace('-', '', $calledNo); 
        $calledNo = preg_replace('/[^A-Za-z0-9\-]/', '', $calledNo);
        $calledNo = "+1".$calledNo;
        return $calledNo;
    }

    if(isset($_POST['id']))
    {
        $CallDetailsUpdateStatus = $callTracking->updateCallDetails($_POST['id'], $_POST['field'], $_POST['value']);
        return $CallDetailsUpdateStatus;
    }

    if(isset($_POST['submitCSV']))
    {
        // var_dump($_POST);
        // var_dump($_FILES);

        $totalCalls = $totalIncomingCalls = $totalUpdatedCalls = 0;

        // $ctime = "Wed Feb 15th, 01:13PM";
        // $callTime = date('Y-m-d T H:i:s', strtotime($ctime));


        // echo "<br/>";
        // var_dump($callTime);
        // echo "<br/>";
        // echo date_default_timezone_get();
        // echo "<br/>";

        // $string = "(888) 989-8758";
        // $string = str_replace('-', '', $string); 
        // $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); 
        // var_dump("+1".$string);

        $callTracking = new CallTrackingController();
        $allTrackingNumberDetails = $callTracking->getTrackingNumbers();
        $allTrackingNumbers = [];
        $allTrackingNumberIds = [];
        foreach ($allTrackingNumberDetails as $key => $numberDetails) 
        {
            array_push($allTrackingNumbers, $numberDetails->phone_no);
            array_push($allTrackingNumberIds, $numberDetails->id);
        }


		$handle = fopen($_FILES['filename']['tmp_name'], "r");
		$headers = fgetcsv($handle, 1000, ",");
        $inboundConversionCallData = [];
		while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
		{
            $totalCalls++;
            $calledNo = getFormattedNumber($data[2]);
            $trackingNumberIndex = array_search($calledNo, $allTrackingNumbers);
            if($trackingNumberIndex)
            {
                // echo $trackingNumberIndex."<br/>";
                // array_push($inboundConversionCallData, $data);

                $callDateTime = date('Y-m-d H:i:s', strtotime($data[4]));
                $callDate = date('Y-m-d', strtotime($data[4]));
                $callTime = date('H:i:s', strtotime($data[4]));

                $dataArr = [
                    // 'called_to' => getFormattedNumber($data[3]),
                    'call_from_no' => getFormattedNumber($data[1]),
                    'number_pool_id' => $allTrackingNumberIds[$trackingNumberIndex],
                    'call_status' => "completed",
                    'has_called' => 1,
                    'call_start_time' => $callDateTime,
                    'call_duration' => $data[9],
                    'is_valid' => "Yes",
                    'call_date' => $callDate,
                    'call_time' => $callTime
                ];

                array_push($inboundConversionCallData, $dataArr);
            }

            if($data[5] != "")
            {
                $totalIncomingCalls++;
            }
		}
        fclose($handle);

        // echo "<br/>".$trackingNumberIndex."rtrt<br/>";
        // echo "<br/><br/>";
        // var_dump($inboundConversionCallData);
        // echo "<br/><br/>";
        // // var_dump($allTrackingNumberDetails[129]->id);
        // echo "<br/><br/>";
        // // var_dump($dataArr);
        // echo "<br/><br/>";

        foreach ($inboundConversionCallData as $key => $data) 
        {
            $visitorExistanceReport = $callTracking->getVisitorExistanceWithNumbers($data["number_pool_id"], $data["call_from_no"]);
            
            // var_dump($visitorExistanceReport);
            // echo ":visitorExistanceReport ||||<br/><br/>";
            
            if($visitorExistanceReport[0]->count < 1)
            {
                $foundResults = $callTracking->getVisitorDetailsCount($data["number_pool_id"], $data["call_date"], $data["call_time"]);
                
                // var_dump($foundResults);
                // echo ":foundResults |<br/><br/>";
                // var_dump($data);
                // echo ":data ||<br/>";

                // If Called User's click details found
                // if($foundResults[0]->count > 0)
                if(count($foundResults) > 0)
                {
                    unset($data["call_date"]);
                    unset($data["call_time"]);
                    // var_dump($data);
                    // echo ":data2 ||<br/>";

                    $insertDataRecords = $callTracking->updateVisitorDetails($data, $foundResults[0]->id);
                    $totalUpdatedCalls++;
                    // var_dump($insertDataRecords);
                    // echo ":insertDataRecords |||<br/>";    
                }
                // var_dump($foundResults[0]->count);
                // echo "<br/>".$foundResults."<br/>22";
            }    
            else
            {
                // echo "Record found!";
            }    
        }

        $_SESSION['totalCalls'] = $totalCalls;
        $_SESSION['totalIncomingCalls'] = $totalIncomingCalls;
        $_SESSION['totalUpdatedCalls'] = $totalUpdatedCalls;

        header('Location: call_tracking.php');

        // var_dump($totalCalls);
        // var_dump($totalIncomingCalls);
        // var_dump($totalUpdatedCalls);
	

    }

?>