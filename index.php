<?php
   include("config.php");
   session_start();
   
   if(isset($_POST['loginuser'])) {
      // username and password sent from form 
      
      $myemail = mysqli_real_escape_string($link,$_POST['inputEmail']);
      $mypassword = mysqli_real_escape_string($link,$_POST['inputPassword']); 
      
      $sql = "SELECT passcode, email, super_user, username FROM users WHERE email = '$myemail' AND passcode = '$mypassword'";
      $result = mysqli_query($link,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $usertype = $row['super_user'];
      $myusername = $row['username'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['User_email'] = $myemail;
         $_SESSION['Username'] = $myusername;
         $_SESSION['User_type'] = $usertype;
         
         //header("location: dashboard.php");
          header("location: dashboard.php");
      }else {
         $error = "Your Login Name or Password is invalid";
         echo "$error";
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

  <title>DNA Admin - Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form action = "" method="POST">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" name = "inputEmail" id="inputEmail" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
              <label for="inputEmail">E-mail Address</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" name = "inputPassword" id="inputPassword" class="form-control" placeholder="Password" required="required">
              <label for="inputPassword">Password</label>
            </div>
          </div>
          <!--<a class="btn btn-primary btn-block" href="dashboard.html">Login</a>-->
            <input name="loginuser" type = "submit" class="btn btn-primary btn-block" value = " Log In "/><br />
        </form>
        <div class="text-center">
          <!-- <a class="d-block small mt-3" href="register.html">Register an Account</a> -->
          <a class="d-block small" href="forgotpassword.php">Forgot Password?</a>
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
