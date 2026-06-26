<?php

ob_start();

include "autoloader.php";

if (isset($_POST['submit']))
{
    // Grabbing user data from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Instantiate Register class
    $login = new LoginController($username, $password);

    // Running error handlers and user sign up
    $login->loginUser();

    // Redirect to homepage or success page

//    header("Location: ".Root);
}