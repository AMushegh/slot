<?php
    require("config.php");

    header("Content-Type: JSON");

    $money = $_POST["money"];
    $username = $_POST["username"];

    $query = "UPDATE users SET money = money + $money WHERE username = '$username'";

    $mysqli->query($query);

    $query1 = "SELECT money FROM users WHERE username='$username'";
    $result = mysqli_query($mysqli,$query1);
    
    while($row = mysqli_fetch_assoc($result)){
        $test[] = $row;
    } 
    echo json_encode($test[0]['money']);
?>