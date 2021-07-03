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
    <form method="post">
      <label>Elections Name:</label>
       <select class="form-control" name="elections_name">  
        <option value="" selected="selected">Select Elections:</option>

        <?php

        $conn=new mysqli("localhost","root","","votingsystem_db");

        $select="Select * from elections_tbl";
        $run=$conn->query($select);
        if($run->num_rows>0)
        {
          while($row=$run->fetch_array())
          {

      ?>
     
      <option value="<?php echo $row['elections_name'];?>"><?php echo $row['elections_name'];?></option>


      <?php

           }
        }

      ?>

       </select>   
  <br>
      <input type="submit" name="search_candidate" class="btn btn-success" value="Search Candidate">

    </form>

    <?php

    date_default_timezone_set("Asia/Kolkata");
    if(isset($_POST['search_candidate']))
    {
      $elections_name=$_POST['elections_name'];

      $select="select * from elections_tbl where elections_name='$elections_name'";
      $run=$conn->query($select);
      if($run->num_rows>0)
      {
        while($row=$run->fetch_array())
        {
          $elections_start_date=$row['elections_start_date'];
          $elections_end_date=$row['elections_end_date'];
        }
      }

      $current_ts=time();
      $elections_start_date_ts=strtotime($elections_start_date);
      $elections_end_date_ts=strtotime($elections_end_date);


      if($elections_start_date_ts>$current_ts)
      {
        echo "Election did not start .Please Wait";
      }
      else if($current_ts>$elections_end_date_ts)
      {
        echo "Election has been closed.";
      }
      else
      {
        ?>
        <br>
        <br>
        <div class="col-sm-5 col-sm-offset-0  alert alert-info">
        <h1>To Vote:</h1>
        
        <a href="votecast.php ? elections_name=<?php echo str_replace(' ','-',$elections_name);  ?>"><h2><b>Click here</b></h2></a>
      </div>
    
        <?php
        
      }

    }

    ?>



<script type="text/javascript" src="js/bootstrap.js" />
<script type="text/javascript" src="js/jquery.js" />

</body>
</html>
