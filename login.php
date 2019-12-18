<?php 
include('db_connection.php');
session_start();

if(isset($_SESSION['buhs_user'])){
    header("location: index.php");
}

$error = " ";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $conn = OpenCon();
    $myusername = $_POST['username'];
    $mypassword = md5($_POST['password']);
    
    $sql = "SELECT Fname, Lname, Position, Email FROM tbl_user WHERE Username = '$myusername' and Password = '$mypassword'";
    
    
    $result = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($result);
    
    if($count == 1){
        $_SESSION['buhs_user'] = $myusername;
        $r = mysqli_fetch_assoc($result);
        $_SESSION["Fname"] = $r["Fname"];
        $_SESSION["Lname"] = $r["Lname"];
        $_SESSION["Email"] = $r["Email"];
        echo $r["Position"];
        $_SESSION["position"] = $r["Position"];
        if(isset($_SESSION['redirect_to']))
        {
            $url = $_SESSION['redirect_to'];
            unset($_SESSION['redirect_to']);
            header('location:' . $url);
        }else{
           header("location: index.php");
        }
        
        $fieldinfo = mysqli_fetch_field($result);
        
        //$_SESSION['Fname'] = $fieldinfo->Fname;
    }
    else {
        $error = "Your Login Username or Password is Invalid";
    }
    /*     if ( $conn->query($sql)) == TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    CloseCon($conn);
}*/
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bicol University Clinic</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="css/style.css" <!-- End layout styles -->
    <link rel="shortcut icon" href="images/logo.png" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row flex-grow">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left p-5">
                            <div class="brand-logo">
                                <img src="images/ddh.png" style="width:100%">
                            </div>
                            <h4>Bicol University Clinic</h4>
                            <h6 class="font-weight-light">Sign in to continue.</h6>
                            <form class="pt-3" action="" method="POST">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username" name="username">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="password">
                                </div>
                                <div class="mt-3">
                                    
                                    <input type="submit" value="SIGN IN" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                                    <!--   <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" value="Submit">SIGN IN</a> -->
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input"> Keep me signed in </label>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
</body>

</html>
