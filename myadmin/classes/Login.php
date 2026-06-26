<?php


class Login
{

    protected function getUser($username, $password)
    {
        $db = new Database();
        $stmt = $db->getConnection()->query("SELECT * FROM `cms_users` WHERE username = '$username'");

        if (!$stmt)
        {
            $stmt = null;
            header('location: '.Root.'/login.php?error=usernotfound');
            exit();
        }
        if ($stmt->rowCount() == 0)
        {
            $stmt = null;
            header('location: '.Root.'/login.php?error=usernotfound');
            exit();
        }
        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $chkPwd = password_verify($password, $pwdHashed[0]['password']);

        if ($chkPwd == false)
        {
            $stmt = null;
            header('location: '.Root.'/login.php?error=passwordmismatch');
            exit();
        }
        elseif($chkPwd == true)
        {
            $db = new Database();
            $stmtt = $db->getConnection()->query("SELECT * FROM `cms_users` WHERE username = '$username'");
            $user = $stmtt->fetchAll(PDO::FETCH_OBJ);
            session_start();
            $_SESSION["id"] = $user[0]->id;
            $_SESSION['username'] = $user[0]->username;

            header('location: '.Root);
        }

    }



}