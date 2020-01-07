<?php
session_start();
if(!isset($_SESSION['buhs_user'])){
  $_SESSION['redirect_to'] = $_SERVER['REQUEST_URI'];
  header("location: ../../login.php");
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
          <a  href="../../dashboard.php">
            <img src="../../images/ddh.png" alt="logo" width="100%"/>
          </a>
          <a class="navbar-brand brand-logo-mini" href="dashboard.php"><img src="../../images/ddh.png" alt="logo" /></a>
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
                      echo "<li class='nav-item'> <a class='nav-link' href='../forms/employeeform.php'>Employee Form</a></li>";
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
            
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                
                  
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-md-12 col-sm-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                    <div class = "col-md-8">
                    <h2> Medicine Inventory <i class="icon-social-dropbox float-left"></i></h2>

                    </div>
                      <div class="col-md-2">
                      <form class="search-form d-none d-md-block" action="#">
                            <input type="search" id="myInput"  class="form-control flex-grow-1" placeholder="Search Medicine Records here" title="Search Medicine Records here">
                        </form>
                      </div>
                      <div class="col-md-2">
                        <input class='btn btn-primary w-100' type="button" data-toggle="modal" data-target="#Medicine" name="AddMed" style="width: 100%" value="Add Medicine">
                 
                      </div>
                  </div>
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th class="font-weight-bold">Category</th>
                          <th class="font-weight-bold">Medicine Name</th>
                          <th class="font-weight-bold">Stocks</th>
                          <th class="font-weight-bold">Unit Measure</th>
                          <th class="font-weight-bold">Expiration Date</th>
                          <th class="font-weight-bold">Options</th>

                        </tr>
                      </thead>
                    <tbody id="myTable1">
                    
                      <?php 
                        $sql = "SELECT * from tbl_medicine";
                        $result = mysqli_query($conn,$sql);
                        $rows = array();
                        $ctr = 0;
                        while($r = mysqli_fetch_assoc($result)){
                          $rows[] = $r;
                          if($rows[$ctr]['Status'] === '1'){

                          
                            echo "<tr>
                                
                                <td>".$rows[$ctr]["Category"]."</td>
                                <td>".$rows[$ctr]["MedicineName"]."</td>
                                <td>".$rows[$ctr]["Stock"]."</td>
                                <td>".$rows[$ctr]["UnitMeasure"]."</td>
                                <td>".$rows[$ctr]["ExpDate"]."</td>
                                <td><div class='btn-group col-md-8' >
                                  
                                  <button value='".$rows[$ctr]['ID']. "' type='button' data-toggle='modal' data-target='#editMedicine".$ctr."' class='btn btn-sm btn-primary w-100'> Edit <i class='icon-pencil float-left'></i></button>&nbsp;&nbsp;&nbsp;&nbsp;
                                  <button id='".$rows[$ctr]['ID']."' value='".$rows[$ctr]['ID']. "' type='button' data-toggle='modal' data-target='#deleteMedicine".$ctr."' class='btn btn-sm btn-danger w-100'> Delete <i class='icon-trash float-left'></i></button>
                                </div></td>
                                </tr>";
                          
                                ?>
                                <!--modal of deit medicine-->

                                <div class="modal fade"  id=<?php echo "\"editMedicine".$ctr."\"";?> role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <form method="POST" action="../../SaveRecords/savemed.php">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Medicine Information</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                     </div>
                                   <div class="modal-body">
                                  <h4 class="card-title">Medicine Information <i class="icon-user float-left"></i></h4>
                                    <div class="form-group row">
                                        <div class="col-md-12 col-sm-12 mb-2">
                                          <input type="hidden" class="form-control" id="M_IDe" name="M_IDe"
                                              value=<?php echo $rows[$ctr]["ID"];?> >
                                            <input type="text" class="form-control" id="M_Name" name="M_Name" placeholder="Medicine Name" 
                                              value=<?php echo $rows[$ctr]["MedicineName"];?> >

                                        </div>
                                        <div class="col-md-12 col-sm-12 mb-2">
                                        <input type="text" class="form-control" id="M_Category" name="M_Category" placeholder="Medicine Category"   value=<?php echo $rows[$ctr]["Category"];?>>
                                        </div>
                                        <div class="col-md-12 col-sm-12 mb-2">
                                            <input type="number" class="form-control" id="M_Stock" name="M_Stock" placeholder="Stock" value=<?php echo $rows[$ctr]["Stock"];?>>
                                        </div>
                                         <div class="col-md-12 col-sm-12 mb-2">
                                            <input type="text" class="form-control" id="M_UnitMeasure" name="M_UnitMeasure" placeholder="Unit Measure" value=<?php echo $rows[$ctr]["UnitMeasure"];?>>
                                        </div>
                                        <div class="col-md-12 col-sm-12 mb-2">
                                          <div class="row">
                                             <label class="form-control col-md-5" >Expiration Date: </label>          
                                            <input type="date" class="form-control col-md-7 mb-2" name="M_ExpDate" placeholder="Expiry Date" onfocus="this.type='date'" value=<?php echo $rows[$ctr]["ExpDate"];?>>
                                          </div>
                                         </div>
                                    </div>
                                               
                                   </div>
                                    <div class="modal-footer">
                                         <button type="submit"  class="btn btn-primary w-100" name="EditMed">Save</button>
                                    </div>
                                    </form>
                                  </div>
                                </div>
                              </div>

                              <!-- Modal for delete -->
                              <div class="modal fade" id=<?php echo "\"deleteMedicine".$ctr."\"";?> tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Delete this item..</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      Are you sure you want to delete <?php echo $rows[$ctr]["MedicineName"];?> ?
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                      <input type="submit" name ="delmed" class="btn btn-success" data-dismiss="modal" value= "Yes" onclick="deleteRow(<?php echo $rows[$ctr]['ID']; ?>)">
                                    </div>
                          </div>
                                  </div>
                                </div>
                              </div>

                          <?php  
                          }
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
        
        $("#myTable1 tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
    function deleteRow(btnid){
      var sqlmed = "UPDATE tbl_medicine SET Status ='0' where ID='"+btnid+"'" ;
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
    <script>
      function verifyOldPass(element){
        // console.log(document.getElementById('npass').value);
        const Http = new XMLHttpRequest();
        Http.open("GET", "../../saverecords/updateUser.php?q="+element.value);
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


  
         <div class="modal fade"  id="Medicine" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <form method="POST" action="../../SaveRecords/savemed.php">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Medicine Information</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                     </div>
                                   <div class="modal-body">
                                  <h4 class="card-title">Medicine Information <i class="icon-user float-left"></i></h4>
                                    <div class="form-group row">
                                        <div class="col-md-12 col-sm-12 mb-2">
                                
                                            <input type="text" class="form-control" id="M_Name" name="M_Name" placeholder="Medicine Name" 
                                            required >

                                        </div>
                                        <div class="col-md-12 col-sm-12 mb-2">
                                        <input type="text" class="form-control" id="M_Category" name="M_Category" placeholder="Medicine Category"   required>
                                        </div>
                                        <div class="col-md-12 col-sm-12 mb-2">
                                            <input type="text" class="form-control" id="M_Stock" name="M_Stock" placeholder="Stock" required>
                                        </div>
                                         <div class="col-md-12 col-sm-12 mb-2">
                                            <input type="text" class="form-control" id="M_UnitMeasure" name="M_UnitMeasure" placeholder="Unit Measure" required>
                                        </div>
                                        <div class="col-md-12 col-sm-12 mb-2">
                                          <div class="row">
                                             <label class="form-control col-md-5" >Expiration Date: </label>          
                                            <input type="date" class="form-control col-md-7 mb-2" name="M_ExpDate" placeholder="Expiry Date" onfocus="this.type='date'" required>
                                          </div>
                                         </div>
                                    </div>
                                               
                                   </div>
                                    <div class="modal-footer">
                                      <button class="btn btn-danger w-100" data-dismiss="modal" >Close</button>
                                         <button type="submit"  class="btn btn-primary w-100" name="AddMed">Save</button>
                                    </div>
                                    </form>
                                  </div>
                                </div>
                              </div>

</html>


