<?php
    //1. CONNECT
    require("connect.php");

    $Brand = $_REQUEST['Brand'];
    $Kind = $_REQUEST['Kind'];
    $Size = $_REQUEST['Size'];


    echo "Brand: ". $Brand . "<br/>";
    echo "Kind: ". $Kind . "<br/>";
    echo "Size: ". $Size . "<br/>";

    //2. SELECT (SQL: INSERT)
    $sql = "INSERT INTO number (Brand, Kind, Size) VALUES ";
    $sql .= "('". $Brand ."','" . $Kind ."','" . $Size ."')";
  echo $sql;

  if (mysqli_query($conn, $sql)) {
    echo "<script>";
     echo "alert('รายการของท่านได้บันทึกแล้ว');";
     echo "window.history.back();";
     echo "</script>";

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);



?>  