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
      <li class="active"><a href="login.php">Admin Login</a></li>
      <li><a href="aboutus.php">About-us</a></li>
    </ul>
  </div>
</div>
<!--end nav bar-->

<br>



<?php
session_start();
$conn=new mysqli("localhost","root","","votingsystem_db");

 $error="";
 $success="";
 
if(isset($_POST['admin_login']))
{

  echo $admin_name=$_POST['admin_name'];
  echo $admin_password=$_POST['admin_password'];
  echo $admin_ss=$_POST['admin_ss'];

  $select="select * from admin_verification_tbl where admin_name='$admin_name' and admin_password='$admin_password' ";

  $run=$conn->query($select);
  if($run->num_rows>0)
  {
    while($row=$run->fetch_array())
    {
      $_SESSION['admin_name']=$admin_name=$row['admin_name'];
      $_SESSION['admin_password']=$admin_password=$row['admin_password'];
      $_SESSION['admin_ss']=$admin_ss=$row['admin_ss'];
      echo "<script>window.location.href='alladmin.php'</script>";
    }
  }
  else
  {
    $error="Invalid.Try Again!!";
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
          <label for="email">Admin Name:</label>
          <input type="text" name="admin_name" class="form-control" required="true">
        </div>

        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" name="admin_password" class="form-control" required="true">
        </div>

        <div class="form-group">
          <label for="password">Security Code:</label>
          <input type="password" name="admin_ss" class="form-control" required="true">
        </div>

        <div class="form-group">
        <button type="submit" class="btn btn-success btn-block" name="admin_login">Submit</button>
        </div>

      </form>
    </div>
  </div>

</div>

<script type="text/javascript" src="js/bootstrap.js" />
<script type="text/javascript" src="js/jquery.js" />


</body>
</html>