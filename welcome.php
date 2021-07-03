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
      <li class="active"><a href="welcome.php">Home</a></li>
      <li><a href="idgenerate.php">ID-Generate</a></li>
      <li><a href="elections.php">Elections & Vote</a></li>
      <li><a href="results.php">Results</a></li>
    </ul>

    <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>

  </div>
</div>
<!--end nav bar-->


<?php


if(!$_SESSION['user_email'])
{
  header("location:login.php");
}

?>






<br>

<div class="container">
  <div class="row">

    <div class="col-sm-6">
      <h4 class="text text-center text-info alert bg-primary">How to Cast Your Vote:</h4>
    <ul>
      <li>Firstly select <b>"ID Generate"</b> from Navigation bar.</li><br>
      <li>Then send request to <b>"Admin"</b> for Generate Your ID.</li><br>
      <li>Click on the <b>"Election & Vote"</b> from naviagtion bar.</li><br>
      <li>Select available election.</li><br>
      <li>The secrecy of your ballot is maintained under the high security standards.</li><br>
      <li>Your vote remains anonymous as our system's architecture strictly separated your personal data from the electronic ballot.</li>
    </ul>
    </div>
    <div class="col-sm-6">
      <h4 class="text text-center text-info alert bg-primary">Check out this video below on <b>"How to Vote"</b></h4>

        <!--utube video-->
        <div class="embed-responsive embed-responsive-4by3">
          <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/q-_n1CcQySs" allowfullscreen></iframe>
        </div>
    </div>

  </div>
</div>



<script type="text/javascript" src="js/bootstrap.js" />
<script type="text/javascript" src="js/jquery.js" />

</body>
</html>
