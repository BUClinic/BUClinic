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
                    <img src="../../images/ddh.png" alt="logo" width="100%"/>
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
                        <a href="#" class="nav-link">
                            <div class="profile-image">
                                <img class="img-xs rounded-circle" src="../../images/faces/noface.jpg" alt="profile image">
                                <div class="dot-indicator bg-success"></div>
                            </div>
                            <div class="text-wrapper">
                                <p class="profile-name" id="user"><?php echo ucfirst($_SESSION['Fname'])." ";echo ucfirst($_SESSION['Lname']);?></p>
                                <p class="designation"><?php echo ucfirst($_SESSION['position']);?></p>
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
                            <li class="nav-item"> <a class="nav-link" href="logout.php"> Sign Out </a></li>
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
                        <h2> MEDICATION FORM <i class="icon-note float-left"></i> </h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="studenthealthform.php">Student Form</a></li> 
                                <li class="breadcrumb-item"><a href="dailyconsultation.php">Daily Consultation Form</a></li>  
                                <li class="breadcrumb-item"><a href="medicationform.php">Medication Form</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Form elements</li>
                            </ol>
                        </nav>
                    </div>
                    <form method="POST" action="#">
                        <div class="row">
                            <div class="col-md-12 grid-margin row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Medication Form <i class="icon-user float-left"></i></h4>
                                            <div class="form-group row">
                                                <div class="col-md-12 col-sm-12 mb-2">
                                                    <input type="text" class="form-control" id="S_Id" name="S_Id" placeholder="Student ID " onkeyup="searchID()" required>
                                                </div>
                                                <div class="col-md-12 col-sm-12 mb-2">
                                                    <input type="text" class="form-control" id="S_Name" name="S_Name" placeholder="Student name" readonly>
                                                </div>
                                                <div class="form-group row col-md-12 col-sm-12 mb-2">
                                                <div class=" form-group row col-md-12 col-sm-12 mb-2">
                                                <div class="col-md-6 col-sm-12 mb-2">
                                                        <select class="form-control" name="med_cat" id="med_cat" onchange="setMed()"  required>
                                                            <option selected disabled  value="">Medicine Category</option>
                                                            <?php 
                                                            $sql = "select * from tbl_medicine";
                                                            $res = mysqli_query($conn,$sql);
                                                            $x=0;
                                                            while($list = mysqli_fetch_assoc($res)){
                                                                $col[$x] = $list['Category'];
                                                                if(($col[$x]!=$col[$x-1])&&$col[$x]!=null)
                                                                  echo "<option  '>".$col[$x]."</option>";  
                                                                $x++;                   
                                                            }
                                                            ?>
                                                        </select> 
                                                    </div>
                                                    <div class="col-md-6 col-sm-12 mb-2">
                                                        <select class="form-control" name="M_Name" id="M_Name" onchange="setMes()" required>
                                                            <option selected disabled value="">Medicine Name</option>
                                                        </select> 
                                                    </div>
                                                    <div class="col-md-6 col-sm-12 mb-2">
                                                        <select class="form-control" name="M_Measure" id="M_Measure" onchange="setExp()" required>
                                                            <option selected  disabled value="">Unit Measure</option>
                                                        </select> 
                                                    </div>
                                                    <div class="col-md-6 col-sm-12 mb-2">
                                                        <select class="form-control" name="M_ExpDate" id="M_ExpDate" required>
                                                            <option selected  disabled value="">Expiration Date</option>
                                                        </select> 
                                                    </div>
                                                    <div class="col-md-6 col-sm-12 mb-2">
                                                        <input type="number" class="form-control mb-2" id="quantity" name="quantity" placeholder="Quantity" required>
                                                        <input type="text" class="form-control mb-2" id="qty" name="qty" placeholder="meds" value=" " hidden>
                                                        <input type="text" class="form-control mb-2" id="mid" name="mid" placeholder="meds"  value=" "hidden>
                                                        <input type="text" class="form-control mb-2" id="med" name="med" placeholder="meds"  value=" "hidden>
                                                    </div>
                                                    
                                                    <div class="col-md-6 col-sm-12 mb-2">
                                                    <input type="button" class="form-control btn-primary mb-2" id="add" name="add" value="Add" onclick="addTo()">
                                                    </div>
                                                </div>
                                                <div>
                                            </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                <table class="table table-hover" id="tblmed">
                                                <thead id="tablehead">
                                                    <tr>
                                                    <th class="font-weight-bold">Medicine ID</th>
                                                    <th class="font-weight-bold">Medicine Name</th>
                                                    <th class="font-weight-bold">Unit Measure</th>
                                                    <th class="font-weight-bold">Quantity</th>
                                                    <th></th>

                                                    </tr>
                                                </thead>
                                                <tbody >

                                                </tbody>
                                                </table>
                                </div>
                            </div>
                        <div class="float-right card-body">
                            <button type="submit" class="btn btn-primary" name="submit" onclick="setMeds()">Submit</button>
                            <button class="btn btn-dark" id="cancel">Cancel</button>
                        </div>
                        </div>
                    </form>

                </div>
    <script>
        function setMed(){
                document.getElementById("quantity").value="";
                var result;
                var list = document.getElementById("med_cat");
                var optionVal = list.options[list.selectedIndex].text;
                const Http = new XMLHttpRequest();
                Http.open("GET", "../../saverecords/sql.php?query=select distinct MedicineName from tbl_medicine where Category = '" + optionVal + "'");
                Http.send();
                Http.onreadystatechange = function(){
                    if(this.readyState==4 && this.status==200){
                        result = JSON.parse(Http.responseText);
                        var i=0;
             
                        $('#M_Name')
                          .find('option')
                          .remove()
                          .end()
                          .append('<option selected disabled value="">Medicine Name</option>')
                        ;
                        $('#M_Measure')
                          .find('option')
                          .remove()
                          .end()
                          .append('<option selected disabled value="">Unit Measure</option>')
                        ;
                        for(i=0;i<result.length;i++){

                            $('#M_Name')
                            .find('option')
                            .end()
                            .append('<option>'+result[i].MedicineName+'</option>')
                            ;

                        }
                    }
                    
                }
            }
          
        var result;
        function setMes(){
             
                document.getElementById("quantity").value="";
                 
                var catID = document.getElementById("med_cat");
                var list = document.getElementById("M_Name");
                var optionVal = list.options[list.selectedIndex].text;
                var catVal = catID.options[catID.selectedIndex].text;
                const Http = new XMLHttpRequest();
                Http.open("GET", "../../saverecords/sql.php?query=select distinct UnitMeasure from tbl_medicine where Category = '"+catVal+"' and MedicineName = '"+optionVal +"' ");
                Http.send();
                Http.onreadystatechange = function(){
                    if(this.readyState==4 && this.status==200){
                        result = JSON.parse(Http.responseText);        
                        var i=0;
                        $('#M_Measure')
                          .find('option')
                          .remove()
                          .end()
                          .append('<option selected disabled value="">Unit Measure</option>')
                        ;
                        for(i=0;i<result.length;i++){
                            
                                $('#M_Measure')
                                .find('option')
                                .end()
                                .append('<option >'+result[i].UnitMeasure+'</option>')
                                ;
                        }
                       
                    }
                    
                }
            }

    function setExp(){ 
             var M_measure = document.getElementById("M_Measure");
             var catID = document.getElementById("med_cat");
             var list = document.getElementById("M_Name");
             var optionVal = list.options[list.selectedIndex].text;
             var catVal = catID.options[catID.selectedIndex].text;
             var M_measures = M_measure.options[M_measure.selectedIndex].text;
             const Http = new XMLHttpRequest();
             Http.open("GET", "../../saverecords/sql.php?query=select * from tbl_medicine where Category = '"+catVal+"' and MedicineName = '"+optionVal+"' and UnitMeasure = '"+M_measures+"' ");
             Http.send();
             Http.onreadystatechange = function(){
                 if(this.readyState==4 && this.status==200){
                     result = JSON.parse(Http.responseText);   
                     var i=0;
                     $('#M_ExpDate')
                       .find('option')
                       .remove()
                       .end()
                       .append('<option selected disabled value="">Expiration Date</option>')
                     ;
                     for(i=0;i<result.length;i++){
                         $('#M_ExpDate')
                         .find('option')
                         .end()
                         .append('<option id='+result[i].ID+'>'+result[i].ExpDate+'</option>')
                         ;
                     }
                 }
                 
             }
         }
       function setMeds(){
            var tbl = document.getElementById('tblmed');
            for (var i=1;i<tbl.rows.length;i++){
                var tempqty = document.getElementById('qty').value;
                var tempmd = document.getElementById('mid').value;
                var tempmed = document.getElementById('med').value;
                document.getElementById('qty').value = tempqty + tbl.rows[i].cells[3].innerHTML+",";
                document.getElementById('mid').value = tempmd + tbl.rows[i].cells[0].innerHTML+",";
                document.getElementById('med').value = tempmed + tbl.rows[i].cells[1].innerHTML+",";
            }
            
        }

 
    function searchID(){
        var result;
        const Http = new XMLHttpRequest();
        let url = 	"../../saverecords/sql.php?query=select * from tbl_patientinfo where PatientID = '" + document.getElementById("S_Id").value + "'";
        Http.open("POST", url);
        Http.send();
        Http.onreadystatechange = function(){
            if(this.readyState==4 && this.status==200){
                let sqlResult = Http.responseText.substring(1,Http.responseText.length-1);
                result = JSON.parse(sqlResult);
                console.log(result.ID);
                document.getElementById("S_Name").value = result.Lname + ", "+ result.Fname +", "+ result.Mname;
    
                }
        }
    }

      function addTo(){

        var user =document.getElementById('user').innerText;
        var id = document.getElementById('S_Id').value;
        var med = document.getElementById('M_Name').options[document.getElementById('M_Name').selectedIndex].text;
        var qty = document.getElementById('quantity').value;
        var tempstock;
        
        var tr,td,idm,name,qty;
        var flag= false;
        idm= document.getElementById("M_ExpDate").options[document.getElementById("M_ExpDate").selectedIndex].id;
        qty = document.getElementById("quantity").value;
        const Http = new XMLHttpRequest();
        Http.open("GET", "../../saverecords/sql.php?query=select * from tbl_medicine where ID = '"+idm+"' ");
        Http.send();
        Http.onreadystatechange = function(){
                    if(this.readyState==4 && this.status==200){
                        let sqlResult = Http.responseText.substring(1,Http.responseText.length-1);
                        result = JSON.parse(sqlResult);  
                        tempstock = result.Stock;
                            
                            if(parseInt(tempstock)>=parseInt(qty)){

                                var tbl = document.getElementById('tblmed');
                                for (var i=1;i<tbl.rows.length;i++){
                                    var temp = tbl.rows[i].cells[3];
                                    var temp1 = tbl.rows[i].cells[0].innerHTML;
                                        if(temp1==parseInt(idm)){
                                            temp.innerHTML = parseInt(temp.innerHTML)+parseInt(qty);
                                            flag=true;
                                        }   
                                }
                                if(!flag){

                                    document.getElementById("tablehead").appendChild(tr = document.createElement("tr"));
                                    tr.appendChild(td = document.createElement("td"));
                                    td.innerHTML = idm;
    
                                    tr.appendChild(td = document.createElement("td"));
                                    td.innerHTML = name = document.getElementById("M_Name").options[document.getElementById("M_Name").selectedIndex].text;
    
                                    tr.appendChild(td = document.createElement("td"));
                                    td.innerHTML= mes = document.getElementById("M_Measure").options[document.getElementById("M_Measure").selectedIndex].text;
    
                                    tr.appendChild(td = document.createElement("td"));
                                    td.innerHTML= qty;
    
                                    //creating remove button and adding it to row
                                    tr.appendChild(td = document.createElement("td"));
                                    var btn = document.createElement('input');
                                    btn.id = idm;
                                    btn.type = "button";
                                    btn.className = "btn btn-sm btn-danger";
                                    btn.value = "Remove";
                                    btn.name= idm;
                                    btn.onclick = (function(btn) {return function() {RemoveRow(this);}})();
                                    td.appendChild(btn);
                                    
                                    
                                }
                            }
                            else{
                                alert("This Medicine has only "+tempstock+" Stock");
                            }      
                   } 
                    
        }
        

      }


      function RemoveRow(btn){
        var row = btn.parentNode.parentNode;
        row.parentNode.removeChild(row);  
      }
    
    </script>
        <?php
            if(isset($_POST['submit'])){
                   //setting the quantities and decreasing the medicine stocks
                   $tempqty = $_POST['qty'];
                   $tempmd = $_POST['mid'];
                   $tempmed = $_POST['med'];
                   $qty = explode (",",$tempqty);
                   $md = explode (",",$tempmd);
                   $med = explode (",",$tempmed);
                   for($i=0;$i<sizeof($qty)-1;$i++){    
                       $sql ="UPDATE tbl_medicine SET Stock=(select Stock from tbl_medicine where ID = '".$md[$i]."')-'".$qty[$i]."' where ID= '".$md[$i]."'"; 
                       $conn->query($sql);
                       $result = mysqli_query($conn,"select * from tbl_medication where MedicineID='".$md[$i]."' "); 
                       $r=mysqli_fetch_assoc($result);
                       $resultd = mysqli_query($conn,"select * from tbl_medicine where ID='".$md[$i]."' "); 
                       $rd=mysqli_fetch_assoc($resultd);
                       $createddate = explode (" ",$r['CreatedDate']); 
                       $modifieddate = explode (" ",$rd['ModifiedDate']); 
                       echo "<br>".$createddate[0]." == ".$modifieddate[0].") && (".$md[$i]." == ".$r['MedicineID'];
                       echo "<script>console.log(".$createddate[0]." == ".$modifieddate[0].") && (".$md[$i]." == ".$r['MedicineID'].");</script>";
                       if(($createddate[0] == $modifieddate[0]) && ($md[$i] == $r['MedicineID'])){
                           $sql= "UPDATE tbl_medication SET Quantity=(select Quantity from tbl_medication where MedicineID = '".$md[$i]."' and CreatedDate = '".$createddate[0]." ".$createddate[1]."')+'".$qty[$i]."'  where MedicineID ='".$md[$i]."' and PatientID ='".$_POST['S_Id']."' ";
                           echo $sql;
                       }
                       else
                           $sql= "INSERT INTO tbl_medication (MedicineID,PatientID,MedicineName,Quantity,CreatedBy,ModifiedBy) VALUES('".$md[$i]."','".$_POST['S_Id']."','".$med[$i]."','".$qty[$i]."','".$_SESSION['Fname'] ." ".$_SESSION['Lname']."','".$_SESSION['Fname'] ." ".$_SESSION['Lname']."')";
                       
                       $conn->query($sql);

                    }  
                    echo "<script>alert('Success')</script>";
                    echo "<script>window.open('medicationform.php','_self')</script>";
            
                }

            
        ?>        
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
                                            <input type="text" class="form-control" id="currenntPass" name="currentPass" placeholder="Current Password" required onfocusout="verifyOldPass(this)">
                                        </div>
                                        <div class="col-md-12 col-sm-12 mb-2">
                                            <input type="text" class="form-control" id="npass" name="newPass"  placeholder="New Password" required >
                                        </div>
                                        <div class="col-md-12 col-sm-12 mb-2">
                                            <input type="text" class="form-control" id="rpass" name="retypePass"  placeholder="Re-type Password" required onkeyup="verifyPass(this)">
                                        </div>
                                    </div>
                                               
                                   </div>
                                    <div class="modal-footer">
                                      <button class="btn btn-danger w-100"  >Close</button>
                                      <button type="submit"  class="btn btn-primary w-100" name="updatePass"id="updatePass" disabled>Save</button>
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
                                            <input type="email" class="form-control" id="email" name="oldEmail" value = <?php echo $_SESSION['Email'];?>  required >
                                        </div>
                                        <div class="col-md-12 col-sm-12 mb-2">
                                            <input type="text" class="form-control" id="nemail" name="newEmail"  placeholder="New Email" required >
                                        </div>
                                        
                                    </div>
                                               
                                   </div>
                                    <div class="modal-footer">
                                      <button class="btn btn-danger w-100"  >Close</button>
                                      <button type="submit"  class="btn btn-primary w-100" name="updateEmail" >Save</button>
                                    </div>
                                    </form>
    </div>
  </div>
</div>



    </html>