<?php
   include("session.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Schedule DNA Down-times</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">New DNA down-time schedule</div>
      <div class="card-body">
        <form action="newschedule.php" method="post">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="time" id="inputStart" name="inputStart" class="form-control" placeholder="Start of Downt-time" required="required" autofocus="autofocus">
                  <label for="inputStart">DNA Down-time starts at</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="time" id="inputEnd" name="inputEnd" class="form-control" placeholder="End of Downt-time" required="required">
                  <label for="inputEnd">DNA Down-time ends at</label>
                </div>
              </div>
            </div>
          </div>           
          <!--<a type = "submit" class="btn btn-primary btn-block" href="login.html">Register</a>-->
          <input name="submitschedule" type = "submit" class="btn btn-primary btn-block" value = " Save "/><br />
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="javascript:history.go(-1)">Back</a>
          <a class="d-block small mt-3" href="dashboard.php">Cancel</a> 
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