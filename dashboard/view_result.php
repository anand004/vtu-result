<?php
session_start();
include("../connection.php");
echo "<link rel='stylesheet' type='text/css' href='style.css' />";
$sem=$_POST["tempId"];
$usn=$_SESSION['username'];
$name=$_SESSION['name'];
echo $name;

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <link href="style.css" rel="stylesheet" type="text/css" />
   <script language="javascript" type="text/javascript">
        function printDiv(dataPrint) {
//Get the HTML of div
var divElements = document.getElementById(dataPrint).innerHTML;
//Get the HTML of whole page
var oldPage = document.body.innerHTML;
//Reset the page's HTML with div's HTML only
document.body.innerHTML =
"<html><head><title></title></head><body>" +
divElements + "</body>";
//Print Page
window.print();
//Restore orignal HTML
document.body.innerHTML = oldPage;
}
</script>

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
    <?php
    $quer="SELECT name FROM logindetails where USN='$usn'";
    $resul=mysqli_query($db,$quer);
    $rowi=mysqli_fetch_array($resul);
    if(mysqli_num_rows($resul)>0)
  { 
 
  echo '<div class="border border-light p-5" style="text-transform:uppercase;font-size:20px;"> NAME:<b>'.$rowi['name'].'</b>';
  echo '</br>';

}
    echo 'Sem :';
    echo '<b>'.$sem.'</b>';
    echo '</br>';
    $query="SELECT SGPA,TOTAL_MARKS FROM rank WHERE USN='$usn' AND SEM ='$sem'";
    $result=mysqli_query($db,$query);
    $row=mysqli_fetch_array($result);
    if(mysqli_num_rows($result)>0)
  { 
 
  echo 'SGPA: <b>'.$row['SGPA'].'</b>';
  echo '</br>';
  echo 'TOTAL MARKS: <b>'.$row['TOTAL_MARKS'].'</b>';
  echo '</div>';

}
    ?>


	<form method="post">
		
		
<div class="table-responsive-md">
  <table class="table table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Subject Code</th>
      <th scope="col">Subject Name</th>
      <th scope="col">Internal</th>
      <th scope="col">External</th>
      <th scope="col">Total</th>
      <th scope="col">Credits</th>
      <th scope="col">Grade Points</th>
      <th scope="col">Grade</th>

    </tr>
  </thead>
  <tbody>
  	<?php
       $sql = "SELECT subject_code,subject_name,internal_marks,external_marks,total_marks,credits,grade_points,grade FROM result where usn='$usn' AND sem='$sem' ";
    $result = mysqli_query($db, $sql);

    if (mysqli_num_rows($result) > 0) 
    {
      while($row = mysqli_fetch_assoc($result)) 
      {
    

    echo '<tr>
          <td><div style="text-transform:uppercase;text-align:center">'.$row['subject_code'].'</div></td>
          <td><div style="text-transform:uppercase">'.$row['subject_name'].'</div></td>
          <td><div style="text-transform:uppercase;text-align:center">'.$row['internal_marks'].'</div></td>
          <td><div style="text-transform:uppercase;text-align:center">'.$row['external_marks'].'</div></td>
          <td><div style="text-transform:uppercase;text-align:center">'.$row['total_marks'].'</div></td>
          <td><div style="text-transform:uppercase;text-align:center">'.$row['credits'].'</div></td>
          <td><div style="text-transform:uppercase;text-align:center">'.$row['grade_points'].'</div></td>
          <td><div style="text-transform:uppercase;text-align:center">'.$row['grade'].'</div></td>
         <tr>';
      }
    }


    ?>
  </tbody>
</table>

  </div>
</form>
<div class="login" style="float: right;">
<input type="submit" value="PRINT" onclick="window.print();"> 
</div>
</div>
  <div class="col-sm-2">
	</div>
  </div>
  </div>
</body>
</html>