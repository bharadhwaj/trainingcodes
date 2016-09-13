<?php

	include_once 'setup/routes.php';
	$route = new Routes();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    	$routename = $route->connection->real_escape_string($_POST['routename']);
		if (!empty($routename)) 
			$route->deleteRoute($routename);
	}
	
?>