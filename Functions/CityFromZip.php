<?php


// include_once('curl.php');



class CityFromZip

{
	public static $mapApiKey = 'AIzaSyD69Zrm4V0m-epWBm-4w9g5D0iG6dBI9k0';

    public function getCity($zip, $locationId)
    {
        return $this->getCityByZip($zip, $locationId);
	}

    public function getCityByZip($zip, $locationId)
    {
        $cityName = "";
        $getCityRow = $this->getCitybyZipFromDB($zip);
        // var_dump($zip);
        // echo "<br/>";

        // $cityName = $this->getCityByZipFromGoogle($zip);
        // var_dump($cityName);

        $dbDate = new \DateTime($getCityRow[0]['created_at']);
        $now = new \DateTime();

        // IF City row is found in DB & the city stored date is less than 60 days old then return DB city
        // ELSE Fetch the latest city from Google
        
        if (!empty($getCityRow[0]['city']) && $dbDate->diff($now)->days < 60 )
        {
            // fetched city from DB
            $cityName = $getCityRow[0]['city'];
        }
        else
        {
            // fetch from google API
            $cityName = $this->getCityByZipFromGoogle($zip);
            // Insert new cityname into db with zipcode
            $this->insertCityNameInDB($cityName, $zip, $locationId);
        }

        if($cityName == "") 
        {
            $cityName = "Greater Boston";
        }
        
        return $cityName;
    }

    public function insertCityNameInDB($cityName, $zip, $locationId)
    {
        $db = new Database;
        $db->insertData('city_zip_cache_from_google', ['locationID', 'zipcode','city'], [$locationId, $zip, $cityName]);
    }

    public function getCitybyZipFromDB($zip)
    {
        $database = new Database;
        return $database->read_query('`city_zip_cache_from_google`', ['id', 'locationId', 'zipcode', 'city', 'created_at'], ['zipcode' => $zip], 1, ['id DESC']);
    }

    public function getCityByZipFromGoogle($zip)
    {
        include_once('curl.php');
	
        $ccurl = new Curl();
        $curl_data = "https://maps.googleapis.com/maps/api/geocode/json?address=".$zip."&key=". self::$mapApiKey;
        $ccurl->__construct($curl_data);
        $ccurl->__set(CURLOPT_RETURNTRANSFER, true);
        $res = json_decode($ccurl->exec(),true);

        if($res['status']== "OK")
        {
            $cityName = $res['results'][0]['address_components'][1]["long_name"];
            return $cityName;
        }
        else
        {
            return FALSE;
        }
    }


	// public static function getCity($zip)
    // {
    //     include_once('curl.php');	
    //     $ccurl = new Curl();

	// 	// $curl_data = 'https://maps.googleapis.com/maps/api/geocode/json?address="'.$zip.'"&key=AIzaSyD69Zrm4V0m-epWBm-4w9g5D0iG6dBI9k0';
	// 	//echo $mapApiKey;
	// 	$curl_data = "https://maps.googleapis.com/maps/api/geocode/json?address=".$zip."&key=". self::$mapApiKey;
	// 	// echo $curl_data;
	//     $ccurl->__construct($curl_data);
	//     $ccurl->__set(CURLOPT_RETURNTRANSFER, true);
	//     $res = json_decode($ccurl->exec(),true);

	//     if($res['status']== "OK")
	//     {
    //   		return $res['results'][0]['address_components'][1]["long_name"];
	// 		//   return $res['results'][0]['address_components'][1]["long_name"];
	//     }
	//     else
	//     {
	//       	return FALSE;
	//     }
	// }

	



}





?>