<?php
   include("session.php");
   include("config.php");

   $sql = "SELECT * FROM animal";  
   $result = mysqli_query($link, $sql); 
  
?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>DNA Admin - Modify Animal</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.php">DNA</a>

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

      <div class="container-fluid">

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
             Animal List</div>
          <div class="card-body">
            <div class="table-responsive">
                <form method="post" action="animalupdate.php" id = "modify">
                <input name="submitAupdate" type = "submit" class="btn btn-primary btn-block" value = " Save changes"/><br />
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr> 
                        <th>Name</th>
                        <th>Created By</th>  
                        <th>AID</th>
                        <th>Weight (Kg)</th>
                        <th>Age</th> 
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>  
                        <th>Name</th>
                        <th>Created By</th> 
                        <th>AID</th>
                        <th>Weight (Kg)</th>
                        <th>Age</th> 
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
                               $aid = $row['animal_id'];  // save ID for update
                               $animal_age = $year - $row["dateOfbirth"]; 
                              ?>  
                              <tr>   
                                   <td>
                                       <div contentEditable= 'true' class='form-control' > 
                                       <?php echo $row["name"]; ?>
                                       <input type="hidden" id="animalname" name="animalname">   
                                       </div>   
                                   </td>
                                   <td><?php echo $row["createdBy"];?></td>
                                   <td>
                                       <?php echo $row["animal_id"]; ?>
                                       <input type="hidden" id="animalID" name="animalID" value="<?php echo $row["animal_id"]; ?>"> 
                                   </td>  
                                   <td>
                                       <div contentEditable= 'true' class='form-control' > 
                                       <?php echo $row["actualweight"]; ?>
                                       </div>
                                       <input type="hidden" id="animalweight" name="animalweight">                               
                                   </td>   
                                   <td><?php echo $animal_age; ?></td>
                                   <th><?php echo '<a href="#" data-toggle="modal" data-target="#deleteModal">DELETE</a>';?></th>
                              </tr>  
                              <?php  
                           }  
                      }  
                    ?> 
                    </tbody>
                  </table>                    

                
                </form>
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
    
  <!-- Delete Modal-->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Deleting Animal from Database</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Delete" below if you are sure you want to delete animal from Database.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" id="animalIDD" name="animalIDD" href="animalupdate.php" value="<?php echo $aid?>">Delete</a> -->
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
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src='http://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.js'></script>
    
  <!-- script for hyperlink for table elements -->
   <!--<script type="text/javascript"> 
        $(document).ready(function(){
            // Add Class
            $('.form-control').click(function(){
                $(this).addClass('editMode');
            });
            
            // Save data
            $(".form-control").focusout(function(){
                $(this).removeClass("editMode");
                var id = this.id;
                var split_id = id.split("_");
                var field_name = split_id[0];
                var edit_id = split_id[1];
                var value = $(this).text();
           
            $.ajax({
                url: 'animalupdate.php',
                type: 'post',
                data: { field:field_name, value:value, id:edit_id },
                success:function(response){
                    console.log('Save successfully'); 
                }
            });
            
            });
        });
    </script> -->

  <!-- script for hyperlink for table elements -->
   <script type="text/javascript"> 
        $(document).ready(function() {
          $(document).on("submit", "form#modify", function(e) {
            e.preventDefault();

            var contents = $(".form-control").html();

            $('input#animalname').val(contents); 
            $(this).submit();
          });
        });
    </script> 
    


</body>

</html>
