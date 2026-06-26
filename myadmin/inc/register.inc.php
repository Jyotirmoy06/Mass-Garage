<?php

include "autoloader.php";

if (isset($_POST['submit']))
{
    // Grabbing user data from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Instantiate Register class
    $register = new RegisterController($username, $password);

    // Running error handlers and user sign up

    $register->registerUser();

    // Redirect to homepage or success page

    header("Location: ".Root);
}