<?php
   include('session.php');
   include("config.php");
   //session_start();

   if(isset($_POST['submitAupdate'])){
       $new_name = mysqli_real_escape_string($link,$_POST['animalname']);
       $new_weight = mysqli_real_escape_string($link,$_POST['actualweight']); 
       $aid = mysqli_real_escape_string($link,$_POST['animalID']);

   }

    echo $new_name;
    echo $new_weight;
    echo $aid;

    $sql1 = "UPDATE animal SET name = '$new_name', actualweight = '$new_weight' WHERE animal_id = '$aid'";

    if ($link->query($sql1) === TRUE) {
        //echo "New record created successfully";
        echo "<script type='text/javascript'>alert('Animal edited successfully');
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

