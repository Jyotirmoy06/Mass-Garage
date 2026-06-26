<?php

if($_POST["city"] != "")
{
    include "../classes/Database.php";

    $city = $_POST["city"];
    $controller = new Database();
    $searchCity = $controller->readData('location_page_contents', [], ['city' => $city]);
    if(count($searchCity) > 0)
    {
        echo "found";
    }
    else
    {
        echo "empty";
    }
}
else
{
    echo "error";
}

?>