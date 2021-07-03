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
      <li class="active"><a href="login.php">Admin Responsibilties</a></li>
    </ul>

    <ul class="nav navbar-nav navbar-right">
      <li><a href="logoutadmin.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>



  </div>
</div>
<!--end nav bar-->


<br>

<div class="container">
  <div class="row">
    <div class="col-sm-8 col-sm-offset-2 alert alert-success">
       <h4 class="text text-center alert bg-primary" style="color:white;">Admin Responsibilties:</h4>


      <form method="post">
        <div class="form-group">
          <h2>To Update New User ID:</h2>
          <a href="idrequest.php">Click Here.</a>
        </div>
        <div class="form-group">
        </div>

        <br>
        <br>



        <form method="post">
        <div class="form-group">
          <h2>Add New Elections:</h2>
          <a href="add_new_elections.php">Click Here.</a>
        </div>
        <div class="form-group">
       
        </div>


        <br>
        <br>


        <form method="post">
        <div class="form-group">
          <h2>Add Candidate:</h2>
          <a href="add_candidate.php">Click Here.</a>
        </div>
        <div class="form-group">
        </div>


        <br>






      </form>
    </div>
  </div>

</div>

<script type="text/javascript" src="js/bootstrap.js" />
<script type="text/javascript" src="js/jquery.js" />


</body>
</html>