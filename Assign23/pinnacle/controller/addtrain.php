<?php

	include_once 'setup/trains.php';
	
	if (!$_SESSION["login"] || !$_COOKIE["login"])
			header("Location: /login.php");
	if (!$_SESSION["isadmin"] || !$_COOKIE["isadmin"])
			header("Location: /error404.php");

	$train = new Trains();
	$errors = array();
	$errorexist = false;
	$readroutes = $train->readRoutes();
	
	if ( isset($_POST['addtrain']) ) {
		$trainnumber = $train->connection->real_escape_string($_POST['trainnumber']);
	 	$trainname = $train->connection->real_escape_string($_POST['trainname']);
	 	$routename = $train->connection->real_escape_string($_POST['routename']);
	 	if($train->trainExists($trainnumber)) {
	 	 	$errors[] = "* Train already exists! <br>";
			$errorexist = true;
	 	}
	 	else {
		 	list($errorexist, $errors) = $train->errorCheckTrain($trainnumber, $trainname, $routename);
			if (! $errorexist)
	 			$train->createTrain($trainnumber, $trainname, $routename);
	 	}
	}
	

?>
