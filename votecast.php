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
      <a class="navbar-brand" href="#">ONLINE E VOTING</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="welcome.php">Home</a></li>
      <li><a href="idgenerate.php">ID-Generate</a></li>
      <li><a href="elections.php">Elections</a></li>
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
      <div class="container">
        <div class="col-sm-8 col-sm-offset-2  alert alert-info">
          <h4 class="text text-center"><br><b>Choose One from below [ you can only vote once ]:</b></h4>
        </div>
      </div>


  <div class="col-md-4 col-md-offset-2">
    
    <br>
    <br>
    <form method="POST" action="">



      <?php 

      $conn=new mysqli("localhost","root","","votingsystem_db");

      $elections_name=$_GET['elections_name'];

      $select="select * from candidates_tbl where elections_name='$elections_name'";

      $run=$conn->query($select);

      if($run->num_rows>0)
      {
        while($row=$run->fetch_array())
        {
          ?>
              <div class="form-check">
                <input class="form-check-input" name="candidate_name" type="checkbox" value="<?php echo $row['candidate_name']; ?> id="defaultCheck1">
              <label class="form-check-label" for="defaultCheck1"><?php echo $row['candidate_name']; ?></label>
              </div>
              <br>
            
          

          <?php

        }
      }


      ?>
      <br>
      <input type="submit" name="vote_cast" class="bt btn-success" data-toggle="button" aria-pressed="false" autocomplete="off">
    </form>
  </div>
</div>
<?php 

if(isset($_POST['vote_cast']))
{
  $candidate_name=$_POST['candidate_name'];
  $user_aadhar=$_SESSION['user_aadhar'];
  $select="select * from results_tbl where user_aadhar='$user_aadhar' and elections_name='$elections_name'";
  $exe1=$conn->query($select);
  if($exe1->num_rows>0)
  {
    ?>

    <div class="container">
      <br>
        <div class="col-sm-8 col-sm-offset-2  alert alert-danger">
          <h4 class="text text-center"><br><b>You Have Already Voted.</b></h4>
        </div>
      </div>

      <?php
  }
  else
  {

    $insert="insert into results_tbl(user_aadhar,candidate_name,elections_name) values ('$user_aadhar','$candidate_name','$elections_name')";

  $run=$conn->query($insert);

  if($run)
  {
    $update="update candidates_tbl set total_votes=`total_votes`+'1' where candidate_name='$candidate_name' and elections_name='$elections_name'";

    $exe=$conn->query($update);
    if($exe)
    {
        ?>

      <div class="container">
      <br>
        <div class="col-sm-8 col-sm-offset-2  alert alert-success">
          <h4 class="text text-center"><br><b>You Have Voted.</b></h4>
        </div>
      </div>

      <?php
    }
    else
    {
      ?>  

      <div class="container">
      <br>
        <div class="col-sm-8 col-sm-offset-2  alert alert-danger">
          <h4 class="text text-center"><br><b>Vote Unsucessful.</b></h4>
        </div>
      </div>


      <?php
    }
  }
  else
    echo "loser";



  }


  

}



?>


<script type="text/javascript" src="js/bootstrap.js" />
<script type="text/javascript" src="js/jquery.js" />

</body>
</html>
