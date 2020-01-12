<?php
   include('session.php');
   include("config.php");
   //session_start();

   if(isset($_POST['submituser'])){
       $new_firstname = mysqli_real_escape_string($link,$_POST['firstName']);
       $new_lastname = mysqli_real_escape_string($link,$_POST['lastName']); 
       $new_email = mysqli_real_escape_string($link,$_POST['inputEmail']); 
       $new_username = mysqli_real_escape_string($link,$_POST['inputUsername']); 
       $new_password = mysqli_real_escape_string($link,$_POST['inputPassword']);
       $new_confirmpassword = mysqli_real_escape_string($link,$_POST['confirmPassword']);
   }


   $sql = "INSERT INTO users (username, firstname, surname, passcode, super_user, email) VALUES ('$new_username', '$new_firstname', '$new_lastname', '$new_password', FALSE, '$new_email')";

    if ($link->query($sql) === TRUE) {
        //echo "New record created successfully";
        echo "<script type='text/javascript'>alert('New record created successfully');
        window.location='dashboard.php';
        </script>";
    } else {
        //echo "Error: " . $sql . "<br>" . $link->error;
        echo "<script type='text/javascript'>alert('Error:' . $sql . '<br>' . $link->error);
        window.location='dashboard.php';
        </script>";         
    }

   $link->close();
?>
