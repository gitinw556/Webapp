<?php

$No = $_GET['number'];

//1. Connect DB
require("connect.php");

//2. Select SQL
$sql = "DELETE FROM number WHERE No = $No";



//3. Execute SQL
if (mysqli_query($conn, $sql)) {
    header("Location:search.php");

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);


?>