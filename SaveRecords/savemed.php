<?php

session_start();
if(!isset($_SESSION['buhs_user'])) header("location: login.php");
include '../db_connection.php';

if(isset($_POST['AddMed'])){
	$conn = OpenCon();
	$sqlmed = "INSERT INTO tbl_medicine (MedicineID,Category, MedicineName, Stock, ExpDate,UnitMeasure, CreatedBy, ModifiedBy) VALUES('".$_POST['M_ID']."','".$_POST['M_Category']."','".$_POST['M_Name']."','".$_POST['M_Stock']."','".$_POST['M_ExpDate']."','".$_POST['M_UnitMeasure']."', '".$_SESSION['Fname']." ".$_SESSION['Lname']."','".$_SESSION['Fname']." ".$_SESSION['Lname']."')";
	// echo $sqlmed;
	$conn->query($sqlmed);
}

if(isset($_POST['EditMed'])){
	$conn = OpenCon();
	$sqlmed = "UPDATE tbl_medicine  SET Category ='".$_POST['M_Category']."', MedicineName = '".$_POST['M_Name']."', Stock= '".$_POST['M_Stock']."', ExpDate= '".$_POST['M_ExpDate']."', UnitMeasure = '".$_POST['M_UnitMeasure']."', ModifiedBy = '".$_SESSION['Fname']." ".$_SESSION['Lname']."' where MedicineID= '".$_POST['M_IDe']."'";
	echo $sqlmed;
	// echo $sqlmed;
	$conn->query($sqlmed);
}

?>