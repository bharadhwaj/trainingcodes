<?php

	include_once 'setup/stations.php';
	
	$station = new Stations();
	$readstations = $station->readStations();
	$stationexist = $readstations;
    $stationexist->execute();

?>

