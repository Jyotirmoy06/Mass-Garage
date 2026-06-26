<?php
session_start();
require "../Functions/CallTracking.php";
date_default_timezone_set('US/Eastern');


$callTracking = new CallTracking();
echo $callTracking->initialize();