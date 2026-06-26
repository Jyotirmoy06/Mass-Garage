<?php

include "autoloader.php";

if(isset($_GET['article']) && !empty($_GET['article']))
{
    $article = $_GET['article'];
    $obj = new ArticleController();
    if($obj->destroy($article)) return header("Location: ". Root.'/articles.php');
    return header("Location: ". Root.'/articles.php?error=deletefailed');
}