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
      <li><a href="elections.php">Elections & Vote</a></li>
      <li class="active"><a href="results.php">Results</a></li>
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

    <h3 class=" text text-info text-center">Result Portion</h3>

    <p class="text text-danger">In this Section those elections are displayed which are closed or expired</p>
    <form method="post" action="">
    <div class="form-group">

      <select class="form-control" name="election_name">
      <option selected="selected" value="">Select Election:</option>
      <?php 
      $current_ts=time();
      $conn=new mysqli("localhost","root","","votingsystem_db");

      $select="Select * from elections_tbl";
        $run=$conn->query($select);
        if($run->num_rows>0)
        {
          while($row=$run->fetch_array())
          {
            echo $elections_name=$row['elections_name'];
            echo $elections_start_date=$row['elections_start_date'];
            echo $elections_end_date=$row['elections_end_date'];
            ?>
            <?php

            $elections_end_date_ts= strtotime($elections_end_date);
            if($elections_end_date_ts<$current_ts)
            {

            ?>

            <option value="<?php echo $elections_name;?>"><?php echo $elections_name;?></option>
            <?php
          } 
          }
        }

      ?>
      </select>
      <div class="form-group">
        <br>
          <input type="submit" name="search_results" class="btn btn-success" value="Search Results">


      </div>
    </form>

    <table class="table table-responsive table-hover table-bordered text-center">
      
      <tr>
        <td>#</td>
        <td>Candidates Name</td>
        <td>Obtain Votes</td>
        <td>Winning Status</td>
      </tr>

      <?php

    if(isset($_POST['search_results']))
    {
      $elections_name=$_POST['election_name']; 
      $select="select * from results_tbl where elections_name='$elections_name'";
      $run=$conn->query($select);
      if($run->num_rows>0)
      {
        $total_elections_votes=0;
        while($row=$run->fetch_array())
        {
          $total_elections_votes+=1;
        }
      }
      $total=0;
      $select1="select * from  candidates_tbl where elections_name='$elections_name'";
      $run1=$conn->query($select1);
      if($run1->num_rows>0)
      {
        while($row2=$run1->fetch_array())
        {
          $total=$total+1;
          $candidate_name=$row2['candidate_name'];
          $total_votes=$row2['total_votes'];
          $percentage=(($total_votes/$total_elections_votes)*100);

          ?>

          <tr>
            <td><?php echo $total ?></td>
            <td><?php echo $candidate_name;?></td>
            <td><?php echo $total_votes;?></td>
            <td>

              <?php 

                if($percentage>50)
                {
                  ?>
                  <div class="progress">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo $percentage;?> aria-valuemax="<?php echo $percentage;?>" style="width: <?php echo $percentage;?>%">
                      <?php echo $percentage;?>%
                    </div>
                  </div>

                  <?php
                }
                else if($percentage>40)
                {
                  ?>
                  <div class="progress">
                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="<?php echo $percentage;?> aria-valuemax="<?php echo $percentage;?>" style="width: <?php echo $percentage;?>%">
                      <?php echo $percentage;?>%
                    </div>
                  </div>

                  <?php

                }
                else
                {
                  ?>
                  <div class="progress">
                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?php echo $percentage;?> aria-valuemax="<?php echo $percentage;?>" style="width: <?php echo $percentage;?>%">
                      <?php echo $percentage;?>%
                    </div>
                  </div>

                <?php
                }

              ?>

            </td>
          </tr>


          <?php 



        }
      }
      else
      {
        ?>

        <tr>
          <td colspan="4">Record Not Found</td>
        </tr>


        <?php 

      }
    }


    ?>

    </table>

    </div>
    

    

    


  </div>
</div>


<script type="text/javascript" src="js/bootstrap.js" />
<script type="text/javascript" src="js/jquery.js" />

</body>
</html>
