<?php

	include_once 'setup/trains.php';
	
	if (!$_SESSION["login"] || !$_COOKIE["login"])
		header("Location: /login.php");
	
	$train = new Trains();
	$readtrains = $train->readTrains();
	$trainexist = $readtrains;
    $trainexist->execute();

?>
