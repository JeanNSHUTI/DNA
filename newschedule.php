<?php
   include('session.php');
   include("config.php");
   //session_start();

   //load username
   $username = $_SESSION['Username'];

   if(isset($_POST['submitschedule'])){
   $new_startdown = mysqli_real_escape_string($link,$_POST['inputStart']);
   $new_enddown = mysqli_real_escape_string($link,$_POST['inputEnd']); 
   }

   $sql = "INSERT INTO system_schedule (setBy, downtime_startTime, downtime_endTime) VALUES ('sU44222', '$new_startdown', '$new_enddown')";

    if ($link->query($sql) === TRUE) {
        //echo "New record created successfully";
        
        //activity log
        $_type = "SCHEDULE CHANGE";
        
        $sql1 = "INSERT INTO notification (username, type, downtime_startTime, downtime_endTime) VALUES ('$username', '$_type', '$new_startdown', '$new_enddown')";
        
        if ($link->query($sql1) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql1 . "<br>" . $link->error;            
        }
    } else {
        echo "Error: " . $sql . "<br>" . $link->error;
    }

    $link->close();
?>