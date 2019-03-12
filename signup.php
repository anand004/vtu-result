<?php
session_start();
include('connection.php');
if(isset($_POST['submit'])){
$name=$_POST['name'];
$email=$_POST['email'];
$usn=$_POST['usn'];
$pass=$_POST['pass'];

mysqli_query($db,"INSERT INTO logindetails (`name`, `email`, `usn`, `password`) VALUES ('$name','$email','$usn','$pass');") or die(mysqli_error($db));
$_SESSION['username']=$usn;
$_SESSION['name'] = $name;
$_SESSION['logged_in'] = true;
}
if(isset($_SESSION['username'])){
  header("location:dashboard/index.php");
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    

</head>
<body>
<div class="container-fluid">
<?php
include('navbar.php');
?>
<div class="login">
  <div class="login-triangle"></div>
  
  <h2 class="login-header">New Here! Sign Up Now</h2>

  <form class="login-container" method="POST" onsubmit="return myFunction() id="form">
    <p><input type="text" name="name" placeholder="Enter Your Name" style="text-transform:uppercase" required=""></p>
    <p><input type="email" name="email" placeholder="Enter Email" required=""></p>
    <p><input type="text" name="usn" placeholder="Enter Your USN" style="text-transform:uppercase" required=""></p>
    <p><input type="password" name="pass" id="password" placeholder="Password" required=""></p>
    <!--<p><input type="password" id="confirm_password" placeholder="Confirm Password" required=""></p>-->
    <p><input type="submit" name="submit" value="SUBMIT" id="submit"></p>
    <center><p>Already Have An Account? </p></center>-
    <center><p><a href="index.php">SIGN IN</a></p></center>
  </form>
</div>
</div>


</body>
</html>
