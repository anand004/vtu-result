<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Class Rank</title>
    
</head>
<body>
<div class="container-fluid">
<?php
include('../navbar.php');
?>
<div class="row">
<div class="col-sm-3">
	</div>

<div class="col-sm-6">
<div class="wrapper">
<form  action="rank.php" method="POST" class="text-center border border-light p-5">

    <p class="h4 mb-4">Class Rank</p>

    <input type="text" name="usn" class="form-control mb-4" placeholder="Enter Your USN" maxlength="10" style="text-transform:uppercase" required="">
    <select name="sem" class="form-control mb-4" placeholder="Enter Your SEM">
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


    </select>
    <input type="number" name="marks" class="form-control mb-4" placeholder="Enter Your Total Marks" max="800" required="">

    <button class="btn btn-info btn-block my-4" name="sname1" type="submit">SUBMIT</button>
    <p>*Class Rank is Based On Current Stored Data*</p>
   

</form>
</div>
</div>
<div class="col-sm-3">
	</div>
</div>
</div>
</body>
</html>
