<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Records / BMRCalc</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="bmr.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light">
	  <div class="container">
	    <a class="navbar-brand" href="#"><span class="display-6"><strong>BMR</strong>Calc</span></a>
	    <div class="collapse navbar-collapse" id="navbarText">
	      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
	        <li class="nav-item">
	          <a class="nav-link" aria-current="page" href="index.php">Home</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="about.php">About</a>
	        </li>
	      </ul>
	      <a class="btn btn-primary" href="index.php" role="button">Add record</a>
	    </div>
	  </div>
	</nav>

	<?php 

	//connect to database and make query
		include('connect.php');
		$query_result = mysqli_query($db_connect, "SELECT * FROM bmr_tb ORDER BY id ASC");
	?>

<!-- display the database through while loop -->
	<div class="container">
		<div class="row justify-content-center mt-5">
			<div class="table-responsive-md">
				<table class="table table-hover table-bordered border-muted align-middle">
					<thead>
						<tr class="table-primary">
							<th scope="col">First Name</th>
							<th scope="col">Last Name</th>
							<th scope="col">Gender</th>
							<th scope="col">Age</th>
							<th scope="col">Weight</th>
							<th scope="col">Height</th>
							<th scope="col">BMR</th>
							<th scope="col">Recorded on</th>
							<th scope="col"></th>
						</tr>
					</thead>
					<tbody>
						<?php
							while ($result = mysqli_fetch_assoc($query_result)) {
								echo "<tr>";
								echo "<td>" . $result["first_name"] . "</td>";
								echo "<td>" . $result["last_name"] . "</td>";
								echo "<td>" . $result["gender"] . "</td>";
								echo "<td>" . $result["age"] . "</td>";
								echo "<td>" . $result["weight"] . " kg" . "</td>";
								echo "<td>" . $result["height"] . " cm" . "</td>";
								echo "<td>" . $result["bmr"] . "</td>";
								echo "<td>" . $result["recorded_on"] . "</td>";
								echo "<td class='text-center'><a class='btn btn-info btn-sm' href='update.php?id=$result[id]' role='button'>Edit</a>&nbsp;
								<a class='btn btn-danger btn-sm' href='delete.php?id=$result[id]' onClick='return confirmDeletion()'>Delete</a></td>";
								echo "</tr>";
							}
							mysqli_close($db_connect);
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<script language="JavaScript" type="text/javascript">
		function confirmDeletion(){
    		return confirm("This action cannot be undone. Continue?");
		}
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>