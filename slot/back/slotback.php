<?php
    require("config.php");
    mysqli_select_db($mysqli, "users");

    header("Content-Type: JSON");

    $username = $_POST['username'];

    $query = "SELECT money FROM users WHERE username='$username'";
    $result = mysqli_query($mysqli,$query);
    
    while($row = mysqli_fetch_assoc($result)){
        $test[] = $row;
    } 
    echo json_encode($test[0]['money']);
?>