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
	$region = $_POST['S_Region'];
	$province = $_POST['S_Province'];
	$municity = $_POST['S_City'];
	$brgy = $_POST['S_Baranggay'];
	$street = $_POST['S_SNumber'];
	$Address = $region .",".$province .", ". $municity .", ". $brgy.", ". $street;
	$Age = $_POST['S_Age'];
	$Religion = $_POST['S_Religion'];
	$Birthdate = date('Y-m-d', strtotime($_POST['S_Bdate']));;
	$Course = $_POST['S_Courses'];
	$YearLevel =$_POST['S_YearLevel'];
	$CollegeUnit = $_POST['S_Dpartment'];
	$ContactNum = $_POST['S_Cnumber'];
	$CivilStatus = $_POST['S_Status'];
	$Sex = $_POST['S_Gender'];
	$Modifiedby =  $_SESSION['Fname']. " ". $_SESSION['Lname'];
	$CreatedBy = $_SESSION['Fname']. " ". $_SESSION['Lname'];//geting the name

	if(isset($_GET['edit'])){
		$sqlFather = 'UPDATE tbl_patientsparentinfo SET Fname=\''.$_POST['F_FName'].'\',`Mname`=\''.$_POST['F_MName'].'\',`Lname`=\''.$_POST['F_LName'].'\',`Occupation`=\''.$_POST['L_Occupation'].'\',`OfficeAddress`=\''.$_POST['L_Address'].'\',`ContactNumber`=\''.$_POST[''].'\',`Relation`=\''.$_POST[''].'\',`ModifiedDate`=\''.$_POST[''].'\',`CreatedDate`=\''.$_POST[''].'\',`ModifiedBy`=\''.$_POST[''].'\',`CreatedBy`=\''.$_POST[''].'\' WHERE Relation=\'Father\' PatientID=\''.$PatientID.'\'';
	}else{
		$sql = 'INSERT INTO tbl_patientinfo (PatientID, Lname, Fname, Mname, Address,Region,Province,MuniCity,Brgy,Street, Age,Religion, Birthdate, Course, YearLevel, CollegeUnit, ContactNum, CivilStatus,Sex,ModifiedDate,CreatedDate,Modifiedby,CreatedBy) VALUES (\''.$PatientID.'\', \''.$Lname.'\', \''.$Fname.'\', \''.$Mname.'\', \''.$Address.'\', \''.$region.'\', \''.$province.'\', \''.$municity.'\', \''.$brgy.'\', \''.$street.'\', \''.$Age.'\', \''.$Religion.'\', \''.$Birthdate.'\', \''.$Course.'\', \''.$YearLevel.'\',  \''.$CollegeUnit.'\', \''.$ContactNum.'\', \''.$CivilStatus.'\', \''.$Sex.'\',null,null,\''.$Modifiedby.'\',\''.$CreatedBy.'\')';
		$sqlFather = 'INSERT INTO tbl_patientsparentinfo (PatientID, Fname, Mname, Lname, Occupation, OfficeAddress, ContactNumber, Relation, ModifiedBy, CreatedBy) VALUES (\''.$PatientID.'\',\''.$_POST["F_FName"].'\',\''.$_POST["F_MName"].'\',\''.$_POST["F_LName"].'\',\''.$_POST["F_Occupation"].'\',\''.$_POST["F_Address"].'\',\''.$_POST["F_CNumber"].'\', \'Father\',\''.$Modifiedby.'\',\''.$CreatedBy.'\')';
		$sqlMother = 'INSERT INTO tbl_patientsparentinfo (PatientID, Fname, Mname, Lname, Occupation, OfficeAddress, ContactNumber, Relation, ModifiedBy, CreatedBy) VALUES (\''.$PatientID.'\',\''.$_POST["M_FName"].'\',\''.$_POST["M_MName"].'\',\''.$_POST["M_LName"].'\',\''.$_POST["M_Occupation"].'\',\''.$_POST["M_Address"].'\',\''.$_POST["M_CNumber"].'\', \'Mother\',\''.$Modifiedby.'\',\''.$CreatedBy.'\')';
		$sqlGuardian = 'INSERT INTO tbl_patientsparentinfo (PatientID, Fname, Mname, Lname, Occupation, OfficeAddress, ContactNumber, Relation, ModifiedBy, CreatedBy) VALUES (\''.$PatientID.'\',\''.$_POST["G_FName"].'\',\''.$_POST["G_MName"].'\',\''.$_POST["G_LName"].'\',\''.$_POST["G_Occupation"].'\',\''.$_POST["G_Address"].'\',\''.$_POST["G_CNumber"].'\', \'Guardian\',\''.$Modifiedby.'\',\''.$CreatedBy.'\')';
	}
	
	if ($conn->query($sql) === TRUE && $conn->query($sqlFather) === TRUE && $conn->query($sqlMother) === TRUE && $conn->query($sqlGuardian)) {
		header("location: ../pages/forms/studenthealthform.php");
	    echo "<script>alert('New record created successfully')</script>";

	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$illness[] = {'illnesscancer','illnessHypertention','illnessstroke','illnesstuberculosis','illnessrheumatism','illnesseyesD','illnessdiabetes','illnessasthma','illnessconvulsion','illnessskin','illnessrheumatism','illnessHdisease','illnesskidney','illnessrheumatism','illnessrmental','illnessgastro'};
	$sqlIllness = 'INSERT INTO tbl_familyhistoryanswer (PatientID, Illness, Status, Relation,ModifiedDate,CreatedDate,Modifiedby,CreatedBy)
	VALUES (\''.$PatientID.'\', \''.$Illness.'\', \''.$Status.'\', \''.$Relation.'\',null,null,\''.$Modifiedby.'\',\''.$CreatedBy.'\')';

	CloseCon($conn);
}

?>