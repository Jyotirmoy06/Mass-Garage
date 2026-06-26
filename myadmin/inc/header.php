<?php

session_start();
if($authPage)
{
    if (isset($_SESSION['id']) || !empty($_SESSION['id']))
    {
        header('Location: /myadmin');
        exit();
    }
}else
{
    if (!isset($_SESSION['id']) || empty($_SESSION['id']))
    {
        header('Location: /myadmin/login.php');
        exit();
    }
}
if (isset($folder_Depth) && $folder_Depth == 1) {
    spl_autoload_register(function ($class_name) {

        include '../classes/' . $class_name . '.php';
    });
    include "../classes/Settings.php";
} else {
    spl_autoload_register(function ($class_name) {

        include 'classes/' . $class_name . '.php';
    });
    include "classes/Settings.php";
}
// Login Form Validation Message
if(isset($_GET['error']) && !empty($_GET['error']))
{
    $err = $_GET['error'];
    if ($err == "passwordmismatch" || $err == "usernotfound") $message = "Incorrect Username or Password!";
    elseif ($err == "emptyfields") $message = "Please check what you entered and try again";
    else $message = "Oops!! Something went wrong";
}
if(isset($_SESSION['success']) && !empty($_SESSION['success']))
{
    $success = $_SESSION['success'];
    unset($_SESSION['success']);
}


if(isset($_SESSION['errors']) && !empty($_SESSION['errors']))
{
    $errors = $_SESSION['errors'];
    unset($_SESSION['errors']);
}
else
{
    $errors = [];
}

// For single alert-danger errors
if(isset($_SESSION['error']) && !empty($_SESSION['error']))
{
    $error = $_SESSION['error'];
    unset($_SESSION['error']);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $pageTitle ?></title>
    <link rel="stylesheet" href="<?= Root ?>/assets/css/bootstrap.css" />
    <link rel="stylesheet" href="<?= Root ?>/assets/css/custom.css" />
    <link rel="stylesheet" href="<?= Root ?>/assets/vendors/summernote/summernote-lite.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <?php
        if($pageTitle == "Call Tracking Table - CMS" || $pageTitle == "Test Article" || $pageTitle == "Bot Log Table - CMS")
        {
    ?>
            <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css" />
            <link rel="stylesheet" href-"https://cdn.datatables.net/buttons/2.3.4/css/buttons.dataTables.min.css" />
            <link rel="stylesheet" href-"https://cdn.datatables.net/select/1.6.0/css/select.dataTables.min.css" />
            <link rel="stylesheet" href-"https://cdn.datatables.net/datetime/1.3.0/css/dataTables.dateTime.min.css" />
            <link rel="stylesheet" href="<?php //echo Root; ?>/assets/css/editor.dataTables.min.css" /> -->

            <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.10.16/datatables.min.css"/>
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css"/>
    <?php
        }
    ?>

<style>
    .dataTables_info .dataTables_length {
        float: left;
    }
</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <!-- <a class="navbar-brand" href="#">CMS</a> -->
        <img loading="lazy" src="/images/logo.png" alt="" style="margin-right: 1%;">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a href="<?= Root ?>" class="nav-link">Home</a>
                </li>
                <?php
                if(isset($_SESSION['id']) || !empty($_SESSION['id']))
                {
                ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Articles
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="<?= Root ?>/articles.php">All Articles</a></li>
                        <li><a class="dropdown-item" href="<?= Root ?>/create.php">Create Articles</a></li>
                    </ul>
                </li>
                    <?php
                    if (Access::check("admin"))
                    {
                    ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Users
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="<?= Root ?>/users.php">All Users</a></li>
                        <li><a class="dropdown-item" href="<?= Root ?>/create_user.php">Create User</a></li>
                    </ul>
                </li>
                <li class="nav-item active">
                    <a href="<?= Root ?>/call_tracking.php" class="nav-link">Completed Call Details</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Location Pages
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="<?= Root ?>/location_page_contents.php">Location Pages List</a></li>
                        <li><a class="dropdown-item" href="<?= Root ?>/create_location_page.php">Create Location Page Content</a></li>
                    </ul>
                </li>
                <?php
                    }
                }
                ?>
                <li class="nav-item">
                    <?php
                    if(isset($_SESSION['id']) || !empty($_SESSION['id']))
                    {
                    ?>
                    <a href="<?= Root ?>/inc/logout.inc.php" class="nav-link text-danger pull-right">Logout</a>
                    <?php
                    }
                    else
                    {
                    ?>
                    <a href="<?= Root ?>/login.php" class="nav-link text-primary pull-right">Login</a>
                    <?php
                    }
                    ?>
                </li>
            </ul>
        </div>
    </div>
</nav>