<?php
require("connect.php");
$username = $_REQUEST['username'];
$pass = $_REQUEST['pass'];
$email = $_REQUEST['email'];

$sql = "INSERT INTO register (username, pass, email) values";
$sql .= "('". $username ."','". $pass ."','".  $email ."')";

echo $sql;
if (mysqli_query($conn, $sql)){
    echo "new";

}else{
    echo "error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
header("Location:login.php");
?>