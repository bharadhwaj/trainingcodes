<?php

	include_once 'setup/routes.php';

	if (!$_SESSION["login"] && !$_COOKIE["login"])
			header("Location: /login.php");
	if (!$_SESSION["isadmin"] && !$_COOKIE["isadmin"])
			header("Location: /error404.php");

	
	$route = new Routes();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    	$routename = $route->connection->real_escape_string($_POST['routename']);
		if (!empty($routename)) 
			$route->deleteRoute($routename);
	}
	
?>