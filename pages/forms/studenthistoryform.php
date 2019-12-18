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
<link rel="stylesheet" href="../../css/style.css" ><!-- End layout styles -->
<link rel="shortcut icon" href="../../images/logo.png" />
</head>
<body>
<div class="container-scroller">
<!-- partial:../../partials/_navbar.html -->
<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
<div class="navbar-brand-wrapper d-flex align-items-center">
<a class="navbar-brand brand-logo" href="../../index.php">
<img src="../../images/ddh.png" alt="logo" class="logo-dark" width="100%"/>
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
<li class="nav-item"> <a class="nav-link" href="employeeform.php">Employee Form</a></li>
<li class="nav-item"> <a class="nav-link" href="dailyconsultation.php">Daily Consultant Form</a></li>
<li class="nav-item"> <a class="nav-link" href="medicationform.php">Medication Form</a></li>
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
<div class="col-md-6 col-sm-12 mb-2">
<div class="input-group mb-2">
	<span class="input-group-text">First Name</span>
	<input type="text" class="form-control"  name="S_Fname" readonly>
</div>
<div class="input-group mb-2">
	<span class="input-group-text">Middle Name</span>
	<input type="text" class="form-control" name="S_Mname" readonly>
</div>
<div class="input-group mb-2">
	<span class="input-group-text">Last Name</span>
	<input type="text" class="form-control"  name="S_Lname" readonly>
</div>
</div>

<div class="col-md-3 col-sm-12 mb-2">
<div class="input-group mb-2">
	<span class="input-group-text">Birthday</span>
	<input type="text" class="form-control" name="S_Bdate" readonly>
</div>
<div class="input-group mb-2">
	<span class="input-group-text">Age</span>
	<input type="number" class="form-control"  name="S_Age" readonly>
</div>
<div class="input-group mb-2">
	<span class="input-group-text">Sex</span>
	<input type="text" class="form-control" name="S_Gender" readonly>
</div>
</div> 

<div class="col-md-3 col-sm-12">
<div class="input-group mb-2">
	<span class="input-group-text">Contact</span>
	<input type="text" class="form-control" name="S_Cnumber" readonly>
</div>
<div class="input-group mb-2">
	<span class="input-group-text">Civil Status</span>
	<input type="text" class="form-control" name="S_Status" readonly>
</div>
<div class="input-group">
	<span class="input-group-text">Religion</span>
	<input type="text" class="form-control"  name="S_Religion" readonly>
</div>
</div>

<div class="col-md-3 col-sm-12 mb-2">
<div class="input-group">
	<span class="input-group-text">Student ID #</span>
	<input type="text" class="form-control" name="S_Id" readonly>
</div>
</div>

<div class="col-md-3 col-sm-12 mb-2">
<div class="input-group mb-2">
	<span class="input-group-text">College</span>
	<input type="text" class="form-control" name="S_Dpartment" id="S_Dpartment" readonly>
</div>
</div>

<div class="col-md-3 col-sm-12 mb-2">
<div class="input-group mb-2">
	<span class="input-group-text">Course</span>
	<input type="text" class="form-control" name="S_Courses" id="S_Course" readonly>
</div>
</div>

<div class="col-md-3 col-sm-12 mb-2">
<div class="input-group">
	<span class="input-group-text">Year Level</span>
	<input type="text" class="form-control" name="S_YearLevel" id="S_YearLevel" readonly>
</div>
</div>

<div class="col-md-4 col-sm-12">
<div class="input-group">
	<span class="input-group-text">Street</span>
	<input type="text" class="form-control" name="S_SNumber" readonly>
</div>
</div>

<div class="col-md-4 col-sm-12  mb-2">
<div class="input-group">
	<span class="input-group-text">Baranggay</span>
	<input type="text" class="form-control" name="S_Baranggay" id="S_Baranggay" readonly>
</div>
</div>

<div class="col-md-4 col-sm-12 mb-2">
<div class="input-group">
	<span class="input-group-text">City</span>
	<input type="text" class="form-control" name="S_City" id="S_City" readonly>
</div>
</div>

<div class="col-md-6 col-sm-12 mb-2">
<div class="input-group">
	<span class="input-group-text">Province</span>
	<input type="text" class="form-control" name="S_Province" id="S_Province" readonly>
</div>
</div>

<div class="col-md-6 col-sm-12 mb-2" >
<div class="input-group">
	<span class="input-group-text">Region</span>
	<input type="text" class="form-control" name="S_Region" id="S_Region" readonly>
</div>
</div
</div>
</div>
</div>
</div>
<br>
<div class="row">
<div class="col-md-4 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Father's Information <i class="icon-user float-left"></i></h4>
<div class="form-group row">
<div class="col-md-12 col-sm-12 mb-2">
<div class="input-group mb-2">
	<span class="input-group-text">First Name</span>
	<input type="text" class="form-control" id="F_FName" name="F_FName" readonly>
</div>
</div>
<div class="col-md-12 col-sm-12 mb-2">
<div class="input-group mb-2">
	<span class="input-group-text">Middle Name</span>
	<input type="text" class="form-control" id="F_MName" name="F_MName" readonly>
</div>
</div>
<div class="col-md-12 col-sm-12 mb-2">
<div class="input-group mb-2">
	<span class="input-group-text">Last Name</span>
	<input type="text" class="form-control" id="F_LName" name="F_LName" readonly>
</div>
</div>
<div class="col-md-12 col-sm-12 mb-2">
<div class="input-group mb-2">
	<span class="input-group-text">Address</span>
	<input type="text" class="form-control" id="F_Address" name="F_Address" readonly>
</div>
</div>
<div class="col-md-12 col-sm-12 mb-2">
<div class="input-group mb-2">
	<span class="input-group-text">Occupation</span>
	<input type="text" class="form-control" id="F_Occupation" name="F_Occupation" readonly>
</div>
</div>
<div class="col-md-12 col-sm-12">
<div class="input-group mb-2">
	<span class="input-group-text">Contact</span>
	<input type="text" class="form-control" id="F_CNumber" name="F_CNumber" readonly>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col-md-4 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Mother's Information <i class=" icon-user-female float-left"></i></h4>
<div class="form-group row">
<div class="col-md-12 col-sm-12 mb-2">
<div class="input-group mb-2">
	<span class="input-group-text">First Name</span>
	<input type="text" class="form-control" id="M_FName" name="M_FName" readonly>
</div>
</div>
<div class="col-md-12 col-sm-12 mb-2">
<div class="input-group mb-2">
	<span class="input-group-text">Middle Name</span>
	<input type="text" class="form-control" id="M_MName" name="M_MName" readonly>
</div>
</div>
<div class="col-md-12 col-sm-12 mb-2">
<div class="input-group mb-2">
	<span class="input-group-text">Last Name</span>
	<input type="text" class="form-control" id="M_LName" name="M_LName" readonly>
</div>
</div>
<div class="col-md-12 col-sm-12 mb-2">
<div class="input-group mb-2">
	<span class="input-group-text">Address</span>
	<input type="text" class="form-control" id="M_Address" name="M_Address" readonly>
</div>
</div>
<div class="col-md-12 col-sm-12 mb-2">
<div class="input-group mb-2">
	<span class="input-group-text">Occupation</span>
	<input type="text" class="form-control" id="M_Occupation" name="M_Occupation" readonly>
</div>
</div>
<div class="col-md-12 col-sm-12">
<div class="input-group mb-2">
	<span class="input-group-text">Contact</span>
	<input type="text" class="form-control" id="M_CNumber" name="M_CNumber" readonly>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col-md-4 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Guardian's Information <i class="icon-user-follow float-left"></i></h4>
<div class="form-group row">
<div class="col-md-12 col-sm-12 mb-2">
<div class="input-group mb-2">
	<span class="input-group-text">First Name</span>
	<input type="text" class="form-control" id="G_FName" name="G_FName" readonly>
</div>
</div>
<div class="col-md-12 col-sm-12 mb-2">
<div class="input-group mb-2">
	<span class="input-group-text">Middle Name</span>
	<input type="text" class="form-control" id="G_MName" name="G_MName" readonly>
</div>
</div>
<div class="col-md-12 col-sm-12 mb-2">
<div class="input-group mb-2">
	<span class="input-group-text">Last Name</span>
	<input type="text" class="form-control" id="G_LName" name="G_LName" readonly>
</div>
</div>
<div class="col-md-12 col-sm-12 mb-2">
<div class="input-group mb-2">
	<span class="input-group-text">Address</span>
	<input type="text" class="form-control" id="G_Address" name="G_Address" readonly>
</div>
</div>
<div class="col-md-12 col-sm-12 mb-2">
<div class="input-group mb-2">
	<span class="input-group-text">Occupation</span>
	<input type="text" class="form-control" id="G_Occupation" name="G_Occupation" readonly>
</div>
</div>
<div class="col-md-12 col-sm-12">
<div class="input-group mb-2">
	<span class="input-group-text">Contact</span>
	<input type="text" class="form-control" id="G_CNumber" name="G_CNumber" readonly>
</div>
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
<div class="form-group row">
<table class="table table-hover">
                      <thead>
                        <tr>
                          <th class="font-weight-bold">Illness</th>
                          <th class="font-weight-bold">Answer</th>
                          <th class="font-weight-bold">Relationship</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Cancer</td>
                          <td class="text-success">No</td>
                          <td>N/A</td>
                        </tr>
                        <tr>
                          <td>Diabetes</td>
                          <td class="text-success">No</td>
                          <td>N/A</td>
                        </tr>
                      </tbody>
                    </table>
</div>
</div>
</div>
</div>
<div class="col-md-12 grid-margin stretch-card">
<div class="card">
<div class="card-body row">
<h4 class="card-title col-md-12"> Personal History <i class=" icon-people float-left"></i></h4>
<div class="form-group col-md-6">
	<label>  PAST ILLNESS(Mga Naging Sakit)</label>
	<table class="table table-hover">
                      <thead>
                        <tr>
                          <th class="font-weight-bold">Illness</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Laziness</td>
                        </tr>
                        <tr>
                          <td>Sleepy</td>
                        </tr>
                      </tbody>
    </table>
</div>
<div class="form-group col-md-6">
<label>  PRESENT ILLNESS (Mga Sintomas na Nararamdaman)</label>
<table class="table table-hover">
                      <thead>
                        <tr>
                          <th class="font-weight-bold">Illness</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Laziness</td>
                        </tr>
                        <tr>
                          <td>Sleepy</td>
                        </tr>
                      </tbody>
                    </table>
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
<input type="checkbox" class="form-check-input" id=""> BCG </label>
</div>
<div class="form-check">
<label class="form-check-label">
<input type="checkbox" class="form-check-input" id=""> Chicken Pox </label>
</div>
<div class="form-check">
<label class="form-check-label">
<input type="checkbox" class="form-check-input" id=""> Hepatitis A </label>
</div> 
</div>
<div class="col-md-3">
<div class="form-check">
<label class="form-check-label">
<input type="checkbox" class="form-check-input" id=""> Hepatitis B </label>
</div>
<div class="form-check">
<label class="form-check-label">
<input type="checkbox" class="form-check-input" id=""> Mumps </label>
</div>
<div class="form-check">
<label class="form-check-label">
<input type="checkbox" class="form-check-input" id=""> Measles </label>
</div>
</div>
<div class="col-md-3">
<div class="form-check">
<label class="form-check-label">
<input type="checkbox" class="form-check-input" id=""> Typhoid </label>
</div>
<div class="form-check">
<label class="form-check-label">
<input type="checkbox" class="form-check-input" id=""> German Measle </label>
</div>  
</div>
<div class="col-md-3">
<div class="form-check">
<label class="form-check-label">
<input type="checkbox" class="form-check-input" id=""> Polio Vaccine I, II, III, Booster Doses </label>
</div>
<div class="form-check">
<label class="form-check-label">
<input type="checkbox" class="form-check-input" id=""> DPT I, II, III, Booster Doses </label>
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
<input type="radio" class="form-check-input" name="Question1" id="Question1" value="Yes"> Yes </label>
</div>
</div>
<div class="col-md-1 col-sm-2 ">
<div class="form-check">
<label class="form-check-label">
<input type="radio" class="form-check-input" name="Question1" id="Question1" value="No"> No </label>
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
<input type="radio" class="form-check-input" name="Question2" id="Question2" value="Yes"> Yes </label>
</div>
</div>
<div class="col-md-1 col-sm-2">
<div class="form-check">
<label class="form-check-label">
<input type="radio" class="form-check-input" name="Question2" id="Question2" value="No"> No </label>
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
<input type="radio" class="form-check-input" name="Question3" id="Question3" value="Yes"> Yes </label>
</div>
</div>
<div class="col-md-1 col-sm-2">
<div class="form-check">
<label class="form-check-label">
<input type="radio" class="form-check-input" name="Question3" id="Question3" value="No"> No </label>
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
<!--get college combo box-->
<script >
function getCollege(selectObject){
  $('#S_Course')
  .find('option')
  .remove()
  ;
  var college = selectObject.value; 
  var result;
  var list = document.getElementById("S_Dpartment");
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
  $('#S_Province')
  .find('option')
  .remove()
  ;
  $('#S_City')
  .find('option')
  .remove()
  ;
  $('#S_Baranggay')
  .find('option')
  .remove()
  ;   
  var result;
  var list = document.getElementById("S_Region");
  var optionVal = list.options[list.selectedIndex].value;
  const Http = new XMLHttpRequest();
  Http.open("GET", "../../saverecords/sql.php?query=select * from refProvince where regCode = '" + optionVal + "'");
  Http.send();
  Http.onreadystatechange = function(){
    if(this.readyState==4 && this.status==200){
      result = JSON.parse(Http.responseText);
      var i=0;
      for(i=0;i<result.length;i++){
        $('#S_Province')
        .find('option')
        .end()
        .append('<option  value = '+result[i].provCode+'>'+result[i].provDesc+'</option>')
        ;
      }
    }
    
  }
  
  
}

function getProvince(){
  $('#S_City')
  .find('option')
  .remove();
  ;
  $('#S_Baranggay')
  .find('option')
  .remove();
  ;   
  var result;
  var list = document.getElementById("S_Province");
  var optionVal = list.options[list.selectedIndex].value;
  const Http = new XMLHttpRequest();
  Http.open("GET", "../../saverecords/sql.php?query=select * from refcitymun where provcode = '" + optionVal + "'");
  Http.send();
  Http.onreadystatechange = function(){
    if(this.readyState==4 && this.status==200){
      result = JSON.parse(Http.responseText);
      var i=0;
      for(i=0;i<result.length;i++){
        $('#S_City')
        .find('option')
        .end()
        .append('<option  value = '+result[i].citymunCode+'>'+result[i].citymunDesc+'</option>')
        ;
      }
    }
    
  }
  
  
} 

function getCity(){
  $('#S_Baranggay')
  .find('option')
  .remove();
  ;   
  var result;
  var list = document.getElementById("S_City");
  var optionVal = list.options[list.selectedIndex].value;
  const Http = new XMLHttpRequest();
  Http.open("GET", "../../saverecords/sql.php?query=select * from refbrgy where citymuncode = '" + optionVal + "'");
  Http.send();
  Http.onreadystatechange = function(){
    if(this.readyState==4 && this.status==200){
      result = JSON.parse(Http.responseText);
      var i=0;
      for(i=0;i<result.length;i++){
        $('#S_Baranggay')
        .find('option')
        .end()
        .append('<option value = '+result[i].brgycode+'>'+result[i].brgyDesc+'</option>')
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