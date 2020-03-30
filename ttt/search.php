<html>
    <head><script>
        function confirmDelete() {
        return confirm("คุณต้องการลบรายการนี้หรือไม่?");
    }
    </script>
    <link rel="stylesheet" href="search.css">
    </head>
<body>
<!-- ประกาศฟอร์มค้นหา -->
<?php
            $txtSearch = "";
            $type = "";
            
            if(isset($_GET['txtSearch'])) $txtSearch = $_GET['txtSearch'];
            
            if(isset($_GET['Type'])) $type = $_GET['Type'];
        ?>
<!-- สิ้นสุดประกาศฟอร์มค้นหา -->

<!-- start html form for search-->
<div class="colorsearch">    
    <table border="5" align="center">
            <form>
            <tr>
                <td>ค้นหาสินค้า : </td>
                <td><input type="text" name="txtSearch" size="14" value="<?php echo $txtSearch?>"></td>
                <td>
                    <select name="Type">
                        <option value="1" <?php if($type == 1) echo "selected" ?> > Brand </option>
                        <option value="2" <?php if($type == 2) echo "selected" ?> > Kind </option>
                    </select>
                </td>
                <td><input type="submit" value="Search"></td>
            </tr>
</table>

</form>
<br>
<!-- stop html form for search-->

<!-- เริ่มตารางที่2 -->

        <table border="5" align="center" width="700">
        <tr>
            <td> No. </td>
            <td> Brand </td>
            <td> Kind </td>
            <td> Size </td>
        </tr>
<!-- สิ้นสุดตารางที่2 -->
<?php
//step ที่1. connect
require("connect.php");

//step ที่2. select sql
$sql = "SELECT * FROM number ";

//1.Brand
if($type == 1) {
    $sql .= "WHERE Brand LIKE '%" . $txtSearch . "%'";
}
//2.Kind
else if($type == 2) {
    $sql .= "WHERE Kind LIKE '%" . $txtSearch . "%'";
}
//3.Size
else if($type == 3) {
    $sql .= "WHERE Size LIKE '%" . $txtSearch . "%'";
}

//step ที่3 execute  
$result = mysqli_query($conn, $sql);
    
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    echo "<form action='update_status.php'>";
        echo "<tr>";
        echo "<td><input type='text' name='number' size='5' value=" . $row["No"]. " readonly></td>";
        echo "<td><select name='Brand'>";
        echo "<option selected>" .$row["Brand"]. "</option>";
        echo "<option value='Adidas'>". Adidas ."</option>";
        echo "<option value='Converse'>". Converse ."</option>";
        echo "<option value='Vans'>". Vans ."</option>";
        echo "</select></td>";
        echo "<td><select name='Kind'>";
        echo "<option selected>" .$row["Kind"]. "</option>";
        echo "<option value='รองเท้าผ้าใบ'>". รองเท้าผ้าใบ ."</option>";
        echo "<option value='รองเท้าแตะ'>". รองเท้าแตะ ."</option>";
        echo "</select></td>";
        echo "<td><input type='text' name='Size' size='5' value=" . $row["Size"]. " ></td>";
        echo "<td><input type='submit' name='send' value='Delete' onClick='return confirmDelete()'></td>";
        echo "<td><input type='submit' name='send' value='Edit'></td>";
    echo "</tr>";
    echo "</form>";
    }
}
    
mysqli_close($conn);
?>

</table>
<form action="test.php" method="get">
<input type="submit" value="back">
</form>    
</div>
</div>
</body>
</html>