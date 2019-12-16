<?php
session_start();
if(!isset($_SESSION['buhs_user'])) header("location: login.php");
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
    <link rel="shortcut icon" href="../../images/favicon.png" />
</head>
<body>
    <div class="container-scroller">
        <!-- partial:../../partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex align-items-center">
                <a class="navbar-brand brand-logo" href="../../index.php">
                    <img src="../../images/logo.svg" alt="logo" class="logo-dark" />
                </a>
                <a class="navbar-brand brand-logo-mini" href="../../index.php"><img src="../../images/logo-mini.svg" alt="logo" /></a>
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
                                <img class="img-xs rounded-circle" src="../../images/faces/face8.jpg" alt="profile image">
                                <div class="dot-indicator bg-success"></div>
                            </div>
                            <div class="text-wrapper">
                                <p class="profile-name"><?php echo $_SESSION['Fname']." ";echo $_SESSION['Lname'];?></p>
                                <p class="designation">Administrator</p>
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
                        <a class="nav-link" href="../../index.php">
                            <span class="menu-title">Dashboard</span>
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
                                <li class="nav-item"> <a class="nav-link" href="employeeform.php">Employee Form</a></li>
                                <li class="nav-item"> <a class="nav-link" href="dailyconsultation.php">Daily Consultant Form</a></li>
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
                        <h2> STUDENT HEALTH RECORD <i class="icon-note float-left"></i> </h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="studenthealthform.php">Student Form</a></li>
                                <li class="breadcrumb-item"><a href="employeeform.php">Employee Form</a></li>  
                                <li class="breadcrumb-item"><a href="dailyconsultation.php">Daily Consultation Form</a></li>  
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
                                                <input type="text" class="form-control mb-2"  name="S_Fname" placeholder="First Name">
                                                <input type="text" class="form-control mb-2" name="S_Mname" placeholder="Middle Name">
                                                <input type="text" class="form-control"  name="S_Lname" placeholder="Last Name">
                                            </div>
                                            <div class="col-md-3 col-sm-12 mb-2">
                                                <input type="text" class="form-control mb-2" name="S_Bdate" placeholder="Birth Date" onfocus="this.type='date'">
                                                <input type="number" class="form-control mb-2"  name="S_Age" placeholder="Age">
                                                <select class="form-control" name="S_Gender">
                                                    <option selected disabled>Sex</option>
                                                    <option>Male</option>
                                                    <option>Female</option>
                                                </select>
                                            </div> 
                                            <div class="col-md-2 col-sm-12 mb-2">
                                                <input type="text" class="form-control mb-2" name="S_Cnumber" placeholder="Contact Number">
                                                <select class="form-control mb-2" name="S_Status">
                                                    <option selected disabled>Civil Status</option>
                                                    <option>Single</option>
                                                    <option>Married</option>
                                                    <option>Widowed</option>
                                                    <option>Divorced</option>
                                                </select>
                                                <input type="text" class="form-control"  name="S_Religion" placeholder="Religion">
                                            </div>
                                            <div class="col-md-3 col-sm-12 mb-2">
                                                <input type="text" class="form-control" id ="S_Id" name="S_Id" placeholder="Student ID #">
                                            </div>
                                            
                                            <div class="col-md-3 col-sm-12 mb-2">
                                                <select class="form-control" name="S_Department" id="S_Department" onchange="getCollege(this)">
                                                    
                                                    <option selected disabled>College/Department</option>
                                                    <?php 
                                                    $sql = "select * from tbl_college";
                                                    $res = mysqli_query($conn,$sql);
                                                    $x=0;
                                                    while($list = mysqli_fetch_assoc($res)){
                                                        $col[$x] = $list['colleges'];
                                                        $x++;
                                                    }
                                                    for($i=0;$i<=$x;$i++){
                                                        if(($col[$i]!=$col[$i-1])&&$col[$i]!=null){
                                                            echo "<option >".$col[$i]."</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select> 
                                            </div>
                                            
                                            
                                            <div class="col-md-3 col-sm-12 mb-2">
                                                <select class="form-control" name="S_Course" id="S_Course">
                                                    <option selected disabled>Course</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3 col-sm-12 mb-2">
                                                <select class="form-control" name="S_YearLevel" id="S_YearLevel">
                                                    <option selected disabled>Year Level</option>
                                                    <option selected >1st Year</option>
                                                    <option selected >2nd Year</option>
                                                    <option selected >3rd Yeer</option>
                                                    <option selected >4th Year</option>
                                                    <option selected >5th Year</option>
                                                </select>
                                            </div>
                                            
                                            
                                            
                                            <div class="col-md-2 col-sm-12 mb-2" >
                                                <select  class="form-control" name="S_Region" id="S_Region" onchange="getRegion()">
                                                    <option selected disabled>Region</option>
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
                                                <select  class="form-control" name="S_Province" id="S_Province" onchange="getProvince()">
                                                    <option selected disabled>Province</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2 col-sm-12 mb-2">
                                                <select  class="form-control" name="S_City" id="S_City" onchange="getCity()">
                                                    <option selected disabled>City/Municipality</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2 col-sm-12  mb-2">
                                                <select  class="form-control" name="S_Baranggay" id="S_Baranggay">
                                                    <option selected disabled>Baranggay</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <input type="text" class="form-control" name="S_Street" placeholder="Street #">
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
                                                        <label class="form-check-label"><input type="radio" class="form-check-input" name="optionCancer" id="optionCancer" value="Yes"> Yes 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 col-sm-2">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="optionCancer" id="optionCancer" value="No"> No 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-5">
                                                    <input type="text" class="form-control" id="R_Cancer" name="R_Cancer" placeholder="Relationship">
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
                                                            <input type="radio" class="form-check-input" name="optionHypertension" id="optionHypertension" value="Yes"> Yes 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 col-sm-2">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="optionHypertension" id="optionHypertension" value="No"> No 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-5">
                                                    <input type="text" class="form-control" id="R_Hypertension" name="R_Hypertension" placeholder="Relationship">
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
                                                            <input type="radio" class="form-check-input" name="optionStroke" id="optionStroke" value="Yes"> Yes 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 col-sm-2">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="optionStroke" id="optionStroke" value="No"> No 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-5">
                                                    <input type="text" class="form-control" id="R_Stroke" name="R_Stroke" placeholder="Relationship">
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
                                                            <input type="radio" class="form-check-input" name="optionTuberculosis" id="optionTuberculosis" value="Yes"> Yes 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 col-sm-2">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="optionTuberculosis" id="optionTuberculosis" value="No"> No 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-5">
                                                    <input type="text" class="form-control" id="R_Tuberculosis" name="R_Tuberculosis" placeholder="Relationship">
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
                                                            <input type="radio" class="form-check-input" name="optionRheumatism" id="optionRheumatism" value="Yes"> Yes 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 col-sm-2">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="optionRheumatism" id="optionRheumatism" value="No"> No 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-5">
                                                    <input type="text" class="form-control" id="R_Rheumatism" name="R_Rheumatism" placeholder="Relationship">
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
                                                            <input type="radio" class="form-check-input" name="optionEDisorder" id="optionEDisorder" value="Yes"> Yes 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 col-sm-2">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="optionEDisorder" id="optionEDisorder" value="No"> No 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-5">
                                                    <input type="text" class="form-control" id="R_EDisorder" name="R_EDisorder" placeholder="Relationship">
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
                                                            <input type="radio" class="form-check-input" name="optionDiabetes" id="optionDiabetes" value="Yes"> Yes 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 col-sm-2">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="optionDiabetes" id="optionDiabetes" value="No"> No 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-5">
                                                    <input type="text" class="form-control" id="R_Diabetes" name="R_Diabetes" placeholder="Relationship">
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
                                                            <input type="radio" class="form-check-input" name="optionAsthma" id="optionAsthma" value="Yes"> Yes 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 col-sm-2">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="optionAsthma" id="optionAsthma" value="No"> No 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-5">
                                                    <input type="text" class="form-control" id="R_Asthma" name="R_Asthma" placeholder="Relationship">
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
                                                            <input type="radio" class="form-check-input" name="optionConvulsion" id="optionConvulsion" value="Yes"> Yes 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 col-sm-2">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="optionConvulsion" id="optionConvulsion" value="No"> No 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-5">
                                                    <input type="text" class="form-control" id="R_Convulsion" name="R_Convulsion" placeholder="Relationship">
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
                                                            <input type="radio" class="form-check-input" name="optionSProblems" id="optionSProblems" value="Yes"> Yes 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 col-sm-2">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="optionSProblems" id="optionSProblems" value="No"> No 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-5">
                                                    <input type="text" class="form-control" id="R_SProblems" name="R_SProblems" placeholder="Relationship">
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
                                                            <input type="radio" class="form-check-input" name="optionHDisease" id="optionHDisease" value="Yes"> Yes 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 col-sm-2">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="optionHDisease" id="optionHDisease" value="No"> No 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-5">
                                                    <input type="text" class="form-control" name="R_HDisease" placeholder="Relationship">
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
                                                            <input type="radio" class="form-check-input" name="optionKProblem" id="optionKProblem" value="Yes"> Yes 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 col-sm-2">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="optionKProblem" id="optionKProblem" value="No"> No 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-5">
                                                    <input type="text" class="form-control" name="R_KProblems" placeholder="Relationship">
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
                                                            <input type="radio" class="form-check-input" name="optionMDisorder" id="optionMDisorder" value="Yes"> Yes
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 col-sm-2">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="optionMDisorder" id="optionMDisorder" value="No"> No 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-5">
                                                    <input type="text" class="form-control" name="R_MDisorder" placeholder="Relationship">
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
                                                            <input type="radio" class="form-check-input" name="optionBTendencies" id="optionBTendencies" value="Yes"> Yes 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 col-sm-2">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="optionBTendencies" id="optionBTendencies" value="No"> No 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-5">
                                                    <input type="text" class="form-control" id="R_BTendencies" name="R_BTendencies" placeholder="Relationship">
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
                                                            <input type="radio" class="form-check-input" name="optionGDisease" id="optionGDisease" value="Yes"> Yes 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 col-sm-2">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="optionGDisease" id="optionGDisease" value="No"> No 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-5">
                                                    <input type="text" class="form-control" name="R_GDisease"  id="R_GDisease" placeholder="Relationship">
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
                                                            <input type="checkbox" class="form-check-input" id=""> BCG 
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" id=""> Chicken Pox 
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" id=""> Hepatitis A 
                                                        </label>
                                                    </div> 
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" id=""> Hepatitis B 
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" id=""> Mumps 
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" id=""> Measles 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" id=""> Typhoid 
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" id=""> German Measle 
                                                        </label>
                                                    </div>  
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" id=""> Polio Vaccine I, II, III, Booster Doses 
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" id=""> DPT I, II, III, Booster Doses 
                                                        </label>
                                                    </div> 
                                                </div>
                                                <div class="col-md-5">
                                                    <input type="text" class="form-control" id="txt_IHistory" placeholder="Other">
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
                                                                <input type="radio" class="form-check-input" name="Question1" id="Question1" value="Yes"> Yes 
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1 col-sm-2 ">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" name="Question1" id="Question1" value="No"> No 
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5 mb-3">
                                                        <input type="text" class="form-control" id="txt_Question1" placeholder="If yes, please give details">
                                                    </div>
                                                    <div class="col-md-5">
                                                        <p>Are you taking medicine regularly?</p>
                                                    </div>
                                                    <div class="col-md-1 col-sm-2">
                                                        <div class="form-check form-check-danger">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" name="Question2" id="Question2" value="Yes"> Yes 
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1 col-sm-2">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" name="Question2" id="Question2" value="No"> No 
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5 mb-3">
                                                        <input type="text" class="form-control" id="txt_Question2" placeholder="If yes, name of drug/s">
                                                    </div> 
                                                    <div class="col-md-5">
                                                        <p>Are you allergic to any food or medicine? (ex. Penicilin, Aspirin, shrimp, chicken, etc.</p>
                                                    </div>
                                                    <div class="col-md-1 col-sm-2">
                                                        <div class="form-check form-check-danger">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" name="Question3" id="Question3" value="Yes"> Yes 
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1 col-sm-2">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" name="Question3" id="Question3" value="No"> No 
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <input type="text" class="form-control" id="txt_Question3" placeholder="If yes, specify">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                                <div class="float-right card-body">
                                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
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
                $('#S_Course')
                .find('option')
                .remove()
                ;
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
                            .append('<option selected disabled>Province</option>')
                        ;
                        $('#S_City')
                            .find('option')
                            .remove()
                            .end()
                            .append('<option selected disabled>City/Municipality</option>')
                        ;
                        $('#S_Baranggay')
                            .find('option')
                            .remove()
                            .end()
                            .append('<option selected disabled>Baranggay</option>')
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
                            .append('<option selected disabled>City/Municipality</option>')
                        ;
                        $('#S_Baranggay')
                            .find('option')
                            .remove()
                            .end()
                            .append('<option selected disabled>Baranggay</option>')
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
                            .append('<option selected disabled>Baranggay</option>')
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
    </body>
    </html>