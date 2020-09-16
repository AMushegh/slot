<?php
    require("config.php");
    mysqli_select_db($mysqli,"users");
    header("Content-Type: JSON");
    // $username = mysql_fix_string($mysqli, $_POST['username']);
    // $password = mysql_fix_string($mysqli, $_POST['password']);

    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";

    $result = $mysqli->query($query);
    if(mysqli_num_rows($result) == 0){
        echo "user nixt";
    } else{
        echo true;
    }

    
    function mysql_fix_string($conn, $string)
    {
        if (get_magic_quotes_gpc()) $string = stripslashes($string);
            return $conn->real_escape_string($string);
        return null;
    }
?>