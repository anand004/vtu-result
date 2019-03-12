<?php
session_start();
include('../connection.php');
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
  else if(substr($subcode,4,1)=='T')
  {
    $credit=4;
    $total_credits+= $credit;
    $total = $credit * $grade_points;
  }
  else
  {
    $credit=2;
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
echo $subname;
echo $subcode;
echo $imarks;
echo $emarks;
echo $tot;
echo $grade_points;
echo $grade;
echo $credit;
echo "<br>";
mysqli_query($db,"UPDATE $usn SET subject_code='$subcode',subject_name='$subname',internal_marks='$imarks',external_marks='$emarks',total_marks='$tot',credits='$credit',grade_points='$grade_points',grade='$grade' WHERE sem='$sem';");


}



$sgpa = $total_final / $total_credits;

echo $total_marks;
echo substr($subcode,4,1);
echo $total_credits;
echo $total_final;
$sgpa2 = number_format((float)$sgpa, 2, '.', '');
mysqli_query($db,"UPDATE rank SET SGPA='$sgpa2',TOTAL_MARKS='$total_marks' WHERE USN='$usn' and SEM='$sem';");
echo '<script language="javascript">
        alert("Your Data Was Edited Succesfully"); location.href="index.php"
        </script>';



?>