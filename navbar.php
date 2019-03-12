<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">VTUPortal</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="http://localhost/newproject/">Home <span class="sr-only">(current)</span></a>
      </li>
            <li class="nav-item">
        <a class="nav-link" href="http://localhost/newproject/dashboard/">Profile</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/newproject/class/">Class Rank</a>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="http://localhost/newproject/university/">
University Rank</a>
      </li>
    </ul>
    
    <ul class="navbar-nav"> 
      <?php if (isset($_SESSION['username']) && $_SESSION['logged_in'] == true): ?>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/newproject/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out </a>
      </li>
      <?php else: ?>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/newproject/"><i class="fa fa-user" aria-hidden="true"></i> Log In</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/newproject/signup.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Register </a>
      </li>
      <?php endif; ?>
     </ul>
     

  </div>


</nav>
</body>
</html>