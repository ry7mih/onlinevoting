<html>
<head>
<title>
Voting system
</title>
<link rel="stylesheet" href="css/bootstrap.css" />
<link rel="stylesheet" href="mystyle.css"/>
<link rel="stylesheet" href="css/fonts.css" />
</head>
<body>


<div class="container">
	<div class="col-sm-10">
		<h3>Add Candidate Details</h3>
		<form method="POST">
			
			<?php

				$elections_name=$_GET['elections_name'];
				$total_candidate=$_GET['total_candidate'];




				for($i=1;$i<=$total_candidate;$i++)
				{
					?>

					<div class="form-group">
						<label>Candidate Name <?php echo $i ;?></label>
						<input type="text" name="candidate_name<?php echo $i ;?>" class="form-control">

					</div>



					<?php

				}

			?>

			<input type="submit" name="add_details_candidate" class="btn btn-success"> 


		</form>
	</div>
</div>

<?php

$conn=new mysqli("localhost","root","","votingsystem_db");

if(isset($_POST['add_details_candidate']))
{
	$total_candidate=$_GET['total_candidate'];
	$elections_name=$_GET['elections_name'];

	for($i=1;$i<=$total_candidate;$i++)
	{

		$candidate_name[]=$_POST['candidate_name'.$i];
	}

	for($i=0;$i<$total_candidate;$i++)
	{
		$insert="INSERT into candidates_tbl(candidate_name,elections_name) values ('$candidate_name[$i]','$elections_name')";
		$run=$conn->query($insert);
	}

	if($run)
	{
		?>

		<div class="col-sm-8 col-sm-offset-2  alert alert-success">
          <h4 class="text text-center"><br><b>Added New Candidates.</b></h4>
        </div>
      </div>

      <?php
	}
	else
	{
		?>

		<div class="col-sm-8 col-sm-offset-2  alert alert-success">
          <h4 class="text text-center"><br><b>Failed.</b></h4>
        </div>
      </div>

      <?php
	}
}



?>

<div class="container">
      <br>
      <br>
        <div class="col-sm-3 col-sm-offset-0  alert alert-info">
          To Go Back.
			<a href="alladmin.php">Click Here.</a>
        </div>
      </div>



<script type="text/javascript" src="js/bootstrap.js" />
<script type="text/javascript" src="js/jquery.js" />

</body>
</html>