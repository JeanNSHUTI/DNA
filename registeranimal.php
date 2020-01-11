<?php
   //include('session.php');
   include("config.php");
   //session_start();

   if(isset($_POST['submit'])){
       $new_name = mysqli_real_escape_string($db,$_POST['inputName']);
       $new_animalID = mysqli_real_escape_string($db,$_POST['inputAID']); 
       $new_weight = mysqli_real_escape_string($db,$_POST['inputWeight']); 
       $new_yearofbirth = mysqli_real_escape_string($db,$_POST['inputYOB']); 
   }

   $sql = "INSERT INTO animal (animal_id, createdBy, name, dateOfbirth, actualweight) VALUES ('$new_animalID', 'sU44222', '$new_name', '$new_yearofbirth', '$$new_weight')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>