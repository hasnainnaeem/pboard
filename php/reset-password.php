<?php
require_once "connect_database.php";
// site owner
$site_name = 'PBOARD';
$sender_domain = 'admin@pboard.co';
$to = $_GET["email"];
// contact form fields
$email = htmlspecialchars(trim( $_GET['email'] ));
$subject = "PBOARD: Reset Password";

$query = "SELECT password from login WHERE email = '$email'";
$result = mysqli_query($conn, $query);
$row = $result->fetch_array(MYSQLI_NUM);
$password =$row[0];
$message = "Dear User, you requested to your password on PBoard. Use password in this email (we highly recommend you to
 change password). Your password: " . $password;



// check for error
$error = false;
if ( $email === "" ) { $error = true; }



// if no error, then send mail
if ( $error == false )
{
    $body = $message;

    $headers = "From: " . $site_name . ' <' . $sender_domain . '> ' . "\r\n";
    $headers .= "Reply-To: "  . ' <' . $email . '> ' . "\r\n";

    $mail_result = mail( $to, $subject, $body, $headers );

    if ( $mail_result == true )
    {
        echo 'Your password is sent to your email.';
    }
    else
    {
        echo 'System could not send your password to your email. Please try again.';
    }
    // end if
}
else
{
    echo 'error';
}
// end if

