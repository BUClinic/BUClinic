<?php
session_start();
if(!isset($_SESSION['buhs_user'])) header("location: login.php");
    include '../db_connection.php';

$CreatedBy = ucwords($_SESSION['Fname']). " ". ucwords($_SESSION['Lname']);//geting the name
$conn = OpenCon();
//inserting to tbl_examinations
$sql = 'INSERT INTO tbl_examinations (PatientID, Temp, BP, Height, Weight, History, PhysiciansDirection, CreatedBy) 
VALUES ( \''.$_POST['S_Id'].'\', \''.$_POST['P_Temperature'].'\', \''.$_POST['P_BPressure'].'\', \''.$_POST['P_Height'].'\', \''.$_POST['P_Weight'].'\', \''.$_POST['P_PExamination'].'\', \''.$_POST['P_PDirection'].'\', \''.$CreatedBy.'\')';
$conn->query($sql);

//inserting to tbl_diagnosis
// $meds = substr($_POST['med'],0,strlen($_POST['med'])-1);
$sql = 'INSERT INTO tbl_diagnosis (PatientID, Diagnosis,Complaints,Treatment, Referral, CreatedBy) 
VALUES (\''.$_POST['S_Id'].'\', \''.$_POST['Diagnosis'].'\', \''.$_POST['Complaints'].'\', \''.$_POST['treatment'].'\',\''.$_POST['Referrals'].'\',\''.$CreatedBy.'\')';
$conn->query($sql);

echo"  <script>alert('Added to records');</script>";
$meds= $_POST['treatment'];
if($meds!=null){
    echo"  <script>alert('Go to medication from');</script>";
    echo"  <script>window.open('../pages/forms/medicationform.php','_self');</script>";
}
echo"  <script>window.open('../index.php','_self');</script>";
//setting the quantities and decreasing the medicine stocks
// $tempqty = $_POST['qty'];
// $tempmd = $_POST['md'];
// $qty = explode (",",$tempqty);
// $md = explode (",",$tempmd);
// for($i=0;$i<sizeof($qty)-1;$i++){
//      echo "UPDATE tbl_medicine SET Stock=(select Stock from tbl_medicine where ID = '".$md[$i]."')-'".$qty[$i]."' where ID= '".$md[$i]."'";      
//     $sql ="UPDATE tbl_medicine SET Stock=(select Stock from tbl_medicine where ID = '".$md[$i]."')-'".$qty[$i]."' where ID= '".$md[$i]."'"; 
//     $conn->query($sql);
// }
?>