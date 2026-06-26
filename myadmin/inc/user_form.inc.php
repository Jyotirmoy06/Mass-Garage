<?php

include "autoloader.php";

if (isset($_POST['submit']) || isset($_POST['continue']))
{

    // Instantiate UserController class
    $user = new UserController();
    if (isset($_POST['id']) && !empty($_POST['id']))
    {
        $id = $_POST['id'];
        $save = $user->update($id);

    }
    else
    {
        // Running error handlers and user sign up
        $save = $user->store();
    }

    if ($save)
    {
        header("Location: ".Root."/users.php");

    }


    // Redirect to homepage or success page

}
