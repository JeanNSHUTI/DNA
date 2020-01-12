<?php
   include("config.php");
   //session_start();
   
   if(isset($_POST['submitEdituser'])) {
      
      $my_email = mysqli_real_escape_string($link,$_POST['inEmail']);
      $new_password = mysqli_real_escape_string($link,$_POST['inPassword']); 
      $confirm_password = mysqli_real_escape_string($link,$_POST['confPassword']);
      
       //Verify if user already exists in db
      $sql = "SELECT * FROM users WHERE email = '$my_email'";
      $result = mysqli_query($link,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myemail, table row must be 1 row
		
     if($count == 1) {
          if(strcmp($new_password, $confirm_password) === 0){
              
              $sql1 = "UPDATE users SET passcode = '$new_password' WHERE email = '$my_email'";
              
              if ($link->query($sql1) === TRUE) {
                  //echo "Updated password successfully";
                  echo "<script type='text/javascript'>alert('Updated password successfully');
                  window.location='index.php';
                  </script>";
              } else {
                  //echo "Error: " . $sql1 . "<br>" . $link->error; 
                  echo "<script type='text/javascript'>alert('Error:' . $sql . '<br>' . $link->error);
                  window.location='index.php';
                  </script>";                  
              }   
          }else{
              //echo "Passwords do not match";
              echo "<script type='text/javascript'>alert('Passwords do not match. Redirecting..');
              window.location='index.php';
              </script>";              
          }           
      }else {
          //echo "You are not yet registered as a user";
          echo "<script type='text/javascript'>alert('You are not yet registered as a user');
          window.location='index.php';
          </script>";      
      }
   }
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Forgot Password</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Reset Password</div>
      <div class="card-body">
        <div class="text-center mb-4">
          <h4>Forgot your password?</h4>
          <p>Enter your email address and reset your password.</p>
        </div>
        <form action="" method="POST">          
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="inEmail" name="inEmail" class="form-control" placeholder="E-mail" required="required">
              <label for="inEmail">E-mail</label>
            </div>
          </div>            
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="inPassword" name="inPassword" class="form-control" placeholder="Password" required="required">
                  <label for="inPassword">Password</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="confPassword" name="confPassword" class="form-control" placeholder="Confirm password" required="required">
                  <label for="confPassword">Confirm password</label>
                </div>
              </div>
            </div>
          </div>
          <!-- <a type = "submit" class="btn btn-primary btn-block" href="login.html">Register</a> -->
          <input name="submitEdituser" type = "submit" class="btn btn-primary btn-block" value = " Modify Password "/><br />
        </form>
        <div class="text-center">
          <!--<a class="d-block small mt-3" href="register.html">Register an Account</a>-->
          <a class="d-block small" href="index.php">Login Page</a>
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
