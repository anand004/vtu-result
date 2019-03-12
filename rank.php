<?php
session_start();
include('connection.php');


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
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>

    <?php
  include('navbar.php');
  ?>
  
  <div class="container-fluid">
    <div class="row">
  <div class="col-sm-2">
  </div>

  <div class="col-sm-8">
    <div class="border border-light p-5">
  <h4><center>CLASS RANK</center></h4>
  
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
      $usn=$_SESSION['username'];
      $sem=$_POST['tempId'];
$college = mysqli_query($db,"CALL gget_college()") or die("Query fail: " . mysqli_error());

  //loop the result set
  $code=mysqli_fetch_array($college);
  if(mysqli_num_rows($college)>0)
{ 
  
  echo $code[1];

}


      $pr=substr($usn,0,7);
      $query="CALL gget_college()";
      $result=mysqli_query($db,$query);
      $row=mysqli_fetch_array($result);
      if (mysqli_num_rows($result) > 0) 
    {
      while($row = mysqli_fetch_assoc($result)) 
      {

    echo '<tr><td><center</center></td><td><center><div style="text-transform:uppercase">'.$row[0].'</div></center></td</td><td><center>'.$row[1].'</center></td></tr>';
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
