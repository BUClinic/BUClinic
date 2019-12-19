<?php
include '../../db_connection.php';

if(isset($_POST['submit'])){

$conn = OpenCon();

$fname = ucwords($_POST['E_FName']);
$mname = ucwords($_POST['E_MName']);
$lname = ucwords($_POST['E_LName']);
$username = $_POST['E_Uname'];
$password = $_POST['E_Password'];
$email = $_POST['E_Email'];
$position = ucwords($_POST['E_Position']);

// echo "welcome $fname $lname";
$password = md5($password);
$sql = "INSERT INTO tbl_user (Lname, Fname, Mname, Username, Password, Position,Email)
VALUES ('$lname', '$fname', '$mname', '$username', '$password', '$position', '$email')";

if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
} else {
    echo "<script>alert('Error in creating new user, Username might already taken.')";
}

CloseCon($conn);
    
}
session_start();
if(!isset($_SESSION['buhs_user'])){
  $_SESSION['redirect_to'] = $_SERVER['REQUEST_URI'];
  header("location: login.php");
}
    $conn = OpenCon();

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
          <a  href="../../index.php">
            <img src="../../images/ddh.png" alt="logo" width="100%"/>
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
              <a href="../../index.php" class="nav-link">
                <div class="profile-image">
                  <img class="img-xs rounded-circle" src="../../images/faces/noface.jpg" alt="profile image">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"> <?php echo ucwords($_SESSION["Fname"])." ".ucwords($_SESSION["Lname"]); ?></p>
                  <p class="designation"><?php echo ucwords($_SESSION["position"]); ?></p>
                </div>
                <div class="icon-container">
                  <i class="icon-bubbles"></i>
                  <div class="dot-indicator bg-danger"></div>
                </div>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="../../index.php">
                <span class="menu-title">Records</span>
                <i class="icon-screen-desktop menu-icon"></i>
              </a>
            </li>
            
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
                        			
 
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Tables</span>
                <i class="icon-layers menu-icon"></i>
              </a>
              <div class="collapse" id="tables">
                <ul class="nav flex-column sub-menu">
				  <li class="nav-item"> <a class="nav-link" href="../tables/medicineinventory.php">Medicine Inventory</a></li>
          <li class="nav-item"> <a class="nav-link" href="../tables/medicationtable.php">Medication Table Record</a></li>
                </ul>
              </div>

         
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-title">My Profile</span>
                <i class="icon-doc menu-icon"></i>
              </a>
              <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" data-toggle="modal" data-target="#changeName" href=""> Change Name </a></li>
                  <li class="nav-item"> <a class="nav-link" data-toggle="modal" data-target="#changeEmail" href=""> Change Email </a></li>
                  <li class="nav-item"> <a class="nav-link" data-toggle="modal" data-target="#changePassword" href=""> Change Password </a></li>
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
              <h2> EMPLOYEE RECORD <i class="icon-note float-left"></i></h2>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="studenthealthform.php">Student Form</a></li>
                  <li class="breadcrumb-item"><a href="dailyconsultation.php">Daily Consultation Form</a></li> 
                  <li class="breadcrumb-item"><a href="medicationform.php">Medication Form</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Form elements</li>
                </ol>
              </nav>
            </div>
             <form action="#" method="POST">
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Personal Information <i class="icon-user float-left"></i></h4>
                      <!--<p class="card-description"> Personal info </p>-->
                        <div class="form-group row">
                          <div class="col-md-7 col-sm-12 mb-2">
                              <input type="text" class="form-control mb-2" name="E_FName" placeholder="First Name" required>
                              <input type="text" class="form-control mb-2" name="E_MName" placeholder="Middle Name" required>
                              <input type="text" class="form-control" name="E_LName" placeholder="Last Name" required>
                          </div>
                          <div class="col-md-5 col-sm-12 mb-2">
                              <input type="text" class="form-control mb-2" name="E_Uname" placeholder="Username" required>
                              <input type="password" class="form-control mb-2" id="EPass" name="E_Password" placeholder="Password" required onkeyup="verifyPassword()">
                              <input type="password" class="form-control mb-2" id="REPass" name="E_RPassword" placeholder="Re-Type Password" required onkeyup="verifyPassword()">
                          </div> 
                          <div class="col-md-6 col-sm-12 mb-2">
                              <input type="email" class="form-control" name="E_Email" placeholder="Email" required>
                          </div> 
                          <div class="col-md-6 col-sm-12 mb-2">
                              <input type="text" class="form-control" name="E_Position" placeholder="Position" required>
                          </div>
                          <div class="col-md-6 col-sm-12 float-right">
                            <button type="submit" class="btn btn-primary" id="btnSubmit" name="submit" disabled>Submit</button>
                            <button type="button" class="btn btn-dark" name="cancel" onclick="window.location.replace('../../index.php')">Cancel</button>
                          </div>
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
    <!-- End custom js for this page -->
    <script>
      function verifyOldPass(element){
        // console.log(document.getElementById('npass').value);
        const Http = new XMLHttpRequest();
        Http.open("GET", "saverecords/updateUser.php?q="+element.value);
        Http.send();
        Http.onreadystatechange = function(){
          if(this.readyState == 4 && this.status == 200){
            // console.log(Http.responseText);
            if(Http.responseText=='true'){
              document.getElementById('npass').disabled = false;
              document.getElementById('rpass').disabled = false;
            }else{
              document.getElementById('npass').disabled = true;
              document.getElementById('rpass').disabled = true;
            }

          }

        }
      }
      function verifyPassword(){
        // console.log(document.getElementById("npass").value==document.getElementById("rpass").value);
        if(document.getElementById("EPass").value==document.getElementById("REPass").value){
          document.getElementById("btnSubmit").disabled=false;
        }else{
          document.getElementById("btnSubmit").disabled=true;
        }
      }

      function verifyPass(){
        // console.log(document.getElementById("npass").value==document.getElementById("rpass").value);
        if(document.getElementById("npass").value==document.getElementById("rpass").value){
          document.getElementById("updatePass").disabled=false;
        }else{
          document.getElementById("updatePass").disabled=true;
        }
      }
    </script>
    
  </body>
     <!-- Modal for change name -->
<div class="modal fade" id="changeName" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                  <form method="POST" action="../../SaveRecords/updateUser.php">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Change Name</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                     </div>
                                   <div class="modal-body">
                                    <div class="form-group row">
                                        <div class="col-md-12 col-sm-12 mb-2">
                                            <input type="text" class="form-control" id="first" name="Fname" value = <?php echo $_SESSION['Fname'];?>
                                            required >
                                        </div>
                                        <div class="col-md-12 col-sm-12 mb-2">
                                            <input type="text" class="form-control" id="middle" name="Mname" value = <?php echo $_SESSION['Mname'];?>
                                            required >
                                        </div>
                                        <div class="col-md-12 col-sm-12 mb-2">
                                            <input type="text" class="form-control" id="last" name="Lname" value = <?php echo $_SESSION['Lname'];?>
                                            required >
                                        </div> 
                                    </div>
                                               
                                   </div>
                                    <div class="modal-footer">
                                      <button class="btn btn-danger w-100"  >Close</button>
                                      <button type="submit"  class="btn btn-primary w-100" name="updateName" >Save</button>
                                    </div>
                                    </form>
                                  </div>
  </div>
</div>

  <!-- Modal for change pass -->
  <div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                  <form method="POST" action="../../SaveRecords/updateUser.php">
                                        <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                     </div>
                                   <div class="modal-body">
                                    <div class="form-group row">
                                        <div class="col-md-12 col-sm-12 mb-2">
                                            <input type="password" class="form-control" id="currenntPass" name="currentPass" placeholder="Current Password" required onkeyup="verifyOldPass(this)">
                                        </div>
                                        <div class="col-md-12 col-sm-12 mb-2">
                                            <input type="password" class="form-control" id="npass" name="newPass"  placeholder="New Password" required disabled onkeyup="verifyPass()">
                                        </div>
                                        <div class="col-md-12 col-sm-12 mb-2">
                                            <input type="password" class="form-control" id="rpass" name="retypePass"  placeholder="Re-type Password" disabled required onkeyup="verifyPass()">
                                        </div>
                                    </div>
                                               
                                   </div>
                                    <div class="modal-footer">
                                      <button class="btn btn-danger w-100"  data-dismiss="modal">Close</button>
                                      <button type="submit"  class="btn btn-primary w-100" name="updatePass" id="updatePass"disabled>Save</button>
                                    </div>
                                    </form>
    </div>
  </div>
</div>

  <!-- Modal for change email -->
                    <div class="modal fade" id="changeEmail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                      <form method="POST" action="../../SaveRecords/updateUser.php">
                                        <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Change Email</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                     </div>
                                   <div class="modal-body">
                                    <div class="form-group row">
                                        <div class="col-md-12 col-sm-12 mb-2">
                                            <input type="email" class="form-control" id="email" name="oldEmail" value = <?php echo $_SESSION['Email'];?>  readonly >
                                        </div>
                                        <div class="col-md-12 col-sm-12 mb-2">
                                            <input type="email" class="form-control" id="nemail" name="newEmail"  placeholder="New Email" required >
                                        </div>
                                        
                                    </div>
                                               
                                   </div>
                                    <div class="modal-footer">
                                      <button class="btn btn-danger w-100"  data-dismiss="modal">Close</button>
                                      <button type="submit"  class="btn btn-primary w-100" name="updateEmail" >Save</button>
                                    </div>
                                    </form>
    </div>
  </div>
</div>

</html>


