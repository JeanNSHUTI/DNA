<?php
   //include('session.php');
   include("config.php");
   //session_start();

   $new_confirmpassword = ""; 
   $new_password = "";

   if(isset($_POST['submit'])){
       $new_firstname = mysqli_real_escape_string($db,$_POST['firstname']);
       $new_lastname = mysqli_real_escape_string($db,$_POST['lastname']); 
       $new_email = mysqli_real_escape_string($db,$_POST['inputEmail']); 
       $new_username = mysqli_real_escape_string($db,$_POST['inputUsername']); 
       $new_password = mysqli_real_escape_string($db,$_POST['inputPassword']);
       $new_confirmpassword = mysqli_real_escape_string($db,$_POST['confirmPassword']);
   }

   if(strcmp(new_password, new_confirmpassword)==0){
       $sql = "INSERT INTO users (username, firstname, surname, passcode, email) VALUES ('$new_username', '$new_firstname', '$new_lastname', '$new_password', '$new_email')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
            // register change in notifications table here !!
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
   }
   else {
       echo "Error: Passwords do not match";
       }

   $conn->close();
?>
