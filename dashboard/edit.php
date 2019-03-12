<?php
session_start();
include("../connection.php");
$sem=$_POST["tempId"];
$usn=$_SESSION['username'];

?>
<!DOCTYPE html>
<html>
<head>
	<title>UPDATE RESULT</title>
	 <link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="container-fluid">
	<?php
include("../navbar.php");
?>
<br>
<div class="row">
	<div class="col-sm-2">
	</div>
	<div class="col-sm-8">

			<form method="post" action="update.php">
		<?php
		echo '<center><label><b>Enter Your Semester : </b></label></center>';
		echo '<input type="text" class="form-control form-control-sm" name="sem" placeholder="Enter Your Semester" value='.$sem.' style="text-align:center">';
		?>
		<br>
<div class="table-responsive-md">
  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Subject Code</th>
      <th scope="col">Subject Name</th>
      <th scope="col">Internal Marks</th>
      <th scope="col">External Marks</th>
    </tr>
  </thead>
  <tbody>
  	<?php

    $sql = "SELECT * FROM result where usn='$usn' AND sem='$sem'";
    $result = mysqli_query($db, $sql);

    if (mysqli_num_rows($result) > 0) 
    {
      while($row = mysqli_fetch_assoc($result)) 
      {

    echo '<tr><td><input type="text" class="form-control form-control-sm" name="scode[]" value='.$row["subject_code"].'></td>
          <td><input type="text" class="form-control form-control-sm" name="sname[]" value="'.$row["subject_name"].'""></td>
          <td><input type="number" class="form-control form-control-sm" name="imarks[]" value='.$row["internal_marks"].'></td>
          <td><input type="number" class="form-control form-control-sm" name="emarks[]" value='.$row["external_marks"].'></td>
         <tr>';
      }

    }

    ?>
  </tbody>
</table>
<div class="login" style="float: right;">
<input type="submit" value="UPDATE"> 
</div>
  </div>
</form>
</div>
  <div class="col-sm-2">
	</div>
  </div>
  </div>
</body>
</html>