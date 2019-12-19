<?php
session_start();
include 'db_connection.php';
$conn->OpenCon();
$User = $_SESSION['buhs_user'];
if(isset($_POST['updateName'])){
    $Fname = $_POST['Fname'];
    $Mname = $_POST['Mname'];
    $Lname = $_POST['Lname'];
    $conn->query("update tbl_user set Fname='$Fname', Mname='$Mname', Lname='$Lname' where Username='$User'");
}else if(isset($_POST['updateEmail'])){
    $newEmail = $_POST['newEmail'];
    $conn->query("update tbl_user set Email='$newEmail' where Username='$User'");
}else if(isset($_POST['updatePass'])){
    $newPass=md5($_POST['newPass']);
    $conn->query("update tbl_user set Password='$newPass' where Username='$User'");
}

CloseCon($conn);

?>