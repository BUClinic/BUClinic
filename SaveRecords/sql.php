<?php
include '../db_connection.php';

$conn = OpenCon();

if (TRUE) {
    $result = mysqli_query($conn,$_GET['query']);
    $rows = array();
//    echo $result;
    while($r = mysqli_fetch_assoc($result)){
    	$rows[] = $r;
    }
    print json_encode($rows);
   
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// CloseCon($conn);


?>