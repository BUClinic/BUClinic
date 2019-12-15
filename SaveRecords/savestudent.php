<?php

session_start();
if(!isset($_SESSION['buhs_user'])) header("location: login.php");
    include '../db_connection.php';
    


if(isset($_POST['submit'])){

	$conn = OpenCon();

	$PatientID = $_POST['S_Id'];
	$Lname = $_POST['S_Lname'];
	$Fname = $_POST['S_Fname'];
	$Mname = $_POST['S_Mname'];
	$Address =  $_POST['S_Region'] .",".$_POST['S_Province'] .", ". $_POST['S_City'] .", ". $_POST['S_Barangay'].", ". $_POST['S_SNumber'];
	$region = $_POST['S_Region'];
	$province = $_POST['S_Province'];
	$municity = $_POST['S_City'];
	$brgy = $_POST['S_Barangay'];
	$street = $_POST['S_SNumber'];
	$Age = $_POST['S_Age'];
	$Birthdate = date('Y-m-d', strtotime($_POST['S_Bdate']));;
	$Course = $_POST['S_Course'];
	$YearLevel ="1";
	$CollegeUnit = $_POST['S_Dpartment'];
	$ContactNum = $_POST['S_Cnumber'];
	$CivilStatus = $_POST['S_Status'];
	$Sex = $_POST['S_Gender'];
	$Modifiedby =  $_SESSION['Fname']. " ". $_SESSION['Lname'];
	$CreatedBy = $_SESSION['Fname']. " ". $_SESSION['Lname'];//geting the name


	$sql = "INSERT INTO tbl_patientinfo (PatientID, Lname, Fname, Mname, Address,Region,Province,MuniCity,Brgy,Street, Age, Birthdate, Course, YearLevel, CollegeUnit, ContactNum, CivilStatus,Sex,ModifiedDate,CreatedDate,Modifiedby,CreatedBy)
	VALUES ('$PatientID', '$Lname', '$Fname', '$Mname', '$Address', '$region', '$province','$municity','$brgy','$street','$Age', '$Birthdate', '$Course', '$YearLevel', '$CollegeUnit', '$ContactNum', '$CivilStatus','$Sex',null,null,'$Modifiedby','$CreatedBy')";

	if ($conn->query($sql) === TRUE) {
		header("location: ../pages/forms/studenthealthform.php");
	    echo "<script>alert('New record created successfully')</script>";

	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	CloseCon($conn);
}

?>