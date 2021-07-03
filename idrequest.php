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
		<h2>All Requested Data</h2>
		<table class="table table-responsive table-hover">
			<tr>
				<th>#</th>
				<th>User Adhaar</th>
				<th>User Name</th>
				<th>User Phone Number</th>
				<th>Action</th>
			</tr>

			<?php

			$conn=new mysqli("localhost","root","","votingsystem_db");

			$select="select * from id_request_tbl";

			$run=$conn->query($select);

			if($run->num_rows>0)
			{
				$total=0;

				while($row=$run->fetch_array())
				{
					$total=$total+1;
					$id=$row['id'];
					?>

					<tr>
						<td><?php echo $total;?></td>
						<td><?php echo $row['user_aadhar'];?> </td>
						<td><?php echo $row['user_name'];?> </td>
						<td><?php echo $row['user_phonenumber'];?> </td>
						<td><a href="updateid.php?id=<?php echo $id;?>">Update</a></td>
					</tr>

				<?php
				}	
			}

			?>

		</table>

	</div>
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