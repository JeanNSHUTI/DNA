<?php
/*
  Rui Santos
  Complete project details at https://RandomNerdTutorials.com
  
  Permission is hereby granted, free of charge, to any person obtaining a copy
  of this software and associated documentation files.
  
  The above copyright notice and this permission notice shall be included in all
  copies or substantial portions of the Software.
*/

include("config.php");

// Keep this API Key value to be compatible with the ESP32 code provided in the project page. If you change this value, the ESP32 sketch needs to match
$api_key_value = "tPmAT5Ab3j7F9";

$api_key = $animalID = $food_served = $food_left = "";

//if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = mysqli_real_escape_string($link,$_POST["api_key"]);
    if($api_key == $api_key_value) {
        $animalID = mysqli_real_escape_string($link,$_POST['animalID']);
        $food_served = mysqli_real_escape_string($link,$_POST['foodServed']);
        $food_left = mysqli_real_escape_string($link,$_POST['foodLeft']);
        
        echo $animalID;
        echo $food_served;
        echo $food_left;
        
        $daily_intake = $food_served - $food_left;
        
        if($daily_intake < 1){
            $alert_status = TRUE;
        }else{
            $alert_status = FALSE;
        }
        
        $sql = "INSERT INTO animal_feed (animal_id, food_served, food_leftover, dailyIntake, animal_alertStatus)
        VALUES ('$animalID', '1$food_served', '$food_left', '$daily_intake', FALSE)";
        
        if ($link->query($sql) === TRUE) {
            echo "New record created successfully";
            
            if($alert_status === 1){
                //Send notification to 
                $_type = "ANIMAL WARNING";
                
                $sql1 = "INSERT INTO notification (username, type, downtime_startTime, downtime_endTime) VALUES ('$username', '$_type', '$new_startdown', '$new_enddown')";
                
                if ($link->query($sql1) === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql1 . "<br>" . $link->error;            
                }                
            }
        } 
        else {
            echo "Error: " . $sql . "<br>" . $link->error;
        }
    
        $link->close();
    }
    else {
        echo "Wrong API Key provided.";
    }

//}
//else {
  //  echo "No data posted with HTTP POST.";
//}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}