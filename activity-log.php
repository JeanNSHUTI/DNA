<?php
   include("session.php");
   include("config.php");

   $sql = "SELECT * FROM notification";  
   $result = mysqli_query($link, $sql); 

   $sql1 = "SELECT * FROM animal INNER JOIN animal_feed ON animal.animal_id = animal_feed.animal_id WHERE animal_alertStatus = TRUE";  
   $result1 = mysqli_query($link, $sql1);
   $count = mysqli_num_rows($result1);
  
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>DNA Admin - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="dashboard.php">DNA</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>
      
    <!-- Navbar -->
    <ul class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="activity-log.php">Activity Log</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class='nav-item'>
      <a class="nav-link" href="register.php">
      <i class="fas fa-fw fa-table"></i>    
      <span>Register new User</span></a>      
      </li>
      <li class="nav-item">
        <a class="nav-link" href="registeranimal.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Register new Animal</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="schedule.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Schedule DNA Downtime</span></a>
      </li>  
      <li class="nav-item">
        <a class="nav-link" href="modify.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Modify Animal</span></a>
      </li>         
    </ul>

    <div id="content-wrapper">
        
      <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="dashboard.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Chart</li>
        </ol>         

      <div class="container-fluid">
        <!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-list"></i>
                </div>
                <div class="mr-5"><?php echo $count ?> New notifications</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="notification.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>           

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Notifications</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Date</th>  
                    <th>AID</th>
                    <th>Done By</th>
                    <th>Action</th>
                    <th>Animal Name</th>
                    <th>Animal DOB</th>   
                    <th>Start Downtime</th> 
                    <th>End Downtime</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Date</th>  
                    <th>AID</th>
                    <th>Done By</th>
                    <th>Action</th>
                    <th>Animal Name</th>
                    <th>Animal DOB</th>   
                    <th>Start Downtime</th> 
                    <th>End Downtime</th>
                  </tr>
                </tfoot>
                <tbody>
                <?php 
                  //Fill table
                  $year = date("Y");      
                    
                  if(mysqli_num_rows($result) > 0)  
                  {  
                       while($row = mysqli_fetch_array($result))  
                       {
                          ?>  
                          <tr>  
                               <td><?php echo $row["dateOfcreation"]; ?></td>  
                               <td><?php
                                        if(is_null($row["animal_id"])){
                                            $aid = "-";
                                        }else{
                                            $aid = $row["animal_id"];
                                        }
                                        echo $aid; ?>
                               </td>  
                               <td><?php echo $row["username"];?></td>  
                               <td><?php echo $row["type"]; ?></td>   
                               <td><?php
                                        if(is_null($row["name"])){
                                            $name_ = "-";
                                        }else{
                                            $name_ = $row["name"];
                                        }
                                        echo $name_; ?>
                               </td> 
                               <td><?php
                                        if(is_null($row["dateOfbirth"])){
                                            $dob = "-";
                                        }else{
                                            $dob = $row["dateOfbirth"];
                                        }
                                        echo $dob; ?>
                               </td> 
                               <td><?php
                                        if(is_null($row["downtime_startTime"])){
                                            $dosT = "-";
                                        }else{
                                            $dosT = $row["downtime_startTime"];
                                        }
                                        echo $dosT; ?>
                               </td> 
                               <td><?php
                                        if(is_null($row["downtime_endTime"])){
                                            $doeT = "-";
                                        }else{
                                            $doeT = $row["downtime_endTime"];
                                        }
                                        echo $doeT; ?>
                               </td> 
                          </tr>  
                          <?php  
                       }  
                  }  
                ?> 
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated on :  <?php echo date("l jS \of F Y h:i:s A")?></div>
        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © https://airworthy-mandrill-9741.dataplicity.io/DNA <?php echo date("Y");?></span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>

</body>

</html>