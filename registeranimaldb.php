<?php
   include('session.php');
   include("config.php");
   //session_start();

   //load username
   $username = $_SESSION['Username'];

   if(isset($_POST['submitanimal'])){
   $new_name = mysqli_real_escape_string($link,$_POST['inputName']);
   $new_animalID = mysqli_real_escape_string($link,$_POST['inputAID']); 
   $new_weight = mysqli_real_escape_string($link,$_POST['inputWeight']); 
   $new_yearofbirth = mysqli_real_escape_string($link,$_POST['inputYOB']); 
   }

   $sql = "INSERT INTO animal (animal_id, createdBy, name, dateOfbirth, actualweight) VALUES ('$new_animalID', '$username', '$new_name', '$new_yearofbirth', '$new_weight')";

    if ($link->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $link->error;
    }

    $link->close();
?>