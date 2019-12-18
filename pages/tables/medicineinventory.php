<?php
session_start();
if(!isset($_SESSION['buhs_user'])) header("location: login.php");
    include '../../db_connection.php';

    $conn = OpenCon();
//echo $_SESSION['buhs_user'];
    //$result = mysqli_query($conn,"select * from tbl_user WHERE Username = '".$_POST['username']."'");
    //$r=mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bicol University Clinic</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="../../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../../vendors/select2/select2.min.css">
    <link rel="stylesheet" href="../../vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../css/style.css" <!-- End layout styles -->
    <link rel="shortcut icon" href="../../images/logo.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex align-items-center">
          <a class="navbar-brand brand-logo" href="../../index.php">
            <img src="../../images/ddh.png" alt="logo" class="logo-dark" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="../../index.php"><img src="../../images/ddh.png" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
          <ul class="navbar-nav navbar-nav-right ml-auto">
            <form class="search-form d-none d-md-block" action="#">
              <i class="icon-magnifier"></i>
              <input type="search" id="myInput"  class="form-control" placeholder="Search Patient Record" title="Search Patient Record here">
            </form>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="profile-image">
                  <img class="img-xs rounded-circle" src="../../images/faces/noface.jpg" alt="profile image">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"><?php echo $_SESSION['Fname']. " ";echo  $_SESSION['Lname'];?></p>
                  <p class="designation"><?php echo $_SESSION['position']?></p>
                </div>
                <div class="icon-container">
                  <i class="icon-bubbles"></i>
                  <div class="dot-indicator bg-danger"></div>
                </div>
              </a>
            </li>
            <li class="nav-item nav-category">
              <span class="nav-link">Records</span>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../index.php">
                <span class="menu-title">Records</span>
                <i class="icon-screen-desktop menu-icon"></i>
              </a>
            </li>
            <li class="nav-item nav-category"><span class="nav-link">Forms</span></li>
<li class="nav-item">
<a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
<span class="menu-title">Forms</span>
<i class="icon-layers menu-icon"></i>
</a>
<div class="collapse" id="ui-basic">
<ul class="nav flex-column sub-menu">
<li class="nav-item"> <a class="nav-link" href="../forms/studenthealthform.php">Student Form</a></li>
<li class="nav-item"> <a class="nav-link" href="../forms/employeeform.php">Employee Form</a></li>
<li class="nav-item"> <a class="nav-link" href="../forms/dailyconsultation.php">Daily Consultant Form</a></li>
<li class="nav-item"> <a class="nav-link" href="../forms/medicationform.php">Medicine Inventory Form</a></li>
</ul>
</div>
</li>

<li class="nav-item nav-category"><span class="nav-link">Tables</span></li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Tables</span>
                <i class="icon-layers menu-icon"></i>
              </a>
              <div class="collapse" id="tables">
                <ul class="nav flex-column sub-menu">
				  <li class="nav-item"> <a class="nav-link" href="medicineinventory.php">Medicine Inventory</a></li>
                  <li class="nav-item"> <a class="nav-link" href="studentrecord.php">Student Record</a></li>
                </ul>
              </div>
            </li>

    
            <li class="nav-item nav-category"><span class="nav-link">My Profile</span></li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-title">My Profile</span>
                <i class="icon-doc menu-icon"></i>
              </a>
              <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="../../pages/samples/login.html"> Login </a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/samples/register.html"> Register </a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/samples/error-404.html"> 404 </a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/samples/error-500.html"> 500 </a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../logout.php"> Sign Out </a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item pro-upgrade">
              <span class="nav-link">
                <a class="btn btn-block px-0 btn-rounded btn-upgrade" href="../../logout.php"> <i class="icon-badge mx-2"></i> Sign Out</a>
              </span>
            </li>
          </ul>
        </nav>
        <!-- partial -->
         <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h2> Inventory <i class="icon-social-dropbox float-left"></i></h2>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <input class='btn btn-primary w-100' type="button" data-toggle="modal" data-target="#Medicine" name="AddMed" style="width: 100%" value="Add Medicine">
                  <div class="modal fade" id="Medicine" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <form method="POST" action="../../SaveRecords/savemed.php">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Medicine Information</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                         </div>
                       <div class="modal-body">
                      <h4 class="card-title">Medicine Information <i class="icon-user float-left"></i></h4>
                        <div class="form-group row">
                           
                            <div class="col-md-12 col-sm-12 mb-2">
                                <input type="text" class="form-control" id="M_Name" name="M_Name" placeholder="Medicine Name">
                            </div>
                            <div class="col-md-12 col-sm-12 mb-2">
                            <input type="text" class="form-control" id="M_Category" name="M_Category" placeholder="Medicine Category">
                            </div>
                            <div class="col-md-12 col-sm-12 mb-2">
                                <input type="text" class="form-control" id="M_Stock" name="M_Stock" placeholder="Stock">
                            </div>
                             <div class="col-md-12 col-sm-12 mb-2">
                                <input type="text" class="form-control" id="M_UnitMeasure" name="M_UnitMeasure" placeholder="Unit Measure">
                            </div>
                            <div class="col-md-12 col-sm-12 mb-2">
                              <div class="row">
                                 <label class="form-control col-md-5" >Expiration Date: </label>          
                                <input type="date" class="form-control col-md-7 mb-2" name="M_ExpDate" placeholder="Expiry Date" onfocus="this.type='date'">
                              </div>
                             </div>
                        </div>
                                   
                       </div>
                        <div class="modal-footer">
                             <button type="submit"  class="btn btn-primary w-100" name="AddMed">Add</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-md-12 col-sm-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Medicine Inventory</h4>
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th class="font-weight-bold">Category</th>
                          <th class="font-weight-bold">Medicine Name</th>
                          <th class="font-weight-bold">Stock</th>
                          <th class="font-weight-bold">Unit Measure</th>
                          <th class="font-weight-bold">Expiration Date</th>
                          <th class="font-weight-bold">Options</th>

                        </tr>
                      </thead>
                    <tbody id="myTable1">
                    
                      <?php 
                        $sql = "SELECT * from tbl_medicine";
                        $result = mysqli_query($conn,$sql);
                        $rows = array();
                        $ctr = 0;
                        while($r = mysqli_fetch_assoc($result)){
                          $rows[] = $r;
                            echo "<tr>

                                <td>".$rows[$ctr]["Category"]."</td>
                                <td>".$rows[$ctr]["MedicineName"]."</td>
                                <td>".$rows[$ctr]["Stock"]."</td>
                                <td>".$rows[$ctr]["UnitMeasure"]."</td>
                                <td>".$rows[$ctr]["ExpDate"]."</td>
                                <td><div class='btn-group'>
                                  
                                  <button id='MedId' value='".$rows[$ctr]['ID']. " type='button' data-toggle='modal' data-target='#editMedicine".$ctr."' class='btn btn-primary w-100'> Edit <i class='icon-pencil float-left'></i></button><br>
                                </div></td>
                                </tr>";
                                ?>
                                <!--modal of deit medicine-->
                                <div class="modal fade"  id=<?php echo "\"editMedicine".$ctr."\"";?> role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <form method="POST" action="../../SaveRecords/savemed.php">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Medicine Information</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                     </div>
                                   <div class="modal-body">
                                  <h4 class="card-title">Medicine Information <i class="icon-user float-left"></i></h4>
                                    <div class="form-group row">
                                        <div class="col-md-12 col-sm-12 mb-2">
                                          <input type="hidden" class="form-control" id="M_IDe" name="M_IDe"
                                              value=<?php echo $rows[$ctr]["ID"];?> >
                                            <input type="text" class="form-control" id="M_Name" name="M_Name" placeholder="Medicine Name" 
                                              value=<?php echo $rows[$ctr]["MedicineName"];?> >

                                        </div>
                                        <div class="col-md-12 col-sm-12 mb-2">
                                        <input type="text" class="form-control" id="M_Category" name="M_Category" placeholder="Medicine Category"   value=<?php echo $rows[$ctr]["Category"];?>>
                                        </div>
                                        <div class="col-md-12 col-sm-12 mb-2">
                                            <input type="text" class="form-control" id="M_Stock" name="M_Stock" placeholder="Stock" value=<?php echo $rows[$ctr]["Stock"];?>>
                                        </div>
                                         <div class="col-md-12 col-sm-12 mb-2">
                                            <input type="text" class="form-control" id="M_UnitMeasure" name="M_UnitMeasure" placeholder="Unit Measure" value=<?php echo $rows[$ctr]["UnitMeasure"];?>>
                                        </div>
                                        <div class="col-md-12 col-sm-12 mb-2">
                                          <div class="row">
                                             <label class="form-control col-md-5" >Expiration Date: </label>          
                                            <input type="date" class="form-control col-md-7 mb-2" name="M_ExpDate" placeholder="Expiry Date" onfocus="this.type='date'" value=<?php echo $rows[$ctr]["ExpDate"];?>>
                                          </div>
                                         </div>
                                    </div>
                                               
                                   </div>
                                    <div class="modal-footer">
                                         <button type="submit"  class="btn btn-primary w-100" name="EditMed">Save</button>
                                    </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                          <?php  
                          $ctr++;
                          }          
                    ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2019 <a href="https://www.bootstrapdash.com/" target="_blank">BU Health Service</a>. All rights reserved.</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="icon-heart text-danger"></i></span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
      $(document).ready(function(){
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        
        $("#myTable1 tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
  </script>


    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../../vendors/select2/select2.min.js"></script>
    <script src="../../vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../js/off-canvas.js"></script>
    <script src="../../js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../../js/typeahead.js"></script>
    <script src="../../js/select2.js"></script>
    <script src="../../js/my.js"></script>
    <!-- End custom js for this page -->
  </body>

</html>


