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
		}
		elseif (!empty($_GET['locationID']))
        {
			self::$city = self::set_city(self::getCityBylocationID($_GET['locationID']));
		}
		elseif (!empty($_GET['locationCode']))
        {
            $location_id = self::getCityByBinglocationID($_GET['locationCode']);
            if ($location_id) {
                self::$city = self::set_city(self::getCityBylocationID($location_id));
            }else{
                self::$city = self::get_city();
            }
		}

		elseif (!empty($_COOKIE['city']))
        {
			self::$city = $_COOKIE['city'];
		}


		if (empty($_GET['locationID']) && !empty($_COOKIE['state'])) {

			self::$state = $_COOKIE['state'];
		}

		if (!empty($_GET['ac'])) {
			self::$area_code = self::set_area_code($_GET['ac']);
		}elseif(!empty($_GET['locationCode']) && empty($_GET['bn']) ) {

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

			$database = new Database;

			$state = $this->get_state_short_name();
			$area_code_query = $database->read_query('`city-state-zip-areacodes`', ['areacode'], ['state' => $state, 'city' => self::$city]);

			if (!empty($area_code_query))
			{

				self::$area_code = self::set_area_code($area_code_query[0]['areacode']);
				$actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]". '&ac='.self::$area_code;
			    header('Location:'.$actual_link);
			}
		}
		elseif (!empty($_COOKIE['ac'])) {
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


		if ($location_query == NULL)
		{
			$city = self::get_city();
		}
		else
        {

        $state_query = $database->read_query('geotargets', ['Name'], ['CriteriaID' =>  $location_query[0]['ParentID']]);


        self::$state = self::set_state($state_query[0]['Name']);
        $location_query = $location_query[0];
        if ($location_query['TargetType'] == 'City' || $location_query['TargetType'] == 'Neighborhood' || $location_query['TargetType'] == 'County')
        {
            return $location_query['Name'];
        }
        elseif ($location_query['TargetType'] == 'Postal Code') {
            $zipcode = $location_query['Name'];



            //		include_once('city-code.php');



            $cityByZip = new CityFromZip;



            $tempCity = $cityByZip::getCity($zipcode);



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
		setcookie("city", $city, time() + (86400 * 30), '/'); // 86400 = 1
		return $city;
	}

	public static function set_state($state)
	{
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
}
