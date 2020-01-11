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
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Register new Animal</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register a new Animal</div>
      <div class="card-body">
        <form action="" method="post">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="inputName" name="inputName" class="form-control" placeholder="Name" required="required" autofocus="autofocus">
                  <label for="inputName">Animal Name</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="inputAID" name="inputAID" class="form-control" placeholder="Animal ID" required="required">
                  <label for="inputYOB">Animal ID</label>
                </div>
              </div>
            </div>
          </div>           
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="inputWeight" name="inputWeight" class="form-control" placeholder="Weight" required="required">
                  <label for="inputWeight">Actual Weight</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="inputYOB" name="inputYOB" class="form-control" placeholder="Year of Birth" required="required">
                  <label for="inputYOB">Year Of Birth</label>
                </div>
              </div>
            </div>
          </div>
          <!--<a type = "submit" class="btn btn-primary btn-block" href="login.html">Register</a>-->
          <input type = "submit" class="btn btn-primary btn-block" value = " Register Animal "/><br />
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="login.html">Cancel</a>
          <!-- <a class="d-block small" href="forgot-password.html">Forgot Password?</a> -->
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>