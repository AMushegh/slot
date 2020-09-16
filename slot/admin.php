<?php
    require('back/config.php');

    $query1 = "SELECT * FROM users";
    
    $result1 = $mysqli->query($query1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Admin interface</title>
    <style>
        #find{
            display: flex;
            justify-content: space-around;
            align-items: center;
            box-sizing: border-box;
            padding: 10px;
        }
    </style>
</head>
<body>
    <div id="find">
        <div id ='c'>
            <label>Username:</label>
            <select id="users">
                <option>All users</option>
                <?php while($row = mysqli_fetch_assoc($result1)):;?>
                <option><?php echo $row['username'];?></option>
                <?php endwhile?>
            </select>   
        </div>
        <div id ='b'>
            <label>From:</label>
            <input type="date" name="date1" id="date1">
        </div>
        <div id="a">
            <label>To:</label>
            <input type="date" name="date2" id="date2">
        </div>
        <!-- <button type="button" id='btnn' class="btn btn-primary">Find</button> -->
</div>
    <table class="table">
        <thead class="thead-dark">
            <tr class>
                <th scope="col">#click number</th>
                <th scope="col">username</th>
                <th scope="col">win</th>
                <th scope="col">total</th>
                <th scope="col">date</th>
                <th scope="col">start Click Time</th>
                <th scope="col">stop Time</th>
                <th scope="col">stop Click Time</th>
                <th scope="col">Modify</th>
            </tr>
        </thead>
        <tbody id="tbody">
                <?php
                    // require('back\interface.php');
                ?>
        </tbody>
    </table>
    <script src="script/jquery-3.5.1.min.js"></script>
    <script src="script/modify.js"></script>
</body>
</html>