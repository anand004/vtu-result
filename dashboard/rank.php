<?php
session_start();
include('../connection.php');
$usn=$_SESSION['username'];
$sem=$_POST["tempId"];

$pr=substr($usn,0,7);


?>
<!DOCTYPE html>
<html>
<head>
  <title>CLASS RANK</title>
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
  <h4><center>CLASS RANK</center></h4>
  
  <div class="table-responsive-md">
  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col"><center>RANK</center></th>
      <th scope="col"><center>USN</center></th>
      <th scope="col"><center>TOTAL MARKS</center></th>
      <th scope="col"><center>SGPA</center></th>
   </tr>
  </thead>
  <tbody>
    <?php

   $result=mysqli_query($db,"SELECT `USN`,`SGPA`,`TOTAL_MARKS` FROM `rank` WHERE `SEM` = '$sem' AND `USN` LIKE '%".$pr."%' ORDER BY `TOTAL_MARKS` DESC");

    if (mysqli_num_rows($result) > 0) 
    {
      while($row = mysqli_fetch_assoc($result)) 
      {

    echo "<tr><td><center</center></td><td><center>".$row["USN"]."</center></td><td><center>".$row["SGPA"]."</center></td><td><center>".$row["TOTAL_MARKS"]."</center></td></tr>";
      }
    }

    ?>
  </tbody>
</table> 
    <center><p>*Class Rank is Based On Current Stored Data*</p></center>
</div>
<div class="col-sm-2">
  </div>
</div> 
</div>
</div>
</body>
</html>
