<?php

session_start();
if(!isset($_SESSION['buhs_user'])) header("location: login.php");
include '../db_connection.php';

$conn = OpenCon();
if(isset($_POST['AddMed'])){
	$result = mysqli_query($conn,"select * from tbl_medicine where Category='".$_POST['M_Category']."' and MedicineName =  '".$_POST['M_Name']."' and UnitMeasure  = '".$_POST['M_UnitMeasure']."'"); 
	$r=mysqli_fetch_assoc($result);
	$expdate = explode (" ",$r['ExpDate']); 
	if($expdate[0] == $_POST['M_ExpDate'])
		$sqlmed = "Update tbl_medicine SET Stock = (select Stock from tbl_medicine  where Category='".$_POST['M_Category']."' and MedicineName =  '".$_POST['M_Name']."' and UnitMeasure  = '".$_POST['M_UnitMeasure']."' and ExpDate = '".$_POST['M_ExpDate']."')+ '".$_POST['M_Stock']."'  where Category='".$_POST['M_Category']."' and MedicineName =  '".$_POST['M_Name']."' and UnitMeasure  = '".$_POST['M_UnitMeasure']."' ";
	else
		$sqlmed = "INSERT INTO tbl_medicine (Category, MedicineName, Stock, ExpDate,UnitMeasure, CreatedBy, ModifiedBy) VALUES('".$_POST['M_Category']."','".$_POST['M_Name']."','".$_POST['M_Stock']."','".$_POST['M_ExpDate']."','".$_POST['M_UnitMeasure']."', '".$_SESSION['Fname']." ".$_SESSION['Lname']."','".$_SESSION['Fname']." ".$_SESSION['Lname']."')";
	// echo $sqlmed;
	$conn->query($sqlmed);
}

if(isset($_POST['EditMed'])){
	$sqlmed = "UPDATE tbl_medicine  SET Category ='".$_POST['M_Category']."', MedicineName = '".$_POST['M_Name']."', Stock= '".$_POST['M_Stock']."', ExpDate= '".$_POST['M_ExpDate']."', UnitMeasure = '".$_POST['M_UnitMeasure']."', ModifiedBy = '".$_SESSION['Fname']." ".$_SESSION['Lname']."' where ID= '".$_POST['M_IDe']."'";
	echo $sqlmed;
	// echo $sqlmed;
	$conn->query($sqlmed);
}

?>