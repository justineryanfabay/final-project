<?php

//declare variables and arrays as empty
	$err = array("first_name" => "", "last_name" => "", "gender" => "", "age" => "", "weight" => "", "height" => "");
	$first_name = $last_name = $gender = $age = $weight = $height = "";

//form validation
	if(isset($_POST["submit"])){
		
		if(empty($_POST["first_name"])){
			$err["first_name"] = "First name is required.";
		} else {
			$first_name = $_POST["first_name"];
			if(!preg_match("/^[a-zA-Z-' ]*$/", $first_name)) {
				$err["first_name"] = "Only letters and spaces allowed.";
			}
		}

		if(empty($_POST["last_name"])){
			$err["last_name"] = "Last name is required.";
		} else {
			$last_name = $_POST["last_name"];
			if(!preg_match("/^[a-zA-Z-' ]*$/", $last_name)) {
				$err["last_name"] = "Only letters and spaces allowed.";
			}
		}

		if(empty($_POST["gender"])) {
			$err["gender"] = "Choose a gender.";
		} else {
			$gender = $_POST["gender"];
		}

		if(empty($_POST["age"])){
			$err["age"] = "Age is required.";
		} else {
			$age = $_POST["age"];
			if(!is_numeric($age)) {
				$err["age"] = "Age must be a number.";
			}
		}

		if(empty($_POST["weight"])){
			$err["weight"] = "Weight is required.";
		} else {
			$weight = $_POST["weight"];
			if(!is_numeric($weight)) {
				$err["weight"] = "Weight must be a number.";
			}
		}

		if(empty($_POST["height"])){
			$err["height"] = "Height is required.";
		} else {
			$height = $_POST["height"];
			if(!is_numeric($height)) {
				$err["height"] = "Height must be a number.";
			}
		}

//check if errors were made and redirect to results.php if none
		if(array_filter($err)) {

		} else {
			session_start();
			$_SESSION["first_name"] = $_POST["first_name"];
			$_SESSION["last_name"] = $_POST["last_name"];
			$_SESSION["gender"] = $_POST["gender"];
			$_SESSION["age"] = $_POST["age"];
			$_SESSION["weight"] = $_POST["weight"];
			$_SESSION["height"] = $_POST["height"];
			header("Location: results.php");
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>BMRCalc</title>
	<link rel="stylesheet" href="bmr.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
	          <a class="nav-link active" aria-current="page" href="index.php"><strong>Home</strong></a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="about.php">About</a>
	        </li>
	      </ul>
	      <a class="btn btn-primary" href="records.php" role="button">View record</a>
	    </div>
	  </div>
	</nav>

<!-- form -->
	<div class="container">
		<h5 class="justify-content-center text-center mt-3">C A L C U L A T E</h5>
		<hr/>
		<form action="index.php" method="POST" autocomplete="off">
			<div class="row justify-content-center mt-5">
				<div class="col-5 mb-4">
					<label for="first_name" class="form-label">First Name:</label>
					<input type="text" class="form-control" id="first_name" name="first_name" size="50" value="<?php echo $first_name ?>">
					<div class="text-danger"><?php echo $err["first_name"] ?></div>
				</div>
			</div>

			<div class="row justify-content-center">
				<div class="col-5 mb-4">
					<label for="last_name" class="form-label">Last Name:</label>
					<input type="text" class="form-control" id="last_name" name="last_name" size="50" value="<?php echo $last_name ?>">
					<div class="text-danger"><?php echo $err["last_name"] ?></div>
				</div>
			</div>

			<div class="row justify-content-center">
				<div class="col-5 mb-4">
					<p>Gender:</p>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="gender" id="male" value="male" <?php if($gender == "male"){echo "checked";} ?>>
						<label class="form-check-label" for="male">Male</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="gender" id="female" value="female" <?php if($gender == "female"){echo "checked";} ?>>
						<label class="form-check-label" for="female">Female</label>
					</div>
					<div class="text-danger"><?php echo $err["gender"] ?></div>
				</div>
			</div>

			<div class="row justify-content-center">
				<div class="col-5 mb-4">
					<label for="age" class="form-label">Age:</label>
					<div class="input-group">
						<input type="number" class="form-control" id="age" name="age" min="1" max="200" value="<?php echo $age ?>">
						<span class="input-group-text" id="basic-addon2">years old</span>
					</div>
					<div class="text-danger"><?php echo $err["age"] ?></div>
				</div>
			</div>

			<div class="row justify-content-center">
				<div class="col-5 mb-4">
					<label for="weight" class="form-label">Weight (in kg):</label>
					<div class="input-group">
						<input type="number" class="form-control" id="weight" name="weight" min="1" max="200" value="<?php echo $weight ?>">
						<span class="input-group-text" id="basic-addon2">kg</span>
					</div>
					<div class="text-danger"><?php echo $err["weight"] ?></div>
				</div>
			</div>

			<div class="row justify-content-center">
				<div class="col-5 mb-4">
					<label for="height" class="form-label">Height (in cm):</label>
					<div class="input-group">
						<input type="number" class="form-control" id="height" name="height" min="1" max="300" value="<?php echo $height ?>">
						<span class="input-group-text" id="basic-addon2">cm</span>
					</div>
					<div class="text-danger"><?php echo $err["height"] ?></div>
				</div>
			</div>

			<div class="row justify-content-center">
				<div class="col-5 mb-4">
					<button class="btn btn-primary" type="submit" value="submit" name="submit">Calculate</button>
				</div>
			</div>
		</form>
	</div>


	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>