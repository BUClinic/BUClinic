<?php
session_start();
if(!isset($_SESSION['buhs_user'])) header("location: login.php");
    include '../../db_connection.php';
    $conn = OpenCon();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Stellar Admin</title>
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
    <link rel="shortcut icon" href="../../images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex align-items-center">
          <a class="navbar-brand brand-logo" href="../../index.html">
            <img src="../../images/logo.svg" alt="logo" class="logo-dark" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="../../index.html"><img src="../../images/logo-mini.svg" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
         
          <ul class="navbar-nav navbar-nav-right ml-auto">
            <form class="search-form d-none d-md-block" action="#">
              <i class="icon-magnifier"></i>
              <input type="search" class="form-control" placeholder="Search Here" title="Search here">
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
                  <img class="img-xs rounded-circle" src="../../images/faces/face8.jpg" alt="profile image">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                 <p class="profile-name"> <?php echo $_SESSION["Fname"]." ".$_SESSION["Lname"]; ?></p>
                  <p class="designation"><?php echo $_SESSION["position"]; ?></p>
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
              <a class="nav-link" href="../../index.html">
                <span class="menu-title">Dashboard</span>
                <i class="icon-screen-desktop menu-icon"></i>
              </a>
            </li>
            <li class="nav-item nav-category"><span class="nav-link">UI Elements</span></li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Basic UI Elements</span>
                <i class="icon-layers menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/buttons.html">Buttons</a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/typography.html">Typography</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../pages/icons/simple-line-icons.html">
                <span class="menu-title">Icons</span>
                <i class="icon-globe menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../pages/forms/basic_elements.html">
                <span class="menu-title">Form Elements</span>
                <i class="icon-book-open menu-icon"></i>
              </a>
              <div class="collapse" id="forms">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="studenthealthform.php">Student Form</a></li>
                  <li class="nav-item"> <a class="nav-link" href="employeeform.php">Employee Form</a></li>
                  <li class="nav-item"> <a class="nav-link" href="dailyconsultation.php">DailyConsultation Form</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../pages/charts/chartist.html">
                <span class="menu-title">Charts</span>
                <i class="icon-chart menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../pages/tables/basic-table.html">
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
                  <li class="nav-item"> <a class="nav-link" href="../../pages/samples/login.html"> Login </a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/samples/register.html"> Register </a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/samples/error-404.html"> 404 </a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/samples/error-500.html"> 500 </a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/samples/blank-page.html"> Blank Page </a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item pro-upgrade">
              <span class="nav-link">
                <a class="btn btn-block px-0 btn-rounded btn-upgrade" href="https://www.bootstrapdash.com/product/stellar-admin-template/" target="_blank"> <i class="icon-badge mx-2"></i> Upgrade to Pro</a>
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
                              <input type="text" class="form-control mb-2" id="S_FName" placeholder="First Name">
                              <input type="text" class="form-control mb-2" id="S_MName" placeholder="Middle Name">
                              <input type="text" class="form-control" id="S_LName" placeholder="Last Name">
                          </div>
                          <div class="col-md-3 col-sm-12 mb-2">
                              <input type="text" class="form-control mb-2" id="S_BDate" placeholder="Birth Date" onfocus="this.type='date'">
                              <input type="number" class="form-control mb-2" id="S_Age" placeholder="Age">
                              <select class="form-control">
                                    <option selected disabled>Sex</option>
                                    <option>Male</option>
                                    <option>Female</option>
                              </select>
                          </div> 
                          <div class="col-md-2 col-sm-12 mb-2">
                              <input type="text" class="form-control mb-2" id="S_CNumber" placeholder="Contact Number">
                              <select class="form-control mb-2">
                                    <option selected disabled>Civil Status</option>
                                    <option>Single</option>
                                    <option>Married</option>
                                    <option>Widowed</option>
                                    <option>Divorced</option>
                              </select>
                              <input type="text" class="form-control" id="S_Religion" placeholder="Religion">
                          </div>
                          <div class="col-md-4 col-sm-12 mb-2">
                              <input type="text" class="form-control" id="S_ID" placeholder="Student ID #">
                          </div>
                          <div class="col-md-4 col-sm-12 mb-2">
                             <select class="form-control">
                                    <option selected disabled>College/Department</option>
                                    <option>College of Science</option>
                                    <option>Institute of Physical Education Sports and Recreation</option>
                                    <option>College of Engineering</option>
                                    <option>College of Arts and Letters</option>
                                  </select> 
                          </div>
                          <div class="col-md-4 col-sm-12 mb-2">
                              <select class="form-control">
                                    <option selected disabled>Course</option>
                                    <option>BS Computer Science</option>
                                    <option>BS Information Technology</option>
                                    <option>BS Biology</option>
                                    <option>BS Chemistry</option>
                                    <option>BS Meteorology</option>
                                  </select>
                          </div>  
                          <div class="col-md-3 col-sm-12 mb-2">
                              <input type="text" class="form-control" id="S_Province" placeholder="Province">
                          </div>
                          <div class="col-md-3 col-sm-12 mb-2">
                            <input type="text" class="form-control" id="S_City" placeholder="Municipality/City">
                          </div>
                          <div class="col-md-3 col-sm-12  mb-2">
                            <input type="text" class="form-control" id="S_Barangay" placeholder="Barangay">
                          </div>
                          <div class="col-md-3 col-sm-12">
                              <input type="text" class="form-control" id="S_SNumber" placeholder="Street #">
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
                        <input type="text" class="form-control" id="F_FName" placeholder="First Name">
                      </div>
                      <div class="col-md-12 col-sm-12 mb-2">
                        <input type="text" class="form-control" id="F_MName" placeholder="Middle Name">
                      </div>
                      <div class="col-md-12 col-sm-12 mb-2">
                        <input type="text" class="form-control" id="F_LName" placeholder="Last Name">
                      </div>
                      <div class="col-md-12 col-sm-12 mb-2">
                        <input type="text" class="form-control" id="F_Address" placeholder="Address">
                      </div>
                      <div class="col-md-12 col-sm-12">
                        <input type="text" class="form-control" id="F_CNumber" placeholder="Contact Number">
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
                        <input type="text" class="form-control" id="M_FName" placeholder="First Name">
                      </div>
                      <div class="col-md-12 col-sm-12 mb-2">
                        <input type="text" class="form-control" id="M_MName" placeholder="Middle Name">
                      </div>
                      <div class="col-md-12 col-sm-12 mb-2">
                        <input type="text" class="form-control" id="M_LName" placeholder="Last Name">
                      </div>
                      <div class="col-md-12 col-sm-12 mb-2">
                        <input type="text" class="form-control" id="M_Address" placeholder="Address">
                      </div>
                      <div class="col-md-12 col-sm-12">
                        <input type="text" class="form-control" id="M_CNumber" placeholder="Contact Number">
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
                        <input type="text" class="form-control" id="G_FName" placeholder="First Name">
                      </div>
                      <div class="col-md-12 col-sm-12 mb-2">
                        <input type="text" class="form-control" id="G_MName" placeholder="Middle Name">
                      </div>
                      <div class="col-md-12 col-sm-12 mb-2">
                        <input type="text" class="form-control" id="G_LName" placeholder="Last Name">
                      </div>
                      <div class="col-md-12 col-sm-12 mb-2">
                        <input type="text" class="form-control" id="G_Address" placeholder="Address">
                      </div>
                      <div class="col-md-12 col-sm-12">
                        <input type="text" class="form-control" id="G_CNumber" placeholder="Contact Number">
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
                                  <label class="form-check-label"> Cancer </label>
                                </div>
                          </div>
                          <div class="col-md-1 col-sm-2">
                            <div class="form-check form-check-danger">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optionCancer" id="optionCancer" value="Yes"> Yes </label>
                            </div>
                          </div>
                          <div class="col-md-1 col-sm-2">
                              <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optionCancer" id="optionCancer" value="No"> No </label>
                            </div>
                          </div>
                          <div class="col-md-2 col-sm-5">
                              <input type="text" class="form-control" id="R_Cancer" placeholder="Relationship">
                          </div>
                          <div class="col-md-2 col-sm-3 mb-2">
                              <div class="form-check">
                                  <label class="form-check-label"> Hypertension </label>
                                </div>
                          </div>
                          <div class="col-md-1 col-sm-2">
                            <div class="form-check form-check-danger">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optionHypertension" id="optionHypertension" value="Yes"> Yes </label>
                            </div>
                          </div>
                          <div class="col-md-1 col-sm-2">
                              <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optionHypertension" id="optionHypertension" value="No"> No </label>
                            </div>
                          </div>
                          <div class="col-md-2 col-sm-5">
                              <input type="text" class="form-control" id="R_Hypertension" placeholder="Relationship">
                          </div>
                          <div class="col-md-2 col-sm-3 mb-2">
                              <div class="form-check">
                                  <label class="form-check-label"> Stroke </label>
                                </div>
                          </div>
                          <div class="col-md-1 col-sm-2">
                            <div class="form-check form-check-danger">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optionStroke" id="optionStroke" value="Yes"> Yes </label>
                            </div>
                          </div>
                          <div class="col-md-1 col-sm-2">
                              <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optionStroke" id="optionStroke" value="No"> No </label>
                            </div>
                          </div>
                          <div class="col-md-2 col-sm-5">
                              <input type="text" class="form-control" id="R_Stroke" placeholder="Relationship">
                          </div>
                          <div class="col-md-2 col-sm-3 mb-2">
                              <div class="form-check">
                                  <label class="form-check-label"> Tuberculosis </label>
                                </div>
                          </div>
                          <div class="col-md-1 col-sm-2">
                            <div class="form-check form-check-danger">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optionTuberculosis" id="optionTuberculosis" value="Yes"> Yes </label>
                            </div>
                          </div>
                          <div class="col-md-1 col-sm-2">
                              <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optionTuberculosis" id="optionTuberculosis" value="No"> No </label>
                            </div>
                          </div>
                          <div class="col-md-2 col-sm-5">
                              <input type="text" class="form-control" id="R_Tuberculosis" placeholder="Relationship">
                          </div>
                          <div class="col-md-2 col-sm-3 mb-2">
                              <div class="form-check">
                                  <label class="form-check-label"> Rheumatism </label>
                                </div>
                          </div>
                          <div class="col-md-1 col-sm-2">
                            <div class="form-check form-check-danger">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optionRheumatism" id="optionRheumatism" value="Yes"> Yes </label>
                            </div>
                          </div>
                          <div class="col-md-1 col-sm-2">
                              <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optionRheumatism" id="optionRheumatism" value="No"> No </label>
                            </div>
                          </div>
                          <div class="col-md-2 col-sm-5">
                              <input type="text" class="form-control" id="R_Rheumatism" placeholder="Relationship">
                          </div>  
                          <div class="col-md-2 col-sm-3 mb-2">
                              <div class="form-check">
                                  <label class="form-check-label"> Eye Disorder </label>
                                </div>
                          </div>
                          <div class="col-md-1 col-sm-2">
                            <div class="form-check form-check-danger">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optionEDisorder" id="optionEDisorder" value="Yes"> Yes </label>
                            </div>
                          </div>
                          <div class="col-md-1 col-sm-2">
                              <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optionEDisorder" id="optionEDisorder" value="No"> No </label>
                            </div>
                          </div>
                          <div class="col-md-2 col-sm-5">
                              <input type="text" class="form-control" id="R_EDisorder" placeholder="Relationship">
                          </div>
                          <div class="col-md-2 col-sm-3 mb-2">
                              <div class="form-check">
                                  <label class="form-check-label"> Diabetes </label>
                                </div>
                          </div>
                          <div class="col-md-1 col-sm-2">
                            <div class="form-check form-check-danger">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optionDiabetes" id="optionDiabetes" value="Yes"> Yes </label>
                            </div>
                          </div>
                          <div class="col-md-1 col-sm-2">
                              <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optionDiabetes" id="optionDiabetes" value="No"> No </label>
                            </div>
                          </div>
                          <div class="col-md-2 col-sm-5">
                              <input type="text" class="form-control" id="R_Diabetes" placeholder="Relationship">
                          </div>
                          <div class="col-md-2 col-sm-3 mb-2">
                              <div class="form-check">
                                  <label class="form-check-label"> Asthma </label>
                                </div>
                          </div>
                          <div class="col-md-1 col-sm-2">
                            <div class="form-check form-check-danger">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optionAsthma" id="optionAsthma" value="Yes"> Yes </label>
                            </div>
                          </div>
                          <div class="col-md-1 col-sm-2">
                              <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optionAsthma" id="optionAsthma" value="No"> No </label>
                            </div>
                          </div>
                          <div class="col-md-2 col-sm-5">
                              <input type="text" class="form-control" id="R_Asthma" placeholder="Relationship">
                          </div>
                          <div class="col-md-2 col-sm-3 mb-2">
                              <div class="form-check">
                                  <label class="form-check-label"> Convulsion </label>
                                </div>
                          </div>
                          <div class="col-md-1 col-sm-2">
                            <div class="form-check form-check-danger">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optionConvulsion" id="optionConvulsion" value="Yes"> Yes </label>
                            </div>
                          </div>
                          <div class="col-md-1 col-sm-2">
                              <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optionConvulsion" id="optionConvulsion" value="No"> No </label>
                            </div>
                          </div>
                          <div class="col-md-2 col-sm-5">
                              <input type="text" class="form-control" id="R_Convulsion" placeholder="Relationship">
                          </div>
                          <div class="col-md-2 col-sm-3 mb-2">
                              <div class="form-check">
                                  <label class="form-check-label"> Skin Problems </label>
                                </div>
                          </div>
                          <div class="col-md-1 col-sm-2">
                            <div class="form-check form-check-danger">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optionSProblems" id="optionSProblems" value="Yes"> Yes </label>
                            </div>
                          </div>
                          <div class="col-md-1 col-sm-2">
                              <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optionSProblems" id="optionSProblems" value="No"> No </label>
                            </div>
                          </div>
                          <div class="col-md-2 col-sm-5">
                              <input type="text" class="form-control" id="R_SProblems" placeholder="Relationship">
                          </div>
                          <div class="col-md-2 col-sm-3 mb-2">
                              <div class="form-check">
                                  <label class="form-check-label"> Heart Disease </label>
                                </div>
                          </div>
                          <div class="col-md-1 col-sm-2">
                            <div class="form-check form-check-danger">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optionHDisease" id="optionHDisease" value="Yes"> Yes </label>
                            </div>
                          </div>
                          <div class="col-md-1 col-sm-2">
                              <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optionHDisease" id="optionHDisease" value="No"> No </label>
                            </div>
                          </div>
                          <div class="col-md-2 col-sm-5">
                              <input type="text" class="form-control" id="R_HDisease" placeholder="Relationship">
                          </div>
                          <div class="col-md-2 col-sm-3 mb-2">
                              <div class="form-check">
                                  <label class="form-check-label"> Kidney Problem </label>
                                </div>
                          </div>
                          <div class="col-md-1 col-sm-2">
                            <div class="form-check form-check-danger">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optionKProblem" id="optionKProblem" value="Yes"> Yes </label>
                            </div>
                          </div>
                          <div class="col-md-1 col-sm-2">
                              <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optionKProblem" id="optionKProblem" value="No"> No </label>
                            </div>
                          </div>
                          <div class="col-md-2 col-sm-5">
                              <input type="text" class="form-control" id="R_KProblem" placeholder="Relationship">
                          </div> 
                          <div class="col-md-2 col-sm-3 mb-2">
                              <div class="form-check">
                                  <label class="form-check-label"> Mental Disorder </label>
                                </div>
                          </div>
                          <div class="col-md-1 col-sm-2">
                            <div class="form-check form-check-danger">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optionMDisorder" id="optionMDisorder" value="Yes"> Yes </label>
                            </div>
                          </div>
                          <div class="col-md-1 col-sm-2">
                              <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optionMDisorder" id="optionMDisorder" value="No"> No </label>
                            </div>
                          </div>
                          <div class="col-md-2 col-sm-5">
                              <input type="text" class="form-control" id="R_MDisorder" placeholder="Relationship">
                          </div>
                          <div class="col-md-2 col-sm-3">
                              <div class="form-check">
                                  <label class="form-check-label"> Bleeding Tendencies </label>
                                </div>
                          </div>
                          <div class="col-md-1 col-sm-2">
                            <div class="form-check form-check-danger">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optionBTendencies" id="optionBTendencies" value="Yes"> Yes </label>
                            </div>
                          </div>
                          <div class="col-md-1 col-sm-2">
                              <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optionBTendencies" id="optionBTendencies" value="No"> No </label>
                            </div>
                          </div>
                          <div class="col-md-2 col-sm-5">
                              <input type="text" class="form-control" id="R_BTendencies" placeholder="Relationship">
                          </div>
                          <div class="col-md-2 col-sm-3">
                              <div class="form-check">
                                  <label class="form-check-label"> Gastrointestinal Disease </label>
                                </div>
                          </div>
                          <div class="col-md-1 col-sm-2">
                            <div class="form-check form-check-danger">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optionGDisease" id="optionGDisease" value="Yes"> Yes </label>
                            </div>
                          </div>
                          <div class="col-md-1 col-sm-2">
                              <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optionGDisease" id="optionGDisease" value="No"> No </label>
                                  
                            </div>
                          </div>
                          <div class="col-md-2 col-sm-5">
                              <input type="text" class="form-control" id="R_GDisease" placeholder="Relationship">
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
                        <label>  PAST ILLNESS(Mga Naging Sakit)</label>
                        <div class="form-group row">
                          <div class="col-md-3 col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" id=""> Primary Complex </label>
                            </div>
                            <div class="form-check">
                              <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" id=""> Kidney Disease </label>
                            </div>
                            <div class="form-check">
                              <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" id=""> Pneumonia </label>
                            </div>
                            <div class="form-check">
                              <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" id=""> Ear Problems </label>
                            </div>
                            <div class="form-check">
                              <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" id=""> Mental Disorder </label>
                            </div>  
                         </div>
                         <div class="col-md-3 col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" id=""> Asthma </label>
                            </div>
                            <div class="form-check">
                              <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" id=""> Skin Problem </label>
                            </div>
                            <div class="form-check">
                              <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" id=""> Dengue </label>
                            </div>
                            <div class="form-check">
                              <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" id=""> Mumps </label>
                            </div>
                            <div class="form-check">
                              <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" id=""> Typhoid Fever </label>
                            </div>  
                         </div>
                         <div class="col-md-3 col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" id=""> Rheumatic Fever </label>
                            </div>
                            <div class="form-check">
                              <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" id=""> Diabetes </label>
                            </div>
                            <div class="form-check">
                              <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" id=""> Measles </label>
                            </div>
                            <div class="form-check">
                              <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" id=""> Thyroid Disorder </label>
                            </div>
                            <div class="form-check">
                              <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" id=""> Hepatitis </label>
                            </div>  
                         </div>
                         <div class="col-md-3 col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" id=""> Chicken Pox </label>
                            </div>
                            <div class="form-check">
                              <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" id=""> Eye Disorder </label>
                            </div>
                            <div class="form-check">
                              <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" id=""> Poliomy Elitis </label>
                            </div>
                            <div class="form-check">
                              <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" id=""> Heart Disease </label>
                            </div>
                            <div class="form-check">
                              <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" id=""> Anemia/Leukemia </label>
                            </div>  
                         </div>   
                      </div>
                      <label>  PRESENT ILLNESS (Mga Sintomas na Nararamdaman)</label>
                        <div class="form-group row">
                          <div class="col-md-3 col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" id=""> Chest Pain </label>
                            </div>
                            <div class="form-check">
                              <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" id=""> Indigestion </label>
                            </div>
                            <div class="form-check">
                              <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" id=""> Swollen Feet </label>
                            </div> 
                         </div>
                         <div class="col-md-3 col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" id=""> Headaches </label>
                            </div>
                            <div class="form-check">
                              <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" id=""> Sore Throat (Frequent) </label>
                            </div>
                            <div class="form-check">
                              <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" id=""> Dizziness </label>
                            </div>
                         </div>
                         <div class="col-md-3 col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" id=""> Nausea/Vomiting </label>
                            </div>
                            <div class="form-check">
                              <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" id=""> Difficult Breathing </label>
                            </div>
                            <div class="form-check">
                              <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" id=""> Weight Loss </label>
                            </div>
                         </div>
                         <div class="col-md-3 col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" id=""> Insomia </label>
                            </div>
                            <div class="form-check">
                              <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" id=""> Joint Pains </label>
                            </div>
                            <div class="form-check">
                              <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" id=""> Frequent Urination </label>
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
                    <button type="submit" class="btn btn-primary" id="submit">Submit</button>
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


