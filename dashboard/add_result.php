<?php
session_start();
include("../connection.php");
echo "<link rel='stylesheet' type='text/css' href='style.css' />";
$sem=$_POST["tempId"];
$usn=$_SESSION['username'];

if(isset($_POST['submit'])){

$total_marks=0;
$total_credits=0;
$total=0;
$total_final = 0;
$error=false;
$usn=$_SESSION['username'];
$sem=$_POST['sem'];
for($i=0;$i<8;$i++)
{
$subcode=$_POST['scode'][$i];
$subname=$_POST['sname'][$i];
$imarks=$_POST['imarks'][$i];
$emarks=$_POST['emarks'][$i];
$tot=$imarks+$emarks;
if($emarks<28)
  {
    $grade_points=0;
    $grade="F";

  }
  else if($tot>=30 and $tot<40)
  {
    $grade_points=4;
    $grade="E";

    
  }
 
  else if($tot>=40 and $tot<=49)
  {
    $grade_points=5;
    $grade="D";


  
  }
  else if($tot>=50 and $tot<=59)
  {
    $grade_points=6;
    $grade="C";


  }
  else if($tot>=60 and $tot<=69)
  {
    $grade_points=7;
        $grade="B";


  }
  else if($tot>=70 and $tot<=79)
  {
    $grade_points=8;
    $grade="A+";


  }
  else if($tot>=80 and $tot<=89)
  {
    $grade_points=9;
    $grade="S";;


  }
  else
  {
    $grade_points=10;
    $grade="S+";
    

  }
  
  $total_marks+=$tot;
  if(strlen($subcode)==7)
{
  if(is_numeric(substr($subcode,4,1)))
  {
    $credit=3;
    $total_credits+= $credit;
    $total = $credit * $grade_points;

  }
  else if(substr($subcode,4,1)=='L')
  {
    $credit=2;
    $total_credits+= $credit;
    $total = $credit * $grade_points;
  }
  else
  {
    $credit=4;
    $total_credits+= $credit;
    $total = $credit * $grade_points;
  }

}
else{
  $credit=4;
  $total_credits+= $credit;
  $total = $credit * $grade_points;
}
$total_final += $total;
/*echo $subname;
echo $subcode;
echo $imarks;
echo $emarks;
echo $tot;
echo $grade_points;
echo $grade;
echo $credit;
echo "<br>";*/



$res=mysqli_query($db,"INSERT INTO `result` (`usn`,`subject_code`, `subject_name`, `internal_marks`, `external_marks`, `total_marks`,`credits`,`grade_points`,`grade`,`sem`) VALUES ('$usn','$subcode', '$subname', '$imarks', '$emarks', '$tot','$credit', '$grade_points', '$grade', '$sem');");



}

$resulti=mysqli_query($db,"SELECT * FROM result WHERE usn='$usn' AND sem='$sem'");
$total_marks=0;
$total_credits=0;
$total=0;
$total_final = 0;
$total_final_credits = 0;
if(mysqli_num_rows($resulti)>0){
while($rowi = mysqli_fetch_assoc($resulti)) 
{
$credits=$rowi["credits"];
$grade_points=$rowi["grade_points"];
$total=$rowi["total_marks"];

$total_marks += $total;
$total_credits+= $credits;
 $total_final = $credits * $grade_points;
 $total_final_credits += $total_final;

  
/*echo $credits;
echo $grade_points;
echo $total_marks;

echo "<br>";*/
$sql = "CREATE TRIGGER UpdateTotal AFTER INSERT ON results FOR EACH ROW BEGIN 
   UPDATE `rank` SET TOTAL_MARKS='$total_marks',SGPA='$sgpa2' WHERE USN='$usn' AND SEM='$sem';
     END ";
mysqli_query($sql,$con);
}
}

$sgpa = $total_final_credits / $total_credits;

echo $total_marks;
echo $total_credits;
echo $total_final_credits;
$sgpa2 = number_format((float)$sgpa, 2, '.', '');
$result = mysqli_query($db,"SELECT * FROM rank WHERE USN='$usn' AND SEM='$sem'" );
$row=mysqli_fetch_assoc($result);
if(mysqli_num_rows($result)>0){

mysqli_query($db,"UPDATE `rank` SET TOTAL_MARKS='$total_marks',SGPA='$sgpa2' WHERE USN='$usn' AND SEM='$sem'");
} else {
    mysqli_query($db,"INSERT IGNORE INTO `rank` (`USN`, `SEM`,`SGPA`, `TOTAL_MARKS`) VALUES ('$usn','$sem','$sgpa2','$total_marks')");

 }


        echo '<script language="javascript">
        alert("Your Data Was Edited Succesfully"); location.href="index.php"
        </script>';
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>ADD NEW RESULT</title>
	 <link href="style.css" rel="stylesheet" type="text/css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <style>
   .login input[type="button"]{
  background: #343A40;
  border-color: transparent;
  color: #fff;
  cursor: pointer;
}
.login input[type="button"]:hover {
  background: #17c;
}
.login input[type="button"]:focus,{
  border-color: #05a;

}
 </style>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
       <script>
        jQuery(function(){
    var counter = 1;
    jQuery('input.add-author').click(function(event){
        event.preventDefault();

        var newRow = jQuery('<tr><td><input class="form-control form-control-sm" type="text" name="scode[]" style="text-transform:uppercase" required=""' +
            counter + '"/></td><td><input class="form-control form-control-sm" type="text" name="sname[]" style="text-transform:uppercase"required=""' +
            counter + '"/></td><td><input class="form-control form-control-sm" type="number" name="imarks[]"required=""' +
            counter + '"/></td><td><input class="form-control form-control-sm" type="number" name="emarks[]"required=""' +
            counter + '"/></td></tr>');
            counter++;
        jQuery('table.table').append(newRow);

    });
});
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

			<form method="post" >
		<?php
		echo '<center><b>Semester : </b></center><select name="sem" class="form-control mb-4" placeholder="Enter Your SEM">
    <option selected="selected">
CHOOSE YOUR SEMESTER
</option>
    <option value="1">1st Sem</option>
    <option value="2">2nd Sem</option>
    <option value="3">3rd Sem</option>
    <option value="4">4th Sem</option>
    <option value="5">5th Sem</option>
    <option value="6">6th Sem</option>
    <option value="7">7th Sem</option>
    <option value="8">8th Sem</option>


    </select>';
		
    echo '</br>';
		?>
		
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

    
     
    echo '<tr><td><input class="form-control form-control-sm" type="text" name="scode[]" style="text-transform:uppercase" required=""></td>
          <td><input class="form-control form-control-sm" type="text" name="sname[]" style="text-transform:uppercase"required="" ></td>
          <td><input class="form-control form-control-sm" type="number" name="imarks[]"required=""></td>
          <td><input class="form-control form-control-sm" type="number" name="emarks[]"required=""></td>
         <tr>';
      


    ?>
  </tbody>
</table>

<div class="login" style="float: left;">
<input type="button" class="add-author" value="ADD SUBJECT">
</div>
<div class="login" style="float: right;">
<input type="submit" name="submit" value="SUBMIT"> 
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