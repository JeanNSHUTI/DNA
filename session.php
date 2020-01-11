<?php
   //include("config.php");
   session_start();   
   
   if(!isset($_SESSION['User_email'])){
      header("location:index.php");
      die();
   }
?>