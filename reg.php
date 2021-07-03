<html>
<head>
<title>
Voting system
</title>
<link rel="stylesheet" href="css/bootstrap.css" />
</head>
<body>

<!--nav bar-->
<div class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">ONLINE E VOTING</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.php">Home</a></li>
      <li class="active"><a href="reg.php">Registration</a></li>
      <li><a href="login.php">Login</a></li>
      <li><a href="aboutus.php">About-us</a></li>
    </ul>
  </div>
</div>
<!--end nav bar-->

<!--image center-->
<div class=container>

	<div class="row">
		<div class="col-sm-0 col-sm-offset-3">
			<img src="images/loginpage.JPG" width="600" height="400" class="img img-responsive">
		</div>
	</div>
</div>





<?php

require("includes/db.php");

if(isset($_POST['registration']))
{
	$user_name=$_POST['fullname'];
	$user_aadhar=$_POST['AdhaarNumber'];
	$user_email=$_POST['email'];
	$user_gender=$_POST['gender'];
	$user_password=$_POST['Password'];

$insert="insert into users_db(user_name,user_aadhar,user_email,user_gender,user_password) values('$user_name','$user_aadhar','$user_email','$user_gender','$user_password')";

$run=$conn->query($insert);

if($run)
{
	echo '<script>alert("Successfully Registered!!")</script>';
}
else
{
	echo '<script>alert("Adhaar Number Already Registerd.")</script>';
}
}

?>




<br>

<div class="container">
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2  alert alert-success">

			<form method="post">
				<h4 class="text text-center alert bg-primary" style="color:white;">User Registration</h4>
				<div class="form-group">
					<label for="username">Full Name:</label>
					<input type="text" name="fullname" class="form-control" required="true">
				</div>

				<div class="form-group">
					<label for="adhaarNumber">Adhaar Number or Voter ID-Number:</label>
					<input type="number" name="AdhaarNumber" class="form-control" required="true">
				</div>

				<div class="form-group">
					<label for="email">Email Address:</label>
					<input type="email" name="email" class="form-control" required="true">
				</div>

				<div class="form-group">

					<label for="Gender">Gender:</label>
						<select name="gender" class="form-control" required="true">
							<option value="">Select</option>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
							<option value="Other">Other</option>
						</select>
				</div>

				<div class="form-group">
					<label for="password">Password:</label>
					<input type="password" name="Password" class="form-control" required="true">
				</div>
				<div class="form-group">
				<button type="submit" class="btn btn-success btn-block" name="registration">Submit</button>
			</div>
			</form>

		</div>
	</div>

</div>



<script type="text/javascript" src="js/bootstrap.js" />
<script type="text/javascript" src="js/jquery.js" />

</body>
</html>
