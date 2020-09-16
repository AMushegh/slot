<?php
    require('config.php');
    // mysqli_select_db($mysqli, "button_clicks");

    header('Content-Type: application/json');
    
    $username = $_POST['username'];
    $win = $_POST['win'];
    $total = $_POST['total'];
    $date = $_POST['date'];
    $startClickDate = $_POST['startClickDate'];
    $stopDate = $_POST['stopDate'];
    $stopClickDate = $_POST['stopClickDate'];

    $query1 = "INSERT INTO button_clicks (username, win, total, date, startClickDate, stopDate, stopClickDate) 
    VALUES('$username','$win','$total','$date','$startClickDate', '$stopDate', '$stopClickDate')";
    // $query2=" UPDATE users SET money = money - 50 WHERE username = $username";
    $mysqli->query($query1);
    // $mysqli->query($query2);
?>