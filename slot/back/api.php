<?php
    function getAPI() {
        require ('config.php');
        $response = array();
        $query = "select * from button_clicks";
        $result = mysqli_query($mysqli, $query);

        if ($mysqli){
            header("Content-Type: JSON");
            
            $i = 0;
            while($row = mysqli_fetch_assoc($result)) {
                $response[$i]['numberOfClicks'] = $row['numberOfClicks'];
                $response[$i]['username'] = $row['username'];
                $response[$i]['startClickDate'] = $row['startClickDate'];
                $response[$i]['stopDate'] = $row['stopDate'];
                $response[$i]['stopClickDate'] = $row['stopClickDate'];
                $i++;
            }

            return json_encode($response); 
        }
        else {
            return "DataBase connection failed";
        }
    }
    echo getAPI();
?>