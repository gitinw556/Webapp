<!DOCTYPE html>
    <html lang="th">
        <title>ร้านรองเท้า</title>
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="style5.css">
<body>
<?php
    session_start();                         
    require('connect.php');
?>       
<!-- เริ่ม -->                
<div class="colorkit">
    <h2>KITT SHOES SHOP<h4 class="button topbox">Name: <?php echo $_SESSION['username']; ?> </h2>
    </div>
    <div class="colorbody">
    <form name="myForm" action="add_status.php" method="get" onsubmit="return validateForm()">
        <p>เลือกรายการ</p>
            <h3>Brand</h3>
                    <select name="Brand" id="Brand">
                        <option value="Adidas"> Adidas </option>
                        <option value="Converse"> Converse </option>
                        <option value="Vans"> Vans </option>
                    </select>
                <h3>Kind</h3>
                    <select name="Kind" id="Brand">
                        <option value="รองเท้าผ้าใบ"> รองเท้าผ้าใบ </option>
                        <option value="รองเท้าแตะ"> รองเท้าแตะ </option>
                    </select>
                <h3>Size</h3>
            <input type="text" name="Size" id="Size" placeholder="กรอกไซต์รองเท้า" require>
<br>
    <input type="submit" value="Confirm" id="b1">
</form>

<!-- สิ้นสุดตารางแรก -->

<form action="search.php" method="get">
<input type="submit" value="ค้นหารายการสินค้า" id="b4">
</form>

<form action="products.php" method="get">
<input type="submit" value="ดูสินค้า" id="b2">
</form>

<form action="login.php">
<input type="submit" value="Logout" id="b3">
</form>
</div>
</div>
</body>


</html>