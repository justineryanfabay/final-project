<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>About / BMRCalc</title>
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
	          <a class="nav-link" aria-current="page" href="index.php">Home</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link active" href="about.php"><strong>About</strong></a>
	        </li>
	      </ul>
	      <a class="btn btn-primary" href="records.php" role="button">View record</a>
	    </div>
	  </div>
	</nav>

<!-- About page description -->
	<div class="container">
		<p class="display-1 mt-5">About</p>
		<hr />
		<p>BMR which stands for <strong>Basal Metabolic Rate</strong>, measures your body's calorie needs to sustain the most basic needs (life-sustaining functions) if your body is at rest all day. Simply put—BMR is the minimum number of calories your body needs in order to function for 24 hours.</p>
		<p>This simple website was created to calculate your BMR easily with CRUD (create, read, update, delete) functionalities. This uses the Mifflin - St Jeor Equation as research suggests that this type of equation was said to be more predictive for modern lifestyles and has established itself as the standard for calculating BMR estimates.</p>
		<p class="text-secondary">Created by Justine Ryan L. Fabay, Iloilo Science and Technology University (A.Y. 2021-2022).</p>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>