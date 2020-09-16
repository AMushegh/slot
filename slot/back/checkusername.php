<?php
    require('config.php');
    mysqli_select_db($mysqli, "users");

    header('Content-Type: application/json');

    $username = $_POST['username'];
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = $mysqli->query($query);
    if (!$result)
    {
        die('Error: ' . mysqli_error($mysqli));
    }
    if(mysqli_num_rows($result) > 0){
        echo true;
    }  
?>