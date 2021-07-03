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
      <li class="active"><a href="idgenerate.php">ID-Generate</a></li>
      <li><a href="elections.php">Elections & Vote</a></li>
      <li><a href="results.php">Results</a></li>
    </ul>

    <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>


  </div>
</div>
<!--end nav bar-->

<div class="container">
  <?php
require("includes/db.php");
 $user_email=$_SESSION['user_email'];

 $select="select * from users_db where user_email='$user_email'";

 $run=$conn->query($select);

 if($run->num_rows>0)
 {
    while($row=$run->fetch_array())
    {
      $user_name=$row['user_name'];
      $user_email=$row['user_email'];
      $user_gender=$row['user_gender'];
      $user_aadhar=$row['user_aadhar'];
      $user_id_generated=$row['user_id_generated']; 

    }

 if($user_id_generated!="")
 {
  ?>

  <br>
  <br>
    <div class="col-sm-6 col-sm-offset-3 text-center bg-success alert">

      <h4>Your ID is:"<span class="text text-danger"><?php echo $user_id_generated; ?></span>"</h4>
      <p><b>Note:</b> Use this with your login credentials to cast your vote</p>

    </div>
    <?php
 }
 else
 {

  ?>

  <div class="col-sm-6 col-sm-offset-3 bg-success alert">

    <form method="post">
       

        <div class="form-group">
          <label for="email">Name:</label>
          <input type="text" name="name" class="form-control" required="true" value="<?php echo $user_name; ?>" readonly>
        </div>

        <div class="form-group">
          <label for="integer">Adhaar Number:</label>
          <input type="integer" name="AdhaarNumber" class="form-control" required="true" value="<?php echo $user_aadhar; ?>" readonly>
        </div>

        <div class="form-group">
          <label for="integer">Phone Number(only 10 digits):</label>
          <input type="integer" name="phonenumber" class="form-control" required="true">
        </div>

        <div class="form-group">
        <button type="submit" class="btn btn-info btn-block" name="idrequest">ID Request</button>
        </div>

      </form>


  </div>


<?php 

    }
 
  }
  

?>

  <?php

  if(isset($_POST['idrequest']))
{
   $user_name=$_POST['name'];
   $user_aadhar=$_POST['AdhaarNumber'];
  $user_phonenumber=$_POST['phonenumber'];


  $select="select * from id_request_tbl where user_aadhar='$user_aadhar'";
  $run=$conn->query($select);

  if($run->num_rows>0)
  {
    echo '<script>alert("Request Already Submitted.Please Wait for its Approval.")</script>';
  }
  else
  {
    $insert="insert into id_request_tbl(user_name,user_aadhar,user_phonenumber) values('$user_name','$user_aadhar','$user_phonenumber')";

    $run=$conn->query($insert);

    echo '<script>alert("Request Submitted.Please Wait for its Approval.")</script>';

  }
}





  ?>



<script type="text/javascript" src="js/bootstrap.js" />
<script type="text/javascript" src="js/jquery.js" />

</body>
</html>
