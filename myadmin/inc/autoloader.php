<?php
include "../classes/Settings.php";
if (isset($folder_Depth) && $folder_Depth == 1) {
    spl_autoload_register(function ($class_name) {

        include Root.'/classes/' . $class_name . '.php';
    });
} else {
    spl_autoload_register(function ($class_name) {

        include '../classes/' . $class_name . '.php';
    });
}
?>