<?php

    include("config.php");

    $api_key_value = "tPmAT5Ab3j7F9";

    $apikey    =   $_GET['api_key'];
    $apikey  = mysqli_real_escape_string($link,$_GET['api_key']);
    
    if($apikey == $api_key_value){
        $sql        =   "SELECT downtime_startTime, downtime_endTime FROM system_schedule ORDER BY id DESC LIMIT 1";
        $result     =   $link->query($sql);

        if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc())
        {
            echo $row['downtime_startTime' . + "_"];
            echo $row['downtime_endTime'];
        }

        } else {
            echo "Error:" . $sql . "<br>" . $link->error;
        }                
    }
    
    $link->close();
?>