<?php
	
	include_once "setup/users.php";
	$user = new Users();
	
	$errorexist = false;

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (isset($_POST['register'])) {
			if (!isset($_POST['username'])) {
				$errors['username'] = "* Username field can't be empty.";
				$errorexist = true;
			}
			else
				$username = $user->connection->real_escape_string($_POST['username']);
			if (!isset($_POST['email'])) {
				$errors['email'] = "* Email field can't be empty.";
				$errorexist = true;
			} 
			else
				$email = $user->connection->real_escape_string($_POST['email']);
			if (!isset($_POST['password'])) {
				$errors['password'] = "* Password field can't be empty.";
				$errorexist = true;
			}
			else 
				$password = $user->connection->real_escape_string($_POST['password']);
			if (!isset($_POST['confirm-password'])) {
				$errors['confirmpassword'] = "* Confirm Password field can't be empty.";
				$errorexist = true;
			}
			else 
				$confirmpassword = md5($user->connection->real_escape_string($_POST['confirm-password']));
			
			if ($_POST['country'] == 'error') {
				$errors['country'] = "* Select any country.";
				$errorexist = true;
			}
			else
				$country = $user->connection->real_escape_string($_POST['country']);
			$terms = $user->connection->real_escape_string($_POST['terms']);
			if ($terms != 'terms') {
				$errors['terms'] = "* Accept terms and conditions to continue.";
				$errorexist = true;
			}

			if (!$errorexist) {
				if (!$user->userExists($username)) {
					if (!$user->emailExists($email)) {
						list($errorexist, $errors) = $user->errorCheckRegister($username, $email, $password, $confirmpassword, $country, $terms);
						if (!$errorexist){
							$_SESSION["login"] = true;
							$_SESSION["username"] = $username;
							$_SESSION["password"] = md5($password);
							$user->createUser($username, $email, md5($password), $country);
						}
					}
					else {
						$errors['email'] = 'Email already taken.';
						$errorexist = true;
					}
				}
				else {
					$errors['username'] = 'Username already taken.';
					$errorexist = true;
					if ($user->emailExists($email)) {
						$errors['email'] = 'Email already taken.';
						$errorexist = true;
					}
				}
			}
		}
	}

?>