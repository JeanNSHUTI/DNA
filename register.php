<?php
   //include('session.php');
   //include("config.php");
   //session_start();
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', 'pass99word');
    define('DB_NAME', 'db_dna');

    /* Attempt to connect to MySQL database */
    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
    // Check connection
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

   $new_confirmpassword = ""; 
   $new_password = "";

   if(isset($_POST['submit'])){
       $new_firstname = mysqli_real_escape_string($link,$_POST['firstname']);
       $new_lastname = mysqli_real_escape_string($link,$_POST['lastname']); 
       $new_email = mysqli_real_escape_string($link,$_POST['inputEmail']); 
       $new_username = mysqli_real_escape_string($link,$_POST['inputUsername']); 
       $new_password = mysqli_real_escape_string($link,$_POST['inputPassword']);
       $new_confirmpassword = mysqli_real_escape_string($link,$_POST['confirmPassword']);
   }

   echo $new_firstname;
   echo $new_lastname;
   echo $new_email;
   echo $new_username;
   /*$sql = "INSERT INTO users (username, firstname, surname, passcode, email) VALUES ('$new_username', '$new_firstname', '$new_lastname', '$new_password', '$new_email')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        // register change in notifications table here !!
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

   $conn->close();*/
?>
