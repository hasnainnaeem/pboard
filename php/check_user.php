<?php
require_once "connect_database.php";
$email = processInput($_POST['email-input']);

$query = "SELECT * from login WHERE email = '$email'";
$result = mysqli_query($conn, $query);
if (!$result) die ("Query Error!");

// go to sign up form if not in database
if($result->num_rows == 0) {
    header("Location: " . redirect('../sign-up.php?email=' . $email));
}
else {
    header("Location: " . redirect('../login.php?email=' . $email));
}


function processInput($input) {
    return htmlspecialchars(stripslashes(trim($input)));
}

function redirect($url) {
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
}
?>