<?php


// include_once('curl.php');



class CityFromZip

{
	public static $mapApiKey = 'AIzaSyD69Zrm4V0m-epWBm-4w9g5D0iG6dBI9k0';


	public static function getCity($zip)

    {
		
        include_once('curl.php');
	
        $ccurl = new Curl();

		// $curl_data = 'https://maps.googleapis.com/maps/api/geocode/json?address="'.$zip.'"&key=AIzaSyD69Zrm4V0m-epWBm-4w9g5D0iG6dBI9k0';
		//echo $mapApiKey;
		$curl_data = "https://maps.googleapis.com/maps/api/geocode/json?address=".$zip."&key=". self::$mapApiKey;
		// echo $curl_data;
	    $ccurl->__construct($curl_data);

	    $ccurl->__set(CURLOPT_RETURNTRANSFER, true);

	    $res = json_decode($ccurl->exec(),true);



	    if($res['status']== "OK")

	    {

      		return $res['results'][0]['address_components'][1]["long_name"];
			//   return $res['results'][0]['address_components'][1]["long_name"];

	    }

	    else

	    {

	      	return FALSE;



	    }



	}

	



}





?>