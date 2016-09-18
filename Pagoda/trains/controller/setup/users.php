<?php
	
	include_once "dbconfig.php";

	class Users {
		public $connection;

		public function __construct() {
			$this->connection = new MySQLi(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
		}

		public function createUser($username, $email, $password, $country) {
			$adduser = $this->connection->prepare("INSERT INTO Users (Username, Email, Password, Country) VALUES(?, ?, ?, ?)");
			$adduser->bind_param("ssss", $username, $email, $password, $country);
			$adduser->execute();
			$adduser->close();
			header("Location:/");

		}

		public function readUsers() {
			$readusers = $this->connection->prepare("SELECT Username, Email, Country, IsAdmin FROM Users");
			return $readusers;
		}

		public function changeRole($username, $number) {
			$togglerole = $this->connection->prepare("UPDATE Users SET IsAdmin = ? WHERE Username = ?");
	 		$togglerole->bind_param("is", $number, $username);
			$togglerole->execute();
			header("Location: /panel.php");
		}

		public function isAdmin($username) {
			$isadmin = $this->connection->prepare("SELECT IsAdmin FROM Users WHERE Username = '$username'");
			$isadmin->bind_result($admin);
			$isadmin->execute();
			$isadmin->fetch();
			$isadmin->close();
			if ($admin == 1) 
				return true;
			else
				return false;
		}

		public function doLogin($username, $password) {
			$getuser = $this->connection->prepare("SELECT Password FROM Users WHERE Username = '$username'");
			$getuser->bind_result($hashpassword);
			$getuser->execute();
			$getuser->fetch();
			$getuser->close();
			if ($password == $hashpassword) {
				return true;
			}
			else 
				return false;
		}
		
		public function createCookie($username, $password) {
			setcookie("username", $username, time()+(60*60*24));
			setcookie("login", true, time()+(60*60*24));
			setcookie("password", $password, time()+(60*60*24));
		}

		public function doLogout($username) {

			setcookie("username", "", time()-3600);
			setcookie("login", false , time()-3600);
			setcookie("isadmin", false , time()-3600);
			setcookie("password", "", time()-3600);
			session_unset(); 
			session_destroy();
		}

		public function userExists($username) {
			$userexists = $this->connection->query("SELECT * FROM Users WHERE Username = '$username'");
			$line = $userexists->fetch_array();
			if ($line) 
				return true;
			else
				return false;
		}

		public function emailExists($email) {
			$emailexists = $this->connection->query("SELECT * FROM Users WHERE Email = '$email'");
			$line = $emailexists->fetch_array();
			if ($line) 
				return true;
			else
				return false;
		}

		public function errorCheckRegister($username, $email, $password, $confirmpassword) {
			
			$errors = array();
			$errorexist = false;

			if (! preg_match("/^[a-zA-Z0-9]{6,12}$/", $username)) {
				$errors['username'] = "* Invalid Username format.";
				$errorexist = true;
			}

			if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$errors['email'] = "* Invalid Email format.";
				$errorexist = true;
			}

			if (! preg_match("/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*\W)(?!.*[ ]).{6,}$/", $password)) {
				$errors['password'] = "* Invalid password format.";
				$errorexist = true;
			}

			if (md5($password) != $confirmpassword) {
				$errors['confirmpassword'] = "* Passwords do not match";
				$errorexist = true;
			}

		 	return array($errorexist, $errors);
		}
	}
?>
