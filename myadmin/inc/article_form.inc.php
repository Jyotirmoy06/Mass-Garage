<?php

include "autoloader.php";

if (isset($_POST['submit']) || isset($_POST['continue']))
{


    if(!isset($_POST['large_image_status']))
    {
        $_POST['large_image_status'] = 0;
    }

    // Instantiate ArticleController class
    $article = new ArticleController();
    if (isset($_POST['id']) && !empty($_POST['id']))
    {
        $id = $_POST['id'];
        $save = $article->update($id);

    }
    else
    {
        // Running error handlers and user sign up
        $save = $article->store();
    }

    if ($save)
    {
            header("Location: ".Root."/articles.php");

    }


    // Redirect to homepage or success page

}
