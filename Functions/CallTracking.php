<?php

require_once "Database.php";
require_once "CityState.php";

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
        $this->number  = "+18889898758";
        $this->page_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $this->locationId = $_GET['locationID'] ?? null;
        $this->referring_url = $_SERVER['HTTP_REFERER'] ?? "Organic"; // $_SERVER['HTTP_REFERER'];
        $this->channel_group = "";

        
        
        $this->db = new Database(); 

        $this->arr = array();
        //Get areaCode
        $this->arr['areaCode'] = ( isset($_GET['ac']) ? $_GET['ac'] : NULL );

        //Get the Source
        if( isset($_GET['gclid']) || isset($_GET['gbraid']) || isset($_GET['wbraid']) || isset($_GET['locationID']) ){
            $this->arr['hostName'] = 'Google';
            // $this->arr['verifyTokenID'] = (isset($_GET['gclid']) ? $_GET['gclid'] : $_GET['gbraid'] );

            if(isset($_GET['gclid'])) 
            {
                $this->arr['verifyTokenID'] = $_GET['gclid'];
            } 
            elseif(isset($_GET['gbraid']))
            {
                $this->arr['verifyTokenID'] = $_GET['gbraid'];
            } 
            elseif(isset($_GET['wbraid']))
            {
                $this->arr['verifyTokenID'] = $_GET['wbraid'];
            }
            else
            {
                $this->arr['verifyTokenID'] = "N/A";
            }

        }elseif(isset($_GET['msclkid'])){
            $this->arr['hostName'] = 'Bing';
            $this->arr['verifyTokenID'] = $_GET['msclkid'];
        }elseif(isset($_GET['fbclid'])){
            $this->arr['hostName'] = 'Facebook';
            $this->arr['verifyTokenID'] = $_GET['fbclid'];    
        }else{
            $this->arr['hostName'] = "Organic";
            $this->arr['verifyTokenID'] = NULL;  
        }

        $this->trackingId  = $this->arr['verifyTokenID'] ?? null; // $this->arr['hostName'];


        $this->verifyToken();

        $this->setLeadChannelGroup();

        $this->ipBlockStatus = $this->isIpBlocked($this->ip);

        // $this->checkForBlockedIpAddress($this->ip); //($this->ip);

     
    }


    public function verifyToken()
    {
        $areaCodeDataRow = [];
        if($this->locationId != "")
        {
            $sql = "SELECT csza.* FROM geotargets AS geo 
                LEFT JOIN `city-state-zip-areacodes` AS csza 
                ON geo.name = csza.city 
                WHERE geo.CriteriaID=" . $this->locationId;
            $connect = $this->db->getConnection()->query($sql);
            $areaCodeDataRow = $connect->fetchAll(PDO::FETCH_OBJ);

            // var_dump($this->locationId);

            // If areacode is not found by the above query
            if($areaCodeDataRow[0]->areacode == NULL)
            {
                include_once('CityState.php');

                $cityState = new CityState;
                $cityByLocationId = $cityState->getCityBylocationID($this->locationId);

                // var_dump($cityByLocationId);
                
                $database = new Database;
                $areaCodeDataRow =  $database->read_query('`city-state-zip-areacodes`', ['state', 'zipcode', 'city', 'areacode'], ['city' => $cityByLocationId]);
            
                $this->arr['areaCode'] = ( count($areaCodeDataRow) > 0 ? $areaCodeDataRow[0]['areacode'] : $this->arr['areaCode'] );
            }
            else 
            {
                $this->arr['areaCode'] = ( count($areaCodeDataRow) > 0 ? $areaCodeDataRow[0]->areacode : $this->arr['areaCode'] );
            }
            

        } 
        // $this->arr['areaCode'] = ( count($areaCodeDataRow) > 0 ? $areaCodeDataRow[0]->areacode : $this->arr['areaCode'] );
        // $this->arr['areaCode'] = ( count($areaCodeDataRow) > 0 ? $areaCodeDataRow[0]['areacode'] : $this->arr['areaCode'] );

        // $groupID_check = $this->db->read_query('number_groups', [], ['area_code' => $this->arr['areaCode'],'ad_host_name' => $this->arr['hostName']], 0, ['id ASC']);
        // $groupID_check = $this->db->read_query('number_groups', [], ['area_code' => $this->arr['areaCode'],'ad_host_name' => $this->arr['hostName'], 'number_src' => 'Workiz'], 0, ['id ASC']);
        $groupID_check = $this->db->read_query('number_groups', [], ['area_code' => $this->arr['areaCode'],'ad_host_name' => $this->arr['hostName'], 'number_src' => 'Twilio'], 0, ['id ASC']);
 
        // $this->number_group_id = $groupID_check[0]['id'] ?? null;
        if (isset($groupID_check[0])) {
            // Access the element safely
            $this->number_group_id = $groupID_check[0]['id'];
        } else {
            // Handle the case where the element doesn't exist
            $this->number_group_id = null;
        }

        // var_dump($this->number_group_id);

        //If comes from Ads traffic source --1:true,2:false
        // $this->condition =  ((($this->arr['verifyTokenID'] && ($this->arr['hostName'] = 'Google' || 'Bing')  &&  $this->arr['areaCode'] && $this->number_group_id != 1 )) || ($this->arr['verifyTokenID'] && $arr['hostName'] = 'Facebook')) ? 1 : 2 ;
        if( $this->arr['verifyTokenID'] && ($this->arr['hostName'] == 'Google' || 'Bing') 
            &&  $this->arr['areaCode'] && $this->number_group_id != 1 
            || ($this->arr['verifyTokenID'] && $arr['hostName'] == 'Facebook') )
        {
            $this->condition = 1;
        }
        else
        {
            $this->condition = 2;
        }
       
        return $this->number_group_id;
   
    }

    public function initialize($trafficSource, $lastTrafficSource)
    {

        if($this->ipBlockStatus == true)
        {
            // insert bot log
            // $this->db->insertData('bot_log', ['user_agent', 'page_link','user_ip','session','click_date','click_time'], [$this->user_agent, $this->page_link, $this->ip, $this->session_id, $this->date, $this->time]);            
            return $this->formatPhoneNumber($this->number); // return "blocked"; 
        }

        // // For "Workiz-Facebook" combination of leads
        if($this->page_link == "https://massgaragedoorsexpert.com/fbbook.php" || $this->page_link == "https://www.massgaragedoorsexpert.com/fbbook.php")
        {
            // return $this->formatPhoneNumber("+16172199393");
            return $this->processFacebookLeadTrackingNumber();
        }

        // $botAttackStatus = $this->checkForBlockedIpAddress($this->ip);
        // if($botAttackStatus == true)
        // {
        //     return;
        // }

        if (empty($_COOKIE['phone']))
        {

            if( isset($this->arr['areaCode']) || isset($this->locationId) )
            {
                // echo "22";
                // if($this->arr['hostName'] == 'Google' && $this->number_group_id == 0)
                // {
                // if($this->arr['hostName'] == 'Google')
                // {
                //     // echo "33";
                //     // // If gclid value is found on url but areacode is neither found in db or in url, then default workiz google number is sent to user
                //     // $defaultWorkizNumberGroup = $this->db->read_query('number_groups', [], ['number_src' => "Workiz", 'ad_host_name' => "Google", 'notes' => "Default Workiz numbers group to be used for Google Ads"], 0, ['id DESC']);
                //     // $numberDetailsUsingGroup = $this->db->read_query('number_pool', [], ['group_id' => $defaultWorkizNumberGroup[0]["id"], 'seq_id' => 1], 0, ['id DESC']);
                //     // $defaultWorkizGoogleNumber = $numberDetailsUsingGroup[0]["phone_no"];
                //     // $this->number_group_id = $defaultWorkizNumberGroup[0]["id"];
                //     // $this->number_pool_id = $numberDetailsUsingGroup[0]["id"];
                    
                //     setcookie("adTrackingId", $this->trackingId, time() + (86400 * 30), '/');
                //     unset($_COOKIE["phone"]);
                //     setcookie("phone", $this->number, time() + (86400 * 30), '/'); 
                //     $_COOKIE["phone"] = $this->number;
                //     // setcookie("phone", $defaultWorkizGoogleNumber, time() + (86400 * 30), '/'); 
                //     // $_COOKIE["phone"] = $defaultWorkizGoogleNumber;

                //     // // Save visitor data into Visitor_number_assignments table
                //     // if ($this->saveRecord())
                //     // {
                //     //     // echo "33";
                //     //     return $this->formatPhoneNumber($defaultWorkizGoogleNumber);
                //     // } 
                //     // else
                //     // {
                //     //     // echo "44";
                //     //     // if visitor data not saved properly, send the user the default site number
                //         return $this->formatPhoneNumber($this->number);
                //     // }
                // }

                if($this->arr['hostName'] == 'Google')
                {
                    if($this->arr['areaCode'])
                    {
                        // $numberGroup = $this->db->read_query('number_groups', [], ['number_src' => "Twilio", 'ad_host_name' => "Google", 'area_code' => $this->arr['areaCode']], 0, ['id DESC']);
                        // $numberDetailsUsingGroup = $this->db->read_query('number_pool', [], ['group_id' => $numberGroup[0]["id"], 'seq_id' => 1], 0, ['id DESC']);
                        // $googleNumber = $numberDetailsUsingGroup[0]["phone_no"];
                        // $this->number_group_id = $numberGroup[0]["id"];
                        // $this->number_pool_id = $numberDetailsUsingGroup[0]["id"];
                        // setcookie("phone", $googleNumber, time() + (86400 * 30), '/'); 
                        // $_COOKIE["phone"] = $googleNumber;

                        $printableNumber = $this->getTrackingNumber($trafficSource, $lastTrafficSource);
                        return $this->formatPhoneNumber($printableNumber);
                        
                        // setcookie("phone", $printableNumber, time() + (86400 * 30), '/'); 
                        // $_COOKIE["phone"] = $printableNumber;

                        // Save visitor data into Visitor_number_assignments table
                        // if ($this->saveRecord())
                        // {
                        //     return $this->formatPhoneNumber($printableNumber);
                        // } 
                        // else
                        // {
                        //     // if visitor data not saved properly, send the user the default site number
                        //     return $this->formatPhoneNumber($this->number);
                        // }
                    } 
                    else 
                    {
                        setcookie("adTrackingId", $this->trackingId, time() + (86400 * 30), '/');
                        unset($_COOKIE["phone"]);
                        setcookie("phone", $this->number, time() + (86400 * 30), '/'); 
                        $_COOKIE["phone"] = $this->number;
                    }
                }
                elseif($this->arr['hostName'] == 'Facebook')
                {
                    // echo "44";
                    return $this->processFacebookLeadTrackingNumber();
                }
                else
                {
                    // echo "55";
                    // If all gclid, areacode/locationID are found in the url
                    // $printableNumber = $this->getTrackingNumber($trafficSource, $lastTrafficSource);
                    // return $this->formatPhoneNumber($printableNumber);

                    return $this->formatPhoneNumber($this->number);
                }
                
            }
            elseif($this->arr['hostName'] == 'Facebook')
            {
                return $this->processFacebookLeadTrackingNumber();
            }
            else
            {
                // $this->saveDefaultRecord();
                return $this->formatPhoneNumber($this->number);
            }
            
        }
        else
        {
            return $this->formatPhoneNumber($_COOKIE['phone']);
        }

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

            // If comes from Ads traffic source is true

            // if( isset($_GET['msclkid']) || isset($_GET['gclid']) )
            if($this->condition == 1)
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
            if($this->condition == 1)
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
        
        
//        Get the last row of the visitor_number_assignments table
        $num_assigment_query = $this->db->read_query('visitor_number_assignments', [], ['number_groups_id' => $this->number_group_id], 0, ['id DESC']);
        if (count($num_assigment_query) > 0)
        {
            // Get the last sequence id of the number_pool table to compare with sequence id of the number using the last visitor_number_assignments record
            
            // Get all the numbers from number_pool with the specific group id
            $numbers_chk = $this->db->read_query('number_pool', [], ['group_id' => $num_assigment_query[0]['number_groups_id']], 0, ['seq_id DESC']);

            // $query = $this->db->read_query('number_pool', [], ['id' => $num_assigment_query[0]['number_pool_id']]);
            
            // Get the details of the number which was last used for the selected number_group
            foreach ($numbers_chk as $key => $number_info) 
            {
                if($number_info['id'] == $num_assigment_query[0]['number_pool_id'])
                {
                    $query[0] = $number_info;
                }
            }

            // Checking If the last number of the group is the number which is used by the last used
            if ($query[0]['seq_id'] >= $numbers_chk[0]['seq_id'])
            {
                //  $query = $db->read_query('number_pool', [], ['seq_id' => 1, 'group_id' => $numbers_chk[0]['group_id']]);
                
                // If Yes, then return the first number from the number_group
                $query = array_reverse($numbers_chk);
                $this->number = $query[0]['phone_no'];
                $this->number_pool_id = $query[0]['id'];
            }
            else
            {
                // If No, Check for the next number from the group which has status "active". [In this case, active = 1]

                $numbers_chk_asc = array_reverse($numbers_chk);

                $item_found = 0;
                foreach ($numbers_chk_asc as $key => $number_details) 
                {
                    if( $number_details["seq_id"] > $query[0]["seq_id"] && $number_details["status"] == 1 && $item_found == 0)
                    {
                        $this->number = $number_details["phone_no"];
                        $this->number_pool_id = $number_details["id"];
                        $item_found = 1;
                        // var_dump($query[0]);
                    }
                }

                // $query = $this->db->read_query('number_pool', [], ['seq_id' => ($query[0]['seq_id'] + 1), 'group_id' => $numbers_chk[0]['group_id'], 'status' => '1' ]);
                // $this->number = $query[0]['phone_no'];
                // $this->number_pool_id = $query[0]['id'];
            }
        }
        else
        {
            $numbers_chk = $this->db->read_query('number_pool', [], ['group_id' => $this->number_group_id], 0, ['seq_id ASC']);
            $this->number = $numbers_chk[0]['phone_no'];
            $this->number_pool_id = $numbers_chk[0]['id'];
        }

        return $this->number;
    }

    public function setLeadChannelGroup()
    {
        if( isset($_GET['gclid']) || isset($_GET['msclkid']) || isset($_GET['fbclid']) )
        {
            $this->channel_group = "Paid";
        }

        else if($this->referring_url == "")
        {
            $this->channel_group = "Direct";
        }
        else if($this->referring_url != "")
        {
            // has refferal url

            if ( strpos($this->referring_url, 'google.com') || strpos($this->referring_url, 'msn.com') || strpos($this->referring_url, 'bing.com') || strpos($this->referring_url, 'yahoo.com') ) 
            {
                $this->channel_group = "Organic";
            }
            else if( strpos($this->referring_url, 'instagram.com') || strpos($this->referring_url, 'facebook.com') || strpos($this->referring_url, 'twitter.com') )
            {
                $this->channel_group = "Organic Social";
            }
            else
            {
                // new referral group (Add to channel_group)
                $this->channel_group = "Referral";

                if( strpos($this->referring_url, 'massgaragedoorsexpert') == false )
                {

                    $removeChar = ["https://", "http://", "/", "www."];
                    $http_refering_url = str_replace($removeChar, "", $this->referring_url);
                    
                    $num_assigment_query = $this->db->read_query('channel_groups', [], ['root_domain' => $http_refering_url], 1, ['id DESC']);
                    if (count($num_assigment_query) < 1)
                    {
                        $this->referring_url = $http_refering_url;
                        // if( !strpos($this->referring_url, 'massgaragedoorsexpert') )
                        // {
                            $this->db->insertData('channel_groups', ['root_domain','type','notes'], [$this->referring_url, "Referral", ""]);
                        // }
                    }
                    
                }
                
            }
        }
        else
        {
            $this->channel_group = "Unassigned";
        }
    }

    public function isIpBlocked($ip)
    {
        // $groupID_check = $this->db->read_query('blocked_ips', [], ['ip_address' => $ip], 0, ['id ASC']);
        // if(count($groupID_check) > 0)
        // {
        //     return true; //"ip is blocked"."<br/>";
        // }
        // else
        // {
        //     return false;
        // }

        $var = false;
        $blockedIpArray = ["47.76.35.19", "47.242.224.53", "47.76.209.138", "47.76.99.127"];
        foreach ($blockedIpArray as $key => $ipItem) {
            if($ip == $ipItem)
            {
                $var = true;
            }
        }

            if($var == true)
            {
                return true;
            }
            else
            {
                return false;
            }
        
 
        // $this->number_group_id = $groupID_check[0]['id'];
    }

    public function checkForBlockedIpAddress($ip)
    {
        $con = new Database();
        // $groupID_check = $this->db->read_query('blocked_ips', [], ['ip_address' => $ip], 0, ['id ASC']);
        $sql = "SELECT COUNT(*) as count, id, created_at, click_date, click_time FROM visitor_number_assignments WHERE user_ip= '$ip' GROUP BY HOUR(created_at), MINUTE(created_at)";// DATE_FORMAT('click_time', '%H:%i') //DATE_FORMAT('created_at', '%Y-%m-%d %H:%i')";
        $result = $con->getConnection()->query($sql);

        $date = date('Y-m-d'); // H:i:s
        $time = date('H:i');

        $d1 = strtotime("09:22");
        $d2 = strtotime($time);
        // $diff = round(abs($d2 - $d1) / 3600,2); //$d2 - $d1;
        // var_dump($diff);

        // $sql2 = "INSERT INTO bot_log(user_agent, user_ip, `session`, click_date, click_time, page_link)
        //         SELECT user_agent, user_ip, session_id, click_date, click_time, page_link FROM visitor_number_assignments WHERE user_ip = '47.76.35.19'";
        // $query1 = $con->getConnection()->query($sql2);
        // if ($query1)
        // {
        //     // echo "true";
        // }
        // else
        // {
        //     // echo "false";
        // }


    //    var_dump($sql);

        $results = $result->fetchAll(PDO::FETCH_ASSOC);

        foreach ($results as $key => $value) {
            // If hit's history match current date 
            if($date == $value['click_date'])
            {
                // If hit's history match current time (in minute)
                if($time == date('H:i', $value['click_time']))
                {
                    // check for count (10 hits in 5 minutes & 10 hits in 1 minute)
                    if($value['count'] > 10)
                    {
                        // migrate all entries to bots log.

                        $sql2 = "INSERT INTO bot_log(user_agent, user_ip, `session`, click_date, click_time, page_link)
                                 SELECT user_agent, user_ip, session_id, click_date, click_time, page_link FROM visitor_number_assignments WHERE user_ip = '$ip'";
                        $query1 = $con->getConnection()->query($sql2);
                        if ($query1)
                        {
                            // echo "true";
                            $sql3 = 'DELETE FROM visitor_number_assignments WHERE user_ip ='.$ip;
                            $query3 = $con->getConnection()->query($sql3);
                            $exec = $query3->execute();
                        }
                        else
                        {
                            // echo "false";
                        }

                        $this->db->insertData('blocked_ips', ['ip_address','notes'], [$ip, "10 hits in 1 min"]);
                        return true;
                        
                        // $sql = "INSERT INTO $table (".$keys_string.") VALUES (".$values_string.")";
                        // $sql = "INSERT INTO bot_log(user_agent, user_ip, session, cookie, source, click_date, click_time, page_link)
                        // SELECT user_agent, user_ip, session, cookie, source, click_date, click_time, page_link FROM visitor_number_assignments WHERE user_ip = '47.76.35.19'";
                        // $query = $con->getConnection()->query($sql);
                        // if ($query)
                        // {
                        //     return true;
                        // }
                        // else
                        // {
                        //     return false;
                        // }

                        // Add ip to blocked_ips table
                    }
                    else
                    {
                        return false;
                    }

                }
                else
                {
                    $d1 = strtotime($value['click_time']);
                    $d2 = strtotime($time);
                    $diff = $d2 - $d1;
                    // var_dump($diff);

                    return false;
                }
            }
        }

        return false;
        // var_dump($results);

        // return $results;

    }

    public function processFacebookLeadTrackingNumber()
    {
        $defaultWorkizNumberGroup = $this->db->read_query('number_groups', [], ['number_src' => "Workiz", 'ad_host_name' => "Facebook", 'notes' => "Default Workiz numbers group to be used for Facebook Ads"], 0, ['id DESC']);
        $numberDetailsUsingGroup = $this->db->read_query('number_pool', [], ['group_id' => $defaultWorkizNumberGroup[0]["id"], 'seq_id' => 1], 0, ['id DESC']);
        $defaultWorkizFacebookNumber = $numberDetailsUsingGroup[0]["phone_no"];
        $this->number_group_id = $defaultWorkizNumberGroup[0]["id"];
        $this->number_pool_id = $numberDetailsUsingGroup[0]["id"];

        setcookie("adTrackingId", $this->trackingId, time() + (86400 * 30), '/');
        unset($_COOKIE["phone"]);
        setcookie("phone", $defaultWorkizFacebookNumber, time() + (86400 * 30), '/'); 
        $_COOKIE["phone"] = $defaultWorkizFacebookNumber;

        if ($this->saveRecord())
        {
            return $this->formatPhoneNumber($defaultWorkizFacebookNumber);
        } 
        else
        {
            // if visitor data not saved properly, send the user the default site number
            return $this->formatPhoneNumber($this->number);
        }
    }

    public function saveRecord()
    {

        $created_at = date('Y-m-d h:i:s');
        return $this->db->insertData('visitor_number_assignments', ['user_agent','page_link', 'referring_url', 'channel_group', 'user_ip','session_id','click_date','click_time','verification_token', 'number_groups_id', 'number_pool_id', 'created_at'], [$this->user_agent, $this->page_link, $this->referring_url, $this->channel_group, $this->ip, $this->session_id, $this->date, $this->time, $this->trackingId, $this->number_group_id, $this->number_pool_id, $created_at]);
        // return $this->db->insertData('visitor_number_assignments', ['user_agent','page_link', 'referring_url','user_ip','session_id','click_date','click_time','verification_token', 'number_groups_id', 'number_pool_id', 'created_at'], [$this->user_agent, $this->page_link, $this->referring_url, $this->ip, $this->session_id, $this->date, $this->time, $this->trackingId, $this->number_group_id, $this->number_pool_id, $created_at]);

    }

    public function saveDefaultRecord()
    {
        $created_at = date('Y-m-d h:i:s');
        return $this->db->insertData('visitor_number_assignments', ['user_agent','page_link', 'referring_url', 'channel_group', 'user_ip','session_id','click_date','click_time','verification_token', 'number_groups_id', 'number_pool_id', 'created_at'], [$this->user_agent, $this->page_link, $this->referring_url, $this->channel_group, $this->ip, $this->session_id, $this->date, $this->time, $this->trackingId, 0, 0, $created_at]);
    }

    
}