<?php
//update_status.php

//1.connect
require("connect.php");
$No = $_GET['number'];
$Brand = $_GET['Brand'];
$Kind = $_GET['Kind'];
$Size = $_GET['Size'];
$send = $_GET['send'];

// Check for Delete or Edit
if($send == 'Edit') {
//2. Select SQL
$sql = "UPDATE number ";
$sql .= "SET Brand = '$Brand', Kind = '$Kind', Size = '$Size' ";
$sql .= "WHERE No = '$No'";

//3. EXecute SQL 
if ($conn->query($sql) === TRUE) {
    echo "<script>";
    echo "alert('ข้อมูลได้ทำการอัพเดทแล้ว');";
    echo "window.history.back();";
    echo "</script>";

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
}
else if($send == 'Delete') {
//2. Select SQL
$sql = "DELETE FROM number WHERE No = $No";

//3. Execute SQL
if (mysqli_query($conn, $sql)) {
    echo "Delete successfully";
header("Location:search.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

}

?>