<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 'On');
require_once 'Database.php';
require_once 'Access.php';

class CallTrackingController extends Database
{
    protected $table = 'visitor_number_assignments';
    protected $primaryKey = 'id';
    protected $fillables = ['verification_token', 'number_group_id', 'number_pool_id', 'has_called', 'call_status', 'call_from_no', 'call_start_time', 'call_duration', 'notes', 'is_valid'];
    protected $optional = [];
    protected $errors = [];
    protected $message = [];
    protected $values = [];
    protected $queryStr = "";
    protected $revision_id = "";

    public function index($limit = 0, $offset = 0)
    {
        return $this->readData($this->table, [], ['status' => 1], '', $limit, $offset, ['created_at DESC']);
    }

    public function getTableData()
    {
        // $sql = "SELECT na.*, si.name AS site_name, si.domain AS domain_name, ng.ad_host_name AS ad_host
        $sql = "SELECT na.*, ng.number_src, np.phone_no AS tracking_no
        FROM visitor_number_assignments AS na 
        LEFT JOIN number_groups AS ng
        ON na.number_groups_id = ng.id
        LEFT JOIN number_pool AS np
        ON na.number_pool_id = np.id WHERE na.call_status = 'completed'";

        $query = $this->getConnection()->query($sql);
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        return $results;
    }

    public function updateCallDetails($id, $field, $value)
    {
        $this->queryStr .= $field." = '$value'";
        $stmt = $this->updateData($this->table, $this->queryStr, $id);
        if ($stmt){
            return true;
        }

        return false;
    }

    public function getTrackingNumbers()
    {
        return $this->readData("number_pool", ['id', 'phone_no'], []);
    }

    public function getVisitorDetailsCount($numberpoolId, $date, $time)
    {
        $numberpoolId = (int)$numberpoolId;
        $dateTime = $date." ".$time;
        // $sql = "SELECT count(*) AS count, id FROM `visitor_number_assignments` 
        // WHERE `click_date` = '$date' 
        // AND `number_pool_id` = $numberpoolId 
        // AND `has_called` = 0 
        // ORDER BY `id` DESC 
        // LIMIT 1";

//         SELECT * FROM `visitor_number_assignments` 
// WHERE `number_pool_id` = 132 
// AND `click_date` <= '2023-02-20' 
// AND `click_time` < '14:48' 
// ORDER BY `click_date` DESC, `click_time` DESC 
// LIMIT 1

        $sql = "SELECT * FROM `visitor_number_assignments` 
        WHERE `number_pool_id` = $numberpoolId 
        AND `created_at` <= '$dateTime'
        AND `has_called` = 0 
        ORDER BY `created_at` DESC
        LIMIT 1";

        // $sql = "SELECT * FROM `visitor_number_assignments` 
        // WHERE `number_pool_id` = 122 AND `created_at` <= '2023-02-23 10:48' ORDER BY `created_at` DESC LIMIT 10 

        $query = $this->getConnection()->query($sql);
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        return $results;
    }

    public function getVisitorExistanceWithNumbers($numberpoolId, $visitorNumber)
    {
        $numberpoolId = (int)$numberpoolId;
        $sql = "SELECT count(*) AS count, id FROM `visitor_number_assignments` 
        WHERE `call_from_no` = '$visitorNumber' 
        AND `number_pool_id` = $numberpoolId 
        AND `has_called` = 1";

        $query = $this->getConnection()->query($sql);
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        return $results;
    }

    public function updateVisitorDetails($data, $id)
    {
        $this->queryStr = "";
        foreach ($data as $key => $value) 
        {
            if($key == "has_called" || $key == "number_pool_id")
            {
                $this->queryStr .= $key." = $value, ";
            }
            else
            {
                $this->queryStr .= $key." = '$value', ";
            }
        }

        // removes the extra ',' & 'space' at last of $this->queryStr
        $this->queryStr = substr($this->queryStr, 0, -2);
        
        $stmt = $this->updateData($this->table, $this->queryStr, $id);
        if($stmt)
        {
            return true;
        }
        return false;
    }

    public function getBotsLog()
    {
        $sql = "SELECT * FROM bot_log";

        $query = $this->getConnection()->query($sql);
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        return $results;
    }

    
}