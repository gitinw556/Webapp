<html> 
<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="register1.css">
</head>
<body>
    <div class="form">
        <form action="add_register.php" method="POST">
                <h1 class="t">Register</h1>
            <p>
               <input type="email" id="email" placeholder="Email" required="required" name="email">
            </p>
            <p>
                <input type="text" id="username" placeholder="Username" required="required" name="username"  maxlength="16">
            </p>
            <p>
                <input type="password" id="pass" placeholder="Password" required="required" name="pass"  maxlength="10">
            </p>
            <p>
            <a href="login.php"><input type="submit" class="a" value="Submit"></a>
            </p>
            <p>ไปหน้า Login >> <a href="login.php">Login Here</a></p>    

            </form>
            
</div>

</body>
</html>