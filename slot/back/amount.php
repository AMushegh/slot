<?php
    require('config.php');

    header('Content-Type: application/json');

    $username = $_POST['username'];
    $money = $_POST['money'];

    $query1="UPDATE users SET money = '$money' WHERE username = '$username'";
    $mysqli->query($query1);
?>