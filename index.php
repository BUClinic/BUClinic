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
    <link rel="shortcut icon" href="./images/logo.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex align-items-center">
          <a  href="index.php">
            <img src="images/ddh.png" alt="logo" width="200" height="50" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="index.php"><img src="images/logo-mini.svg" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
          <h5 class="mb-0 font-weight-medium d-none d-lg-flex">Welcome <?php echo $_SESSION["Fname"]." ".$_SESSION["Lname"]; ?></h5>
          <!-- <ul class="navbar-nav navbar-nav-right ml-auto">
         <input type="text" id="myInput"  placeholder="Search for any Data..."> 

          <form class="search-form d-none d-md-block" action="#">
              <i class="icon-magnifier"></i>
              <input type="search" id="myInput"  class="form-control" placeholder="Search Here" title="Search here">
            </form>
   
   
          </ul> -->
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
                  <img class="img-xs rounded-circle" src="images/faces/noface.jpg" alt="profile image">
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
              <span class="nav-link">Dashboard</span>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php">
                <span class="menu-title">Dashboard</span>
                <i class="icon-screen-desktop menu-icon"></i>
              </a>
            </li>
            <li class="nav-item nav-category"><span class="nav-link">FORMS</span></li>
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
                   <li class="nav-item"> <a class="nav-link" href="pages/forms/medinventoryform.php">Medicine Inventory Form</a></li>

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
				  <li class="nav-item"> <a class="nav-link" href="pages/tables/medicineinventory.php">Medicine Inventory</a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/tables/studentrecord.php">Student Record</a></li>
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
                <a class="btn btn-block px-0 btn-rounded btn-upgrade" href="logout.php"> <i class="icon-badge mx-2"></i> Sign Out</a>
              </span>
            </li>
          </ul>
        </nav>
       
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h2> Patients Record <i class="icon-social-dropbox float-left"></i></h2>
            
            </div>
            
            <div class="row">
              <div class="col-md-12 col-sm-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="col-md-12 col-sm-12 row">
                      <h4 class="card-title col-md-10">Student Record</h4>
                      <div class="input-group col-md-2">
                        <div class="input-group-prepend">
                        <i class="icon-magnifier float-left"><span class="input-group-text" ></span></i>
                        </div>
                        <form class="search-form d-none d-md-block" action="#">
                            <input type="search" id="myInput"  class="form-control" placeholder="Search Patient Record" title="Search Patient Record here">
                        </form>
                      </div>
                    </div><br>
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th class="font-weight-bold">Student Id</th>
                          <th class="font-weight-bold">Name</th>
                          <th class="font-weight-bold">Course</th>
                          <th class="font-weight-bold">Contacts</th>
                        </tr>
                      </thead>
                      <tbody id="myTable">
                    
                      <?php 
            $sql = "SELECT ID, PatientID, Lname, Fname, Mname, Age, Course, YearLevel, CollegeUnit, ContactNum, Sex, Status from tbl_patientinfo";
            $result = mysqli_query($conn,$sql);
            $rows = array();
            $ctr = 0;
            while($r = mysqli_fetch_assoc($result)){
              $rows[] = $r;
              echo "<script>console.log('".$rows[$ctr]['Status']."')</script>";
              if($rows[$ctr]['Status']=='1') {
                echo "<tr><td>".$rows[$ctr]['PatientID']."</td><td>".$rows[$ctr]["Lname"].",".$rows[$ctr]["Fname"].
                " ".substr($rows[$ctr]["Mname"],0,1).".</td><td>".$rows[$ctr]["Course"]."</td><td>".$rows[$ctr]["ContactNum"].
                "</td><td>". "<div class='btn-group'>
           
                <button type='button' class='btn btn-dark btn-sm' data-toggle='dropdown'><i class='icon-menu'></i></button>
                <div class='dropdown-menu'>
               <button id='patientID' value='".$rows[$ctr]['PatientID']. " type='button' onClick='viewstudentinfo(\"".$rows[$ctr]['PatientID']."\")' class='btn btn-primary w-100'>View<i class='icon-eye float-left'></i></button><br>
               <button id='patientID' value='".$rows[$ctr]['PatientID']. " type='button' onClick='editStudentInfo(\"".$rows[$ctr]['PatientID']."\")' class='btn btn-warning w-100'>Edit<i class='icon-pencil float-left'></i></button><br>
               <button type='button' class='btn btn-danger w-100' data-toggle='modal' data-target='#deletemodal'>Delete<i class='icon-trash float-left'></i></button>
                </div>
                </div>"."<td><td>"
                ."<td></tr>";  
              
               
              }
              $ctr++;
        
             // echo json_encode($rows);
         
               
              }
       
              
        ?>
        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="content-wrapper">
            <div class="page-header">
              <h2> Daily Consultation Record <i class="icon-note float-left"></i></h2>
              <ul class="navbar-nav navbar-nav-right ml-auto">    
                  <form class="search-form d-none d-md-block" action="#">
                    <input type="search" id="myInput1"  class="form-control" placeholder="Search Any Record" title="Search from Consultation Records">
                 </form>
              </ul>
            </div>
            <div class="row">
              <div class="col-md-12 col-sm-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Student Record</h4>
                    <table class="table table-hover">
                   
                      <thead>
                        <tr>
                          <th class="font-weight-bold">Student Id</th>
                          <th class="font-weight-bold">Name</th>
                          <th class="font-weight-bold">Course</th>
                          <th class="font-weight-bold">Contacts</th>
                          <th class="font-weight-bold">Diagnosis</th>
                          <th class="font-weight-bold">Treatment</th>
                          <th class="font-weight-bold">Referral</th>
                        </tr>
                      </thead>
                      <tbody id="myTable1">
                    
                      <?php 
            $sql = "SELECT tbl_patientinfo.ID, tbl_patientinfo.PatientID, tbl_patientinfo.Lname, tbl_patientinfo.Fname, tbl_patientinfo.Mname, tbl_patientinfo.Course, tbl_patientinfo.ContactNum, tbl_diagnosis.Diagnosis, tbl_diagnosis.Treatment, tbl_diagnosis.Referral  from tbl_patientinfo INNER JOIN tbl_diagnosis ON tbl_patientinfo.PatientID=tbl_diagnosis.PatientID";
            $result = mysqli_query($conn,$sql);
            $rows = array();
            $ctr = 0;

            while($r = mysqli_fetch_assoc($result)){
              $rows[] = $r;
              
             // echo json_encode($rows);
         
                echo "<tr><td>".$rows[$ctr]['PatientID']."</td><td>".$rows[$ctr]["Lname"].",".$rows[$ctr]["Fname"].
                " ".substr($rows[$ctr]["Mname"],0,1).".</td><td>".$rows[$ctr]["Course"]."</td><td>".$rows[$ctr]["ContactNum"]."</td><td>".$rows[$ctr]["Diagnosis"]."</td><td>".$rows[$ctr]["Treatment"]."</td><td>".$rows[$ctr]["Referral"]."</td><td>"."</td><td>". "<div class='btn-group'>
           
                <button type='button' class='btn btn-dark btn-sm' data-toggle='dropdown'><i class='icon-menu'></i></button>
                <div class='dropdown-menu'>
               <button id='patientID' value='".$rows[$ctr]['PatientID']. " type='button' onClick='viewstudentinfo(\"".$rows[$ctr]['PatientID']."\")' class='btn btn-primary w-100'>View<i class='icon-eye float-left'></i></button><br>
               <button id='patientID' value='".$rows[$ctr]['PatientID']. " type='button' onClick='editStudentInfo(\"".$rows[$ctr]['PatientID']."\")' class='btn btn-warning w-100'>Edit<i class='icon-pencil float-left'></i></button><br>
               <button type='button' class='btn btn-danger w-100' data-toggle='modal' data-target='#deletemodal'>Delete<i class='icon-trash float-left'></i></button>
                </div>
                </div>"."<td><td>"
                ."<td></tr>";  
              
               
              $ctr++;
              }
       
              
        ?>
        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
 function editStudentInfo(element){
  window.location.href = "pages/forms/editstudent.php?ID="+element;
  const Http = new XMLHttpRequest();
	Http.open("GET", "saverecords/sql.php?query=select * from tbl_patientinfo where PatientID='" + element + "'");
	Http.send();
	Http.onreadystatechange = function(){
		if(this.readyState==4 && this.status==200){
			console.log(Http.responseText);
			$result = JSON.parse(Http.responseText.substring(1,Http.responseText.length-1));
      document.getEelementById("S_Fname").value = $result.Fname;
		}
	}
	// alert(result.PatientID);
}

$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

<script>
 function viewstudentinfo(element){
  window.location.href = "pages/forms/viewstudentrecord.php?ID="+element;
  const Http = new XMLHttpRequest();
	Http.open("GET", "saverecords/sql.php?query=select * from tbl_patientinfo where PatientID='" + element + "'");
	Http.send();
	Http.onreadystatechange = function(){
		if(this.readyState==4 && this.status==200){
			console.log(Http.responseText);
			$result = JSON.parse(Http.responseText.substring(1,Http.responseText.length-1));
      document.getEelementById("S_Fname").value = $result.Fname;
		}
	}
	// alert(result.PatientID);
}

$(document).ready(function(){
  $("#myInput1").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable1 tr").filter(function() {
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