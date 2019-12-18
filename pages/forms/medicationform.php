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
    <link rel="shortcut icon" href="../../images/logo.png" />
</head>
<body>
    <div class="container-scroller">
        <!-- partial:../../partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex align-items-center">
                <a  href="../../index.php">
                    <img src="../../images/ddh.png" alt="logo" width="200" height="50"  />
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
                                <li class="nav-item"> <a class="nav-link" href="medicationform.php">Medicine Inventory Form</a></li>
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
                        <h2> MEDICATION FORM <i class="icon-note float-left"></i> </h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="studenthealthform.php">Student Form</a></li>
                                <li class="breadcrumb-item"><a href="employeeform.php">Employee Form</a></li>  
                                <li class="breadcrumb-item"><a href="dailyconsultation.php">Daily Consultation Form</a></li>  
                                <li class="breadcrumb-item"><a href="medicationform.php">Daily Consultation Form</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Form elements</li>
                            </ol>
                        </nav>
                    </div>
                    <form method="POST" action="../../SaveRecords/savestudent.php">
                        <div class="row">
                            <div class="col-md-12 grid-margin row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Medication Form <i class="icon-user float-left"></i></h4>
                                            <div class="form-group row">
                                                <div class="col-md-12 col-sm-12 mb-2">
                                                    <input type="text" class="form-control" id="S_Id" name="S_Id" placeholder="Student ID">
                                                </div>
                                                <div class="col-md-12 col-sm-12 mb-2">
                                                    <input type="text" class="form-control" id="S_Name" name="S_Name" placeholder="Student name" readonly>
                                                </div>
                                                <div class="form-group row">
                                                <div class=" form-group row">
                                                <div class="col-md-3 col-sm-12 mb-2">
                                                        <select class="form-control" name="med_cat" id="med_cat" onchange="setMed()">
                                                            <option selected disabled>Medicine Category</option>
                                                            <?php 
                                                            $sql = "select * from tbl_medicine";
                                                            $res = mysqli_query($conn,$sql);
                                                            $x=0;
                                                            while($list = mysqli_fetch_assoc($res)){
                                                                $col[$x] = $list['Category'];
                                                                if(($col[$x]!=$col[$x-1])&&$col[$x]!=null)
                                                                  echo "<option >".$col[$x]."</option>";  
                                                                $x++;                   
                                                            }
                                                            ?>
                                                        </select> 
                                                    </div>
                                                    <div class="col-md-3 col-sm-12 mb-2">
                                                        <select class="form-control" name="M_Name" id="M_Name" onchange="setMes()">
                                                            <option selected disabled>Medicine Name</option>
                                                        </select> 
                                                    </div>
                                                    <div class="col-md-2 col-sm-12 mb-2">
                                                        <select class="form-control" name="M_Measure" id="M_Measure">
                                                            <option selected disabled>Unit Measure</option>
                                                        </select> 
                                                    </div>
                                                    <div class="col-md-2 col-sm-12 mb-2">
                                                    <input type="number" class="form-control mb-2" id="quantity" name="quantity" placeholder="Quantity">
                                                    <input type="text" class="form-control mb-2" id="med" name="med" placeholder="meds" hidden>
                                                    <input type="text" class="form-control mb-2" id="qty" name="qty" placeholder="meds" hidden>
                                                    <input type="text" class="form-control mb-2" id="md" name="md" placeholder="meds" hidden>
                                                    </div>
                                                    
                                                    <div class="col-md-2 col-sm-12 mb-2">
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
                                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
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
                Http.open("GET", "../../saverecords/sql.php?query=select * from tbl_medicine where Category = '" + optionVal + "'");
                Http.send();
                Http.onreadystatechange = function(){
                    if(this.readyState==4 && this.status==200){
                        result = JSON.parse(Http.responseText);
                        var i=0;
                        var temp="";
                        $('#M_Name')
                          .find('option')
                          .remove()
                          .end()
                          .append('<option selected disabled>Medicine Name</option>')
                        ;
                        $('#M_Measure')
                          .find('option')
                          .remove()
                          .end()
                          .append('<option selected disabled>Unit Measure</option>')
                        ;
                        for(i=0;i<result.length;i++){
                          if(result[i].MedicineName!=temp){
                            $('#M_Name')
                            .find('option')
                            .end()
                            .append('<option>'+result[i].MedicineName+'</option>')
                            ;
                          }
                          temp=result[i].MedicineName;
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
                Http.open("GET", "../../saverecords/sql.php?query=select * from tbl_medicine where Category = '"+catVal+"' and MedicineName = '"+optionVal +"' ");
                Http.send();
                Http.onreadystatechange = function(){
                    if(this.readyState==4 && this.status==200){
                        result = JSON.parse(Http.responseText);        
                        var i=0;
                        $('#M_Measure')
                          .find('option')
                          .remove()
                          .end()
                          .append('<option selected disabled>Unit Measure</option>')
                        ;
                        for(i=0;i<result.length;i++){
                            $('#M_Measure')
                            .find('option')
                            .end()
                            .append('<option id='+result[i].ID+'>'+result[i].UnitMeasure+'</option>')
                            ;
                        }
                    }
                    
                }
            }


    //    function setMeds(){
    //     var meds = document.getElementById('treatment').text;
    //     if(meds!=null){
    //       window.open("medinventoryform.php");
    //     }
    //     document.getElementById('med').value=" ";
    //     var tbl = document.getElementById('tblmed');
    //     for (var i=1;i<tbl.rows.length;i++){
    //       var tempmed = document.getElementById('med').value;
    //       var tempqty = document.getElementById('qty').value;
    //       var tempmd = document.getElementById('md').value;
    //       document.getElementById('med').value = tempmed + tbl.rows[i].cells[1].innerHTML+",";
    //       document.getElementById('qty').value = tempqty + tbl.rows[i].cells[3].innerHTML+",";
    //       document.getElementById('md').value = tempmd + tbl.rows[i].cells[0].innerHTML+",";
    //     }
            
    //     }


      function addTo(){

        var user =document.getElementById('user').innerText;
        var id = document.getElementById('S_Id').value;
        var med = document.getElementById('M_Name').options[document.getElementById('M_Name').selectedIndex].text;
        var qty = document.getElementById('quantity').value;
        var tempstock;
        
        var tr,td,idm,name,qty;
        idm= document.getElementById("M_Measure").options[document.getElementById("M_Measure").selectedIndex].id;
        qty = document.getElementById("quantity").value;
        const Http = new XMLHttpRequest();
        Http.open("GET", "../../saverecords/sql.php?query=select * from tbl_medicine where ID = '"+idm+"' ");
        Http.send();
        Http.onreadystatechange = function(){
                    if(this.readyState==4 && this.status==200){
                        let sqlResult = Http.responseText.substring(1,Http.responseText.length-1);
                        result = JSON.parse(sqlResult);  
                        
                        tempstock = result.Stock;
                            if(tempstock>=qty){
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
                                btn.onclick = (function(btn) {return function() {RemoveRow(this,this.id);}})();
                                td.appendChild(btn);
                                
                                
                                // Http.open("GET", "../../saverecords/sql.php?query=INSERT INTO tbl_medication (MedicineID,PatientID,MedicineName,Quantity,CreatedBy,ModifiedBy) VALUES('"+idm+"','"+id+"','"+med+"','"+qty+"','"+user+"','"+user+"')");
                                // Http.send();
                            }
                            else{
                                alert("This Medicine has only "+tempstock+" Stock");
                            }      
                   } 
                    
        }
        

      }


      function RemoveRow(btn,btnid){
        var result;
        var id = document.getElementById('DC_ID').value;
        var user = document.getElementById('user').value;
        var qty,med;
        var tbl = document.getElementById('tblmed');
        for (var i=1;i<tbl.rows.length;i++){
          var temp = document.getElementById('med').value;
          document.getElementById('med').value = temp + tbl.rows[i].cells[1].innerHTML+",";
        }
        const Http = new XMLHttpRequest();
        Http.open("GET", "../../saverecords/sql.php?query=DELETE FROM tbl_medication where PatientID ='"+id+"' and MedicineID= "+btnid+"");
        Http.send();
        var row = btn.parentNode.parentNode;
        row.parentNode.removeChild(row);  
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