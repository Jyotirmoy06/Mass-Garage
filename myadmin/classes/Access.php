<?php
require_once 'Database.php';

class Access
{



    public function levelCheck($ul)
    {
        session_start();
        if ($this->isLoggedIn())
        {
            $db =  new Database();
           $getUserRole =  $db->readData('cms_users', [], ['id' => $_SESSION['id']]);
           $chkRole =  $db->readData('cms_roles', [], ['role' => $ul]);
           if($getUserRole[0]->access_level >= $chkRole[0]->role_id)
           {
               return true;
           }
            return header("Location: ".Root."/error403.php");
//           var_dump('files');
        }
        return header("Location: ".Root."/error403.php");
    }

     public static function check($ul)
    {
        session_start();
        if ((new self)->isLoggedIn())
        {
            $db =  new Database();
           $getUserRole =  $db->readData('cms_users', [], ['id' => $_SESSION['id']]);
           $chkRole =  $db->readData('cms_roles', [], ['role' => $ul]);
           if($getUserRole[0]->access_level >= $chkRole[0]->role_id)
           {
               return true;
           }
//            var_dump('files');
            return false;
        }
        return false;
    }

    public function isLoggedIn()
    {
        if (isset($_SESSION['id']) && !empty($_SESSION['id']))
        {
            return true;
        }
        return false;
    }
}