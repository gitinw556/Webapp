<?php
session_start();
?>
<html>
    <head>
    <script>
        function confirmDelete() {
            return confirm("Are you sure to Delete");
        }
    </script>
    <script>
        function validateForm() {
            var x = document.forms["myForm"]["status_th"].value;
            if (x == "" || x == null) {
                alert("STATUS THAI must be filled out");
                document.getElementById("status_th").focus();
                return false;
  }
}
</script>

<script>
function showHint(str) {
  if (str.length == 0) {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "gethint.php?q=" + str, true);
    xmlhttp.send();
  }
}
</script>
</head>

<body>
    <h3>Welcome, <?php echo $_SESSION['name']; ?></h3>
    <form name="myForm" action="add_status.php" method="get" onsubmit="return validateForm()">
    Suggestion: <span id="txtHint"></span>
        <table border="1">
            <!-- <tr>
                <td>STATUS ID</td>
                <td><input type="text" name="status_id"></td>
            </tr> -->
            <tr>
                <td>STATUS THAI</td>
                <td><input type="text" name="status_th" id="status_th" onkeyup="showHint(this.value)"></td>
            </tr>
            <tr>
                <td>STATUS ENGLISH</td>
                <td><input type="text" name="status_en" id="status_en"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="ADD">
                    <input type="button" value="Check" onclick="showHint()">
                    </td>
            </tr>
        </table>
        </form>



        <?php
            $txtSearch = "";
            $type = "";
            
            if(isset($_GET['txtSearch'])) $txtSearch = $_GET['txtSearch'];
            
            if(isset($_GET['Type'])) $type = $_GET['Type'];
        ?>

        <!-- start html form for search-->
        <table border="1">
            <form>
            <tr>
                <td>ค้นหา: </td>
                <td><input type="text" name="txtSearch" size="14" value="<?php echo $txtSearch?>"></td>
                <td>
                    <select name="Type">
                        <option value="1" <?php if($type == 1) echo "selected" ?> > STATUS_ID </option>
                        <option value="2" <?php if($type == 2) echo "selected" ?> > STATUS_THAI </option>
                        <option value="3" <?php if($type == 3) echo "selected" ?> > STATUS_ENGLISH </option>
                    </select>
                </td>
                <td><input type="submit" value="Search"></td>
            </tr>
        </table>
        </form>
        <!-- stop html form for search-->
        
        <table border="1">
            <tr>
                <td>STATUS ID</td>
                <td>STATUS THAI</td>
                <td>STATUS ENGLISH</td>
                <td></td>
                <td></td>
            </tr>
<?php
//step ที่1. connect
require("connect.php");

// ฟอร์มสำหรับการค้นหา
//$txtSearch = "";
//$type = "";

//if(isset($_GET['txtSearch'])) $txtSearch = $_GET['txtSearch'];

//if(isset($_GET['Type'])) $Type = $_GET['Type'];

//-----$sql = "SELECT STATUS_ID, STATUS_TH, STATUS_EN FROM status";  
//-----$sql = "SELECT * FROM status WHERE STATUS_ID = " . $txtSearch;

//step ที่2. select sql
$sql = "SELECT * FROM status ";

//1.STATUS_ID
if($type == 1) {
    $sql .= "WHERE STATUS_ID LIKE '%" . $txtSearch . "%'";
}
//2.STATUS_TH
else if($type == 2) {
    $sql .= "WHERE STATUS_TH LIKE '%" . $txtSearch . "%'";
}
//3.STATUS_EN
else if($type == 3) {
    $sql .= "WHERE STATUS_EN LIKE '%" . $txtSearch . "%'";
}
//step ที่3 execute  
$result = mysqli_query($conn, $sql);
    
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    echo "<form action='update_status.php' method='get'>";
        echo "<tr>";
        echo "<td><input type='text' name='status_id' size='5' value=" . $row["STATUS_ID"]. " readonly></td>";
        echo "<td><input type='text' name='status_th' size='5' value=" . $row["STATUS_TH"]. " ></td>";
        echo "<td><input type='text' name='status_en' size='5' value=" . $row["STATUS_EN"]. " ></td>";
        echo "<td><input type='submit' name='send' value='Delete' onClick='return confirmDelete()'></td>";
        echo "<td><input type='submit' name='send' value='Edit'></td>";
    echo "</tr>";
    echo "</form>";
    }
} else {
    echo "0 results";
}
    
mysqli_close($conn);
?>

        </table>

    </body>   
</html>

