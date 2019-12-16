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
	$Modifiedby =  $_SESSION['Fname']. " ". $_SESSION['Lname'];
	$CreatedBy = $_SESSION['Fname']. " ". $_SESSION['Lname'];//geting the name

	$Illness = array('illnesscancer','illnessHypertension','illnessstroke','illnesstuberculosis','illnessrheumatism','illnesseyeD','illnessdiabetes','illnessasthma','illnessconvulsion','illnessskin','illnessHdisease','illnesskidney','illnessmental','illnessBleding','illnessgastro');
	$Status = array('optionCancer','optionHypertension','optionStroke','optionTuberculosis','optionRheumatism','optionEDisorder','optionDiabetes','optionAsthma','optionConvulsion','optionSProblems','optionHDisease','optionKProblem','optionMDisorder','optionBTendencies','optionGDisease');
	$Relation = array('R_Cancer','R_Hypertension','R_Stroke','R_Tuberculosis','R_Rheumatism','R_EDisorder','R_Diabetes','R_Asthma','R_Convulsion','R_SProblems','R_HDisease','R_KProblems','R_MDisorder','R_BTendencies','R_GDisease');
	$PersonalHistory = array('c_primaryComplex','c_kidneyDisease','c_pneumonia','c_earProblems','c_mentalDisorder','c_asthma','c_skinProblem','c_dengue','c_mumps','c_typhoidFever','c_rheumaticFever','c_diabetes','c_measles','c_thyroidDisorder','c_hepatitis','c_chickenPox','c_eyeDisorder','c_poliomyElitis','c_heartDisease','c_anemia','c_chestPain','c_indigestion','c_swollenFeet','c_headaches','c_soreThroat','c_dizziness','c_nausea','c_difficultBreathing','c_weightLoss','c_insomia','c_jointPains','c_frequentUrination');


	if(isset($_GET['edit'])){
		echo "<script>alert('Record updated successfully')</script>";
		$sql = 'UPDATE tbl_patientinfo SET PatientID=\''.$_POST['S_Id'].'\',Lname=\''.$_POST['S_Lname'].'\',Fname=\''.$_POST['S_Fname'].'\',Mname=\''.$_POST['S_Mname'].'\',Age=\''.$_POST['S_Age'].'\',religion=\''.$_POST['S_Religion'].'\',Address=\''.$Address.'\',Region=\''.$_POST['S_Region'].'\',Province=\''.$_POST['S_Province'].'\',MuniCity=\''.$_POST['S_City'].'\',Brgy=\''.$_POST['S_Baranggay'].'\',Street=\''.$_POST['S_Street'].'\',Birthdate=\''.$Birthdate.'\',Course=\''.$_POST['S_Course'].'\',YearLevel=\''.$_POST['S_YearLevel'].'\',CollegeUnit=\''.$_POST['S_Department'].'\',ContactNum=\''.$_POST['S_Cnumber'].'\',CivilStatus=\''.$_POST['S_Status'].'\',Sex=\''.$_POST['S_Gender'].'\',ModifiedBy=\''.$Modifiedby.'\' WHERE PatientID=\''.$PatientID.'\'';
		$sqlFather = 'UPDATE tbl_patientsparentinfo SET Fname=\''.$_POST['F_FName'].'\',`Mname`=\''.$_POST['F_MName'].'\',`Lname`=\''.$_POST['F_LName'].'\',`Occupation`=\''.$_POST['F_Occupation'].'\',`OfficeAddress`=\''.$_POST['F_Address'].'\',`ContactNumber`=\''.$_POST['F_CNumber'].'\',`ModifiedBy`=\''.$Modifiedby.'\' WHERE Relation=\'Father\' and PatientID=\''.$PatientID.'\'';
		$sqlMother = 'UPDATE tbl_patientsparentinfo SET Fname=\''.$_POST['M_FName'].'\',`Mname`=\''.$_POST['M_MName'].'\',`Lname`=\''.$_POST['M_LName'].'\',`Occupation`=\''.$_POST['M_Occupation'].'\',`OfficeAddress`=\''.$_POST['M_Address'].'\',`ContactNumber`=\''.$_POST['M_CNumber'].'\',`ModifiedBy`=\''.$Modifiedby.'\' WHERE Relation=\'Mother\' and PatientID=\''.$PatientID.'\'';
		$sqlGuardian = 'UPDATE tbl_patientsparentinfo SET Fname=\''.$_POST['G_FName'].'\',`Mname`=\''.$_POST['G_MName'].'\',`Lname`=\''.$_POST['G_LName'].'\',`Occupation`=\''.$_POST['G_Occupation'].'\',`OfficeAddress`=\''.$_POST['G_Address'].'\',`ContactNumber`=\''.$_POST['G_CNumber'].'\',`ModifiedBy`=\''.$Modifiedby.'\' WHERE Relation=\'Guardian\' and PatientID=\''.$PatientID.'\'';
		echo $sqlMother;
	}else{
		echo "<script>alert('New record created successfully')</script>";
		$sql = 'INSERT INTO tbl_patientinfo (PatientID, Lname, Fname, Mname, Address,Region,Province,MuniCity,Brgy,Street, Age,Religion, Birthdate, Course, YearLevel, CollegeUnit, ContactNum, CivilStatus,Sex,ModifiedDate,CreatedDate,Modifiedby,CreatedBy) VALUES (\''.$PatientID.'\', \''.$Lname.'\', \''.$Fname.'\', \''.$Mname.'\', \''.$Address.'\', \''.$region.'\', \''.$province.'\', \''.$municity.'\', \''.$brgy.'\', \''.$street.'\', \''.$Age.'\', \''.$Religion.'\', \''.$Birthdate.'\', \''.$Course.'\', \''.$YearLevel.'\',  \''.$CollegeUnit.'\', \''.$ContactNum.'\', \''.$CivilStatus.'\', \''.$Sex.'\',null,null,\''.$Modifiedby.'\',\''.$CreatedBy.'\')';
		$sqlFather = 'INSERT INTO tbl_patientsparentinfo (PatientID, Fname, Mname, Lname, Occupation, OfficeAddress, ContactNumber, Relation, ModifiedBy, CreatedBy) VALUES (\''.$PatientID.'\',\''.$_POST["F_FName"].'\',\''.$_POST["F_MName"].'\',\''.$_POST["F_LName"].'\',\''.$_POST["F_Occupation"].'\',\''.$_POST["F_Address"].'\',\''.$_POST["F_CNumber"].'\', \'Father\',\''.$Modifiedby.'\',\''.$CreatedBy.'\')';
		$sqlMother = 'INSERT INTO tbl_patientsparentinfo (PatientID, Fname, Mname, Lname, Occupation, OfficeAddress, ContactNumber, Relation, ModifiedBy, CreatedBy) VALUES (\''.$PatientID.'\',\''.$_POST["M_FName"].'\',\''.$_POST["M_MName"].'\',\''.$_POST["M_LName"].'\',\''.$_POST["M_Occupation"].'\',\''.$_POST["M_Address"].'\',\''.$_POST["M_CNumber"].'\', \'Mother\',\''.$Modifiedby.'\',\''.$CreatedBy.'\')';
		$sqlGuardian = 'INSERT INTO tbl_patientsparentinfo (PatientID, Fname, Mname, Lname, Occupation, OfficeAddress, ContactNumber, Relation, ModifiedBy, CreatedBy) VALUES (\''.$PatientID.'\',\''.$_POST["G_FName"].'\',\''.$_POST["G_MName"].'\',\''.$_POST["G_LName"].'\',\''.$_POST["G_Occupation"].'\',\''.$_POST["G_Address"].'\',\''.$_POST["G_CNumber"].'\', \'Guardian\',\''.$Modifiedby.'\',\''.$CreatedBy.'\')';
		echo $sqlMother;

		for($i=0;$i<sizeof($Illness);$i++){
			$sqlIllness = 'INSERT INTO tbl_familyhistoryanswer (PatientID, Illness, Status, Relation,ModifiedDate,CreatedDate,Modifiedby,CreatedBy)
			VALUES (\''.$PatientID.'\', \''.$_POST[$Illness[$i]].'\', \''.$_POST[$Status[$i]].'\', \''.$_POST[$Relation[$i]].'\',null,null,\''.$Modifiedby.'\',\''.$CreatedBy.'\')';
			$conn->query($sqlIllness);
			// if(isset($_POST[$Illness[$i]])){
			// 	if($_POST[$Illness[$i]]==='Yes'){
			// 		$answer += '1';
			// 	}
			// }else{
			// 	$answer += '0';
			// }
		}
		$Ill="";
		for($i=0;$i<sizeof($PersonalHistory);$i++){
			if(isset($_POST[$PersonalHistory[$i]])){
				$sqlPersonalHistory = 'INSERT INTO tbl_personalhistory (PatientID, Illness,Modifiedby,CreatedBy)
					VALUES (\''.$PatientID.'\', \''.$_POST[$PersonalHistory[$i]].'\',\''.$Modifiedby.'\',\''.$CreatedBy.'\')';
				echo $sqlPersonalHistory;
				$conn->query($sqlPersonalHistory);
			}
			//loading family illnes history
			//$ans;
			// while($r = mysqli_fetch_assoc($result);){
			// 	if($r['Status']==='Yes'){
			// 		echo '<script>documentGetElementById(\'option'.$_POST[$Illness[$i]].'Yes\').checked = true';
			// 		echo '<script>documentGetElementById(\'R_'.$_POST[$Illness[$i]].'\').value = \''.$relationship.'\'</script>'
					
			// 	}else{
			// 		echo '<script>documentGetElementById(\'option'.$_POST[$Illness[$i]].'No\').checked = true';
			// 	}
			// }
		}
		
	}
	
	if ($conn->query($sql) === TRUE && $conn->query($sqlFather) === TRUE && $conn->query($sqlMother) ) {
		// header("location: ../pages/forms/studenthealthform.php");
	    // echo "<script>alert('New record created successfully')</script>";

	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
		echo '<script> console.log(\'Error\')</script>';
	}

	
		

	CloseCon($conn);
}

?>