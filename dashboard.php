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


     <!--importing chart.js library-->
     <script src="package/dist/Chart.bundle.js"></script>
    <script src="package/dist/Chart.bundle.min.js"></script>
    <script src="package/dist/Chart.js"></script>
    <script src="package/dist/Chart.min.js"></script>

     <!-- plugins:charts css -->
   <link rel="stylesheet" href="package/dist/Chart.css"> 
   <link rel="stylesheet" href="package/dist/Chart.min.css"> 
   
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/daterangepicker/daterangepicker.css">
 
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="images/logo.png" />
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
       
        <div class="main-panel">
          <div class="content-wrapper">
         
          <canvas id="IllnessFamChart" width="100" height="30"></canvas>
          <canvas id="IllnessPersonalChart" width="100" height="30"></canvas>
          <canvas id="presentSymp" width="100" height="30"></canvas>
         
   


          <script>
 
           var listIllness = ['Cancer','Hypertension','Stroke','Tuberculosis','Rheumatism','EDisorder','Diabetes','Asthma','Convulsion','SProblems','HDisease','KProblem','MDisorder','BTendencies','GDisease'];
           var numberOfstudents= [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
           const Http = new XMLHttpRequest();
            Http.open("GET", "saverecords/sql.php?query=select * from tbl_familyhistoryanswer");
            Http.send();
            Http.onreadystatechange = function(){
              if(this.readyState==4 && this.status==200){
                // console.log(Http.responseText);
                result = JSON.parse(Http.responseText);
                console.log(result.length);
                for(i=0;i<result.length;i++){
                  for(x=0;x<listIllness.length;x++){
                    if(result[i].Status=="Yes" && result[i].Illness == listIllness[x]){
                      console.log( numberOfstudents[x] +" plus "+1);
                      numberOfstudents[x]++;
                    }
                  }
                  
                }
                var id ="IllnessFamChart";
                var ylabels = ["Cancer","Hypertension","Stroke","Tuberculosis","Rheumatism","Eye Disorder","Diabetis","Asthma","Convulsion","Skin Problems","Heart Disease","Kidney Problems","Mental Disorder","Bleeding Tendencies","Gastrointestinal Disease"];
                var title = "Number of Students who have the following Family Illness";
                var colors = ['rgba(255, 99, 132, 0.2)','rgba(255, 99, 132, 1)'];
                graphIt(numberOfstudents,id,ylabels,title,colors);
              }
            }  
         
           var listSymptoms = ['c_primaryComplex','c_kidneyDisease','c_pneumonia','c_earProblems','c_mentalDisorder','c_asthma','c_skinProblem','c_dengue','c_mumps','c_typhoidFever','c_rheumaticFever','c_diabetes','c_measles','c_thyroidDisorder','c_hepatitis','c_chickenPox','c_eyeDisorder','c_poliomyElitis','c_heartDisease','c_anemia','c_chestPain','c_indigestion','c_swollenFeet','c_headaches','c_soreThroat','c_dizziness','c_nausea','c_difficultBreathing','c_weightLoss','c_insomia','c_jointPains','c_frequentUrination'];
           var numberOfstudentsSymp= [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,];
           const Https = new XMLHttpRequest();
            Https.open("GET", "saverecords/sql.php?query=select * from tbl_personalhistory");
            Https.send();
            Https.onreadystatechange = function(){
              if(this.readyState==4 && this.status==200){
                // console.log(Http.responseText);
                result = JSON.parse(Https.responseText);
                console.log(result.length);
                for(i=0;i<result.length;i++){
                  for(x=0;x<listSymptoms.length;x++){
                    if(result[i].Status=="true" && result[i].Illness == listSymptoms[x]){
                      console.log( numberOfstudentsSymp[x] +" plus "+1);
                      numberOfstudentsSymp[x]++;
                    }
                  }
                  
                }
                  var id ="IllnessPersonalChart";
                  var ylabels = ["      Primary Complex",
                                        "Kidney Disease",
                                        "Pneumonia",
                                        "Ear Problems",
                                        "Mental Disorder",
                                        "Asthma",
                                        "Skin Problem",
                                        "Dengue",
                                        "Mumps",
                                        "Typhoid Fever",
                                        "Rheumatic Fever",
                                        "Diabetes",
                                        "Measles",
                                        "Thyroid Disorder",
                                        "Hepatitis",
                                        "Chicken Pox",
                                        "Eye Disorder",
                                        "Poliomy Elitis",
                                        "Heart Disease",
                                        "Anemia/Leukemia",
                                        "Chest Pain",
                                        "Indigestion",
                                        "Swollen Feet",
                                        "Headaches",
                                        "Sore Throat (Frequent)",
                                        "Dizziness",
                                        "Nausea/Vomiting",
                                        "Difficult Breathing",
                                        "Weight Loss",
                                        "Insomia",
                                        "Joint Pains",
                                        "Frequent Urination"];
                  var title = "Number of Students who have the following Past Illness";
                  var colors = ['rgba(153, 102, 255, 0.2)','rgba(153, 102, 255, 1)'];
                  graphIt(numberOfstudentsSymp,id,ylabels,title,colors);
              }
            }

            var listsymptoms = ['c_chestPain','c_indigestion','c_swollenFeet','c_headaches','c_soreThroat','c_dizziness','c_nausea','c_difficultBreathing','c_weightLoss','c_insomia','c_jointPains','c_frequentUrination'];
           var numberOfstudentssymptoms= [0,0,0,0,0,0,0,0,0,0,0,0,0];
           const Httpss = new XMLHttpRequest();
            Httpss.open("GET", "saverecords/sql.php?query=select * from tbl_presentsymptoms");
            Httpss.send();
            Httpss.onreadystatechange = function(){
              if(this.readyState==4 && this.status==200){
                // console.log(Http.responseText);
                result = JSON.parse(Httpss.responseText);
                console.log(result.length);
                for(i=0;i<result.length;i++){
                  for(x=0;x<listsymptoms.length;x++){
                    if(result[i].Status=="true" && result[i].Symptoms == listsymptoms[x]){
                      console.log( numberOfstudentssymptoms[x] +" plus "+1);
                      numberOfstudentssymptoms[x]++;
                    }
                  }
                  
                }
                var id ="presentSymp";
                var ylabels = ["Chest Pain",
                              "Indigestion",
                              "Swollen Feet",
                              "Headaches",
                              "Sore Throat (Frequent)",
                              "Dizziness",
                              "Nausea/Vomiting",
                              "Difficult Breathing",
                              "Weight Loss",
                              "Insomia",
                              "Joint Pains",
                              "Frequent Urination",];
                var title = "Number of Students who the following present Illness";
                var colors = ['rgba(54, 162, 235, 0.2)','rgba(54, 162, 235, 1)'];
                graphIt(numberOfstudentssymptoms,id,ylabels,title,colors);
              }
            } 
                                    
        

        
          </script>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2017 <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap Dash</a>. All rights reserved.</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="icon-heart text-danger"></i></span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
            
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
       
      
<script>

function graphIt(numberOfstudents,id,ylabels,title,colors){
              var ctx = document.getElementById(id).getContext('2d');
                    var myChart = new Chart(ctx, { 
                      type: 'bar', 
                      data: { labels: ylabels, 
                              datasets: [{label: title, 
                              data: numberOfstudents, 
                              backgroundColor:  colors[0], 
                              borderColor:    colors[1], 
                              borderWidth: 2 }] 
                          }, 
                      options: { 
                        scales: { 
                          yAxes: [{ 
                            ticks: { 
                              beginAtZero: true 
                              } 
                            }]   
                          } 
                          } 
                        });
                    }
    
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
 
    <script src="vendors/moment/moment.min.js"></script>
    <script src="vendors/daterangepicker/daterangepicker.js"></script>
 
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
  
 
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