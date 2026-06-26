<?php

$folder_Depth=1;
$meta_Title = 'Blog - Mass Garage Doors Expert';
$meta_Description = '';
$meta_url='https://massgaragedoorsexpert.com/blog';
$meta_ogTitle='Blog';

$last_url = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$current_url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$current_urls = explode('/', $current_url);
if (count($current_urls) <= 3)
{
    include "articles.php";
}
else
{
    $blog_route_key = array_search('info', $current_urls);
    include "show.php";
}