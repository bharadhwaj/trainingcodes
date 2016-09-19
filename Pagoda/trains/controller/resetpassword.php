<?php

	include_once 'setup/users.php';

	$user = new Users();
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (isset($_POST['resetpassword'])) {
			
			$username = $user->connection->real_escape_string($_POST['username']);

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
				$confirmpassword = $user->connection->real_escape_string($_POST['confirm-password']);

			if ($password == $confirmpassword) {
				$user->updatePassword($username, md5($password));
			}
		
		}
	}
	
?>