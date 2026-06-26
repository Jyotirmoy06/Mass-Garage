<?php

require_once "Database.php";

class UserController extends  Database
{

    protected $table = 'cms_users';
    protected $primaryKey = 'id';
    protected $fillables = ['username', 'password', 'access_level'];
    protected $optional = ['access_level'];
    protected $errors = [];
    protected $message = [];
    protected $values = [];
    protected $queryStr = "";

    public function index($limit = 0, $offset = 0)
    {
        return $this->readData($this->table, [], ['status' => 1], '', $limit, $offset, ['created_at DESC']);
    }


    public function adminIndex($limit = 0, $offset = 0)
    {
        return $this->readData($this->table, [], [], '', $limit, $offset);
    }

    public function checkUsername($uname, $id = 0)
    {
        $chk = $this->readData($this->table,  [], ['username' => $uname]);

        if (count($chk) > 0)
        {
            if($id > 0)
            {
                if ($chk[0]->id == $id)
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
            else
            {
                return false;
            }
        }
        else
        {
            return true;
        }

    }
    public function store()
    {
        $this->validate();
        if (empty($this->errors) && count($this->errors) < 1)
        {
            $stmt = $this->insertData($this->table, $this->fillables, $this->values);
            if ($stmt){
                $this->errors = [];
                session_start();
                $this->message = ['success' => true, 'message' => 'User created successfully!!'];
                $_SESSION['success'] = $this->message;
                header("Location: " . Root . "/users.php");

            }else {
                session_start();
                $this->errors[] = 'username';
                $_SESSION['errors'] = $this->errors;
                header("Location: " . Root . "/users.php");
            }
        }
        else
        {
            session_start();
            $_SESSION['errors'] = $this->errors;
            header("Location: ".$_SERVER['HTTP_REFERER']);
        }
    }

    public function update($id)
    {

        $userRole = $this->checkRole();
//        var_dump($userRole);
        if($userRole >= 3)
        {
            if($userRole == 3 && $this->checkUserRole($id) > 3)
            {
                session_start();
                $this->message = ['success' => true, 'message' => 'Permission Denied!!'];
                $_SESSION['error'] = $this->message;
                header("Location: " . $_SERVER['HTTP_REFERER']);
            }
            else
            {
                $this->validate($id);
                if (empty($this->errors) && count($this->errors) < 1) {
                    $stmt = $this->updateData($this->table, $this->queryStr, $id);

                    if ($stmt) {
                        session_start();
                        $this->message = ['success' => true, 'message' => 'User saved successfully!!'];
                        $_SESSION['success'] = $this->message;
                        header("Location: " . $_SERVER['HTTP_REFERER']);
                    }
                    return false;
                } else {
                    session_start();
                    $_SESSION['errors'] = $this->errors;
                    header("Location: " . $_SERVER['HTTP_REFERER']);
                }
            }
        }
        else
        {
            session_start();
            $this->message = ['success' => true, 'message' => 'Permission Denied!!'];
            $_SESSION['error'] = $this->message;
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }
    }

    public function search($keyword = null, $order_by = null, $limit = 0, $offset = 0)
    {
        $sql = 'SELECT * FROM `cms_users` WHERE';
        if(isset($keyword) && !empty($keyword))
        {
            $sql .=  ' username LIKE "%'.$keyword.'%"';
        }

        if(isset($order_by) && !empty($order_by))
        {
            $sql .=  ' ORDER BY '.$order_by;
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


        $query = $this->getConnection()->query($sql);

        $results = $query->fetchAll(PDO::FETCH_OBJ);

        return $results;
    }

    public function destroy($id)
    {
        $userRole = $this->checkRole();
//        var_dump($userRole);
        if($userRole >= 3) {
//            var_dump($userRole);
            if ($id == $_SESSION['id'])
            {
                return false;
            }elseif($userRole == 3 && $this->checkUserRole($id) > 3)
            {
                return false;
            }
            else
            {
                return $this->removeData($this->table, $id, 'id');
            }
        }
        return false;
    }

    public function checkRole()
    {
        session_start();
        if ($this->isLoggedIn())
        {
            $getUserRole =  $this->readData('cms_users', [], ['id' => $_SESSION['id']]);
            $chkRole =  $this->readData('cms_roles', [], ['role_id' => $getUserRole[0]->access_level]);
            if(count($chkRole) > 0)
            {
                return $chkRole[0]->role_id;
            }
//            var_dump('files');
            return 1;
        }
    }

    public function checkUserRole($id)
    {
        if ($this->isLoggedIn())
        {
            $getUserRole =  $this->readData('cms_users', [], ['id' => $id]);
            $chkRole =  $this->readData('cms_roles', [], ['role_id' => $getUserRole[0]->access_level]);
            if(count($chkRole) > 0)
            {
                return $chkRole[0]->role_id;
            }
//            var_dump('files');
            return 1;
        }
    }

    public function isLoggedIn()
    {
//        session_start();
        if (isset($_SESSION['id']) && !empty($_SESSION['id']))
        {
            return true;
        }
        return false;
    }

    public function validate($id = 0)
    {


        foreach($this->fillables as $field)
        {
            if(empty($_POST[$field]) && !in_array($field, $this->optional))
            {
                if($field == "username")
                {
                    if(!$this->checkUsername($_POST[$field], $id))
                    {
                        $this->errors[] = 'username';
                    }
                }
                elseif($field == "password")
                {
                    if($id < 1)
                    {
                        $this->errors[] = 'password';
                    }
                }
                else
                {
                    $this->errors[] = $field;
                }
            }
            else
            {
                $this->values[$field] = $_POST[$field];

                if($field == "username")
                {
                    if(!$this->checkUsername($this->values[$field], $id))
                    {
                        $this->errors[] = 'username';
                    }
                }
                if($field == "password")
                {
                    if (strlen( $_POST[$field]) < 6 )
                    {
                        $this->errors[] = 'password';
                    }
                    $this->values[$field] = password_hash($_POST[$field], PASSWORD_BCRYPT);
                }
                if($id > 0)
                {

                    if($field == "username")
                    {
                        if(!$this->checkUsername($this->values[$field], $id))
                        {
                            $this->errors[] = 'username';
                        }
                        $this->queryStr .= "$field = '$_POST[$field]',";
                    }
                    if($field == "password" && !empty($_POST[$field]))
                    {
                        if (!empty($_POST[$field]) && strlen( $_POST[$field]) < 6 )
                        {
                            $this->errors[] = 'password';
                        }
                        $pwd = password_hash($_POST[$field], PASSWORD_BCRYPT);
                        $this->queryStr .= "$field = '$pwd',";
                    }
                    if (!in_array($field, ['username', 'password']))
                    {
                        $this->queryStr .= "$field = '$_POST[$field]',";
                    }
                }
            }
        }
    }

}