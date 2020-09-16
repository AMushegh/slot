<?php
    require("config.php");
    header('Content-Type: application/json');
    $query = "DELETE FROM button_clicks WHERE numberOfClicks=".$_POST['id'];
    $result = ($mysqli->query($query));    

    echo $result;
?>