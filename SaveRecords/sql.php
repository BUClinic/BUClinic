<?php
include '../db_connection.php';

$conn = OpenCon();

if (TRUE) {
    // echo $_GET['query'];
    $result = mysqli_query($conn,$_GET['query']);
    $rows = array();
    // var_dump($result);
//    echo $result;
    while($r = mysqli_fetch_assoc($result)){
        $rows[] = $r;
        // foreach ($r as $aaaa) {
        //     echo $aaaa;
        // }
    }
    echo json_encode($rows);
   
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

CloseCon($conn);


?>