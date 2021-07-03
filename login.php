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
      <li><a href="reg.php">Registration</a></li>
      <li class="active"><a href="login.php">Login</a></li>
      <li><a href="aboutus.php">About-us</a></li>
    </ul>
  </div>
</div>
<!--end nav bar-->

<!--image center-->
<div class=container>

	<div class="row">
		<div class="col-sm-0 col-sm-offset-3">
			<img src="images/registrationpage.jpg" width="600" height="400" class="img img-responsive">
		</div>
	</div>
</div>



<?php
session_start();
require("includes/db.php");

 $error="";
 $success="";
 
if(isset($_POST['login']))
{

 

   $user_aadhar=$_POST['AdhaarNumber'];
   $user_password=$_POST['password'];

  $select="select * from users_db where user_aadhar='$user_aadhar' and user_password='$user_password' ";

  $run=$conn->query($select);
  if($run->num_rows>0)
  {
    while($row=$run->fetch_array())
    {
      $_SESSION['user_email']=$user_email=$row['user_email'];
      $_SESSION['user_aadhar']=$user_password=$row['user_aadhar'];
      echo "<script>window.location.href='welcome.php'</script>";
    }
  }
  else
  {
    $error="Invalid Aadhar Number or Password.Try Again!!";
  }
}
?>

<br>

<div class="container">
  <div class="row">
    <div class="col-sm-8 col-sm-offset-2 alert alert-success">
       <h4 class="text text-center alert bg-primary" style="color:white;">User Login</h4>

       <?php

        if($error!="")
        {
          echo "<span class='text text-center text-danger'>".$error."</span>";
        }
       ?>


      <form method="post">
       

        <div class="form-group">
          <label for="email">Adhaar Number:</label>
          <input type="text" name="AdhaarNumber" class="form-control" required="true">
        </div>

        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" name="password" class="form-control" required="true">
        </div>

        <div class="form-group">
        <button type="submit" class="btn btn-success btn-block" name="login">Submit</button>
        </div>

      </form>
    </div>
  </div>

</div>

<script type="text/javascript" src="js/bootstrap.js" />
<script type="text/javascript" src="js/jquery.js" />


</body>
</html>