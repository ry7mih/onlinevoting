<?php
session_start();
?>
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
      <li><a href="welcome.php">Home</a></li>
      <li><a href="idgenerate.php">ID-Generate</a></li>
      <li class="active"><a href="elections.php">Elections & Vote</a></li>
      <li><a href="results.php">Results</a></li>
    </ul>

    <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>

  </div>
</div>
<!--end nav bar-->



<br>

<div class="container">

    <div class="col-md-6 col-md-offset-3">

      
      <form method="POST">

        <div class="form-group">
          <label for="email">Adhaar Number:</label>
          <input type="text" name="user_aadhar" class="form-control" required="true">
        </div>

        <div class="form-group">
          <label for="ID">Your ID::</label>
          <input type="text" name="user_id" class="form-control" required="true">
        </div>

        <div class="form-group">
        <button type="submit" class="btn btn-success btn-block" name="login">Submit</button>
        </div>

      </form>

    </div>

</div>

<?php

$conn=new mysqli("localhost","root","","votingsystem_db");

if(isset($_POST['login']))
{
  $user_id=$_POST['user_id'];
    $user_aadhar=$_POST['user_aadhar'];

  $select="select * from users_db where user_id_generated='$user_id' and user_aadhar='$user_aadhar'";
  $run=$conn->query($select);

  if($run->num_rows>0)
  {
    header("location:vote.php");
  }
  else
  {
    echo "error";
  }

}


?>


<script type="text/javascript" src="js/bootstrap.js" />
<script type="text/javascript" src="js/jquery.js" />

</body>
</html>
