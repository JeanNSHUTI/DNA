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

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Register new User</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register a new User</div>
      <div class="card-body">
        <form action="" method="post">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="firstName"  name="firstName" class="form-control" placeholder="First name" required="required" autofocus="autofocus">
                  <label for="firstName">First name</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="lastName" name="lastName" class="form-control" placeholder="Last name" required="required">
                  <label for="lastName">Last name</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email address" required="required">
              <label for="inputEmail">Email address</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="inputUsername" name="inputUsername" class="form-control" placeholder="Username" required="required">
              <label for="inputUsername">Username</label>
            </div>
          </div>            
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required="required">
                  <label for="inputPassword">Password</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" placeholder="Confirm password" required="required">
                  <label for="confirmPassword">Confirm password</label>
                </div>
              </div>
            </div>
          </div>
          <!-- <a type = "submit" class="btn btn-primary btn-block" href="login.html">Register</a> -->
          <input type = "submit" class="btn btn-primary btn-block" value = " Register User "/><br />
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
