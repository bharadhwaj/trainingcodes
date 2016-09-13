<?php

	include_once 'setup/trains.php';
	$train = new Trains();
	$readroutes = $train->readRoutes();
	$currenttrainnumber = $train->connection->real_escape_string($_GET['trainnumber']);

	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		$trainnumber = $trainname = $routename =  "";
		$gettrain = $train->getTrain($currenttrainnumber);
		$currenttraindetails = $gettrain->fetch_array();
	}

?>