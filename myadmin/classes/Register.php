<?php


class Register
{

    protected function setUser($username, $password)
    {
        $hashedPwd = password_hash($password, PASSWORD_BCRYPT);
        $db = new Database();
        $stmt = $db->getConnection()
            ->query("INSERT INTO `cms_users` (username, password) VALUES ('$username', '$hashedPwd');");

        if (!$stmt)
        {
            $stmt = null;
            header('location: '.Root.'/login.php?error=0');
            exit();
        }
        if ($stmt->rowCount() > 0)
        {
            $resultCheck = false;
        }
        else
        {
            $resultCheck = true;
        }
        return $resultCheck;
    }

    protected function checkUser($username)
    {
        $db = new Database();
        $chk = $db->getConnection()->query("SELECT `username` FROM `cms_users` WHERE username = '$username'");

        if (!$chk)
        {
            header('location: '.Root.'/login.php?error=1');
            exit();
        }

        if ($chk->rowCount() > 0)
        {
            $resultCheck = true;
        }
        else
        {
            $resultCheck = false;
        }
        return $resultCheck;
    }



}