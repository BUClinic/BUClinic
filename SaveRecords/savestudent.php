<?php

session_start();
if(!isset($_SESSION['buhs_user'])) header("location: login.php");
include '../db_connection.php';



if(isset($_POST['submit'])){
$conn = OpenCon();
$i=0;
$PatientID = $_POST['S_Id'];
$Lname = ucwords($_POST['S_Lname']);
$Fname = ucwords($_POST['S_Fname']);
$Mname = ucwords($_POST['S_Mname']);
$region = $_POST['S_Region'];
$province = $_POST['S_Province'];
$municity = $_POST['S_City'];
$brgy = $_POST['S_Baranggay'];
$street = $_POST['S_Street'];
$Address = $region .",".$province .", ". $municity .", ". $brgy.", ". $street;
$Age = $_POST['S_Age'];
$Religion = $_POST['S_Religion'];
$Birthdate = date('Y-m-d', strtotime($_POST['S_Bdate']));;
$Course = $_POST['S_Course'];
$YearLevel =$_POST['S_YearLevel'];
$CollegeUnit = $_POST['S_Department'];
$ContactNum = $_POST['S_Cnumber'];
$CivilStatus = $_POST['S_Status'];
$Sex = $_POST['S_Gender'];
$Modifiedby =  ucwords($_SESSION['Fname']). " ". ucwords($_SESSION['Lname']);
$CreatedBy = ucwords($_SESSION['Fname']). " ". ucwords($_SESSION['Lname']);//geting the name

$Illness = array('Cancer','Hypertension','Stroke','Tuberculosis','Rheumatism','EDisorder','Diabetes','Asthma','Convulsion','SProblems','HDisease','KProblem','MDisorder','BTendencies','GDisease');
$Status = array('optionCancer','optionHypertension','optionStroke','optionTuberculosis','optionRheumatism','optionEDisorder','optionDiabetes','optionAsthma','optionConvulsion','optionSProblems','optionHDisease','optionKProblem','optionMDisorder','optionBTendencies','optionGDisease');
$Relation = array('R_Cancer','R_Hypertension','R_Stroke','R_Tuberculosis','R_Rheumatism','R_EDisorder','R_Diabetes','R_Asthma','R_Convulsion','R_SProblems','R_HDisease','R_KProblems','R_MDisorder','R_BTendencies','R_GDisease');
$PersonalHistory = array('c_primaryComplex','c_kidneyDisease','c_pneumonia','c_earProblems','c_mentalDisorder','c_asthma','c_skinProblem','c_dengue','c_mumps','c_typhoidFever','c_rheumaticFever','c_diabetes','c_measles','c_thyroidDisorder','c_hepatitis','c_chickenPox','c_eyeDisorder','c_poliomyElitis','c_heartDisease','c_anemia','c_chestPain','c_indigestion','c_swollenFeet','c_headaches','c_soreThroat','c_dizziness','c_nausea','c_difficultBreathing','c_weightLoss','c_insomia','c_jointPains','c_frequentUrination');
$Immunization = array('BCG','CPox','AHepa','BHepa','Mumps','Measles','Typhoid','GMeasle','Polio','DPT');

$sql="";
if(isset($_GET['edit'])){
	echo "<script>alert('Record updated successfully')</script>";
	$sql = 'UPDATE tbl_patientinfo SET Lname=\''.$_POST['S_Lname'].'\',Fname=\''.$_POST['S_Fname'].'\',Mname=\''.$_POST['S_Mname'].'\',Age=\''.$_POST['S_Age'].'\',religion=\''.$_POST['S_Religion'].'\',Address=\''.$Address.'\',Region=\''.$_POST['S_Region'].'\',Province=\''.$_POST['S_Province'].'\',MuniCity=\''.$_POST['S_City'].'\',Brgy=\''.$_POST['S_Baranggay'].'\',Street=\''.$_POST['S_Street'].'\',Birthdate=\''.$Birthdate.'\',Course=\''.$_POST['S_Course'].'\',YearLevel=\''.$_POST['S_YearLevel'].'\',CollegeUnit=\''.$_POST['S_Department'].'\',ContactNum=\''.$_POST['S_Cnumber'].'\',CivilStatus=\''.$_POST['S_Status'].'\',Sex=\''.$_POST['S_Gender'].'\',ModifiedBy=\''.$Modifiedby.'\' where PatientID=\''.$PatientID.'\'';
	$sqlFather = 'UPDATE tbl_patientsparentinfo SET Fname=\''.$_POST['F_FName'].'\',`Mname`=\''.$_POST['F_MName'].'\',`Lname`=\''.$_POST['F_LName'].'\',`Occupation`=\''.$_POST['F_Occupation'].'\',`OfficeAddress`=\''.$_POST['F_Address'].'\',`ContactNumber`=\''.$_POST['F_CNumber'].'\',`ModifiedBy`=\''.$Modifiedby.'\' WHERE Relation=\'Father\' and PatientID=\''.$PatientID.'\'';
	$sqlMother = 'UPDATE tbl_patientsparentinfo SET Fname=\''.$_POST['M_FName'].'\',`Mname`=\''.$_POST['M_MName'].'\',`Lname`=\''.$_POST['M_LName'].'\',`Occupation`=\''.$_POST['M_Occupation'].'\',`OfficeAddress`=\''.$_POST['M_Address'].'\',`ContactNumber`=\''.$_POST['M_CNumber'].'\',`ModifiedBy`=\''.$Modifiedby.'\' WHERE Relation=\'Mother\' and PatientID=\''.$PatientID.'\'';
	$sqlGuardian = 'UPDATE tbl_patientsparentinfo SET Fname=\''.$_POST['G_FName'].'\',`Mname`=\''.$_POST['G_MName'].'\',`Lname`=\''.$_POST['G_LName'].'\',`Occupation`=\''.$_POST['G_Occupation'].'\',`OfficeAddress`=\''.$_POST['G_Address'].'\',`ContactNumber`=\''.$_POST['G_CNumber'].'\',`ModifiedBy`=\''.$Modifiedby.'\' WHERE Relation=\'Guardian\' and PatientID=\''.$PatientID.'\'';
	echo $sql;
	for($i=0;$i<sizeof($Illness);$i++){
		if(isset($_POST['option'.$Illness[$i].'Yes'])){
			$sqlIllness = 'UPDATE tbl_familyhistoryanswer SET Status=\'Yes\', Relation=\''.$_POST['R_'.$Illness[$i]].'\' where PatientID=\''.$PatientID.'\' and Illness=\'option'.$Illness[$i].'\'';
		}else{
			$sqlIllness = 'UPDATE tbl_familyhistoryanswer SET Status=\'Yes\', Relation=\'\' where PatientID=\''.$PatientID.'\' and Illness=\'option'.$Illness[$i].'\'';
		}
		if(!$conn->query($sqlIllness) === TRUE) echo "<script>console.log('Error for inserting family history')</script>"; //if condition for debug purposes
	}

	for($i=0;$i<sizeof($PersonalHistory);$i++){
		if(isset($_POST[$PersonalHistory[$i]])){
			$sqlPersonalHistory = "UPDATE tbl_personalhistory SET Status='true', ModifiedBy='".$Modifiedby."' where PatientID='".$PatientID."' and Illness='".$PersonalHistory[$i]."'";
		}else{
			$sqlPersonalHistory = "UPDATE tbl_personalhistory SET Status='false', ModifiedBy='".$Modifiedby."' where PatientID='".$PatientID."' and Illness='".$PersonalHistory[$i]."'";
		}
		$conn->query($sqlPersonalHistory);
	}

	//updating to immunization table
	for($i=0;$i<sizeof($Immunization);$i++){
		if(isset($_POST["I_".$Immunization[$i]])){//testing if the id of the checkbox is set 
			$sqlImmu = "UPDATE  tbl_immunizationhistory SET Status = 'true', ModifiedBy='".$Modifiedby."' where PatientID='".$PatientID."' and Answer='I_".$Immunization[$i]."'";
		}
		else{//if not then..
			$sqlImmu = "UPDATE  tbl_immunizationhistory SET Status = 'false', ModifiedBy='".$Modifiedby."' where PatientID='".$PatientID."' and Answer='I_".$Immunization[$i]."'";
		}
		$conn->query($sqlImmu);
	}
	 //checking if the 'others' text box is null or not
	$sqlImmu = "UPDATE  tbl_immunizationhistory SET Answer = '~".$_POST['txt_IHistory']."', ModifiedBy='".$Modifiedby."'  where ID = (select ID from tbl_immunizationhistory where Answer like '~%' AND PatientID = '$PatientID'";
	$conn->query($sqlImmu);
	 
	 //editin to hospitalization history table
	if($_POST['Question1']==='Yes'){
		$sqlHospitalization = "UPDATE  tbl_hospitalizationhistory SET Answer ='Yes' ,Details ='".$_POST['txt_Question1']."',Modifiedby ='".$Modifiedby."' where PatientID ='$PatientID'";
	}else{
		$sqlHospitalization = "UPDATE  tbl_hospitalizationhistory SET Answer ='No' ,Details ='',Modifiedby ='".$Modifiedby."' where PatientID ='$PatientID'";
	}
	$conn->query($sqlHospitalization);

	//editin to qtaking medicne table
	if($_POST['Question2']==='Yes'){
		$sqlmed = "UPDATE  tbl_qtakingmedicine SET Answer ='Yes' ,Details ='".$_POST['txt_Question2']."',Modifiedby ='".$Modifiedby."' where PatientID ='$PatientID'";
	}else{
		$sqlmed = "UPDATE  tbl_qtakingmedicine SET Answer ='No' ,Details ='',Modifiedby ='".$Modifiedby."' where PatientID ='$PatientID'";
	}
	$conn->query($sqlmed);

	//editin to qallergy table
	if($_POST['Question3']==='Yes'){
		$sqlallergy = "UPDATE  tbl_qtakingmedicine SET Answer ='Yes' ,Details ='".$_POST['txt_Question3']."',Modifiedby ='".$Modifiedby."' where PatientID ='$PatientID'";
	}else{
		$sqlallergy = "UPDATE  tbl_qtakingmedicine SET Answer ='No' ,Details ='',Modifiedby ='".$Modifiedby."' where PatientID ='$PatientID'";
	}
	$conn->query($sqlallergy);
	

}else{
	echo "<script>alert('New record created successfully')</script>";
	$sql = 'INSERT INTO tbl_patientinfo (PatientID, Lname, Fname, Mname, Address,Region,Province,MuniCity,Brgy,Street, Age,Religion, Birthdate, Course, YearLevel, CollegeUnit, ContactNum, CivilStatus,Sex,Status,ModifiedDate,CreatedDate,Modifiedby,CreatedBy) VALUES (\''.$PatientID.'\', \''.$Lname.'\', \''.$Fname.'\', \''.$Mname.'\', \''.$Address.'\', \''.$region.'\', \''.$province.'\', \''.$municity.'\', \''.$brgy.'\', \''.$street.'\', \''.$Age.'\', \''.$Religion.'\', \''.$Birthdate.'\', \''.$Course.'\', \''.$YearLevel.'\',  \''.$CollegeUnit.'\', \''.$ContactNum.'\', \''.$CivilStatus.'\', \''.$Sex.'\',1,null,null,\''.$Modifiedby.'\',\''.$CreatedBy.'\')';
	$sqlFather = 'INSERT INTO tbl_patientsparentinfo (PatientID, Fname, Mname, Lname, Occupation, OfficeAddress, ContactNumber, Relation, ModifiedBy, CreatedBy) VALUES (\''.$PatientID.'\',\''.$_POST["F_FName"].'\',\''.$_POST["F_MName"].'\',\''.$_POST["F_LName"].'\',\''.$_POST["F_Occupation"].'\',\''.$_POST["F_Address"].'\',\''.$_POST["F_CNumber"].'\', \'Father\',\''.$Modifiedby.'\',\''.$CreatedBy.'\')';
	$sqlMother = 'INSERT INTO tbl_patientsparentinfo (PatientID, Fname, Mname, Lname, Occupation, OfficeAddress, ContactNumber, Relation, ModifiedBy, CreatedBy) VALUES (\''.$PatientID.'\',\''.$_POST["M_FName"].'\',\''.$_POST["M_MName"].'\',\''.$_POST["M_LName"].'\',\''.$_POST["M_Occupation"].'\',\''.$_POST["M_Address"].'\',\''.$_POST["M_CNumber"].'\', \'Mother\',\''.$Modifiedby.'\',\''.$CreatedBy.'\')';
	$sqlGuardian = 'INSERT INTO tbl_patientsparentinfo (PatientID, Fname, Mname, Lname, Occupation, OfficeAddress, ContactNumber, Relation, ModifiedBy, CreatedBy) VALUES (\''.$PatientID.'\',\''.$_POST["G_FName"].'\',\''.$_POST["G_MName"].'\',\''.$_POST["G_LName"].'\',\''.$_POST["G_Occupation"].'\',\''.$_POST["G_Address"].'\',\''.$_POST["G_CNumber"].'\', \'Guardian\',\''.$Modifiedby.'\',\''.$CreatedBy.'\')';
	for($i=0;$i<sizeof($Illness);$i++){
		$sqlIllness = 'INSERT INTO tbl_familyhistoryanswer (PatientID, Illness, Status, Relation, ModifiedBy, CreatedBy) 
			VALUES (\''.$PatientID.'\', \''.$Illness[$i].'\', \''.$_POST['option'.$Illness[$i]].'\', \''.$_POST[$Relation[$i]].'\',\''.$Modifiedby.'\',\''.$CreatedBy.'\')';
		echo $sqlIllness;
		if(!$conn->query($sqlIllness) === TRUE) echo "<script>console.log('Error for inserting family history')</script>"; //if condition for debug purposes
	}

	for($i=0;$i<sizeof($PersonalHistory);$i++){
		if(isset($_POST[$PersonalHistory[$i]])){
			$sqlPersonalHistory = 'INSERT INTO tbl_personalhistory (PatientID, Illness, Status,Modifiedby,CreatedBy)
				VALUES (\''.$PatientID.'\', \''.$PersonalHistory[$i].'\',\'true\',\''.$Modifiedby.'\',\''.$CreatedBy.'\')';
		}else{
			$sqlPersonalHistory = 'INSERT INTO tbl_personalhistory (PatientID, Illness, Status,Modifiedby,CreatedBy)
				VALUES (\''.$PatientID.'\', \''.$PersonalHistory[$i].'\',\'false\',\''.$Modifiedby.'\',\''.$CreatedBy.'\')';
		}
		$conn->query($sqlPersonalHistory);
	}
	//inserting to immunization table
	for($i=0;$i<sizeof($Immunization);$i++){
		if(isset($_POST["I_".$Immunization[$i]])){//testing if the id of the checkbox is set 
			$sqlImmu = 'INSERT INTO tbl_immunizationhistory (PatientID, Answer, Status,Modifiedby,CreatedBy)
				VALUES (\''.$PatientID.'\', \'I_'.$Immunization[$i].'\',\'true\',\''.$Modifiedby.'\',\''.$CreatedBy.'\')';
		}
		else{//if not then..
			$sqlImmu = 'INSERT INTO tbl_immunizationhistory (PatientID, Answer, Status,Modifiedby,CreatedBy)
			VALUES (\''.$PatientID.'\', \'I_'.$Immunization[$i].'\',\'false\',\''.$Modifiedby.'\',\''.$CreatedBy.'\')';
		}
		$conn->query($sqlImmu);
	}

	//checking if the 'others' text box is null or not
	$sqlImmu = 'INSERT INTO tbl_immunizationhistory (PatientID, Answer, Status,Modifiedby,CreatedBy)
	VALUES (\''.$PatientID.'\', \'~'.$_POST['txt_IHistory'].'\',\'false\',\''.$Modifiedby.'\',\''.$CreatedBy.'\')';
	
	//inserting to hospitalization history table
	if($_POST['Question1']==='Yes'){
		$sqlHospitalization = 'INSERT INTO tbl_hospitalizationhistory (PatientID, Answer, Details,Modifiedby,CreatedBy)
		VALUES (\''.$PatientID.'\', \'Yes\',\''.$_POST['txt_Question1'].'\',\''.$Modifiedby.'\',\''.$CreatedBy.'\')';
	}else{
		$sqlHospitalization = 'INSERT INTO tbl_hospitalizationhistory (PatientID, Answer, Details,Modifiedby,CreatedBy)
		VALUES (\''.$PatientID.'\', \'No\',\'\',\''.$Modifiedby.'\',\''.$CreatedBy.'\')';
	}
	$conn->query($sqlHospitalization);

	//inserting to qtaking medicne table
	if($_POST['Question2']==='Yes'){
		$sqlmed = 'INSERT INTO tbl_qtakingmedicine (PatientID, Answer, Details,Modifiedby,CreatedBy)
		VALUES (\''.$PatientID.'\', \'Yes\',\''.$_POST['txt_Question2'].'\',\''.$Modifiedby.'\',\''.$CreatedBy.'\')';
	}else{
		$sqlmed = 'INSERT INTO tbl_qtakingmedicine (PatientID, Answer, Details,Modifiedby,CreatedBy)
		VALUES (\''.$PatientID.'\', \'No\',\'\',\''.$Modifiedby.'\',\''.$CreatedBy.'\')';
	}
	$conn->query($sqlmed);

	//inserting to qallergy table
	if($_POST['Question3']==='Yes'){
		$sqlallergy = 'INSERT INTO tbl_qallergies (PatientID, Answer, Details,Modifiedby,CreatedBy)
		VALUES (\''.$PatientID.'\', \'Yes\',\''.$_POST['txt_Question3'].'\',\''.$Modifiedby.'\',\''.$CreatedBy.'\')';
	}else{
		$sqlallergy = 'INSERT INTO tbl_qallergies (PatientID, Answer, Details,Modifiedby,CreatedBy)
		VALUES (\''.$PatientID.'\', \'No\',\'\',\''.$Modifiedby.'\',\''.$CreatedBy.'\')';
	}
	$conn->query($sqlallergy);

	
}
echo $sqlHospitalization;
echo $sqlmed;
echo $sqlallergy;

if ($conn->query($sql) === TRUE && 
	$conn->query($sqlFather) === TRUE && 
	$conn->query($sqlMother) && 
	$conn->query($sqlGuardian) === TRUE) {

} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
	echo '<script> alert(\'SQL Query Error\')</script>';
}


	

CloseCon($conn);
}

?>