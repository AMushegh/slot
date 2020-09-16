<?php
    require("config.php");
    mysqli_select_db($mysqli, "users");

    header('Content-Type: application/json');

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $email = $_POST['email'];

    $query = "INSERT INTO users (firstname, lastname, username, password, email) VALUES('$firstname', '$lastname', '$username', '$pass', '$email')";
    $result = $mysqli->query($query);
    if (!$result){
        die('Error: ' . mysqli_error($mysqli));
    }
    echo $result;
?>