<?php
    require 'connection.php';
    //require 'header.php';
    session_start();
    $item_id=$_GET['id'];
    $user_id=$_SESSION['id'];
    $price = $_GET['product_id'];
    $add_to_cart_query="insert into users_items(user_id,product_id,status,product_price_id) values ('$user_id','$item_id','Added to cart','$price')";
    $add_to_cart_result=mysqli_query($con,$add_to_cart_query) or die(mysqli_error($con));
    header('location: gallery.php.php');
?>