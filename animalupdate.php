<?php
   include('session.php');
   include("config.php");
   //session_start();

   /* $field = $_POST['field'];
    $value = $_POST['value'];
    $editid = $_POST['id'];

    $sql = "UPDATE animal SET '$field' = '$value' WHERE animal_id= '$editid'";
    mysqli_query($link,$sql);

    echo 1;*/


   //if(isset($_POST['submitAupdate'])){
       $new_name = mysqli_real_escape_string($link,$_POST['animalname']);
       $new_weight = mysqli_real_escape_string($link,$_POST['actualweight']); 
       $aid = mysqli_real_escape_string($link,$_POST['animalID']);
       $aidd = mysqli_real_escape_string($link,$_POST['animalIDD']);

   //}

    echo $new_name;
    echo $new_weight;
    echo $aid;
    echo $aidd;

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

