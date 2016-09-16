<?php
	
	include_once "setup/users.php";

	$user = new Users();
	$errorexist = false;

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (isset($_POST['login'])) {
			$username = $user->connection->real_escape_string($_POST['username']);
			$password = md5($user->connection->real_escape_string($_POST['password']));
			if ($user->userExists($username)) {
				if ($user->doLogin($username, $password)) {
					$_SESSION["login"] = true;
					$_SESSION["username"] = $username;
					$_SESSION["password"] = $password;
					if (isset($_POST['remember'])) {
						$user->createCookie($username, $password);
					}
					if ($user->isAdmin($username)) {
						$_SESSION["isadmin"] = true;
						if (isset($_POST['remember']))
							setcookie("isadmin", true , time()+(60*60*24));
					}
					else {
						$_SESSION["isadmin"] = false;
						if (isset($_POST['remember']))
							setcookie("isadmin", false , time()+(60*60*24));
					}
					header("Location: /searchtrains.php");
				}
				else {
					$errortext = "Password doesn't match. Try again!";
					$errorexist = true;
				}
			}
			else {
				$errortext = 'Username not found. Please enter valid username.';
				$errorexist = true;
			}
		}
	}


?>