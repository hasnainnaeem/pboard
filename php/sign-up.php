<?php
require_once "connect_database.php";
    $firstName = processInput($_POST['first-name']);
    $lastName = processInput($_POST['last-name']);
    $email = processInput($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "SELECT * from login WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    if($result->num_rows ==0) {
        $query = "INSERT INTO login (first_name, last_name, email, password) 
    VALUES ( '$firstName', '$lastName' ,  '$email', '$password');";
        $result = mysqli_query($conn, $query);
        if (!$result) die ("Query Error!");
        $conn->close();
        echo "Sign up Successful!";
    }
    else {
        echo "User with same email already exists.";
    }

function processInput($input) {
    return htmlspecialchars(stripslashes(trim($input)));
}
?>