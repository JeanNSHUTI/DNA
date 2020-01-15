<?php
   include('session.php');
   include("config.php");

    //$field = $_POST['field'];
    //$value = $_POST['value'];
    //$editid = $_POST['id'];
    $field = mysqli_real_escape_string($link,$_POST['field']);
    $value = mysqli_real_escape_string($link,$_POST['value']);
    $editid = mysqli_real_escape_string($link,$_POST['editid']);

    $sql = "UPDATE animal SET ".$field."='.$value.' WHERE animal_id=".$editid;
    mysqli_query($link,$sql);

    echo 1;

/*    if ($link->query($sql) === TRUE) {
        //echo "New record created successfully";
        echo "<script type='text/javascript'>alert(' . $editid . has been modified');
        window.location='dashboard.php';
        </script>";
    } else {
        //echo "Error: " . $sql . "<br>" . $link->error;
        echo "<script type='text/javascript'>alert('Error:' . $sql . '<br>' . $link->error);
        window.location='dashboard.php';
        </script>";         
    }

   $link->close();
?>*/

