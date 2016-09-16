<?php

	include_once 'setup/stations.php';

	if (!$_SESSION["login"] || !$_COOKIE["login"])
		header("Location: /login.php");
	
	$station = new Stations();
	$readstations = $station->readStations();
	$stationexist = $readstations;
    $stationexist->execute();

?>

