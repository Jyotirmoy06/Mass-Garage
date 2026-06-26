<?php

include "autoloader.php";


$valid_extensions = array('jpeg', 'jpg', 'png'); // valid extensions
if( $_FILES['image_url'])
{
    $img = $_FILES['image_url']['name'];
    $tmp = $_FILES['image_url']['tmp_name'];
    $size = $_FILES['image_url']['size'];
    $image_size = $_POST['size'];

    // get uploaded file's extension
    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
    // can upload same image using rand function
    $final_image = date('Y-m-d').'-'.rand(9999, 99999).'-'.$image_size.'-'.$img;
    // check file size
    if($size > 10000000)
    {
        die(json_encode(['error' => true, 'message' => 'File size exceeds allowed size of 10MB']));
    }
    else
    {
        // check's valid format
        if(in_array($ext, $valid_extensions))
        {
            $path = "../../images/content/".strtolower($final_image);
//            die(json_encode(['success' => $path]));
            $fpath = '/images/content/'.strtolower($final_image); // upload directory
            if(move_uploaded_file($tmp, $path))
            {
                die(json_encode(['success' => true, 'image' => $fpath]));
            }
        }
        else
        {
            die(json_encode(['error' => true, 'message' => 'Invalid file format']));
        }
    }

}

