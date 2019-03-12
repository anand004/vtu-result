<?php
session_start();
include('../connection.php');

if(isset($_SESSION['username'])){
	$usn=$_SESSION['username'];
  $pr=substr($usn,0,3);
  $college = "CALL get_college('".$pr."')";
	
}
else{
	
	header("location:../index.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>DASHBOARD</title>
      <link href="style.css" rel="stylesheet" type="text/css" />
      
     
</head>
<body>
<div class="container-fluid">
<?php
include('../navbar.php');
?>
<div class="row">
<div class="col-sm-2">
	</div>

<div class="col-sm-8">


    

<?php
$pr=substr($usn,0,3);
$quer="SELECT name FROM logindetails where usn='$usn'";
$resul=mysqli_query($db,$quer);
$rowi=mysqli_fetch_array($resul);
if(mysqli_num_rows($resul)>0)
{ 
  echo '<div class="border border-light p-5">';
  echo '<div class="border border-light p-5" style="text-transform:uppercase;font-size:20px;">NAME: <b>'.$rowi[0].'</b>';

}

 $college = "CALL get_college('".$pr."')";


$query="SELECT college_name FROM college where college_code='$pr'";
$result=mysqli_query($db,$query);
$row=mysqli_fetch_array($result);
if(mysqli_num_rows($result)>0)
{ 
  echo '<div style="text-transform:uppercase;font-size:20px;">USN:<b> '.$usn.'</b></br>'; 
  echo 'COLLEGE:<b> '.$row[0].'</b>';
  echo '</div>';


}


    
echo '</div>
<div class="col-sm-2">
	</div>
</div>';


   $result=mysqli_query($db,"SELECT `SEM`,`SGPA`,`TOTAL_MARKS` FROM `rank` WHERE `USN`= '$usn'");

   if (mysqli_num_rows($result) > 0) 
    {

echo '<div class="table-responsive-md border border-light p-5">
  <table class="table table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col"><center>SEM</center></th>
      <th scope="col"><center>SGPA</center></th>
      <th scope="col"><center>TOTAL MARKS</center></th>
      <th scope="col"><center>CLASS RANK</center></th>
      <th scope="col"><center>UNIVERSITY RANK</center></th>
      <th scope="col"><center>OPERATION</center></th>
    </tr>
  </thead>
  <tbody>';
    

   
      while($row = mysqli_fetch_assoc($result)) 
      {

    echo '
         <tr><td><center>'.$row["SEM"].'</center></td>
         <td><center>'.$row["SGPA"].'</center></td>
         <td><center>'.$row["TOTAL_MARKS"].'</center></td>
         
         <td><center><form action="../class/rank.php" method="post"><input type="hidden" name="tempId" value="'.$row["SEM"].'"/><input type="submit" name="submity" value="VIEW" style="background: red;border-color: transparent;color: #fff;cursor: pointer;font-weight:bold;"/></form></center></td>
         <td><center><form action="../university/rank.php" method="post"><input type="hidden" name="tempId" value="'.$row["SEM"].'"/><input type="submit" name="submiti" value="VIEW" style="background: red;border-color: transparent;color: #fff;cursor: pointer;font-weight:bold;"/></form></center></td>
         <td><center><form action="view_result.php" method="post" style="display:inline-block"><input type="hidden" name="tempId" value="'.$row["SEM"].'"/><button type="submit" name="submit" value="Edit/Modify" style="border-color: transparent;cursor: pointer;font-weight:bold;"><i class="fa fa-eye" aria-hidden="true"></i> </button></form>
           <form action="edit.php" method="post" style="display:inline-block"><input type="hidden" name="tempId" value="'.$row["SEM"].'"/><button type="submit" name="submit" value="Edit/Modify" style="border-color: transparent;cursor: pointer;font-weight:bold;"><i class="fa fa-edit" aria-hidden="true"></i> </button></form>
            <form action="delete.php" method="post" style="display:inline-block"><input type="hidden" name="tempId" value="'.$row["SEM"].'"/><button type="submit" name="submit" value="Edit/Modify" style="border-color: transparent;cursor: pointer;font-weight:bold;"><i class="fa fa-trash" aria-hidden="true"></i> </button></form></center></td>
         </tr>';
      }
    }
    else{
      echo '<span><div style="float:left;font-size:30px; color:red;">NO RESULTS WERE FOUND</div></span>';
    }

   
  echo ' </tbody>
</table>
<div class="login" style="float: right;">
<form action="add_result.php" method="post">
	<input type="submit" value="ADD RESULT" style="font-weight: bold">
</form>
</div>
</div>';
?>


</div>

</body>
</html>