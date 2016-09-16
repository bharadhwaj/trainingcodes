<?php

	include_once 'setup/trains.php';
	include_once 'setup/users.php';

	if (!$_SESSION["login"] && !$_COOKIE["login"])
			header("Location: /login.php");
	if (!$_SESSION["isadmin"] && !$_COOKIE["isadmin"])
			header("Location: /error404.php");

	
	$train = new Trains();
	$readroutes = $train->readRoutes();
	$currenttrainnumber = $train->connection->real_escape_string($_GET['trainnumber']);

	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		$trainnumber = $trainname = $routename =  "";
		$gettrain = $train->getTrain($currenttrainnumber);
		$currenttraindetails = $gettrain->fetch_array();
	}

?>