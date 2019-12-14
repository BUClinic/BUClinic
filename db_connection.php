<?php


function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "buhs";
 $dbpass = "HealthService2019";
 $db = "buhs";
 $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn->error);
 return $conn;
 }
 
function CloseCon($conn)
 {
mysqli_close ($conn);
 }
   
?>
