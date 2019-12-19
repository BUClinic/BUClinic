<?php
session_start();
if(!isset($_SESSION['buhs_user'])){
    $_SESSION['redirect_to'] = $_SERVER['REQUEST_URI'];
    header("location: ../../login.php");

}
include '../../db_connection.php';

$conn = OpenCon();
// $result = mysqli_query("select * from tbl_patientinfo where PatientID=".$_GET['edit']);
// $r = mysqli_fetch_assoc($result);
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
     <!--get college combo box-->
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../../vendors/select2/select2.min.css">
    <link rel="stylesheet" href="../../vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../css/style.css" ><!-- End layout styles -->
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
        <div class="container-fluid page-body-wrapper float-left" style="float:left">
            <!-- partial:../../partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar" >
                <ul class="nav" >
                    <li class="nav-item nav-profile">
                        <a href="../../index.php" class="nav-link">
                            <div class="profile-image">
                                <img class="img-xs rounded-circle" src="../../images/faces/noface.jpg" alt="profile image">
                                <div class="dot-indicator bg-success"></div>
                            </div>
                            <div class="text-wrapper">
                                <p class="profile-name"><?php echo ucwords($_SESSION['Fname'])." ";echo ucwords($_SESSION['Lname']);?></p>
                                <p class="designation"><?php echo ucwords($_SESSION['position']);?></p>
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
            <div class="main-panel " >
                <div class="content-wrapper" >
                    <div class="page-header" >
                        <h2> STUDENT HEALTH RECORD <i class="icon-note float-left"></i> </h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="studenthealthform.php">Student Form</a></li>
                                <li class="breadcrumb-item"><a href="dailyconsultation.php">Daily Consultation Form</a></li>  
                                <li class="breadcrumb-item"><a href="medicationform.php">Medication Form</a></li> 
                                <li class="breadcrumb-item active" aria-current="page">Form elements</li>
                            </ol>
                        </nav>
                    </div>
                    <form method="POST" action="../../SaveRecords/savestudent.php">
                        <div class="row">
                            <div class="col-12 grid-margin">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Personal Information <i class="icon-user float-left"></i></h4>
                                        <!--<p class="card-description"> Personal info </p>-->
                                        <div class="form-group row">
                                            <div class="col-md-7 col-sm-12 mb-2">
                                                <input type="text" class="form-control mb-2"  name="S_Fname" placeholder="First Name" required>
                                                <input type="text" class="form-control mb-2" name="S_Mname" placeholder="Middle Name" required>
                                                <input type="text" class="form-control"  name="S_Lname" placeholder="Last Name" required>
                                            </div>
                                            <div class="col-md-3 col-sm-12 mb-2">
                                                <input type="text" class="form-control mb-2" name="S_Bdate" placeholder="Birth Date" onfocus="this.type='date'" required>
                                                <input type="number" class="form-control mb-2"  name="S_Age" placeholder="Age" required>
                                                <select class="form-control" name="S_Gender" required>
                                                    <option selected disabled value="">Sex</option>
                                                    <option>Male</option>
                                                    <option>Female</option>
                                                </select>
                                            </div> 
                                            <div class="col-md-2 col-sm-12 mb-2">
                                                <input type="text" class="form-control mb-2" name="S_Cnumber" placeholder="Contact Number" required>
                                                <select class="form-control mb-2" name="S_Status" required="required">
                                                    <option selected disabled value="">Civil Status</option>
                                                    <option>Single</option>
                                                    <option>Married</option>
                                                    <option>Widowed</option>
                                                    <option>Divorced</option>
                                                </select>
                                                <input type="text" class="form-control"  name="S_Religion" placeholder="Religion" required>
                                            </div>
                                            <div class="col-md-3 col-sm-12 mb-2">
                                                <input type="text" class="form-control" id ="S_Id" name="S_Id" placeholder="Student ID #" required>
                                            </div>
                                            
                                            <div class="col-md-3 col-sm-12 mb-2">
                                                <select  class="form-control" name="S_Department" id="S_Department" onchange="getCollege(this)" required aria-required="true">
                                                    
                                                    <option selected disabled value="">College/Department</option>
                                                    <?php 
                                                    $sql = "select distinct colleges from tbl_college";
                                                    $res = mysqli_query($conn,$sql);
                                                    $x=0;
                                                    while($list = mysqli_fetch_assoc($res)){
                                                        $col[$x] = $list['colleges'];
                                                        echo "<option >".$col[$x]."</option>";
                                                        $x++;
                                                    }
                                                    ?>
                                                </select> 
                                            </div>
                                            
                                            
                                            <div class="col-md-3 col-sm-12 mb-2">
                                                <select required class="form-control" name="S_Course" id="S_Course" >
                                                    <option selected disabled value="">Course</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3 col-sm-12 mb-2">
                                                <select required class="form-control" name="S_YearLevel" id="S_YearLevel" >
                                                    <option selected disabled value="">Year Level</option>
                                                    <option >1st Year</option>
                                                    <option >2nd Year</option>
                                                    <option >3rd Yeer</option>
                                                    <option >4th Year</option>
                                                    <option >5th Year</option>
                                                </select>
                                            </div>
                                            
                                            
                                            
                                            <div class="col-md-2 col-sm-12 mb-2" >
                                                <select required aria-required="true" class="form-control" name="S_Region" id="S_Region" onchange="getRegion()" >
                                                    <option selected disabled value="">Region</option>
                                                    <?php 
                                                    $sql = "select * from refregion";
                                                    $res = mysqli_query($conn,$sql);
                                                    $x=0;
                                                    while($list = mysqli_fetch_assoc($res)){
                                                        $reg[$x] = $list['regDesc'];
                                                        $code[$x] = $list['regCode'];
                                                        echo "<option id=".$code[$x].">".$reg[$x]."</option>";
                                                        $x++;
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            
                                            
                                            <div class="col-md-2 col-sm-12 mb-2">
                                                <select required aria-required="true" class="form-control" name="S_Province" id="S_Province" onchange="getProvince()" >
                                                    <option selected disabled value="">Province</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2 col-sm-12 mb-2">
                                                <select required aria-required="true" class="form-control" name="S_City" id="S_City" onchange="getCity()" >
                                                    <option selected disabled value="">City/Municipality</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2 col-sm-12  mb-2">
                                                <select  required aria-required="true" class="form-control" name="S_Baranggay" id="S_Baranggay" >
                                                    <option selected disabled value="">Baranggay</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <input type="text" class="form-control" name="S_Street" placeholder="Street #" required aria-required="true">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                            <div class="col-md-12 grid-margin row">
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Father's Information <i class="icon-user float-left"></i></h4>
                                            <div class="form-group row">
                                                <div class="col-md-12 col-sm-12 mb-2">
                                                    <input type="text" class="form-control" id="F_FName" name="F_FName" placeholder="First Name">
                                                </div>
                                                <div class="col-md-12 col-sm-12 mb-2">
                                                    <input type="text" class="form-control" id="F_MName" name="F_MName" placeholder="Middle Name">
                                                </div>
                                                <div class="col-md-12 col-sm-12 mb-2">
                                                    <input type="text" class="form-control" id="F_LName" name="F_LName" placeholder="Last Name">
                                                </div>
                                                <div class="col-md-12 col-sm-12 mb-2">
                                                    <input type="text" class="form-control" id="F_Address" name="F_Address" placeholder="Address">
                                                </div>
                                                <div class="col-md-12 col-sm-12 mb-2">
                                                    <input type="text" class="form-control" id="F_CNumber" name="F_Occupation" placeholder="Occupation">
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <input type="text" class="form-control" id="F_CNumber" name="F_CNumber" placeholder="Contact Number">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Mother's Information <i class=" icon-user-female float-left"></i></h4>
                                            <div class="form-group row">
                                                <div class="col-md-12 col-sm-12 mb-2">
                                                    <input type="text" class="form-control" id="M_FName" name="M_FName" placeholder="First Name">
                                                </div>
                                                <div class="col-md-12 col-sm-12 mb-2">
                                                    <input type="text" class="form-control" id="M_MName" name="M_MName" placeholder="Middle Name">
                                                </div>
                                                <div class="col-md-12 col-sm-12 mb-2">
                                                    <input type="text" class="form-control" id="M_LName" name="M_LName" placeholder="Last Name">
                                                </div>
                                                <div class="col-md-12 col-sm-12 mb-2">
                                                    <input type="text" class="form-control" id="M_Address" name="M_Address" placeholder="Address">
                                                </div>
                                                <div class="col-md-12 col-sm-12 mb-2">
                                                    <input type="text" class="form-control" id="M_Occupation" name="M_Occupation" placeholder="Occupation">
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <input type="text" class="form-control" id="M_CNumber" name="M_CNumber" placeholder="Contact Number">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Guardian's Information <i class="icon-user-follow float-left"></i></h4>
                                            <div class="form-group row">
                                                <div class="col-md-12 col-sm-12 mb-2">
                                                    <input type="text" class="form-control" id="G_FName" name="G_FName" placeholder="First Name">
                                                </div>
                                                <div class="col-md-12 col-sm-12 mb-2">
                                                    <input type="text" class="form-control" id="G_MName" name="G_MName" placeholder="Middle Name">
                                                </div>
                                                <div class="col-md-12 col-sm-12 mb-2">
                                                    <input type="text" class="form-control" id="G_LName" name="G_LName" placeholder="Last Name">
                                                </div>
                                                <div class="col-md-12 col-sm-12 mb-2">
                                                    <input type="text" class="form-control" id="G_Address" name="G_Address" placeholder="Address">
                                                </div>
                                                <div class="col-md-12 col-sm-12 mb-2">
                                                    <input type="text" class="form-control" id="G_Occupation" name="G_Occupation" placeholder="Occupation">
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <input type="text" class="form-control" id="G_CNumber" name="G_CNumber" placeholder="Contact Number">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title"> Family History <i class=" icon-people float-left"></i></h4>
                                        <p class="card-description"> Please indicate relationship if yes. </p>
                                        <div class="form-group row">
                                            <div class="col-md-2 col-sm-3 mb-2">
                                                <div class="form-check">
                                                    <label class="form-check-label" >Cancer</label>
                                                    <input class="form-check-label" type="text" name="illnesscancer"   id="illnesscancer" value = "Cancer" hidden>
                                        
                                                    </div>
                                                </div>
                                                <div class="col-md-1 col-sm-2">
                                                    <div class="form-check form-check-danger">
                                                        <label class="form-check-label"><input type="radio" class="form-check-input" name="optionCancer" id="optionCancerYes" value="Yes" onclick="setIllnessYes('Cancer')"> Yes 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 col-sm-2">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="optionCancer" id="optionCancerNo" value="No" checked="true" onclick="setIllness('Cancer')"> No 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-5">
                                                    <input type="text" class="form-control" id="R_Cancer" name="R_Cancer" placeholder="Relationship" onclick="setIllnessYes('Cancer')" >
                                                </div>
                                                <div class="col-md-2 col-sm-3 mb-2">
                                                    <div class="form-check">
                                                        <label class="form-check-label" > Hypertension 
                                                        </label>
                                                        <input class="form-check-label" type = "text" name="illnessHypertension" id="illnessHypertension" value ="Hypertension" hidden>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 col-sm-2">
                                                    <div class="form-check form-check-danger">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="optionHypertension" id="optionHypertensionYes" value="Yes" onclick="setIllnessYes('Hypertension')"> Yes 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 col-sm-2">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="optionHypertension" id="optionHypertensionNo" value="No" checked="true" onclick="setIllnesNo('Hypertension')"> No 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-5">
                                                    <input type="text" class="form-control" id="R_Hypertension" name="R_Hypertension" placeholder="Relationship" onclick="setIllnessYes('Hypertension')">
                                                </div>
                                                <div class="col-md-2 col-sm-3 mb-2">
                                                    <div class="form-check">
                                                        <label class="form-check-label" > Stroke 
                                                            
                                                        </label>
                                                        <input class="form-check-label" type="text" name="illnessstroke" id="illnessstroke" value="Stroke"hidden>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 col-sm-2">
                                                    <div class="form-check form-check-danger">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="optionStroke" id="optionStrokeYes" value="Yes" onclick="setIllnessYes('Stroke')"> Yes 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 col-sm-2">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="optionStroke" id="optionStrokeNo" value="No" checked="true" onclick="setIllnessNo('Stroke')"> No 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-5">
                                                    <input type="text" class="form-control" id="R_Stroke" name="R_Stroke" placeholder="Relationship" onclick="setIllnessYes('Stroke')">
                                                </div>
                                                <div class="col-md-2 col-sm-3 mb-2">
                                                    <div class="form-check">
                                                        <label class="form-check-label"  > Tuberculosis 
                                                            
                                                        </label>
                                                        <input class="form-check-label" type="text" name="illnesstuberculosis" id="illnesstuberculosis" value="Tuberculosis" hidden> 
                                                    </div>
                                                </div>
                                                <div class="col-md-1 col-sm-2">
                                                    <div class="form-check form-check-danger">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="optionTuberculosis" id="optionTuberculosisYes" value="Yes" onclick="setIllnessYes('Tuberculosis')"> Yes 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 col-sm-2">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="optionTuberculosis" id="optionTuberculosisNo" value="No" checked="true" onclick="setIllnessNo('Tuberculosis')"> No 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-5">
                                                    <input type="text" class="form-control" id="R_Tuberculosis" name="R_Tuberculosis" placeholder="Relationship" onclick="setIllnessYes('Tuberculosis')">
                                                </div>
                                                <div class="col-md-2 col-sm-3 mb-2">
                                                    <div class="form-check">
                                                        <label class="form-check-label"  > Rheumatism 
                                                            
                                                        </label>
                                                        <input class="form-check-label" name="illnessrheumatism" id="illnessrheumatism" type="text" value="Rheumatism" hidden> 
                                                    </div>
                                                </div>
                                                <div class="col-md-1 col-sm-2">
                                                    <div class="form-check form-check-danger">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="optionRheumatism" id="optionRheumatismYes" value="Yes" onclick="setIllnessYes('Rheumatism')"> Yes 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 col-sm-2">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="optionRheumatism" id="optionRheumatismNo" value="No" checked="true" onclick="setIllnessNo('Rheumatism')"> No 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-5">
                                                    <input type="text" class="form-control" id="R_Rheumatism" name="R_Rheumatism" placeholder="Relationship" onclick="setIllnessYes('Rheumatism')">
                                                </div>  
                                                <div class="col-md-2 col-sm-3 mb-2">
                                                    <div class="form-check">
                                                        <label class="form-check-label"   > Eye Disorder 
                                                            
                                                        </label>
                                                        <input class="form-check-label"  name="illnesseyeD" id="illnesseyeD" type="text" value="Eye Disorder" hidden>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 col-sm-2">
                                                    <div class="form-check form-check-danger">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="optionEDisorder" id="optionEDisorderYes" value="Yes" onclick="setIllnessYes('EDisorder')">  Yes 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 col-sm-2">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="optionEDisorder" id="optionEDisorderNo" value="No" checked="true" onclick="setIllnessNo('EDisorder')"> No 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-5">
                                                    <input type="text" class="form-control" id="R_EDisorder" name="R_EDisorder" placeholder="Relationship" onclick="setIllnessYes('EDisorder')">
                                                </div>
                                                <div class="col-md-2 col-sm-3 mb-2">
                                                    <div class="form-check">
                                                        <label class="form-check-label" > Diabetes 
                                                            
                                                        </label>
                                                        <input class="form-check-label" name="illnessdiabetes" id="illnessdiabetes" type="text" value="Diabetes" hidden>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 col-sm-2">
                                                    <div class="form-check form-check-danger">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="optionDiabetes" id="optionDiabetesYes" value="Yes" onclick="setIllnessYes('Diabetes')"> Yes 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 col-sm-2">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="optionDiabetes" id="optionDiabetesNo" value="No" checked="true" onclick="setIllnessNo('Diabetes')"> No 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-5">
                                                    <input type="text" class="form-control" id="R_Diabetes" name="R_Diabetes" placeholder="Relationship" onclick="setIllnessYes('Diabetes')">
                                                </div>
                                                <div class="col-md-2 col-sm-3 mb-2">
                                                    <div class="form-check">
                                                        <label class="form-check-label" name="illnessasthma"> Asthma 
                                                            
                                                        </label>
                                                        <input class="form-check-label" name="illnessasthma" type="text" value="Asthma" hidden>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 col-sm-2">
                                                    <div class="form-check form-check-danger">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="optionAsthma" id="optionAsthmaYes" value="Yes" onclick="setIllnessYes('Asthma')"> Yes 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 col-sm-2">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="optionAsthma" id="optionAsthmaNo" value="No" checked="true" onclick="setIllnessNo('Asthma')"> No 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-5">
                                                    <input type="text" class="form-control" id="R_Asthma" name="R_Asthma" placeholder="Relationship" onclick="setIllnessYes('Asthma')">
                                                </div>
                                                <div class="col-md-2 col-sm-3 mb-2">
                                                    <div class="form-check">
                                                        <label class="form-check-label"  > Convulsion 
                                                            
                                                        </label>
                                                        <input class="form-check-label" name="illnessconvulsion" id="illnessconvulsion" type="text" value="Convulsion" hidden>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 col-sm-2">
                                                    <div class="form-check form-check-danger">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="optionConvulsion" id="optionConvulsionYes" value="Yes" onclick="setIllnessYes('Convulsion')"> Yes 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 col-sm-2">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="optionConvulsion" id="optionConvulsionNo" value="No" checked="true" onclick="setIllnessNo('Convulsion')"> No 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-5">
                                                    <input type="text" class="form-control" id="R_Convulsion" name="R_Convulsion" placeholder="Relationship" onclick="setIllnessYes('Convulsion')">
                                                </div>
                                                <div class="col-md-2 col-sm-3 mb-2">
                                                    <div class="form-check">
                                                        <label class="form-check-label" > Skin Problems 
                                                            
                                                        </label>
                                                        <input class="form-check-label" name="illnessskin" id="illnessskin" type="text" value="Skin Problems" hidden>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 col-sm-2">
                                                    <div class="form-check form-check-danger">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="optionSProblems" id="optionSProblemsYes" value="Yes" onclick="setIllnessYes('SProblems')"> Yes 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 col-sm-2">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="optionSProblems" id="optionSProblemsNo" value="No" checked="true" onclick="setIllnessNo('SProblems')"> No 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-5">
                                                    <input type="text" class="form-control" id="R_SProblems" name="R_SProblems" placeholder="Relationship" onclick="setIllnessYes('SProblems')">
                                                </div>
                                                <div class="col-md-2 col-sm-3 mb-2">
                                                    <div class="form-check">
                                                        <label class="form-check-label"  > Heart Disease 
                                                            
                                                        </label>
                                                        <input class="form-check-label" name="illnessHdisease" id="illnessHdisease" type="text" value="Heart Disease" hidden>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 col-sm-2">
                                                    <div class="form-check form-check-danger">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="optionHDisease" id="optionHDiseaseYes" value="Yes" onclick="setIllnessYes('HDisease')"> Yes 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 col-sm-2">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="optionHDisease" id="optionHDiseaseNo" value="No" checked="true" onclick="setIllnessNo('HDisease')"> No 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-5">
                                                    <input type="text" class="form-control" id="R_HDisease" name="R_HDisease" placeholder="Relationship" onclick="setIllnessYes('HDisease')">
                                                </div>
                                                <div class="col-md-2 col-sm-3 mb-2">
                                                    <div class="form-check">
                                                        <label class="form-check-label" name="illnesskidney" id="illnesskidney"> Kidney Problem 
                                                            
                                                        </label>
                                                        <input class="form-check-label" name="illnesskidney" id="illnesskidney" type="text" value="Kidney Problems" hidden>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 col-sm-2">
                                                    <div class="form-check form-check-danger">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="optionKProblem" id="optionKProblemYes" value="Yes" onclick="setIllnessYes('KProblem')"> Yes 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 col-sm-2">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="optionKProblem" id="optionKProblemNo" value="No" checked="true" onclick="setIllnessNo('KProblem')"> No 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-5">
                                                    <input type="text" class="form-control" id="R_KProblem" name="R_KProblems" placeholder="Relationship" onclick="setIllnessYes('KProblem')">
                                                </div> 
                                                <div class="col-md-2 col-sm-3 mb-2">
                                                    <div class="form-check">
                                                        <label class="form-check-label" name="illnessmental" id="illnessmental"> Mental Disorder 
                                                            
                                                        </label>
                                                        <input class="form-check-label" name="illnessmental" id="illnessmental" type = "text" value = "Mental Disorder" hidden>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 col-sm-2">
                                                    <div class="form-check form-check-danger">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="optionMDisorder" id="optionMDisorderYes" value="Yes" onclick="setIllnessYes('MDisorder')"> Yes
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 col-sm-2">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="optionMDisorder" id="optionMDisorderNo" value="No" checked="true" onclick="setIllnessNo('MDisorder')"> No 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-5">
                                                    <input type="text" class="form-control" id="R_MDisorder" name="R_MDisorder" placeholder="Relationship" onclick="setIllnessYes('MDisorder')">
                                                </div>
                                                <div class="col-md-2 col-sm-3">
                                                    <div class="form-check">
                                                        <label class="form-check-label"  >  Bleeding Tendencies 
                                                            
                                                        </label>
                                                        <input class="form-check-label" name="illnessBleding" id="illnessBleding" type="text" value="Bleeding Tendencies" hidden>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 col-sm-2">
                                                    <div class="form-check form-check-danger">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="optionBTendencies" id="optionBTendenciesYes" value="Yes" onclick="setIllnessYes('BTendencies')"> Yes 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 col-sm-2">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="optionBTendencies" id="optionBTendenciesNo" value="No" checked="true" onclick="setIllnessNo('BTendencies')"> No 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-5">
                                                    <input type="text" class="form-control" id="R_BTendencies" name="R_BTendencies" placeholder="Relationship" onclick="setIllnessYes('BTendencies')">
                                                </div>
                                                <div class="col-md-2 col-sm-3">
                                                    <div class="form-check">
                                                        <label class="form-check-label" > Gastrointestinal Disease 
                                                            
                                                        </label>
                                                        <input class="form-check-label" name="illnessgastro" id="illnessgastro" type="text" value=" Gastrointestinal Disease " hidden>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 col-sm-2">
                                                    <div class="form-check form-check-danger">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="optionGDisease" id="optionGDiseaseYes" value="Yes" onclick="setIllnessYes('GDisease')"> Yes 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 col-sm-2">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="optionGDisease" id="optionGDiseaseNo" value="No" checked="true" onclick="setIllnessNo('GDisease')"> No 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-5">
                                                    <input type="text" class="form-control" name="R_GDisease"  id="R_GDisease" placeholder="Relationship" onclick="setIllnessYes('GDisease')">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title"> Personal History <i class=" icon-people float-left"></i></h4>
                                            <p class="card-description"> Please check if you had the following symptoms or illness.</p>
                                            <label>  PAST ILLNESS(Mga Naging Sakit)
                                                
                                            </label>
                                            <div class="form-group row">
                                                <div class="col-md-3 col-sm-3">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" id="c_primaryComplex" name="c_primaryComplex" value="Primary Complex"> Primary Complex 
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" id="c_kidneyDisease" name="c_kidneyDisease" value="Kidney Disease" > Kidney Disease 
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" id="c_pneumonia" name="c_pneumonia" value="Pneumonia"> Pneumonia 
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" id="c_earProblems" name="c_earProblems" value="Ear Problems"> Ear Problems
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" id="c_mentalDisorder" name="c_mentalDisorder" value="Mental Disorder"> Mental Disorder 
                                                        </label>
                                                    </div>  
                                                </div>
                                                <div class="col-md-3 col-sm-3">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" id="c_asthma" name="c_asthma" value="Asthma"> Asthma 
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" id="c_skinProblem" name="c_skinProblem" value="Skin Problem"> Skin Problem 
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" id="c_dengue" name="c_dengue" value="Dengue"> Dengue 
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" id="c_mumps" name="c_mumps" value="Mumps"> Mumps 
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" id="c_typhoidFever" name="c_typhoidFever" value="Typhoid Fever"> Typhoid Fever 
                                                        </label>
                                                    </div>  
                                                </div>
                                                <div class="col-md-3 col-sm-3">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" id="c_rheumaticFever" name="c_rheumaticFever" value="Rheumatic Fever"> Rheumatic Fever 
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" id="c_diabetes" name="c_diabetes" value="Diabetes"> Diabetes 
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" id="c_measles" name="c_measles" value="Measles"> Measles 
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" id="c_thyroidDisorder" name="c_thyroidDisorder" value="Thyroid Disorder"> Thyroid Disorder 
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" id="c_hepatitis" name="c_hepatitis" value="Hepatitis"> Hepatitis 
                                                        </label>
                                                    </div>  
                                                </div>
                                                <div class="col-md-3 col-sm-3">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" id="c_chickenPox" name="c_chickenPox" value="Chicken Pox"> Chicken Pox 
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" id="c_eyeDisorder" name="c_eyeDisorder" value="Eye Disorder"> Eye Disorder 
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" id="c_poliomyElitis" name="c_poliomyElitis" value="Poliomy Elitis"> Poliomy Elitis 
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" id="c_heartDisease" name="c_heartDisease" value="Heart Disease"> Heart Disease 
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" id="c_anemia" name="c_anemia" value="Anemia/Leukemia"> Anemia/Leukemia 
                                                        </label>
                                                    </div>  
                                                </div>   
                                            </div>
                                            <label>  PRESENT ILLNESS (Mga Sintomas na Nararamdaman)
                                                
                                            </label>
                                            <div class="form-group row">
                                                <div class="col-md-3 col-sm-3">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" id="c_chestPain" name="c_chestPain" value="Chest Pain"> Chest Pain 
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" id="c_indigestion" name="c_indigestion" value="Indigestion"> Indigestion 
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" id="c_swollenFeet" name="c_swollenFeet" value="Swollen Feet"> Swollen Feet 
                                                        </label>
                                                    </div> 
                                                </div>
                                                <div class="col-md-3 col-sm-3">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" id="c_headaches" name="c_headaches" value="Headaches"> Headaches 
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" id="c_soreThroat" name="c_soreThroat" value="Sore Throat"> Sore Throat (Frequent) 
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" id="c_dizziness" name="c_dizziness" value="Dizziness"> Dizziness 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-3">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" id="c_nausea" name="c_nausea" value="Nausea/Vomiting"> Nausea/Vomiting 
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" id="c_difficultBreathing" name="c_difficultBreathing" value="Difficult Breathing"> Difficult Breathing 
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" id="c_weightLoss" name="c_weightLoss" value="Weight Loss"> Weight Loss 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-3">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" id="c_insomia" name="c_insomia" value="Insomia"> Insomia 
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" id="c_jointPains" name="c_jointPains" value="Joint Pains"> Joint Pains 
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" id="c_frequentUrination" name="c_frequentUrination" value="Frequent Urination"> Frequent Urination 
                                                        </label>
                                                    </div> 
                                                </div>   
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title"> Immunization History <i class=" icon-chemistry float-left"></i></h4>
                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" id="I_BCG" name="I_BCG"> BCG 
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" id="I_CPox" name="I_CPox"> Chicken Pox 
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" id="I_AHepa" name="I_AHepa"> Hepatitis A 
                                                        </label>
                                                    </div> 
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" id="I_BHepa" name="I_BHepa"> Hepatitis B 
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" id="I_Mumps" name="I_Mumps"> Mumps 
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" id="I_Measles" name="I_Measles"> Measles 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" id="I_Typhoid" name="I_Typhoid" > Typhoid 
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" id="I_GMeasle" name="I_GMeasle"> German Measle 
                                                        </label>
                                                    </div>  
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" id="I_Polio" name="I_Polio"> Polio Vaccine I, II, III, Booster Doses 
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" id="I_DPT" name="I_DPT"> DPT I, II, III, Booster Doses 
                                                        </label>
                                                    </div> 
                                                </div>
                                                <div class="col-md-5">
                                                    <input type="text" class="form-control" id="txt_IHistory" name="txt_IHistory"  placeholder="Other">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <div class="col-md-12 row">  
                                                    <div class="col-md-5">
                                                        <p>Do you have history of hospitalization for serious illness, operation, fracture or injury?</p>
                                                    </div>
                                                    <div class="col-md-1 col-sm-2">
                                                        <div class="form-check form-check-danger">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" name="Question1" id="Question1Yes" value="Yes" onclick="setYes('Question1')"> Yes 
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1 col-sm-2 ">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" name="Question1" id="Question1No" value="No" checked="true" onclick="setNo('Question1')"> No 
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5 mb-3">
                                                        <input type="text" class="form-control" id="txt_Question1" name="txt_Question1" placeholder="If yes, please give details" onclick="setYes('Question1')">
                                                    </div>
                                                    <div class="col-md-5">
                                                        <p>Are you taking medicine regularly?</p>
                                                    </div>
                                                    <div class="col-md-1 col-sm-2">
                                                        <div class="form-check form-check-danger">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" name="Question2" id="Question2Yes" value="Yes" onclick="setYes('Question2')"> Yes 
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1 col-sm-2">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" name="Question2" id="Question2No" value="No" checked="true" onclick="setNo('Question2')"> No 
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5 mb-3">
                                                        <input type="text" class="form-control" id="txt_Question2" name="txt_Question2" placeholder="If yes, name of drug/s"  onclick="setYes('Question2')">
                                                    </div> 
                                                    <div class="col-md-5">
                                                        <p>Are you allergic to any food or medicine? (ex. Penicilin, Aspirin, shrimp, chicken, etc.</p>
                                                    </div>
                                                    <div class="col-md-1 col-sm-2">
                                                        <div class="form-check form-check-danger">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" name="Question3" id="Question3Yes" value="Yes" onclick="setYes('Question3')"> Yes 
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1 col-sm-2">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" name="Question3" id="Question3No" value="No" checked="true" onclick="setNo('Question3')"> No 
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <input type="text" class="form-control" id="txt_Question3"  name="txt_Question3" placeholder="If yes, specify"  onclick="setYes('Question3')">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                                <div class="float-right card-body">
                                <input type="submit" class="btn btn-primary" name="submit">
                                    <!--<button type="submit" class="btn btn-primary" name="submit">Submit</button>-->
                                    <button class="btn btn-dark" id="cancel">Cancel</button>
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
       <script>

        function getCollege(selectObject){
            var college = selectObject.value; 
            var result;
            var list = document.getElementById("S_Department");
            var optionVal = list.options[list.selectedIndex].text;
            const Http = new XMLHttpRequest();
            Http.open("GET", "../../saverecords/sql.php?query=select * from tbl_college where colleges = '" + optionVal + "'");
            Http.send();
            Http.onreadystatechange = function(){
                if(this.readyState==4 && this.status==200){
                    result = JSON.parse(Http.responseText);
                    var i=0;
                    $('#S_Course')
                    .find('option')
                    .remove()
                    .end()
                    .append('<option selected disabled value="">Course</option>')
                    ;
                        for(i=0;i<result.length;i++){
                            $('#S_Course')
                            .find('option')
                            .end()
                            .append('<option>'+result[i].courses+'</option>')
                            ;
                        }
                    }
                    
                }
            }
            
            function getRegion(){
                var result;
                var list = document.getElementById("S_Region");
                var optionVal = list.options[list.selectedIndex].id;
                const Http = new XMLHttpRequest();
                Http.open("GET", "../../saverecords/sql.php?query=select * from refProvince where regCode = '" + optionVal + "'");
                Http.send();
                Http.onreadystatechange = function(){
                    if(this.readyState==4 && this.status==200){
                        result = JSON.parse(Http.responseText);
                        var i=0;
                        $('#S_Province')
                            .find('option')
                            .remove()
                            .end()
                            .append('<option selected disabled  value="">Province</option>')
                        ;
                        $('#S_City')
                            .find('option')
                            .remove()
                            .end()
                            .append('<option selected disabled  value="">City/Municipality</option>')
                        ;
                        $('#S_Baranggay')
                            .find('option')
                            .remove()
                            .end()
                            .append('<option selected disabled  value="">Baranggay</option>')
                        ;  
                        for(i=0;i<result.length;i++){
                            $('#S_Province')
                            .find('option')
                            .end()
                            .append('<option  id = '+result[i].provCode+'>'+result[i].provDesc+'</option>')
                            ;
                        }
                    }
                    
                }
                
                
            }
            
            function getProvince(){
                  
                var result;
                var list = document.getElementById("S_Province");
                var optionVal = list.options[list.selectedIndex].id;
                const Http = new XMLHttpRequest();
                Http.open("GET", "../../saverecords/sql.php?query=select * from refcitymun where provcode = '" + optionVal + "'");
                Http.send();
                Http.onreadystatechange = function(){
                    if(this.readyState==4 && this.status==200){
                        result = JSON.parse(Http.responseText);
                        var i=0;
                        $('#S_City')
                            .find('option')
                            .remove()
                            .end()
                            .append('<option selected disabled  value="">City/Municipality</option>')
                        ;
                        $('#S_Baranggay')
                            .find('option')
                            .remove()
                            .end()
                            .append('<option selected disabled  value="">Baranggay</option>')
                        ; 
                        for(i=0;i<result.length;i++){
                            $('#S_City')
                            .find('option')
                            .end()
                            .append('<option id = '+result[i].citymunCode+'>'+result[i].citymunDesc+'</option>')
                            ;
                        }
                    }
                    
                }
                
                
            } 
            
            function getCity(){
                var result;
                var list = document.getElementById("S_City");
                var optionVal = list.options[list.selectedIndex].id;
                const Http = new XMLHttpRequest();
                Http.open("GET", "../../saverecords/sql.php?query=select * from refbrgy where citymuncode = '" + optionVal + "'");
                Http.send();
                Http.onreadystatechange = function(){
                    if(this.readyState==4 && this.status==200){
                        result = JSON.parse(Http.responseText);
                        var i=0;
                        $('#S_Baranggay')
                            .find('option')
                            .remove()
                            .end()
                            .append('<option selected disabled  value="">Baranggay</option>')
                        ;  
                        for(i=0;i<result.length;i++){
                            $('#S_Baranggay')
                            .find('option')
                            .end()
                            .append('<option id = '+result[i].brgyCode+'>'+result[i].brgyDesc+'</option>')
                            ;
                        }
                    }
                    
                }
                
                
            }
            function setYes(ID_name){
                document.getElementById(ID_name+"Yes").checked= 'true';
                document.getElementById("txt_"+ID_name).required=true;
                document.getElementById("txt_"+ID_name).readOnly=false;
            }
            function setNo(ID_name){
                document.getElementById(ID_name+"No").checked= 'true';
                document.getElementById("txt_"+ID_name).required=false;
                document.getElementById("txt_"+ID_name).readOnly=true;
            }

            function setIllnessYes(ID_name){
                document.getElementById("option"+ID_name+"Yes").checked= 'true';
                document.getElementById("R_"+ID_name).required=true;
                document.getElementById("R_"+ID_name).readOnly=false;
            }
            function setIllnessNo(ID_name){
                document.getElementById("option"+ID_name+"No").checked= 'true';
                document.getElementById("R_"+ID_name).required=false;
                document.getElementById("R_"+ID_name).readOnly=true;
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