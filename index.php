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
          <a  href="dashboard.php">
            <img src="images/ddh.png" alt="logo" width="100%"/>
          </a>
          <a class="navbar-brand brand-logo-mini" href="index.php"><img src="images/logo-mini.svg" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
          <h5 class="mb-0 font-weight-medium d-none d-lg-flex">Welcome <?php echo ucwords($_SESSION["Fname"])." ".ucwords($_SESSION["Lname"]); ?></h5>
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
        <nav class="sidebar sidebar-offcanvas float-left" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
                
              <a href="#" class="nav-link">
                <div class="profile-image">
                  <img class="img-xs rounded-circle" src="images/faces/noface.jpg" alt="profile image">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"><?php echo ucwords($_SESSION['Fname']). " ";echo  ucwords($_SESSION['Lname']);?></p>
                  <p class="designation"><?php echo ucwords($_SESSION['position']);?></p>
                </div>
                <div class="icon-container">
                  <i class="icon-bubbles"></i>
                  <div class="dot-indicator bg-danger"></div>
                </div>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link " href="index.php">
                <span class="menu-title ">Records</span>
                <i class="icon-screen-desktop menu-icon"></i>
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
                  <li class="nav-item"> <a class="nav-link" href="pages/forms/dailyconsultation.php">DailyConsultation Form</a></li>
                   <li class="nav-item"> <a class="nav-link" href="pages/forms/medicationform.php">Medication Form</a></li>
                  <?php
                    if($_SESSION['position']==='Admin'){
                      echo "<li class='nav-item'> <a class='nav-link' href='pages/forms/employeeform.php'>Employee Form</a></li>";
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
				  <li class="nav-item"> <a class="nav-link" href="pages/tables/medicineinventory.php">Medicine Inventory</a></li>
               
                  <li class="nav-item"> <a class="nav-link" href="pages/tables/medicationtable.php">Medication Table Record</a></li>
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
                  <li class="nav-item"> <a class="nav-link" data-toggle="modal" data-target="#changeName" href=""> Change Name </a></li>
                  <li class="nav-item"> <a class="nav-link" data-toggle="modal" data-target="#changeEmail" href=""> Change Email </a></li>
                  <li class="nav-item"> <a class="nav-link" data-toggle="modal" data-target="#changePassword" href=""> Change Password </a></li>
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
       
        <div class="main-panel" >
          <div class="content-wrapper">
            <div class="page-header">
              
            
            </div>
            
            <div class="row">
              <div class="col-md-12 col-sm-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="col-md-12 col-sm-12 row">
                      <div class="col-md-10 col-sm-12">
                        <h2> Patients Record <i class="icon-social-dropbox float-left"></i></h2>
                      </div>
                      <div class="col-md-2 col-sm-12">
                        <form class="search-form d-none d-md-block" action="#">
                            <input type="search" id="myInput"  class="form-control flex-grow-1" placeholder="Search Patient Record" title="Search Patient Record here">
                        </form>
                      </div>
                      <div class="input-group col-md-2">
                        <div class="input-group-prepend">
                        </div>
          
                      </div>
                    </div><br>
                    <table id="tblPatientInfo" class="table table-hover table-stripped">
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
                echo "<tr><td>".$rows[$ctr]['PatientID']."</td>";

                if($rows[$ctr]['Sex']=="Male")
                  $icon = "images/faces-clipart/pic-1.png";
                else
                  $icon = "images/faces-clipart/pic-3.png";
                echo "<td><img src='".$icon."' alt='image'>".ucwords($rows[$ctr]["Lname"]).",".ucwords($rows[$ctr]["Fname"]).
                " ".ucwords(substr($rows[$ctr]["Mname"],0,1)).".</td>
                <td>".$rows[$ctr]["Course"]."</td>
                <td>".$rows[$ctr]["ContactNum"]."</td>
                <td>
                <div class='btn-group'>
           
                <button type='button' class='btn btn-dark btn-sm' data-toggle='dropdown'><i class='icon-menu'></i></button>
                <div class='dropdown-menu'>
               <button id='patientID' value='".$rows[$ctr]['PatientID']. "' type='button' onClick='viewstudentinfo(\"".$rows[$ctr]['PatientID']."\")' class='btn btn-primary w-100'>View<i class='icon-eye float-left'></i></button><br>
               <button id='patientID' value='".$rows[$ctr]['PatientID']. "' type='button' onClick='editStudentInfo(\"".$rows[$ctr]['PatientID']."\")' class='btn btn-warning w-100'>Edit<i class='icon-pencil float-left'></i></button><br>
               <button type='button' class='btn btn-danger w-100' data-toggle='modal'  onclick='delPatient(\"".$rows[$ctr]['PatientID']. "\")' >Delete<i class='icon-trash float-left'></i></button>
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
     
              
              <ul class="navbar-nav navbar-nav-right ml-auto">    
              </ul>
            </div>

            <div class="row">
              <div class="col-md-12 col-sm-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <div class ="row">
                  <div class="col-md-6 col-sm-12 " style="float:left">
                  <h2> Daily Consultation Record <i class="icon-note float-left"></i></h2>
                  </div>
                  <div class="col-md-6 col-sm-12"  style="float:right">
                    <form class="search-form d-none d-md-block" action="#">
                      <input type="search" id="myInput1"  class="form-control" placeholder="Search Any Record" title="Search from Consultation Records" style="width:35%;float:right">
                  </form>
                  </div>
                   
                  </div>

                    <table id="tblConsultation" class="table table-hover">
                   
                      <thead>
                        <tr>
                          <th class="font-weight-bold">Student Id</th>
                          <th class="font-weight-bold">Name</th>
                          <th class="font-weight-bold">Course</th>
                          <th class="font-weight-bold">Contacts</th>
                          <th class="font-weight-bold">Diagnosis</th>
                          <th class="font-weight-bold">Treatment</th>
                          <th class="font-weight-bold">Referral</th>
                          <th class="font-weight-bold">Height</th>
                          <th class="font-weight-bold">Weight</th>
                        </tr>
                      </thead>
                      <tbody id="myTable1">
                    
                      <?php 
            $sql = "select * from tbl_examinations INNER JOIN tbl_diagnosis ON tbl_diagnosis.CreatedDate=tbl_examinations.CreatedDate INNER JOIN tbl_patientinfo ON tbl_examinations.PatientID=tbl_patientinfo.PatientID";
           
           $result = mysqli_query($conn,$sql);
            $rows = array();
            $ctr = 0;
            while($r = mysqli_fetch_assoc($result)){
              $rows[] = $r;
            
             // echo json_encode($rows);

        
                echo "<tr><td>".$rows[$ctr]['PatientID']."</td>";

                if($rows[$ctr]['Sex']=="Male")
                  $icon = "images/faces-clipart/pic-1.png";
                else
                  $icon = "images/faces-clipart/pic-3.png";
                echo "<td><img src='".$icon."' alt='image'>".ucwords($rows[$ctr]["Lname"]).",".ucwords($rows[$ctr]["Fname"]).
                " ".ucwords(substr($rows[$ctr]["Mname"],0,1)).".</td>
                <td>".$rows[$ctr]["Course"]."</td><td>".$rows[$ctr]["ContactNum"]."</td><td>".ucwords(substr($rows[$ctr]["Diagnosis"],0,10))."..."."</td><td>".ucwords(substr($rows[$ctr]["Treatment"],0,10))."..."."</td><td>".ucwords(substr($rows[$ctr]["Referral"],0,10))."..."."</td><td>".$rows[$ctr]["Height"]."</td><td>".$rows[$ctr]["Weight"]."</td><td>"."</td><td>". 
           
                "<button id='patientID' value='".$rows[$ctr]['PatientID']. " type='button' class='btn btn-primary w-100' data-toggle='modal' data-target='#viewConsult".$ctr."'>View<i class='icon-eye float-left' ></i></button>"."<td><td>"
                ."<td></tr>";
                ?>
                <!--modal of view consult-->
                      <div class="modal fade "  id=<?php echo "\"viewConsult".$ctr."\"";?> role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content col-md-6" style="position: absolute; left: 50%; top: 50%; margin-left: -300px;margin-top: -100px;">
                            <form method="POST" action="../../SaveRecords/savemed.php">
                              <div class="modal-header">
                              <h4 class="card-title"> <strong> <?php echo $rows[$ctr]['Fname']; ?>'s Information </strong><i class="icon-user float-left"></i></h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                </div>
                              <div class="modal-body">
                                
                                <div class="form-group row">
                                  <br>
                                    <div class="col-md-12 col-sm-12 mb-2">
                                        <input type="text" class="form-control"  style="font-weight:bold;" value=<?php echo "'Course:   ".$rows[$ctr]['Course']."'";?> readonly>
                                    </div>
                                    <div class="col-md-12 col-sm-12 mb-2">
                                        <input type="text" class="form-control"  style="font-weight:bold;" value=<?php echo "'Contacts:   ".$rows[$ctr]['ContactNum']."'";?> readonly>
                                    </div>
                                    <div class="col-md-12 col-sm-12 mb-2">
                                           <label  style="font-weight:bold;">Diagnosis</label>
                                           <textarea   class="md-textarea form-control" rows="5" readonly><?php echo $rows[$ctr]["Diagnosis"];?></textarea>
                                    </div>
                                    <div class="col-md-12 col-sm-12 mb-2">
                                           <label  style="font-weight:bold;">Treatment</label>
                                           <textarea  class="md-textarea form-control" rows="5" readonly><?php echo $rows[$ctr]["Treatment"];?></textarea>
                                    </div>
                                    <div class="col-md-12 col-sm-12 mb-2">
                                           <label  style="font-weight:bold;">Referral</label>
                                           <textarea  class="md-textarea form-control" rows="5" readonly><?php echo $rows[$ctr]["Referral"];?></textarea>
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-2">
                                            <input type="text" class="form-control"  style="font-weight:bold;" value=<?php echo "'Blood Pressure: ".$rows[$ctr]['BP']."'";?> readonly>
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-2">
                                            <input type="text" class="form-control"  style="font-weight:bold;" value=<?php echo "'Temperature: ".$rows[$ctr]['Temp']."'";?> readonly>
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-2">
                                            <input type="text" class="form-control"  style="font-weight:bold;" value=<?php echo "'Height: ".$rows[$ctr]['Height']."'";?> readonly>
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-2">
                                            <input type="text" class="form-control"  style="font-weight:bold;" value=<?php echo "'Weight: ".$rows[$ctr]['Weight']."'";?> readonly>
                                    </div>

                                    <div class="col-md-12 col-sm-12 mb-2">
                                           <label  style="font-weight:bold;">History and Physical Examination</label>
                                           <textarea  class="md-textarea form-control" rows="5" readonly><?php echo $rows[$ctr]["History"];?></textarea>
                                    </div>
                                    <div class="col-md-12 col-sm-12 mb-2">
                                           <label  style="font-weight:bold;">Physicians Direction's</label>
                                           <textarea  class="md-textarea form-control" rows="5" readonly><?php echo $rows[$ctr]["PhysiciansDirection"];?></textarea>
                                    </div>
                                </div>
                                               
                              </div>
                              <div class="modal-footer">
                                  <button type="button"  class="btn btn-danger w-100"  data-dismiss="modal">Close</button>
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
 function editStudentInfo(element){
  window.location.href = "pages/forms/editstudent.php?ID="+element;
  const Http = new XMLHttpRequest();
	Http.open("GET", "saverecords/sql.php?query=select * from tbl_patientinfo where PatientID='" + element + "'");
	Http.send();
	Http.onreadystatechange = function(){
		if(this.readyState==4 && this.status==200){
			// console.log(Http.responseText);
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
			// console.log(Http.responseText);
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

function delPatient(ID){
  console.log('deleting');
  if(confirm("Are you sure to delete "+ ID +"?")){
    const Http = new XMLHttpRequest();
    Http.open("GET", "saverecords/sql.php?query=update tbl_patientinfo set Status='0' where PatientID='" + ID + "'");
    Http.send();
    Http.onreadystatechange = function(){
      if(this.readyState==4 && this.status==200){
        window.location.href="index.php";
      }
    }

  }
}

function editname(){

  if(confirm("Are you sure to delete "+ ID +"?")){
    const Http = new XMLHttpRequest();
    Http.open("GET", "saverecords/sql.php?query=update tbl_patientinfo set Status='0' where PatientID='" + ID + "'");
    Http.send();
    Http.onreadystatechange = function(){
      if(this.readyState==4 && this.status==200){
        window.location.href="index.php";
      }
    }

  }
}
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
            <form method="POST" action="SaveRecords/updateUser.php">
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
                  <button type="button"class="btn btn-danger w-100" data-dismiss="modal" >Close</button>
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
                                  <form method="POST" action="SaveRecords/updateUser.php">
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
                                      <button type="button"class="btn btn-danger w-100" data-dismiss="modal" >Close</button>
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
                      <form method="POST" action="SaveRecords/updateUser.php">
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
                                     <button type="button"class="btn btn-danger w-100" data-dismiss="modal" >Close</button>
                                      <button type="submit"  class="btn btn-primary w-100" name="updateEmail" >Save</button>
                                    </div>
                                    </form>
    </div>
  </div>
</div>


</html>

<?php 
    CloseCon($conn);
?>