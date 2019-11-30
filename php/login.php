<?php
require_once "connect_database.php";
$email = processInput($_POST['email']);
$password = htmlspecialchars($_POST['password']);

$query = "SELECT * from login WHERE email = '$email'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
if($result->num_rows !=0 && password_verify($password, $row["password"])) {
    echo "success";
}
else {
    echo "failure";
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