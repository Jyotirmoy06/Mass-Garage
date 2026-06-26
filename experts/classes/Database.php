<?php
require '../includes/dbconfig.php';

/**
 * 
 * Class Database 
 * 
 */

class Database
{
    /**
     * 
     * @var $host 
     * @var $user
     * @var $pass
     * @var $dbname
     * @var $_connection
     * @var $_instance
     * 
     */

    /**
     * 
     * Credentials required to make the connection
     *
     */
    
    private $host = DB_HOST;

    private $user = DB_USER;

    private $pass = DB_PASS;

    private $dbname = DB_NAME;
        
    private $_connection;

    private static $_instance;
    
    
    /**
     * 
     * Creates an instance of the class 
     * 
     */

    public static function getInstance()
    {

        if (!self::$_instance) { // If no instance then make one

            self::$_instance = new self();
        }

        return self::$_instance;
    }

    //called when the class is instantiated sets up connection and configuaration

  
    public function __construct()
    {   
        $this->_connection = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);

        $this->_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    // Magic method clone is empty to prevent duplication of connection

    private function __clone()
    {
    }

    //class that returns the connection variable to make queries

    public function getConnection()
    {
        return $this->_connection;
    }
    /**
     * function read_query
     * 
     * returns an associative array of a query
     *
     * @param string $table
     * @param array $keys
     * @param array $condition
     * @param integer $limit
     * @param array $order_by
     * @return void
     */
    public function read_query($table, $keys = [], $condition = [],  $limit = 0, $order_by = [])
    {
        $sql = '';
        $condition_sql = '';
        if(!empty($keys))
        {

            $keys_string = implode(', ', $keys);
        
        }
        else
        {
           $keys_string = '*';
        }
        if (!empty($condition))
        {

            $condition_sql .= ' WHERE ';
            foreach ($condition as $key => $value) 
            {

                $condition_sql .= $key . '="' . $value . '" ';

                $condition_sql .= 'AND ';
            }

            $words = explode(" ", $condition_sql);
            array_splice($words, -2);

            $condition_sql = implode(" ", $words);
        }

        $sql = 'SELECT ' . $keys_string . ' FROM ' . $table . $condition_sql;


        if ($limit > 0)
        {
            $sql .= ' LIMIT ' . $limit;
        }

        if (count($order_by) > 0) 
        {
            $order_condition = implode(', ', $order_by);
            $sql .= ' ORDER BY ' . $order_condition;
        }

        $result = $this->_connection->query($sql);

//        var_dump($result);

        $results = $result->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }

    public function readData($table, $keys = [], $condition = [], $op = "",  $limit = 0,  $offset = 0, $order_by = [])
    {
        $sql = '';
        $condition_sql = '';
        if(!empty($keys))
        {

            $keys_string = implode(', ', $keys);

        }
        else
        {
            $keys_string = '*';
        }
        if (!empty($condition))
        {

            $condition_sql .= ' WHERE ';
            foreach ($condition as $key => $value)
            {
                if(!empty($op))
                {
                    $condition_sql .= $key . $op.'"' . $value . '" ';
                }
                else
                {
                    $condition_sql .= $key . '="' . $value . '" ';
                }

                $condition_sql .= 'AND ';
            }

            $words = explode(" ", $condition_sql);
            array_splice($words, -2);

            $condition_sql = implode(" ", $words);
        }

        $sql = 'SELECT ' . $keys_string . ' FROM ' . $table . $condition_sql;

        if (count($order_by) > 0)
        {
            $order_condition = implode(', ', $order_by);
            $sql .= ' ORDER BY ' . $order_condition;
        }


        if ($limit > 0)
        {
            if($offset > 0)
            {
                $sql .= ' LIMIT ' . $limit.','.$offset;
            }
            else
            {
                $sql .= ' LIMIT ' . $limit;
            }
        }

        $result = $this->_connection->query($sql);

//        var_dump($result);

        $results = $result->fetchAll(PDO::FETCH_OBJ);

        return $results;
    }

    public function insertData($table, $keys = [], $values = [])
    {
        if(!empty($keys))
        {

            $keys_string = implode(', ', $keys);

        }
        if(!empty($values))
        {

            $values_string = '"'. implode('","', $values).'"';

        }
        $sql = "INSERT INTO $table (".$keys_string.") VALUES (".$values_string.")";


        $query = $this->_connection->query($sql);


        if ($query)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function updateData($table, $queryStr, $id)
    {
        if(!empty($keys))
        {

            $keys_string = implode(', ', $keys);

        }
        if(!empty($values))
        {

            $values_string = '"'. implode('","', $values).'"';

        }
        $qStr= rtrim($queryStr, ",");
        // var_dump($qStr);

        $sql = "UPDATE $table SET ".$qStr." WHERE id = ".$id;

        $query = $this->_connection->query($sql);


        if ($query)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function removeData($table, $id, $primaryKey = 'id')
    {
        $sql = 'DELETE FROM '.$table.' WHERE '.$primaryKey.'='.$id;
        $query = $this->getConnection()->query($sql);
        $exec = $query->execute();


        if ($exec) return true;
        return false;
    }
}
