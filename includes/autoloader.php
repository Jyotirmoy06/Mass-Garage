<?php 
spl_autoload_register(function ($class_name)
{
  include 'Functions/'. $class_name .'.php';
});
?>