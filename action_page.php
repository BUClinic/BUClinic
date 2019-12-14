<?php
include 'db_connection.php';

if(isset($_POST['save'])){

$conn = OpenCon();

$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$username = $_POST['username'];
$password = $_POST['password'];
$position = $_POST['position'];

// echo "welcome $fname $lname";
$password = md5($password);
$sql = "INSERT INTO tbl_user (Lname, Fname, Mname, Username, Password, Position)
VALUES ('$lname', '$fname', '$mname', '$username', '$password', '$position')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

CloseCon($conn);
}

?>