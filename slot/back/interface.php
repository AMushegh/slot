<?php
    require('config.php');

    $username = $_POST['username'];
    $from_date = $_POST['from_date'];
    $to_date = $_POST['to_date'];

    $queries = array("SELECT * FROM button_clicks", " WHERE username='$username'", " date >= '$from_date' AND date <= '$to_date'");
    

    if(!($from_date =="" && $to_date =="")){
        if($username == 'All users'){
            $query = $queries[0]." WHERE".$queries[2];
        } else {
            $query = $queries[0].$queries[1]." AND".$queries[2];
        }   
    }else{
        if($username == 'All users'){
            $query = $queries[0];
        } else {
            $query = $queries[0].$queries[1];
        }
    }

    $result = $mysqli->query($query);

    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>".$row['numberOfClicks']."</td>
            <td>".$row['username']."</td>
            <td>".$row['win']."</td>
            <td>".$row['total']."</td>
            <td>".$row['date']."</td>
            <td>".$row['startClickDate']."</td>
            <td>".$row['stopDate']."</td>
            <td>".$row['stopClickDate']."</td>
            <td><button id=".$row['numberOfClicks']." type='button' class='btn btn-danger btn-sm modifyButton'>Clear</button></td> 
        </tr>";
    }
?>