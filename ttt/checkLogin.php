<?php
// Start SESSION
session_start();

// 1. Connect
require("connect.php");

//checkLogin.php

$username = $_REQUEST['username'];
$pass = $_REQUEST['pass'];


// 2. SELECT SQL
$sql = "SELECT * FROM register WHERE username='$username' AND pass='$pass'";

echo $sql;

// 3. Execute SQL
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 1) { // Login OK

    $row = mysqli_fetch_assoc($result);

    $_SESSION['username'] = $row['username'];
    $_SESSION['pass'] = $row['pass'];


    header("Location:test.php");
}
else {
    echo "<script>";
        echo "alert('รหัสผิด !!!');";
        echo "window.location='login.php';";
     echo "</script>";
       
      
  
}


?>