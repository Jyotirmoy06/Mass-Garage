<?php

require_once "Database.php";

class CallTracking
{
    private $trackingId;
    private $number_group_id;
    private $number;
    private $session_id;
    private $ip;
    private $user_agent;
    private $date;
    private $time;
    private $number_pool_id;

    public function __construct()
    {
        $this->user_agent = $_SERVER['HTTP_USER_AGENT'];
        $this->ip = $_SERVER['REMOTE_ADDR'];
        $this->date = date('Y-m-d');
        $this->time = date('H:i:s');
        $this->session_id = session_create_id('mgde');
        $this->number = "+18889898758";
        $this->page_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        $this->verifyToken();
    }

    public function verifyToken()
    {
        if(!empty($_GET['gclid']) )
        {
            $this->trackingId  = $_GET['gclid'];
            // $this->number_group_id = 1;

            if($_GET['ac'] == 978)
            {
                $this->number_group_id = 5;
            }
            elseif($_GET['ac'] == 401)
            {
                $this->number_group_id = 6;
            }
            elseif($_GET['ac'] == 508)
            {
                $this->number_group_id = 7;
            }
            elseif($_GET['ac'] == 617)
            {
                $this->number_group_id = 8;
            }
            elseif($_GET['ac'] == 781)
            {
                $this->number_group_id = 9;
            }
            elseif($_GET['ac'] == 603)
            {
                $this->number_group_id = 10;
            }
            else
            {
                $this->number_group_id = 1;
            }
            
        }
        elseif (isset($_GET['msclkid']) && $_GET['msclkid'] != "")
        {
            $this->trackingId  = $_GET['msclkid'];
            // $this->number_group_id = 2;
            if($_GET['ac'] == 978)
            {
                $this->number_group_id = 5;
            }
            else
            {
                $this->number_group_id = 2;
            }

        }
        else
        {
            $this->trackingId  = null;
            // return $this->number;
        }
    }

    public function initialize($trafficSource, $lastTrafficSource)
    {

        $printableNumber = $this->getTrackingNumber($trafficSource, $lastTrafficSource);
        return $this->formatPhoneNumber($printableNumber);

        // $numberGroupId = $this->number_group_id;
        // if($this->number_group_id == 5)
        // {
        //     $printableNumber = $this->getTrackingNumber($trafficSource, $lastTrafficSource);
        //     return $this->formatPhoneNumber($printableNumber);
        // }
        // else
        // {
        //     return $this->formatPhoneNumber($this->number);
        // }

    }

    public function formatPhoneNumber($number)
    {

        if(  preg_match( '/^\+\d(\d{3})(\d{3})(\d{4})$/', $number,  $matches ) )
        {
            $result = $matches[1] . '-' .$matches[2] . '-' . $matches[3];
            return $result;
        }
    }

    public function getTrackingNumber($latestTrafficSource, $previousTrafficSource)
    {
        // If the same user comes from the same traffic source    

        if ($previousTrafficSource == $latestTrafficSource)
        {

            // If comes from Ads traffic source

            // if( isset($_GET['msclkid']) || isset($_GET['gclid']) )
            if( (isset($_GET['msclkid']) || isset($_GET['gclid'])) && ( isset($_GET['ac']) && $this->number_group_id != 1 ) )
            {
                // If comes from Ads & have phone number stored in session

                if (!empty($_COOKIE['phone']))
                {
                    // echo 1;
                    // die();

                    $s_number = $_COOKIE['phone'];
                    return $s_number;
                }
                else
                {
                    // echo 2;
                    // die();

                    $db_number = $this->getNumber();
                    // $_SESSION['phone'] = $db_number;
                    // unset($_COOKIE["phone"]);
                    setcookie("phone", $db_number, time() + (86400 * 30), '/'); // 86400 = 1
                    $_COOKIE["phone"] = $db_number;


                    if ($this->saveRecord()) {
                        return $db_number;
                    } else {
                        // If record not saved return Default Number
                        return $this->number;
                    }
                }

            }
            else
            {
                // echo 3;
                // die();

                if($_COOKIE['phone'] != "")
                {
                    $s_number = $_COOKIE['phone'];
                    return $s_number;
                }
                else
                {
                    return $this->number;
                }
                

                // If Initially comes from Ad but visiting other pages
                // if($latestTrafficSource == "Not Set")
                // {
                //     // echo 3;
                //     // die();

                //     $s_number = $_SESSION['phone'];
                //     return $s_number;
                // }
                // else 
                // {
                //     // echo 4;
                //     // die();
                //     $s_number = $_SESSION['phone'];
                //     return $s_number;

                //     // Normal Traffic without Ads by all means so return default number
                //     // return $this->number;
                // }
            }

            
        }

        // If same user comes with different traffic source OR First time visiting users 
        else  
        {
            // If comes from Ads traffic source
            // add condtions so we only replace some tracking nuimbgers and not all so that we can do it slowly
            $useDynamicNumber = FALSE;
            // if(isset($_GET['msclkid']) || isset($_GET['gclid']))
            // {
            //     if($_GET['ac'] == 978)
            //     {
            //         $useDynamicNumber = TRUE;
            //     }
            // }

            // if($useDynamicNumber === TRUE)
            // if(isset($_GET['msclkid']) || isset($_GET['gclid']))
            if( (isset($_GET['msclkid']) || isset($_GET['gclid'])) && ( isset($_GET['ac']) && $this->number_group_id != 1 ) )
            {
                // echo 5;
                // die();

                // unset($_SESSION["phone"]);
                setcookie("adTrackingId", $this->trackingId, time() + (86400 * 30), '/');

                $db_number = $this->getNumber();
                // $_SESSION['phone'] = $db_number;
                // unset($_COOKIE["phone"]);
                setcookie("phone", $db_number, time() + (86400 * 30), '/'); // 86400 = 1
                $_COOKIE["phone"] = $db_number;

                if ($this->saveRecord())
                {
                    return $db_number;
                }
                else
                {
                    // If record not saved return Default Number
                    return $this->number;
                }
            }
            else
            {
                // If Initially comes from Ad but visiting other pages
                if($latestTrafficSource == "Not Set")
                {
                    // echo 6;
                    // die();

                    // return $this->number;

                    // unset($_SESSION["phone"]);
                    // $_SESSION['phone'] = $this->number;
                    // unset($_COOKIE["phone"]);
                    setcookie("phone", $this->number, time() + (86400 * 30), '/'); // 86400 = 1
                    $_COOKIE["phone"] = $this->number;
                    return $this->number;

                }
                else
                {
                    // echo 7;
                    // die();

                    // unset($_SESSION["phone"]);
                    // $_SESSION['phone'] = $this->number;
                    // return $this->number;

                    // Normal Traffic without Ads by all means so return default number
                    return $this->number;
                }
            }

        }
    }

    

    public function getNumber()
    {
        $db = new Database();
//        Get the last row of the visitor_number_assignments table
        $num_assigment_query = $db->read_query('visitor_number_assignments', [], ['number_groups_id' => $this->number_group_id], 0, ['id DESC']);
        if (count($num_assigment_query) > 0)
        {
//        Get the last sequence id of the number_pool table to compare with sequence id of the number using the last visitor_number_assignments record
            $numbers_chk = $db->read_query('number_pool', [], ['group_id' => $num_assigment_query[0]['number_groups_id']], 0, ['seq_id DESC']);

            $query = $db->read_query('number_pool', [], ['id' => $num_assigment_query[0]['number_pool_id']]);
            if ($query[0]['seq_id'] >= $numbers_chk[0]['seq_id'])
            {
//                $query = $db->read_query('number_pool', [], ['seq_id' => 1, 'group_id' => $numbers_chk[0]['group_id']]);
                $query = array_reverse($numbers_chk);
                $this->number = $query[0]['phone_no'];
                $this->number_pool_id = $query[0]['id'];
            }
            else
            {
                $query = $db->read_query('number_pool', [], ['seq_id' => ($query[0]['seq_id'] + 1), 'group_id' => $numbers_chk[0]['group_id']]);
                $this->number = $query[0]['phone_no'];
                $this->number_pool_id = $query[0]['id'];
            }
        }
        else
        {
            $numbers_chk = $db->read_query('number_pool', [], ['group_id' => $this->number_group_id], 0, ['seq_id ASC']);
            $this->number = $numbers_chk[0]['phone_no'];
            $this->number_pool_id = $numbers_chk[0]['id'];
        }

        return $this->number;
    }

    public function saveRecord()
    {
        $dbb = new Database();

        $created_at = date('Y-m-d h:i:s');
        return $dbb->insertData('visitor_number_assignments', ['user_agent','page_link','user_ip','session_id','click_date','click_time','verification_token', 'number_groups_id', 'number_pool_id', 'created_at'], [$this->user_agent, $this->page_link, $this->ip, $this->session_id, $this->date, $this->time, $this->trackingId, $this->number_group_id, $this->number_pool_id, $created_at]);

    }

    
}