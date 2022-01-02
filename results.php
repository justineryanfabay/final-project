<?php

//start session
	session_start();
	$first_name = $_SESSION["first_name"];
	$last_name = $_SESSION["last_name"];
	$gender = $_SESSION["gender"];
	$age = $_SESSION["age"];
	$weight = $_SESSION["weight"];
	$height = $_SESSION["height"];

//calculation of BMR
	if($gender == "male") {
		$bmr = (10 * $weight) + (6.25 * $height) - (5 * $age) + 5;
	} else {
		$bmr = (10 * $weight) + (6.25 * $height) - (5 * $age) - 161;
	}

//insert the result to the database
	include('connect.php');
	$insert = "INSERT INTO bmr_tb (first_name, last_name, gender, age, weight, height, bmr) VALUES ('$first_name', '$last_name', '$gender', '$age', '$weight', '$height', '$bmr')";

	mysqli_query($db_connect, $insert);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Results / BMRCalc</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="bmr.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light">
	  <div class="container">
	    <a class="navbar-brand" href="index.php"><span class="display-6"><strong>BMR</strong>Calc</span></a>
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarText">
	      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
	        <li class="nav-item">
	          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="about.php">About</a>
	        </li>
	      </ul>
	      <a class="btn btn-primary mx-2" href="index.php" role="button">Add record</a>
	      <a class="btn btn-primary" href="records.php" role="button">View record</a>
	    </div>
	  </div>
	</nav>

<!-- Display the results -->
	<div class="container">
		<div class="row justify-content-center text-center mt-3">
			<h5>R E S U L T</h5>
			<hr/>
			<p class="display-5 mt-4">Hello <?php echo htmlspecialchars($first_name); ?>!</p>
			<h5>Your BMR is: <span class="h2 text-primary"><?php echo htmlspecialchars($bmr); ?></span> calories per day.</h5>
			<p class="text-secondary">This means that you need atleast <?php echo htmlspecialchars($bmr); ?> calories per day to sustain you body's basic needs when at rest.</p> 
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>