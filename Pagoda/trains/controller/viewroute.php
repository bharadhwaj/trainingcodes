<?php

	include_once 'setup/routes.php';
	
	$route = new Routes();
	$currentroute = $route->connection->real_escape_string($_GET['routename']);

	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		$trainnumber = $trainname = $routename =  "";
		$getstations = $route->getStations($currentroute);
	}

?>