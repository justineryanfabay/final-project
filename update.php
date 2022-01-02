<?php 

//connect to database and make query
	include("connect.php");
	$id = $_GET['id'];
	$result = mysqli_query($db_connect, "SELECT * FROM bmr_tb WHERE (id = '$id')");

//get the data through while loop
	while ($edit = mysqli_fetch_array($result)) {
		$first_name = $edit['first_name'];
		$last_name = $edit['last_name'];
		$gender = $edit['gender'];
		$age = $edit['age'];
		$weight = $edit['weight'];
		$height = $edit['height'];
	}

	$err = array("first_name" => "", "last_name" => "", "gender" => "", "age" => "", "weight" => "", "height" => "");

//validate the data
	if(isset($_POST["submit"])){

		$id = $_POST['id'];
		
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


//update the calculation
		if(array_filter($err)) {

		} elseif ($gender == "male") {
			$bmr = (10 * $weight) + (6.25 * $height) - (5 * $age) + 5;
		} else {
			$bmr = (10 * $weight) + (6.25 * $height) - (5 * $age) - 161;
		}

//update query
		$updated = "UPDATE bmr_tb SET first_name = '$first_name', last_name = '$last_name', gender = '$gender', age = '$age', weight = '$weight', height = '$height', bmr = '$bmr' WHERE (id = '$id')";

		mysqli_query($db_connect, $updated);
		header("Location: records.php");
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit / BMRCalc</title>
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
	      <a class="btn btn-primary" href="records.php" role="button">View record</a>
	    </div>
	  </div>
	</nav>

	<!-- update form -->
	<div class="container">
		<h5 class="justify-content-center text-center mt-3">E D I T</h5>
		<hr/>
		<form action = "update.php" method="POST" autocomplete="off">
			<div class="row justify-content-center mt-5">
				<div class="col-5 mb-4">
					<label for="first_name" class="form-label">First Name:</label>
					<input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $first_name ?>">
					<div class="text-danger"><?php echo $err["first_name"] ?></div>
				</div>
			</div>

			<div class="row justify-content-center">
				<div class="col-5 mb-4">
					<label for="last_name" class="form-label">Last Name:</label>
					<input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $last_name ?>">
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
					<input type="number" class="form-control" id="age" name="age" value="<?php echo $age ?>">
					<div class="text-danger"><?php echo $err["age"] ?></div>
				</div>
			</div>

			<div class="row justify-content-center">
				<div class="col-5 mb-4">
					<label for="weight" class="form-label">Weight (in kg):</label>
					<input type="number" class="form-control" id="weight" name="weight" value="<?php echo $weight ?>">
					<div class="text-danger"><?php echo $err["weight"] ?></div>
				</div>
			</div>

			<div class="row justify-content-center">
				<div class="col-5 mb-4">
					<label for="height" class="form-label">Height (in cm):</label>
					<input type="number" class="form-control" id="height" name="height" value="<?php echo $height ?>">
					<div class="text-danger"><?php echo $err["height"] ?></div>
				</div>
			</div>

			<div class="row justify-content-center">
				<div class="col-5 mb-4">
					<input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
					<button class="btn btn-primary" type="submit" value="submit" name="submit">Update</button>
				</div>
			</div>
		</form>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>