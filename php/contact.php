<?php
// site owner
$site_name = 'PBOARD';
$sender_domain = 'contactform@pboard.co';
$to = 'mnaeem.bscs17seecs@seecs.edu.pk';


// contact form fields
$name = htmlspecialchars(trim( $_POST['name'] ));
$email = htmlspecialchars(trim( $_POST['email'] ));
$subject = "PBOARD: Contact Email";
$message = htmlspecialchars(trim( $_POST['message'] ));


// check for error
$error = false;

if ( $name === "" ) { $error = true; }

if ( $email === "" ) { $error = true; }

if ( $subject === "" ) { $error = true; }

if ( $message === "" ) { $error = true; }


// if no error, then send mail
if ( $error == false )
{
    $body = "Subject: " . $_POST["subject"] . "Name: $name \n\nEmail: $email \n\nMessage: $message";

    $headers = "From: " . $site_name . ' <' . $sender_domain . '> ' . "\r\n";
    $headers .= "Reply-To: " . $name . ' <' . $email . '> ' . "\r\n";

    $mail_result = mail( $to, $subject, $body, $headers );

    if ( $mail_result == true )
    {
        echo "Mail successfully sent.<br />Thank you " . htmlspecialchars($_POST['fname']) . " 
        for contacting us! We will get in touch with you soon.</b></p>";
    }
    else
    {
        echo 'Mail could not be sent. Please try again.';
    }
    // end if
}
else
{
    echo 'error';
}
// end if

