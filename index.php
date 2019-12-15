<?php
session_start();
if(!isset($_SESSION['buhs_user'])) header("location: login.php");
    include 'db_connection.php';

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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bicol University Clinic</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="./vendors/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="./vendors/chartist/chartist.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="./images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex align-items-center">
          <a class="navbar-brand brand-logo" href="index.html">
            <img src="images/logo.svg" alt="logo" class="logo-dark" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-mini.svg" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
          <h5 class="mb-0 font-weight-medium d-none d-lg-flex">Welcome <?php echo $_SESSION["Fname"]." ".$_SESSION["Lname"]; ?></h5>
          <ul class="navbar-nav navbar-nav-right ml-auto">
    <!--      <input type="text" id="myInput"  placeholder="Search for any Data..."> -->
          <form class="search-form d-none d-md-block" action="#">
              <i class="icon-magnifier"></i>
              <input type="search" id="myInput"  class="form-control" placeholder="Search Here" title="Search here">
            </form>
   
   
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
                
              <a href="#" class="nav-link">
                <div class="profile-image">
                  <img class="img-xs rounded-circle" src="images/faces/face8.jpg" alt="profile image">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"><?php echo $_SESSION['Fname']. " ";echo  $_SESSION['Lname'];?></p>
                  <p class="designation"><?php echo $_SESSION['position'];?></p>
                </div>
                <div class="icon-container">
                  <i class="icon-bubbles"></i>
                  <div class="dot-indicator bg-danger"></div>
                </div>
              </a>
            </li>
            <li class="nav-item nav-category">
              <span class="nav-link">Profile</span>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.html">
                <span class="menu-title">My Profile</span>
                <i class="icon-screen-desktop menu-icon"></i>
              </a>
            </li>
            <li class="nav-item nav-category"><span class="nav-link">FORMS</span></li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Basic UI Elements</span>
                <i class="icon-layers menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/icons/simple-line-icons.html">
                <span class="menu-title">Icons</span>
                <i class="icon-globe menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#forms" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Forms</span>
                <i class="icon-layers menu-icon"></i>
              </a>
              <div class="collapse" id="forms">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="pages/forms/studenthealthform.php">Student Form</a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/forms/employeeform.php">Employee Form</a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/forms/dailyconsultation.php">DailyConsultation Form</a></li>
                </ul>
              </div>
            </li>  
            <li class="nav-item">
              <a class="nav-link" href="pages/charts/chartist.html">
                <span class="menu-title">Charts</span>
                <i class="icon-chart menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/tables/basic-table.html">
                <span class="menu-title">Tables</span>
                <i class="icon-grid menu-icon"></i>
              </a>
            </li>
            <li class="nav-item nav-category"><span class="nav-link">Sample Pages</span></li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-title">General Pages</span>
                <i class="icon-doc menu-icon"></i>
              </a>
              <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
                  <li class="nav-item"> <a class="nav-link" href="logout.php"> Sign Out </a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item pro-upgrade">
              <span class="nav-link">
                <a class="btn btn-block px-0 btn-rounded btn-upgrade" href="logout.php" target="_blank"> <i class="icon-badge mx-2"></i> Sign Out</a>
              </span>
            </li>
          </ul>
        </nav>
       
        
        <table class="table table-hover" >
          
          <tr>
     
            <th>ID<th>
            <th>Patient ID<th>
            <th>First Name<th>
            <th>Middle Name<th>
            <th>Last Name<th>
            <th>Age<th>
            <th>Course<th>
            <th>Year Level<th>
            <th>College Unit<th>
            <th>Contact Number<th>
            <th>Sex<th>
            <th>OPTION<th>
        

            
            </tr>
            <tbody id="myTable">
        <?php 
            $sql = "SELECT ID, PatientID, Lname, Fname, Mname, Age, Course, YearLevel, CollegeUnit, ContactNum, Sex from tbl_patientinfo";
            $result = mysqli_query($conn,$sql);
            $rows = array();
            $ctr = 0;
            while($r = mysqli_fetch_assoc($result)){
              $rows[] = $r;
        
             // echo json_encode($rows);
            
                echo "<tr><td>".$rows[$ctr]['ID']."<td><td>".$rows[$ctr]['PatientID']."<td><td>".$rows[$ctr]["Lname"]."<td><td>".$rows[$ctr]["Fname"].
                "<td><td>".$rows[$ctr]["Mname"]."<td><td>".$rows[$ctr]["Age"]."<td><td>".$rows[$ctr]["Course"]."<td><td>".$rows[$ctr]["YearLevel"].
                "<td><td>".$rows[$ctr]["CollegeUnit"]."<td><td>".$rows[$ctr]["ContactNum"]."<td><td>".$rows[$ctr]["Sex"]."<td><td>".
                "<td><td>". "<div class='btn-group'>
                <button type='button' class='btn btn-dark btn-sm' data-toggle='dropdown'><i class='icon-menu'></i></button>
                <div class='dropdown-menu'>
               <a href='pages/forms/editstudent.php?patientID=".$rows[$ctr]['PatientID']."'><button id='patientID' value='".$rows[$ctr]['PatientID']. " type='button' class='btn btn-primary w-100' data-toggle='modal' data-target='#re-stockmodal'>Edit<i class='icon-pencil float-left'></i></button></a><br>
                                <button type='button' class='btn btn-warning w-100' data-toggle='modal' data-target='#editmodal'>Chech-Up<i class='icon-pencil float-left'></i></button><br>
                                <button type='button' class='btn btn-danger w-100' data-toggle='modal' data-target='#deletemodal'>Delete<i class='icon-trash float-left'></i></button>>
                </div>
                </div>"."<td><td>"
                ."<td></tr>";  
              
               
              $ctr++;
              }
              
             
           
          
              
        ?>
       </tody>
        </table>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
          
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="./vendors/chart.js/Chart.min.js"></script>
    <script src="./vendors/moment/moment.min.js"></script>
    <script src="./vendors/daterangepicker/daterangepicker.js"></script>
    <script src="./vendors/chartist/chartist.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="./js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>

<?php 
    CloseCon($conn);
?>
