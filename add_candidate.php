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
		<form method="GET" action="add_details_candidates.php">
			<div class="from-group">
				<label>Add Candidate:</label>
				<select class="form-control" name="elections_name">
			        <option value="" selected="selected">Select Election Name:</option>

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
			</div>
			<br>
			<div class="form-group">

				<label>No. of Candidates</label>
				<input type="text" name="total_candidate" class="form-control">

			</div>

			
			<br>
			<input type="submit" name="add_elections" class="btn btn-success">

		</form>
	</div>
</div>




<script type="text/javascript" src="js/bootstrap.js" />
<script type="text/javascript" src="js/jquery.js" />

</body>
</html>