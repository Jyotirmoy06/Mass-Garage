<?php


class TrafficSource
{
    private $source = NULL;
    private $trafficSource = NULL;

    public function __construct()
    {
            $this->setTrafficSource();
    }


    public function getTrafficSource()
    {
        return $this->trafficSource;
    }

    private function setTrafficSource()
    {

        //Reference URL
        // $ref_url = $_SERVER['HTTP_REFERER'];
        $ref_url = $_SERVER['HTTP_REFERER'] ?? 'Organic';

        if (!empty($_GET['gclid']) || !empty($_GET['gbraid']) || !empty($_GET['wbraid']) || !empty($_GET['locationID']))
        {
            $this->trafficSource = 'Google Ads';
        }
        elseif (!empty($_GET['msclkid']))
        {
            $this->trafficSource = 'Bing Ads';
        }
        elseif (!empty($_GET['fbclid']))
        {
            $this->trafficSource = 'Facebook';
        }
        elseif ( !empty($_GET['utm_campaign']) && $_GET['utm_campaign']== "gmb" )
        {
            $this->trafficSource = 'Google My Business';
        }
        elseif ( $ref_url != NULL && $ref_url == "https://www.yelp.com/" )
        {
            $this->trafficSource = 'Yelp';
        }
        elseif ( $ref_url != NULL && $ref_url == "https://www.google.com/" )
        {
            $this->trafficSource = 'SEO';
        }
        elseif (!empty($_COOKIE['trafficSource']))
        {
            $this->trafficSource = $_COOKIE['trafficSource'];
        }
        else {
            $this->trafficSource = 'Not Set';
        }

        if(empty($_COOKIE['trafficSource']) || $_COOKIE['trafficSource'] != $this->trafficSource)
        {
            setcookie("trafficSource", $this->trafficSource, time() + (86400 * 30), '/', '.massgaragedoorsexpert.com'); // 86400 = 1
            $_COOKIE['trafficSource'] = $this->trafficSource;
        }
        return $this->trafficSource;

    }
}