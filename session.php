<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['User_email'];
   
   $ses_sql = mysqli_query($link,"SELECT email FROM users WHERE email = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['email'];
   
   if(!isset($_SESSION['user_email'])){
      header("location:index.php");
      die();
   }
?>