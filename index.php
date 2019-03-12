<?php
session_start();

include('connection.php');

$user=$_POST['usn'];
$pass=$_POST['pass'];
$error=false;
if(isset($_POST['submit'])){
$query="SELECT usn,password FROM logindetails where usn='$user' and password='$pass'";
$result=mysqli_query($db,$query);
$row=mysqli_fetch_array($result);
if(mysqli_num_rows($result)>0)
{ 
  $error=false;
  $_SESSION['username'] = $user;
  $_SESSION['name'] = $name;
  $_SESSION['logged_in'] = true;
  header("location:dashboard/");

}
else{
   $error=true;
}
}
if(isset($_SESSION['username'])){
  header("location:dashboard/");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>LOGIN</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="container-fluid">
<?php
include('navbar.php');
?>
<div class="login">
  <div class="login-triangle"></div>
  
  <h2 class="login-header">Welcome Back! Please Sign In</h2>

  <form class="login-container" method="POST">
    <p><input type="text" name='usn' placeholder="Enter Your USN" style="text-transform:uppercase" required=""></p>
    <p><input type="password" name='pass' placeholder="Password" required=""></p>
    
    <p><input type="submit" name="submit" value="Log in"></p>
    <center><p>Don't Have An Account? </p></center>
    <center><p><a href="signup.php">Register Now</a></p></center>
  </form>
  <?php if($error){ ?>
   <script> alert ("Username or Password Is Incorrect")</script>
 <?php } ?>
</div>
</div>
</body>
</html>

