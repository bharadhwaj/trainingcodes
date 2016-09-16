<?php
	
	include_once "setup/users.php";
	

	$user = new Users();

	$errorexist = false;
	$usernameerror = $emailerror = $passworderror = $confirmpassworderror = $countryerror =  $termserror = "";
	$username = $email = $password = $confirmpassword = $country = $terms = "";	

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		if (empty($_POST["username"])) {
			$usernameerror = "* Name field can't be empty.";
			$errorexist = true;
		}
		else {
			$username = test_input($_POST["username"]);
			if (! preg_match("/^[a-zA-Z0-9]{6,12}$/", $username)) {
				$usernameerror = "* Invalid Username format.";
				$errorexist = true;
			}
		}

		if (empty($_POST["email"])) {
			$emailerror = "* Email field can't be empty.";
			$errorexist = true;
		}
		else {
			$email = test_input($_POST["email"]);
			if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$emailerror = "* Invalid Email format.";
				$errorexist = true;
			}
		}

		if (empty($_POST["password"])) {
			$passworderror = "* Password field can't be empty.";
			$errorexist = true;
		}
		else {
			$password = test_input($_POST["password"]);
			if (! preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W)(?!.*[ ]).{6,12}$/", $password)) {
				$passworderror = "* Invalid password format.";
				$errorexist = true;
			}
		}

		if (empty($_POST["confirm-password"])) {
			$confirmpassworderror = "* Confirm Password field can't be empty.";
			$errorexist = true;
		}
		else {
			$confirmpassword = test_input($_POST["confirm-password"]);
			if ($password != $confirmpassword) {
				$confirmpassworderror = "* Passwords do not match";
				$errorexist = true;
			}
		}

		if (empty($_POST["country"])) {
			$countryerror = "* Select any country.";
			$errorexist = true;
		}
		else
			$country = test_input($_POST["country"]);

		$terms = $_POST["terms"];
		if ($_POST["terms"] != 'terms') {
			$termserror = "* Please accept the terms to continue.";
			$errorexist = true;
		}

		if(! $errorexist) {
			$user->createUser ($username, $email, md5($password), $country);
			// session_start();
			// $_SESSION["username"]=$_POST["username"];
			// $_SESSION["email"]=$_POST["email"];
			// $_SESSION["password"]=$_POST["password"];
			// $_SESSION["country"]=$_POST["country"];
			// header("Location:/viewuser.php");
			exit();
		}
	}

	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

?>