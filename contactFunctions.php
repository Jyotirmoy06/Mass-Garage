<?php

// Set the default TO address
$email = 'web-contact@massgaragedoorsexpert.com';

// Check if the server is the staging server
if ($_SERVER['HTTP_HOST'] === 'staging.massgaragedoorsexpert.com') {
    // Update the TO address for the staging server
    $email = 'dev@massgaragedoorsexpert.com'; 
}

$error_conn = "";

$mailHeaders = '';

$site_phone = '(888) 989-8758';



//contact form submitted

if(!empty($_POST['submit']))
{
    //"submit" for the regular contact form, "locationType" for the overlay
    //validate fields for the regular contact form
    $errors = NULL;

    if( empty($_POST['first_name']) )
    {
        $errors[] = 'Please fill out your First name';
    }

    if(empty($_POST['email']) && empty($_POST['phone']))
    {
        $errors[] = 'Please fill out your Phone & Email so that we can get in contact with you.';
    }


    $name = $_POST['first_name'] . " " . $_POST['last_name'];
    $userEmail = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    $subject = $_POST['subject'];
    $address = $_POST['address'];
    $city    = $_POST['city'];
    $state   = $_POST['state'];
    $zip     = $_POST['zip'];
    $smsAcceptStatus = (isset($_POST['acceptSMS']) && $_POST['acceptSMS'] == "on") ? "Agreed" : "Disagreed";
    $totalDoorsCount = $_POST['totalDoorsCount'];
    $doorDetails = "";

    if(isset($_POST["typeEstimateForm"]) && $_POST["typeEstimateForm"] != "") 
    {
        $heightFeet = $heightInches = $widthFeet = $widthInches = $doorHeight = $doorWidth = [];
        

        for($x=1; $x <= $totalDoorsCount; $x++)
        {
            $heightFeet[$x] = ( (isset($_POST['door'.$x.'-height-feet']) && $_POST['door'.$x.'-height-feet'] != "") ? $_POST['door'.$x.'-height-feet']."ft " : "");
            $heightInches[$x] = ( (isset($_POST['door'.$x.'-height-inches']) && $_POST['door'.$x.'-height-inches'] != "") ? $_POST['door'.$x.'-height-inches'].'in' : '');
            $widthFeet[$x] = ( (isset($_POST['door'.$x.'-width-feet']) && $_POST['door'.$x.'-width-feet'] != "") ? $_POST['door'.$x.'-width-feet']."ft " : "");
            $widthInches[$x] = ( (isset($_POST['door'.$x.'-width-inches']) && $_POST['door'.$x.'-width-inches'] != "") ? $_POST['door'.$x.'-width-inches'].'in' : '');
            
            $doorHeight[$x] = $heightFeet[$x] . $heightInches[$x];
            $doorWidth[$x] = $widthFeet[$x] . $widthInches[$x];

            $doorDetails .= "Door # ".$x." Height: ".$doorHeight[$x]." Width: ".$doorWidth[$x]."\r\n";
        }

        // $finalDoorSizes = implode($doorDetails, "<br/>");


    }



    // if(isset($_POST["typeEstimateForm"]) && $_POST["typeEstimateForm"] != "") 
    // {
    //     $heightFeet = ( (isset($_POST['height-feet']) && $_POST['height-feet'] != "") ? $_POST['height-feet']."ft " : "");
    //     $heightInches = ( (isset($_POST['height-inches']) && $_POST['height-inches'] != "") ? $_POST['height-inches'].'in' : '');
    //     $widthFeet = ( (isset($_POST['width-feet']) && $_POST['width-feet'] != "") ? $_POST['width-feet']."ft " : "");
    //     $widthInches = ( (isset($_POST['width-inches']) && $_POST['width-inches'] != "") ? $_POST['width-inches'].'in' : '');

    //     $doorHeight = $heightFeet . $heightInches;
    //     $doorWidth = $widthFeet . $widthInches;
    // }


    if(!empty($errors))
    {
        $message =  'There were some errors with your form. Please fix them and try again.<br />';
        foreach($errors as $key=>$value)
        {
            $message .= '- ' . $value . '<br />';
        }
    }
    else
    {  


            $fullName = $name;
            $from_email = 'web-contact@massgaragedoorsexpert.com'; //from mail, sender email address
            $recipient_email = $email; // 'jyotirmoy@codereliable.com'; //recipient email address
            
            //Load POST data from HTML form
            $sender_name = $_POST["sender_name"]; //sender name
            $reply_to_email = $_POST['email']; // $_POST["sender_email"]; //sender email, it will be used in "reply-to" header
            
            $boundary = md5("random"); // define boundary with a md5 hashed value


            //header
            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "From:".$from_email."\r\n"; // Sender Email
            $headers .= "Reply-To: ".$reply_to_email."\r\n"; // Email address to reach back
            $headers .= "Content-Type: multipart/mixed;"; // Defining Content-Type
            $headers .= "boundary = $boundary\r\n"; //Defining the Boundary

            $content = "From: $fullName\r\n";
            $content .= "Email: $userEmail\r\n";
            $content .= "Phone: $phone";
            $content .= "\r\nAccepting SMS: $smsAcceptStatus\r\n";
            // $content .= (isset($_POST["typeContactForm"]) && $_POST["typeContactForm"] != "") ? "\r\nAccepting SMS: $smsAcceptStatus\r\n" : " ";
            $content .= "\r\n-------------------------\r\n";
            $content .= "Address: $address\r\n";
            $content .= "City, State Zip:\r\n$city, $state $zip\r\n";
            $content .= "Message: \r\n$message\r\n";

            if(isset($_POST["typeEstimateForm"]) && $_POST["typeEstimateForm"] != "") {
                $content .= "Door(s) Details:\r\n$doorDetails\r\n";
            }

            if(!empty($error_conn)){
                $content .= "\r\n \r\n Note: Contact was not saved into the database ". $error_conn;
            }

            $url =  "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
            $escaped_url = htmlspecialchars( $url, ENT_QUOTES, 'UTF-8' );
            $content .= "\r\n-------------------------\r\n";

            if(isset($_POST["typeContactForm"]) && $_POST["typeContactForm"] != "")
            {
                $content .=  "Contact Form Page: $escaped_url";
            }
            else
            {
                $escaped_url = "massgaragedoorsexpert.com/wayne-dalton.php";
                $content .=  "Design Form Page: $escaped_url";
            }
            
            $content .= "\r\n-------------------------\r\n";
                
            //plain text
            $boundary = md5("random");
            $body = "--$boundary\r\n";
            $body .= "Content-Type: text/plain; charset=ISO-8859-1\r\n";
            $body .= "Content-Transfer-Encoding: base64\r\n\r\n";
            $body .= chunk_split(base64_encode($content));



            $attachments = $_FILES['attachment'];
            $file_count = count($attachments['name']);
            
            if($file_count > 0){
                //attachments
                for ($x = 0; $x < $file_count; $x++){		
                    if(!empty($attachments['name'][$x])){
                    
                    //get file info
                    $file_name = $attachments['name'][$x];
                    $file_size = $attachments['size'][$x];
                    $file_type = $attachments['type'][$x];

                    
                    //read file 
                    $handle = fopen($attachments['tmp_name'][$x], "r");
                    $content = fread($handle, $file_size);
                    fclose($handle);
                    $encoded_content = chunk_split(base64_encode($content)); //split into smaller chunks (RFC 2045)
                    

                    $body .= "--$boundary\r\n";
                    $body .="Content-Type: {\"application/octet-stream\"};\n" . " name=\"$file_name\"\r\n";
                    $body .="Content-Disposition: attachment; filename=\"$file_name\"\r\n";
                    $body .="Content-Transfer-Encoding: base64\r\n";
                    $body .="X-Attachment-Id: ".rand(1000,99999)."\r\n\r\n"; 
                    $body .= $encoded_content."\r\n"; 
                    }
                }
            }



                
            //attachment
            $body .= "--$boundary\r\n";



            $sentMailResult = mail($recipient_email, $subject, $body, $headers);
 
            if($sentMailResult ){
                header('location: thanks.php?name=' . $fullName);
            }
            else{
                $message = '<b>Wait! There was a problem sending your message.</b> Please call us at <a href="tel:' . $site_phone .'">' . $site_phone .'</a>';
            }




    }

}

?>