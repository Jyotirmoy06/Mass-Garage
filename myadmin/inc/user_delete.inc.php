<?php

include "autoloader.php";

if(isset($_GET['user']) && !empty($_GET['user']))
{
    $user = $_GET['user'];
    $obj = new UserController();
//    $obj->destroy($user);
    if($obj->destroy($user)) return header("Location: ". Root.'/users.php');
    return header("Location: ". Root.'/users.php?error=deletefailed');
}