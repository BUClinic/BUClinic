<?php
session_start();
if(!isset($_SESSION['buhs_user'])) header("location: login.php");
    include '../db_connection.php';

$CreatedBy = $_SESSION['Fname']. " ". $_SESSION['Lname'];//geting the name
$conn = OpenCon();
//inserting to tbl_examinations
$sql = 'INSERT INTO tbl_examinations (PatientID, Temp, BP, Height, Weight, History, PhysiciansDirection, CreatedBy) 
VALUES ( \''.$_POST['S_Id'].'\', \''.$_POST['P_Temperature'].'\', \''.$_POST['P_BPressure'].'\', \''.$_POST['P_Height'].'\', \''.$_POST['P_Weight'].'\', \''.$_POST['P_PExamination'].'\', \''.$_POST['P_PDirection'].'\', \''.$CreatedBy.'\')';
$conn->query($sql);


//inserting to tbl_diagnosis
$sql = 'INSERT INTO tbl_diagnosis (PatientID, Diagnosis,Complaints,Treatment, Referral, CreatedBy) 
VALUES (\''.$_POST['S_Id'].'\', \''.$_POST['Diagnosis'].'\', \''.$_POST['Complaints'].'\', \''.$_POST['Treatment'].'\',\''.$_POST['Referrals'].'\',\''.$CreatedBy.'\')';
$conn->query($sql);
?>