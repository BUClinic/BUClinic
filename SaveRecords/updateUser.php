<?php
session_start();
include '../db_connection.php';
$conn = OpenCon();
$User = $_SESSION['buhs_user'];
if(isset($_POST['updateName'])){
    $Fname = $_POST['Fname'];
    $Mname = $_POST['Mname'];
    $Lname = $_POST['Lname'];
    $_SESSION['Fname'] = $Fname;
    $_SESSION['Mname'] = $Mname;
    $_SESSION['Lname'] = $Lname;
    $conn->query("update tbl_user set Fname='$Fname', Mname='$Mname', Lname='$Lname' where Username='$User'");
}else if(isset($_POST['updateEmail'])){
    $newEmail = $_POST['newEmail'];
    $_SESSION['Email'] = $newEmail;
    $conn->query("update tbl_user set Email='$newEmail' where Username='$User'");
}else if(isset($_POST['updatePass'])){
    $newPass=md5($_POST['newPass']);
    $conn->query("update tbl_user set Password='$newPass' where Username='$User'");
}else if(isset($_GET['q'])){
    $pass = md5($_GET['q']);
    $r = $conn->query("select Username from tbl_user where Username='$User' and Password='$pass'");
    if(mysqli_num_rows($r)==1){
        echo 'true';
    }else{
        echo 'false';
    }
}

CloseCon($conn);

?>