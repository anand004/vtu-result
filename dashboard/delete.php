<?
session_start();
include('../connection.php');
$usn=$_SESSION['username'];
$sem=$_POST['tempId'];
if(isset($_POST['yes'])){
	$usn1=$_POST['usn'];
	$sem1=$_POST['sem'];
	  mysqli_query($db,"DELETE FROM `result` WHERE `usn`='$usn1' AND `sem`='$sem1'");

          mysqli_query($db,"DELETE FROM `rank` WHERE `USN`='$usn1' AND `SEM`='$sem1'");
          header("location:index.php");
     

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>DELETE</title>
	 <link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="container-fluid">
<?php
include("../navbar.php");
?>
<div class="row">
	<div class="col-sm-2">
	</div>

<div class="col-sm-8">
	<div class="border border-light p-5">
		<center><h1 style="color:red">ARE YOU SURE YOU WANT TO DELETE YOUR RECORD</h1></center>
		<?php
		echo '<form method="post">
			<div class="login" style="float: center;">
            <input type="hidden" name="usn" value="'.$usn.'"/>
            <input type="hidden" name="sem" value="'.$sem.'"/>
			<input type="submit" name="yes" value="YES" >

					</div>
				</form>';
				?>
				<div class="login" style="float: center;">
			<input type="submit" value="NO" onclick="window.history.go(-1); return false;" >
					</div>

	</div>
</div>
<div class="col-sm-2">
	</div>
</div>
	</div>
</body>
</html>