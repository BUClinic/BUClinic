<?php
session_start();
if(!isset($_SESSION['buhs_user'])){
  $_SESSION['redirect_to'] = $_SERVER['REQUEST_URI'];
  header("location: login.php");
}
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
    <link rel="stylesheet" href="../../css/style.css"> <!-- End layout styles -->
    <link rel="shortcut icon" href="../../images/logo.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex align-items-center">
          <a  href="../../index.php">
            <img src="../../images/ddh.png" alt="logo" width="100%" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="../../index.php"><img src="../../images/logo-mini.svg" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
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
                  <p class="profile-name" ><label type="text" id="user" ><?php echo "".ucwords($_SESSION['Fname'])." ".ucwords($_SESSION['Lname']).""; ?></label></p>
                  <p class="designation"><?php echo ucwords($_SESSION['position'])?></p>
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
<li class="nav-item"> <a class="nav-link" href="studenthealthform.php">Student Form</a></li>
<li class="nav-item"> <a class="nav-link" href="dailyconsultation.php">Daily Consultant Form</a></li>
<li class="nav-item"> <a class="nav-link" href="medicationform.php">Medication Form</a></li>
<?php
                    if($_SESSION['position']==='Admin'){
                      echo "<li class='nav-item'> <a class='nav-link' href='employeeform.php'>Employee Form</a></li>";
                    }
                  ?>
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
				  <li class="nav-item"> <a class="nav-link" href="../tables/medicineinventory.php">Medicine Inventory</a></li>
                  <li class="nav-item"> <a class="nav-link" href="../tables/studentrecord.php">Student Record</a></li>
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
              <h2> DAILY CONSULTATION <i class="icon-note float-left"></i> </h2>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="studenthealthform.php">Student Form</a></li>
                  <li class="breadcrumb-item"><a href="dailyconsultation.php">Daily Consultation Form</a></li>  
                  <li class="breadcrumb-item"><a href="medicationform.php">Medication Form</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Form elements</li>
                </ol>
              </nav>
            </div>
              <form method="POST" action="../../saverecords/saveconsult.php">
                <div class="row">
                  <div class="col-12 grid-margin">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Personal Information <i class="icon-user float-left"></i></h4>
                          <!--<p class="card-description"> Personal info </p>-->
                            <div class="form-group row">
                              <div class="col-md-7 col-sm-12 mb-2">
                                  <input type="text" class="form-control mb-2" id="DC_FName" placeholder="First Name"  disabled>
                                  <input type="text" class="form-control mb-2" id="DC_MName" placeholder="Middle Name"  disabled>
                                  <input type="text" class="form-control" id="DC_LName" placeholder="Last Name"  disabled>
                              </div>
                              <div class="col-md-5 col-sm-12 mb-2">
                                  <input type="text" class="form-control mb-2" id="DC_ID" name="S_Id" placeholder="Student ID #" onkeyup="searchID()" required>
                                  <input type="text" class="form-control mb-2" id="DC_College"  placeholder="College/Department"  disabled>
                                  <input type="text" class="form-control mb-2" id="DC_Course"  placeholder="Course"  disabled>
                              </div>
                            </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 grid-margin">
                    <div class="card">
                      <div class="card-body">
                          <h4 class="card-title">Examinations<i class=" icon-magnifier float-left"></i></h4>
                          <!--<p class="card-description"> Personal info </p>-->
                            <div class="form-group row">
                                  <div class="col-md-3 col-sm-12 mb-2">
                                    <input type="text" class="form-control" id="P_Temperature" name="P_Temperature" placeholder="Temperature" Required>
                                  </div>

                                  <div class="col-md-3 col-sm-12 mb-2">
                                    <input type="text" class="form-control" id="P_BPressure" name="P_BPressure" placeholder="Blood Pressure" Required>
                                  </div>

                                  <div class="col-md-3 col-sm-12 mb-2">
                                    <input type="text" class="form-control" id="P_Height" name="P_Height" placeholder="Height" Required>
                                  </div>

                                  <div class="col-md-3 col-sm-12 mb-2">
                                    <input type="text" class="form-control"  name="P_Weight"  id="P_Weight" placeholder="Weight" required>
                                  </div>

                                    <div class="col-md-6 col-sm-12 mb-2">
                                    <label for="form10">History and Physical Examination</label>
                                        <i class="fas fa-pencil-alt prefix"></i>
                                        <textarea id="PExaP_PExaminationmination" name="P_PExamination" class="md-textarea form-control" rows="5"></textarea>
                                    </div>

                                    <div class="col-md-6 col-sm-12 mb-2">
                                    <label for="form10">Physicians Direction's</label>
                                        <i class="fas fa-pencil-alt prefix"></i>
                                        <textarea id="P_PDirection" name="P_PDirection" class="md-textarea form-control" rows="5"></textarea>
                                    </div>
                                  <!-- <input type="text" class="form-control mb-2" id="Complaints" placeholder="Complaints">
                                  <input type="text" class="form-control" id="Diagnosis" placeholder="Diagnosis"> -->
                              <!-- <div class="col-md-8 col-sm-12 mb-2">
                                  <input type="text" class="form-control mb-2" id="Treatment" placeholder="Treatment / Medication/s">
                                  <input type="text" class="form-control mb-2" id="Remarks" placeholder="Referral/Remarks">
                              </div>  -->
                            </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 grid-margin">
                    <div class="card">
                      <div class="card-body">
                          <h4 class="card-title">Consultation <i class=" icon-note float-left"></i></h4>
                          <!--<p class="card-description"> Personal info </p>-->
                            <div class="form-group row">
                                  <div class="col-md-6 col-sm-12 mb-2">
                                  <label for="form10">Complaints</label>
                                        <i class="fas fa-pencil-alt prefix"></i>
                                        <textarea id="Complaints" name="Complaints" class="md-textarea form-control" rows="5"></textarea>
                                    </div>
                                  
                                    <div class="col-md-6 col-sm-12 mb-2">
                                  <label for="form10">Diagnosis</label>
                                        <i class="fas fa-pencil-alt prefix"></i>
                                        <textarea id="Diagnosis" name="Diagnosis" class="md-textarea form-control" rows="5"></textarea>
                                    </div>

                                    <div class="col-md-6 col-sm-12 mb-2">
                                  <label for="form10">Treatment / Medication/s</label>
                                        <i class="fas fa-pencil-alt prefix"></i>
                                        <textarea id="treatment" name="treatment" class="md-textarea form-control" rows="5"></textarea>
                                        
                                    </div> 

                                    <div class="col-md-6 col-sm-12 mb-2">
                                  <label for="form10">Referral/Remarks</label>
                                        <i class="fas fa-pencil-alt prefix"></i>
                                        <textarea id="Referrals" name="Referrals" class="md-textarea form-control" rows="5"></textarea>
                                    </div>
                                  <!-- <input type="text" class="form-control mb-2" id="Complaints" placeholder="Complaints">
                                  <input type="text" class="form-control" id="Diagnosis" placeholder="Diagnosis"> -->
                              <!-- <div class="col-md-8 col-sm-12 mb-2">
                                  <input type="text" class="form-control mb-2" id="Treatment" placeholder="Treatment / Medication/s">
                                  <input type="text" class="form-control mb-2" id="Remarks" placeholder="Referral/Remarks">
                              </div>  -->
                              <div class="col-md-12 col-sm-12 float-right">
                                <button type="submit" class="btn btn-primary" id="submit" onclick="setMeds()">Submit</button>
                                <button class="btn btn-dark" id="cancel">Cancel</button>
                              </div> 
                      </div>
                    </div>
                  </div>
                </div>
              </form>
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


