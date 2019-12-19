<?php
session_start();
if(!isset($_SESSION['buhs_user'])) header("location: login.php");
    include '../db_connection.php';

$CreatedBy = ucwords($_SESSION['Fname']). " ". ucwords($_SESSION['Lname']);//geting the name
$conn = OpenCon();

$rowCount = mysqli_num_rows($conn->query("select * from tbl_examinations where 1")) + 1;

//inserting to tbl_examinations



$sql = 'INSERT INTO tbl_examinations (ID,PatientID, Temp, BP, Height, Weight, History, PhysiciansDirection, CreatedBy) 
VALUES (\''.$rowCount.'\',\''.$_POST['S_Id'].'\', \''.$_POST['P_Temperature'].'\', \''.$_POST['P_BPressure'].'\', \''.$_POST['P_Height'].'\', \''.$_POST['P_Weight'].'\', \''.$_POST['P_PExamination'].'\', \''.$_POST['P_PDirection'].'\', \''.$CreatedBy.'\')';
$conn->query($sql);

//inserting to tbl_diagnosis
// $meds = substr($_POST['med'],0,strlen($_POST['med'])-1);
$sql = 'INSERT INTO tbl_diagnosis (ID,PatientID, Diagnosis,Complaints,Treatment, Referral, CreatedBy) 
VALUES (\''.$rowCount.'\',\''.$_POST['S_Id'].'\', \''.$_POST['Diagnosis'].'\', \''.$_POST['Complaints'].'\', \''.$_POST['treatment'].'\',\''.$_POST['Referrals'].'\',\''.$CreatedBy.'\')';
$conn->query($sql);

$meds= $_POST['treatment'];
if($meds!=null){
    echo"  <script>window.open('../pages/forms/medicationform.php','_self');</script>";
}
echo"  <script>window.open('../pages/forms/dailyconsultation.php','_self');</script>";

?>