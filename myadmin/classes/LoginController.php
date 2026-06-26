<?php

class LoginController extends Login
{
    private $username;
    private $password;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function loginUser()
    {
        if ($this->emptyInput())
        {
            header('location: '.Root.'/login.php?error=emptyfields');
            exit();
        }

        $this->getUser($this->username, $this->password);
    }

    private function emptyInput()
    {
        $result = null;

        if (empty($this->username) || empty($this->password))
        {
            $result = true;
        }
        else
        {
            $result = false;
        }
        return $result;
    }


}