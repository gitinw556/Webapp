<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// Set session variables
$_SESSION["favcolor"] = "green";
$_SESSION["favanimal"] = "cat";
echo "Session variables are set.";

session_unset();
session_destroy();

echo $_SESSION["favcolor"];
echo $_SESSION["favanimal"];

?>

</body>
</html>