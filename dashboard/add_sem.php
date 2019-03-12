<?php
session_start();
include("../connection.php");
$usn=$_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="POST" action ="add_result.php">
		<select name="scheme">
		<option value="2015">2015</option>
		<option value="2017">2017</option>
	</select>
	<select name="semester">
		<option value="1">SEM 1</option>
		<option value="2">SEM 2</option>
		<option value="3">SEM 3</option>
		<option value="4">SEM 4</option>
		<option value="5">SEM 5</option>
	</select>
	<input type="submit" name="submit">

</form>

</body>
</html>