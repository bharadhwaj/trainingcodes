<?php 

	include_once "controller/setup/users.php";
	session_start();

	$user = new Users();
	if (isset($_SESSION['username']))
		$user->doLogout($_SESSION['username']);
	else if (isset($_COOKIE['username']))
		$user->doLogout($_COOKIE['username']);

	header("Location: /");

?>
