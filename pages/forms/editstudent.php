<?php
session_start();
if(!isset($_SESSION['buhs_user'])) header("location: login.php");
    include '../../db_connection.php';

    echo "select * from tbl_patientinfo where PatientID='".$_GET['ID']."'";
    $conn = OpenCon();
    $result = mysqli_query($conn, "select * from tbl_patientinfo where PatientID='".$_GET['ID']."'");
    $r = mysqli_fetch_assoc($result);
    $result = mysqli_query($conn, "select * from tbl_patientsparentinfo where Relation='Father' and PatientID='".$_GET['ID']."'");
    $father = mysqli_fetch_assoc($result);
    $result = mysqli_query($conn, "select * from tbl_patientsparentinfo where Relation='Mother' and PatientID='".$_GET['ID']."'");
    $mother = mysqli_fetch_assoc($result);
    $result = mysqli_query($conn, "select * from tbl_patientsparentinfo where Relation='Guardian' and PatientID='".$_GET['ID']."'");
    $guardian = mysqli_fetch_assoc($result);
    $result = mysqli_query($conn,"select * from tbl_familyhistoryanswer where PatientID = '".$_GET['ID']."'");
  
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
                <span class="menu-title">Forms</span>
                <i class="icon-book-open menu-icon"></i>
              </a>
              <div class="collapse" id="forms">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="studenthealthform.php">Student Form</a></li>
                  <li class="nav-item"> <a class="nav-link" href="employeeform.php">Employee Form</a></li>
                  <li class="nav-item"> <a class="nav-link" href="dailyconsultation.php">Daily Consultant Form</a></li>
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
            <form method="POST" action="../../SaveRecords/savestudent.php?edit=1">
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Personal Information <i class="icon-user float-left"></i></h4>
                      <!--<p class="card-description"> Personal info </p>-->
                        <div class="form-group row">
                          <div class="col-md-7 col-sm-12 mb-2">
                              <input type="text" class="form-control mb-2"  name="S_Fname" id="Fname" placeholder="First Name" value=<?php echo '"'.$r['Fname'].'"';?> >
                              <input type="text" class="form-control mb-2" name="S_Mname" id="Mname" placeholder="Middle Name" value=<?php echo '"'.$r['Mname'].'"';?> >
                              <input type="text" class="form-control"  name="S_Lname" id="Lname" placeholder="Last Name" value=<?php echo '"'.$r['Lname'].'"';?> >
                          </div>
                          <div class="col-md-3 col-sm-12 mb-2">
                              <input type="text" class="form-control mb-2" name="S_Bdate" id="Birthdate" placeholder="Birth Date" onfocus="this.type='date'" value= <?php echo '"'.$r['Birthdate'].'"';?>>
                              <input type="number" class="form-control mb-2"  name="S_Age" id="Age" placeholder="Age" value=<?php echo '"'.$r['Age'].'"';?> >
                              <select class="form-control" name="S_Gender" id="Gender"  >
                                    <option selected disabled >  </option>
                                    <?php
                                    if($r['Sex']=="Male"){
                                      echo "<option selected>Male</option>
                                      <option>Female</option>";
                                    }
                                    else{
                                      echo "<option >Male</option>
                                      <option selected>Female</option>";
                                    }
                                     
                                     ?>
                                    <option>Male</option>
                                    <option>Female</option>
                              </select>
                          </div> 
                          <div class="col-md-2 col-sm-12 mb-2">
                              <input type="text" class="form-control mb-2" name="S_Cnumber" id="Cnumber" placeholder="Contact Number"value=<?php echo '"'.$r['ContactNum'].'"';?> >
                              <select class="form-control mb-2" name="S_Status" id="Status" >
                                    <option selected disabled>Civil Status</option>
                                    <?php
                                      if($r['CivilStatus'] == 'Single'){
                                        echo "<option selected>Single</option>";
                                        echo "<option >Married</option>";
                                        echo "<option >Widowed</option>";
                                        echo "<option >Divorced</option>";
                                      }
                                      if($r['CivilStatus'] == 'Married'){
                                        echo "<option >Single</option>";
                                        echo "<option selected>Married</option>";
                                        echo "<option >Widowed</option>";
                                        echo "<option >Divorced</option>";
                                      }
                                      if($r['CivilStatus'] == 'Widowed'){
                                        echo "<option >Single</option>";
                                        echo "<option >Married</option>";
                                        echo "<option selected>Widowed</option>";
                                        echo "<option >Divorced</option>";
                                      }
                                      if($r['CivilStatus'] == 'Divorced'){
                                        echo "<option >Single</option>";
                                        echo "<option >Married</option>";
                                        echo "<option >Widowed</option>";
                                        echo "<option selected>Divorced</option>";
                                      }
                                    ?>
                              </select>
                              <input type="text" class="form-control"  name="S_Religion" id="Religion" placeholder="Religion" value=<?php echo '"'.$r['religion'].'"';?>>
                          </div>
                          <div class="col-md-3 col-sm-12 mb-2">
                              <input type="text" class="form-control" name="S_Id" id="Id"placeholder="Student ID #"value=<?php echo '"'.$r['PatientID'].'"';?> readonly >
                          </div>
                         
                          <div class="col-md-3 col-sm-12 mb-2">
                            <select class="form-control" name="S_Department" id="S_Dpartment" onchange="getCollege(this)">
                                
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
                                  $selected="";
                                  if(($col[$i]!=$col[$i-1])&&$col[$i]!=null){
                                  if($r['CollegeUnit']==$col[$i]){
                                          $selected="selected";  
                                      }
                                      echo "<option ".$selected.">".$col[$i]."</option>";
                                    }
                                    
                                }
                                ?>
                            </select> 
                        </div>
                        
                          
                          <div class="col-md-3 col-sm-12 mb-2">
                              <select class="form-control" name="S_Course" id="S_Course">
                                    <option selected disabled>Course</option>\
                                    <?php
                                      $sql = "select * from tbl_college";
                                      $res = mysqli_query($conn,$sql);
                                      $x=0;
                                      while($list = mysqli_fetch_assoc($res)){
                                          $col[$x] = $list['colleges'];
                                          $cor[$x] = $list['courses'] ;
                                          $x++;
                                      }
                                     
                                      for($i=0;$i<=$x;$i++){
                                        $selected="";
                                        if($r['CollegeUnit']==$col[$i]){
                                          if($r['Course']==$cor[$i]){
                                            $selected="selected";
                                          }
                                        echo "<option ".$selected.">".$cor[$i]."</option>";
                                        }
                                                  
                                      
                                      }
                                    ?>
                                 
                                  </select>
                          </div>
                          <div class="col-md-3 col-sm-12 mb-2">
                                                <select class="form-control" name="S_YearLevel" id="S_YearLevel">
                                                    <option selected disabled>Year Level</option>
                                                    <?php
                                                    
                                                      if($r['YearLevel']=="1st Year"){
                                                        echo "<option selected >1st Year</option>
                                                        <option >2nd Year</option>
                                                        <option >3rd Yeer</option>
                                                        <option  >4th Year</option>
                                                        <option >5th Year</option>";
                                                        
                                                      }
                                                      if($r['YearLevel']=="2nd Year"){
                                                        echo "<option >1st Year</option>
                                                        <option selected>2nd Year</option>
                                                        <option >3rd Yeer</option>
                                                        <option  >4th Year</option>
                                                        <option >5th Year</option>";
                                                      }
                                                      if($r['YearLevel']=="3rd Year"){
                                                        echo "<option  >1st Year</option>
                                                        <option >2nd Year</option>
                                                        <option selected>3rd Yeer</option>
                                                        <option  >4th Year</option>
                                                        <option >5th Year</option>";
                                                      }
                                                      if($r['YearLevel']=="4th Year"){
                                                        echo "<option  >1st Year</option>
                                                        <option >2nd Year</option>
                                                        <option >3rd Yeer</option>
                                                        <option selected>4th Year</option>
                                                        <option >5th Year</option>";
                                                        
                                                      }
                                                      if($r['YearLevel']=="5th Year"){
                                                        echo "<option  >1st Year</option>
                                                        <option >2nd Year</option>
                                                        <option >3rd Yeer</option>
                                                        <option  >4th Year</option>
                                                        <option selected>5th Year</option>";
                                                        
                                                      }
                                                    ?>
                                                    
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
                                    $selected="";
                                    $reg[$x] = $list['regDesc'];
                                    $code[$x] = $list['regCode'];                     
                                    if($reg[$x]==$r['Region']){
                                      $selected="selected";
                                    }
                                    echo "<option id=".$code[$x]." ".$selected.">".$reg[$x]."</option>";
                                    $x++;
                                  }
                                ?>
                              </select>
                          </div>
                          <div class="col-md-2 col-sm-12 mb-2">
                              <select  class="form-control" name="S_Province" id="S_Province"  onchange="getProvince()">
                              <option selected disabled>Province</option>
                              <?php 
                                  $sql = "select * from refprovince";
                                  $res = mysqli_query($conn,$sql);
                                  $x=0;
                                  $prcode=0;
                                  while($list = mysqli_fetch_assoc($res)){
                                    $prov[$x] = $list['provDesc'];
                                    $pcode[$x] = $list['provCode'];
                                    $rcode[$x] =  $list['regCode'];
                                    if($prov[$x]==$r['Province']){
                                      $prcode =$rcode[$x];
                   
                                    }
                                    $x++;
                                  }
                                  for($i=0;$i<=$x;$i++){
                                    $selected="";
                                    if( $prcode == $rcode[$i]){
                                      if($prov[$i]==$r['Province'])
                                        $selected="selected";
                                      echo "<option id=".$pcode[$i]." ".$selected.">".$prov[$i]."</option>";
                                    }
                                   
                                  }
        
                                ?>
                              </select>
                          </div>
                          <div class="col-md-2 col-sm-12 mb-2">
                          <select  class="form-control" name="S_City" id="S_City"  onchange="getCity()">
                              <option selected disabled>City/Municipality</option>
                              <?php 
                                  $sql = "select * from refcitymun";
                                  $res = mysqli_query($conn,$sql);
                                  $x=0;
                                  $pccode=0;
                                  while($list = mysqli_fetch_assoc($res)){
                                    $city[$x] = $list['citymunDesc'];
                                    $ccode[$x] = $list['citymunCode'];
                                    $pcode[$x] =  $list['provCode'];
                                    if($city[$x]==$r['MuniCity']){
                                      $pccode =$pcode[$x];

                                    }
                                    $x++;
                                  }
                                  for($i=0;$i<=$x;$i++){
                                    $selected="";
                                  
                                    if( $pccode == $pcode[$i]){

                                      if($city[$i]==$r['MuniCity'])
                                        $selected="selected";
                                      echo "<option id=".$ccode[$i]." ".$selected.">".$city[$i]."</option>";
                                    }
                                   
                                  }
        
                                ?>
                              </select>
                          </div>
                          <div class="col-md-2 col-sm-12  mb-2">
                          <select  class="form-control" name="S_Baranggay" id="S_Baranggay">
                              <option selected disabled>Baranggay</option>
                              <?php 
                                  $sql = "select * from refbrgy";
                                  $res = mysqli_query($conn,$sql);
                                  $x=0;
                                  $cbcode=0;
                                  while($list = mysqli_fetch_assoc($res)){
                                    $brgy[$x] = $list['brgyDesc'];
                                    $bcode[$x] = $list['brgyCode'];
                                    $bbcode[$x] =  $list['citymunCode'];
                                    if($brgy[$x]==$r['Brgy']){
                                      $cbcode =$bbcode[$x];

                                    }
                                    $x++;
                                  }
                                  for($i=0;$i<=$x;$i++){
                                    $selected="";
                                    if( $cbcode == $bbcode[$i]){
                                      if($brgy[$i]==$r['Brgy'])
                                        $selected="selected";
                                      echo "<option id=".$bcode[$i]." ".$selected.">".$brgy[$i]."</option>";
                                    }
                                   
                                  }
        
                                ?>
                            
                              </select>
                          </div>
                          <div class="col-md-4 col-sm-12">
                              <input type="text" class="form-control" name="S_Street" placeholder="Street #" id="Street"value=<?php echo '"'.$r['Street'].'"'?> >
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
                        <input type="text" class="form-control" name="F_FName" id="F_Name" placeholder="First Name" value=<?php echo "'".$father['Fname']."'" ?>>
                      </div>
                      <div class="col-md-12 col-sm-12 mb-2">
                        <input type="text" class="form-control" name="F_MName" id="F_MName" placeholder="Middle Name"value=<?php echo "'".$father['Mname']."'"?>>
                      </div>
                      <div class="col-md-12 col-sm-12 mb-2">
                        <input type="text" class="form-control" name="F_LName" id="L_Name" placeholder="Last Name"value= <?php echo "'".$father['Lname']."'"?> >
                      </div>
                      <div class="col-md-12 col-sm-12 mb-2">
                        <input type="text" class="form-control" name="F_Address" id="F_Address" placeholder="Address" value= <?php echo "'".$father['OfficeAddress']."'"?> >
                      </div>
                      <div class="col-md-12 col-sm-12 mb-2">
                        <input type="text" class="form-control" name="F_Occupation" id="F_Occupation" placeholder="Occupation" value= <?php echo "'".$father['Occupation']."'"?> >
                      </div>
                      <div class="col-md-12 col-sm-12">
                        <input type="text" class="form-control" name="F_CNumber" id="F_CNumber" placeholder="Contact Number"value= <?php echo "'".$father['ContactNumber']."'"?> >
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
                        <input type="text" class="form-control" name="M_FName" id="F_FName" placeholder="First Name"  value= <?php echo "'".$mother['Fname']."'"?>>
                      </div>
                      <div class="col-md-12 col-sm-12 mb-2">
                        <input type="text" class="form-control" name="M_MName" id="M_MName" placeholder="Middle Name"  value= <?php echo "'".$mother['Mname']."'"?>>
                      </div>
                      <div class="col-md-12 col-sm-12 mb-2">
                        <input type="text" class="form-control" name="M_LName" id="L_LName" placeholder="Last Name"  value= <?php echo "'".$mother['Lname']."'"?>>
                      </div>
                      <div class="col-md-12 col-sm-12 mb-2">
                        <input type="text" class="form-control" name="M_Address" id="M_Address" placeholder="Address" value= <?php echo "'".$mother['OfficeAddress']."'"?>>
                      </div>
                      <div class="col-md-12 col-sm-12 mb-2">
                        <input type="text" class="form-control" name="M_Occupation" id="M_Occupation" placeholder="Occupation" value= <?php echo "'".$mother['Occupation']."'"?> >
                      </div>
                      <div class="col-md-12 col-sm-12">
                        <input type="text" class="form-control" name="M_CNumber" id="M_CNumber" placeholder="Contact Number"value= <?php echo "'".$mother['ContactNumber']."'"?>>
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
                        <input type="text" class="form-control" name="G_FName" id="G_FName" placeholder="First Name"  value= <?php echo "'".$guardian['Fname']."'"?>>
                      </div>
                      <div class="col-md-12 col-sm-12 mb-2">
                        <input type="text" class="form-control" name="G_MName" id="G_MName" placeholder="Middle Name"value= <?php echo "'".$guardian['Mname']."'"?>>
                      </div>
                      <div class="col-md-12 col-sm-12 mb-2">
                        <input type="text" class="form-control" name="G_LName" id="G_LName" placeholder="Last Name"value= <?php echo "'".$guardian['Lname']."'"?>>
                      </div>
                      <div class="col-md-12 col-sm-12 mb-2">
                        <input type="text" class="form-control" name="G_Address" id="G_Address" placeholder="Address"value= <?php echo "'".$guardian['OfficeAddress']."'"?>>
                      </div>
                      <div class="col-md-12 col-sm-12 mb-2">
                        <input type="text" class="form-control" name="G_Occupation" id="G_Occupation" placeholder="Occupation" value= <?php echo "'".$guardian['Occupation']."'"?> >
                      </div>
                      <div class="col-md-12 col-sm-12">
                        <input type="text" class="form-control" name="G_CNumber" id="G_CNumber" placeholder="Contact Number"value= <?php echo "'".$guardian['ContactNumber']."'"?>>
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
                                <input type="radio" class="form-check-input" name="optionCancer" id="optionCancerYes" value="Yes"> Yes </label>
                            </div>
                          </div>
                          <div class="col-md-1 col-sm-2">
                              <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optionCancer" id="optionCancerNo" value="No"> No </label>
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
                                <input type="radio" class="form-check-input" name="optionHypertension" id="optionHypertensionYes" value="Yes"> Yes </label>
                            </div>
                          </div>
                          <div class="col-md-1 col-sm-2">
                              <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optionHypertension" id="optionHypertensionNo" value="No"> No </label>
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
                                <input type="radio" class="form-check-input" name="optionStroke" id="optionStrokeYes" value="Yes"> Yes </label>
                            </div>
                          </div>
                          <div class="col-md-1 col-sm-2">
                              <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optionStroke" id="optionStrokeNo" value="No"> No </label>
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
                                <input type="radio" class="form-check-input" name="optionTuberculosis" id="optionTuberculosisYes" value="Yes"> Yes </label>
                            </div>
                          </div>
                          <div class="col-md-1 col-sm-2">
                              <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optionTuberculosis" id="optionTuberculosisNo" value="No"> No </label>
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
                                <input type="radio" class="form-check-input" name="optionRheumatism" id="optionRheumatismYes" value="Yes"> Yes </label>
                            </div>
                          </div>
                          <div class="col-md-1 col-sm-2">
                              <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optionRheumatism" id="optionRheumatismNo" value="No"> No </label>
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
                                <input type="radio" class="form-check-input" name="optionEDisorder" id="optionEDisorderYes" value="Yes"> Yes </label>
                            </div>
                          </div>
                          <div class="col-md-1 col-sm-2">
                              <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optionEDisorder" id="optionEDisorderNo" value="No"> No </label>
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
                                <input type="radio" class="form-check-input" name="optionDiabetes" id="optionDiabetesYes" value="Yes"> Yes </label>
                            </div>
                          </div>
                          <div class="col-md-1 col-sm-2">
                              <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optionDiabetes" id="optionDiabetesNo" value="No"> No </label>
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
                                <input type="radio" class="form-check-input" name="optionAsthma" id="optionAsthmaYes" value="Yes"> Yes </label>
                            </div>
                          </div>
                          <div class="col-md-1 col-sm-2">
                              <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optionAsthma" id="optionAsthmaNo" value="No"> No </label>
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
                                <input type="radio" class="form-check-input" name="optionConvulsion" id="optionConvulsionYes" value="Yes"> Yes </label>
                            </div>
                          </div>
                          <div class="col-md-1 col-sm-2">
                              <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optionConvulsion" id="optionConvulsionNo" value="No"> No </label>
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
                                <input type="radio" class="form-check-input" name="optionSProblems" id="optionSProblemsYes" value="Yes"> Yes </label>
                            </div>
                          </div>
                          <div class="col-md-1 col-sm-2">
                              <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optionSProblems" id="optionSProblemsNo" value="No"> No </label>
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
                                <input type="radio" class="form-check-input" name="optionHDisease" id="optionHDiseaseYes" value="Yes"> Yes </label>
                            </div>
                          </div>
                          <div class="col-md-1 col-sm-2">
                              <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optionHDisease" id="optionHDiseaseNo" value="No"> No </label>
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
                                <input type="radio" class="form-check-input" name="optionKProblem" id="optionKProblemYes" value="Yes"> Yes </label>
                            </div>
                          </div>
                          <div class="col-md-1 col-sm-2">
                              <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optionKProblem" id="optionKProblemNo" value="No"> No </label>
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
                                <input type="radio" class="form-check-input" name="optionMDisorder" id="optionMDisorderYes" value="Yes"> Yes </label>
                            </div>
                          </div>
                          <div class="col-md-1 col-sm-2">
                              <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optionMDisorder" id="optionMDisorderNo" value="No"> No </label>
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
                                <input type="radio" class="form-check-input" name="optionBTendencies" id="optionBTendenciesYes" value="Yes"> Yes </label>
                            </div>
                          </div>
                          <div class="col-md-1 col-sm-2">
                              <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optionBTendencies" id="optionBTendenciesNo" value="No"> No </label>
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
                                <input type="radio" class="form-check-input" name="optionGDisease" id="optionGDiseaseYes" value="Yes"> Yes </label>
                            </div>
                          </div>
                          <div class="col-md-1 col-sm-2">
                              <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optionGDisease" id="optionGDiseaseNo" value="No"> No </label>
                                  
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
    <script>
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
                var optionVal = list.options[list.selectedIndex].id;
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
                            .append('<option  id = '+result[i].provCode+'>'+result[i].provDesc+'</option>')
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
                var optionVal = list.options[list.selectedIndex].id;
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
                            .append('<option id = '+result[i].citymunCode+'>'+result[i].citymunDesc+'</option>')
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
                var optionVal = list.options[list.selectedIndex].id;
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
    <script src="../../js/my.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>


<?php
$i=0;
$Illness = array('Cancer','Hypertension','Stroke','Tuberculosis','Rheumatism','EDisorder','Diabetes','Asthma','Convulsion','SProblems','HDisease','KProblem','MDisorder','BTendencies','GDisease');
while($r = mysqli_fetch_assoc($result)){
  echo '<script>console.log(\''.$r['Status'].'\')</script>';
  if($r['Status']==='Yes'){
    echo '<script>document.getElementById(\'option'.$Illness[$i].'Yes\').checked = true</script>';
    echo '<script>document.getElementById(\'R_'.$Illness[$i].'\').value = \''.$r['Relation'].'\'</script>';
  }else{
    echo '<script>document.getElementById(\'option'.$Illness[$i].'No\').checked = true</script>';
  }
$i++;
}

$result = $conn->query("select * from tbl_personalhistory where PatientID='".$_GET['ID']."'");
while($r = mysqli_fetch_assoc($result)){
  echo "<script>document.getElementById('".$r['Illness']."').checked = true</script>";
}
?>

