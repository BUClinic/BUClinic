<?php
session_start();
if(!isset($_SESSION['buhs_user'])){
    $_SESSION['redirect_to'] = $_SESSION['REQUEST_URI'];
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
          <a class="navbar-brand brand-logo-mini" href="index.php"><img src="../../images/ddh.png" alt="logo" /></a>
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
                  <p class="profile-name"><?php echo ucwords($_SESSION['Fname']). " ";echo  ucwords($_SESSION['Lname']);?></p>
                  <p class="designation"><?php echo ucwords($_SESSION['position'])?></p>
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
<li class="nav-item"> <a class="nav-link" href="../forms/studenthealthform.php">Student Form</a></li>
<li class="nav-item"> <a class="nav-link" href="../forms/dailyconsultation.php">Daily Consultant Form</a></li>
<li class="nav-item"> <a class="nav-link" href="../forms/medicationform.php">MedicationForm</a></li>
<?php
                    if($_SESSION['position']==='Admin'){
                      echo "<li class='nav-item'> <a class='nav-link' href='../pages/employeeform.php'>Employee Form</a></li>";
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
				  <li class="nav-item"> <a class="nav-link" href="medicineinventory.php">Medicine Inventory</a></li>
                  <li class="nav-item"> <a class="nav-link" href="medicationtable.php">Medication Table Record</a></li>
                </ul>
              </div>
            </li>

    
        
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
          
             
            </div>
            <div class="row">
              <div class="col-md-12 col-sm-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <div class="row">
                    <div class = "col-md-10">
                    <h2> Medication Table Records <i class="icon-social-dropbox float-left"></i></h2>

                    </div>
                      <div class="col-md-2">
                      <form class="search-form d-none d-md-block" action="#">
                            <input type="search" id="myInput"  class="form-control flex-grow-1" placeholder="Search Medicine Records here" title="Search Medicine Records here">
                        </form>
                      </div>
                     
                  </div>
                  
                  
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th class="font-weight-bold">Medicine ID</th>
                          <th class="font-weight-bold">Patient ID </th>
                          <th class="font-weight-bold">Patient Name </th>
                          <th class="font-weight-bold">Medicine Name</th>
                          <th class="font-weight-bold">Quantity</th>
                          <th class="font-weight-bold">Dispurse Date</th>

                        </tr>
                      </thead>
                    <tbody id="myTable">
                    
                      <?php 
                        $sql = "SELECT p.PatientID, p.Lname, p.Fname, p.Mname, m.MedicineID, m.MedicineName, m.Quantity, m.ModifiedDate, n.UnitMeasure from tbl_medication m INNER JOIN tbl_patientinfo p ON p.PatientID=m.PatientID inner join tbl_medicine n on n.ID=m.MedicineID";
                        $result = mysqli_query($conn,$sql);
                        $rows = array();
                        $ctr = 0;
                        while($r = mysqli_fetch_assoc($result)){
                          $rows[] = $r;
                          $name = $rows[$ctr]["Lname"].", ".$rows[$ctr]["Fname"]. ", " .substr($rows[$ctr]["Mname"], 0,1).".";
                          $date = explode(" ",$rows[$ctr]["ModifiedDate"]);
                            echo "<tr>

                                <td>".$rows[$ctr]["MedicineID"]."</td>
                                <td>".$rows[$ctr]["PatientID"]."</td>
                                <td>".$name."</td>
                                <td>".$rows[$ctr]["MedicineName"]." ".$rows[$ctr]["UnitMeasure"]."</td>
                                <td>".$rows[$ctr]["Quantity"]."</td>
                                <td>".$date[0]."</td>
                                </tr>";
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
        
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
    function deleteRow(btnid){
      var sqlmed = "DELETE FROM tbl_medicine where ID='"+btnid+"'" ;
      const Http = new XMLHttpRequest();
      Http.open("GET", "../../saverecords/sql.php?query=" +sqlmed);
      Http.send();
      var btn =document.getElementById(btnid);
      var row = btn.parentNode.parentNode.parentNode;
      row.parentNode.removeChild(row);  
      alert("Successfully deleted item");

    }

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


