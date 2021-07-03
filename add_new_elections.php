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
		<h3>Add New Election</h3>
		<form method="POST">
			<div class="from-group">
				<label>Add Elections name:</label>
				<input type="text" name="elections_name" class="form-control">
			</div>

			<div class="from-group">
				<label>Election Start Date:</label>
				<input type="date" name="elections_start_date" class="form-control">
			</div>

			<div class="from-group">
				<label>Election End date:</label>
				<input type="date" name="elections_end_date" class="form-control">
			</div>
			<br>
			<input type="submit" name="add_elections" class="btn btn-success">

		</form>
	</div>
</div>


<?php
$conn=new mysqli("localhost","root","","votingsystem_db");

if(isset($_POST['add_elections']))
{
	$elections_name=$_POST['elections_name'];
	$elections_start_date=$_POST['elections_start_date'];
	$elections_end_date=$_POST['elections_end_date'];

	$insert="insert into elections_tbl(elections_name,elections_start_date,elections_end_date) values ('$elections_name','$elections_start_date','$elections_end_date')";

	$run=$conn->query($insert);
	if($run)
	{
		?>

		<div class="container">
      <br>
        <div class="col-sm-8 col-sm-offset-2  alert alert-success">
          <h4 class="text text-center"><br><b>Added New Election.</b></h4>
        </div>
      </div>

      <?php
	}
	
	else
	{
		?>

		<div class="container">
      <br>
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