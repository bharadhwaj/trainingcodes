<?php

	include_once 'setup/stations.php';
	
	$station = new Stations();
	$result = $station->readStations();

?>