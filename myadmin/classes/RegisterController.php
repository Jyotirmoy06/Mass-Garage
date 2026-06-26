<?php

class RegisterController extends Register
{
    private $username;
    private $password;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    private function emptyInput()
    {
        $result = null;

        if (empty($this->username) || empty($this->password))
        {
            $result = false;
        }
        else
        {
            $result = true;
        }
        return $result;
    }

    private function invalidUsername()
    {
        $result = null;

        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->username))
        {
            $result = false;
        }
        else
        {
            $result = true;
        }
        return $result;
    }

    public function registerUser()
    {
        if ($this->emptyInput() == false)
        {
            header('location: '.Root.'/login.php?error=1');
            exit();
        }
        if ($this->usernameExists() == true)
        {
            header('location: '.Root.'/login.php?error=2');
            exit();
        }

        $this->setUser($this->username, $this->password);
    }

    private function usernameExists()
    {
        if ($this->checkUser($this->username))
        {
            header('location: '.Root.'/login.php?error=2');
            exit();
        }
    }
}