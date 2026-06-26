<?php

/**
 *
 */
class CityState
{

	public static $city = 'Greater Boston';

	public static $state = 'Massachusetts';

	public static $area_code = '617';

	private static $_instance;

	/**
	 * returns the Instance
	 *
	 * @return Instance
	 */
	public static function getInstance()
	{

		if (!self::$_instance) { // If no instance then make one

			self::$_instance = new self();
		}

		return self::$_instance;
	}
	/**
	 *  Sets the city
	 */
	function __construct()
	{
		if (!empty($_GET['city']))
		{
			self::$city = self::set_city($_GET['city']);

            if( $_COOKIE['state'] != "Massachusetts" || self::$state != "Massachusetts" )
            {
                self::$state = self::set_state("Massachusetts");
            }

		}
		elseif (!empty($_GET['locationID']) && empty($_GET['city']))
        {
			self::$city = self::set_city(self::getCityBylocationID($_GET['locationID']));
            // var_dump("1111");

		}
		elseif (!empty($_GET['locationCode']))
        {
            $location_id = self::getCityByBinglocationID($_GET['locationCode']);
            if ($location_id) {
                self::$city = self::set_city(self::getCityBylocationID($location_id));
            }else{
                self::$city = self::get_city();
            }
            // var_dump("2222");
		}

		elseif (!empty($_COOKIE['city']))
        {
			self::$city = $_COOKIE['city'];
            // var_dump("3333");
		}

        

		if (empty($_GET['locationID']) && !empty($_COOKIE['state'])) {

			self::$state = $_COOKIE['state'];
            // var_dump("4444");
		}

		if (!empty($_GET['ac'])) {
			self::$area_code = self::set_area_code($_GET['ac']);
            // var_dump("5555");
		}elseif(!empty($_GET['locationCode']) && empty($_GET['bn']) ) {
            // var_dump("6666");
			$database = new Database;

			$state = $this->get_state_short_name();
			$area_code_query = $database->read_query('`city-state-zip-areacodes`', ['areacode'], ['state' => $state, 'city' => self::$city]);
			if (!empty($area_code_query))
			{

				self::$area_code = self::set_area_code($area_code_query[0]['areacode']);
				$actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]". '&bn='.self::$area_code;
			    header('Location:'.$actual_link);
			}
		}elseif(!empty($_GET['locationID']) && empty($_GET['ac']) ) {

            // var_dump("7777");
			$database = new Database;

			$state = $this->get_state_short_name();
			$area_code_query = $database->read_query('`city-state-zip-areacodes`', ['areacode'], ['state' => $state, 'city' => self::$city]);

			
            
            if (!empty($area_code_query))
			{
				self::$area_code = self::set_area_code($area_code_query[0]['areacode']);
			}
            elseif(empty($_GET["ac"]))
            {
                // Set areacode to 617 if not founf in areacodes table
                self::$area_code = self::set_area_code('617');

				$cityName = self::$city;
				$locationId = $_GET['locationID'];
				$fetchDBData = $database->read_query('city_without_areacode_logs', ['id', 'count'], ['locationID' => $locationId, 'city' => $cityName]);

				if(count($fetchDBData) > 0) 
				{
					if( empty($_COOKIE['ac_counter'])  )
					{
					
						$counter = $fetchDBData[0]['count'] + 1;
						
						// $counter++;
						$database->updateData('city_without_areacode_logs', "count = $counter", $fetchDBData[0]['id']);
						setcookie("ac_counter", $counter, time() + (30 * 1), '/'); 
                    	$_COOKIE["ac_counter"] = $counter;

						// var_dump($_COOKIE['ac_counter']);
						// die();
					}
				} 
				else 
				{
					
					// Get the protocol (http or https)
					$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
					// Get the domain name
					$host = $_SERVER['HTTP_HOST'];
					// Get the request URI, which includes the path and query string
					$request_uri = $_SERVER['REQUEST_URI'];
					// Combine the parts to get the full URL
					$full_url = $protocol . $host . $request_uri;
					$database->insertData('city_without_areacode_logs', ['city', 'locationID', 'firstURL', 'count'], [ $cityName, $locationId, $full_url, '1']);
					
					setcookie("ac_counter", '1', time() + (30 * 1), '/'); 
                    $_COOKIE["ac_counter"] = '1';
				} 

            }


            if($state != "MA" || $state != "Massachusetts")
            {
                self::$state = "Massachusetts";
                self::$city = "Greater Boston";
            }


            if(self::$state == 'Massachusetts') 
            {
                $actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]". '&ac='.self::$area_code;
            }
            else
            {
                $actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]". '&ac='.self::$area_code.'&city=Greater%20Boston';
            }

            // var_dump($actual_link);
            
            header('Location:'.$actual_link);

		}
		elseif (!empty($_COOKIE['ac'])) {
            // var_dump("8888");
			self::$area_code = $_COOKIE['ac'];
		}
	}
	public static function getCityByBinglocationID($location_code)
    {
        $database = new Database;

        $location_query = $database->read_query('bing_geotargets', ['Name', 'TargetType', 'AdWordsLocationID'], ['LocationID' => $location_code]);


        if ($location_query == NULL)
        {
            return false;
        }else{

            return $location_query[0]['AdWordsLocationID'];
        }
    }
	/**
	 * Undocumented function
	 *
	 * @param numerical_string $location_id
	 * @return name_of_the_city
	 */
	public static function getCityBylocationID($location_id)
	{
		$database = new Database;

		$location_query = $database->read_query('geotargets', ['Name', 'TargetType', 'ParentID'], ['CriteriaID' => $location_id]);

        // var_dump($location_query);

		if ($location_query == NULL)
		{
			$city = self::get_city();
		}
		else
        {

        $state_query = $database->read_query('geotargets', ['Name'], ['CriteriaID' =>  $location_query[0]['ParentID']]);

        // var_dump($state_query);

        // self::$state = self::set_state($state_query[0]['Name']);
        self::$state = $state_query[0]['Name'];
        // Default is MA
        if($_COOKIE['state'] != self::$state)
        {
            self::set_state(self::$state);
        }

        $location_query = $location_query[0];
        if ($location_query['TargetType'] == 'City' || $location_query['TargetType'] == 'Neighborhood' || $location_query['TargetType'] == 'County')
        {
            return $location_query['Name'];
        }
        elseif ($location_query['TargetType'] == 'Postal Code') {
            $zipcode = $location_query['Name'];


            // var_dump($location_id);
            // echo "<br/>";
            // var_dump($zipcode);
            // die();
            // include_once('city-code.php');

            include_once('CityFromZip.php');



            $cityByZip = new CityFromZip;



            // $tempCity = $cityByZip::getCity($zipcode, $location_id);
            $tempCity = $cityByZip->getCity($zipcode, $location_id);

            // var_dump($tempCity);
            // die();
            



            if (!empty($tempCity)) {



                //self::$city = self::set_city($tempCity);


                $city = $tempCity;
            }
        }
        /*
        else
        {

            $city = self::set_city($location_query['Name']);
        }
        */
    }


        // if(self::$state != "MA" || self::$state != "Massachusetts")
        // {
        //     self::$state = "Massachusetts";
        //     self::$city = $city= "Greater Boston";
        // }

		return $city;
	}
	/**
	 * Sets the city cookie
	 *
	 * @param [type] $city
	 * @return void
	 */
	public static function set_city($city)
	{
        // if($stateName != "MA" || $stateName != "Massachusetts")
        // {
        //     $city = "Greater Boston";
        // }

		setcookie("city", $city, time() + (86400 * 30), '/'); // 86400 = 1
		return $city;
	}

	public static function set_state($state)
	{
        if($state != "MA" || $state != "Massachusetts")
        {
            $state = "Massachusetts";
        }

		setcookie("state", $state, time() + (86400 * 30), '/'); // 86400 = 1
		return $state;
	}

	public static function set_area_code($ac)
	{
		setcookie("ac", $ac, time() + (86400 * 30), '/'); // 86400 = 1
		return $ac;
	}
	public static function get_city()
	{
		return self::$city;
	}
	public static function get_state()
	{
        return self::$state;
	}
	public static function get_ac()
	{
		return self::$area_code;
	}

	public function get_state_short_name()
	{
		if (self::$state == "Massachusetts") {
			return 'MA';
		} elseif (self::$state == "Rhode Island") {
			return 'RI';
		} elseif (self::$state == "New Hampshire") {
			return 'NH';
		}
	}

    public function getMapLocationByCity($cityName)
    {

        $database = new Database;

		$location_query = $database->read_query('location_page_contents', ['map'], ['city' => "$cityName"]);

        // var_dump($location_query);

		if ($location_query == NULL)
		{
			$mapLocation = "";// default boston location map / location not found
		}
		else
        {
            $mapLocation = $location_query[0]['map'];
        }

        setcookie("selectedCityMapLocation", $mapLocation, time() + (86400 * 30), '/'); 
        return $mapLocation;
    }

}
