<?php
session_start();
include('../connection.php');


?>
<!DOCTYPE html>
<html>
<head>
 
<style>
 body
{
    counter-reset: Serial;           /* Set the Serial counter to 0 */
}

table
{
    border-collapse: separate;
}

tr td:first-child:before
{
  counter-increment: Serial;      /* Increment the Serial counter */
  content: counter(Serial); /* Display the counter */
}
</style>
<link href="../style.css" rel="stylesheet" type="text/css" />
</head>

<body>

    <?php
  include('../navbar.php');
  ?>
  
  <div class="container-fluid">
    <div class="row">
  <div class="col-sm-2">
  </div>

  <div class="col-sm-8">
    <div class="border border-light p-5">
  <h4><center>UNIVERSITY RANK</center></h4>
  
  <div class="table-responsive-md">
  <table class="table table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Rank</th>
      <th scope="col"><center>USN</center></th>
      <th scope="col"><center>TOTAL MARKS</center></th>
      

    </tr>
  </thead>
  <tbody>
    <?php
    if(isset($_POST['submiti'])){
      $usn=$_SESSION['username'];
      $sem=$_POST['tempId'];


      $pr=substr($usn,3,2);
      $result=mysqli_query($db,"SELECT `USN`,`SGPA`,`TOTAL_MARKS` FROM `rank` WHERE `SEM` = '$sem' AND `USN` LIKE '%".$pr."%' ORDER BY `TOTAL_MARKS` DESC");
      if (mysqli_num_rows($result) > 0) 
    {
      while($row = mysqli_fetch_assoc($result)) 
      {

    echo '<tr><td><center</center></td><td><center><div style="text-transform:uppercase">'.$row["USN"].'</div></center></td</td><td><center>'.$row["TOTAL_MARKS"].'</center></td></tr>';
      }
    }
    
    }
     else{
      if(isset($_POST['sname1']))
{
  $sem1=$_POST['sem'];

$usn1=$_POST['usn'];
$total=$_POST['marks'];
$pr1=substr($usn1,3,2);

$result = mysqli_query($db,"SELECT * FROM rank WHERE USN='$usn1' AND SEM='$sem1'" );
$row=mysqli_fetch_assoc($result);
if(mysqli_num_rows($result)>0){
    mysqli_query($db,"UPDATE `rank` SET TOTAL_MARKS='$total' WHERE USN='$usn1' AND SEM='$sem1'");

} else {
    mysqli_query($db,"INSERT IGNORE INTO `rank` (`USN`, `SEM`, `TOTAL_MARKS`) VALUES ('$usn1','$sem1','$total')");

 }

      $result=mysqli_query($db,"SELECT `USN`,`SGPA`,`TOTAL_MARKS` FROM `rank` WHERE `SEM` = '$sem1' AND `USN` LIKE '%".$pr1."%' ORDER BY `TOTAL_MARKS` DESC");
    if (mysqli_num_rows($result) > 0) 
    {
      while($row = mysqli_fetch_assoc($result)) 
      {

    echo '<tr><td><center</center></td><td><center><div style="text-transform:uppercase">'.$row["USN"].'</div></center></td</td><td><center>'.$row["TOTAL_MARKS"].'</center></td></tr>';
      }
    }
    
  }
}
    ?>
  </tbody>

</table> 
    <p><center><b>*Class Rank is Based On Current Stored Data*</center></b></p>

</div> 
<div class="col-sm-2">
  </div>
  </div>
</div>
</div>
</body>
</html>
