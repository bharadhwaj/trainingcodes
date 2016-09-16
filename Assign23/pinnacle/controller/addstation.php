<?php

	include_once 'setup/stations.php';
	
	$station = new Stations();
	$errors = array();
	$errorexist = false;
	if ( isset($_POST['addstation']) ) {
		$stationcode = $station->connection->real_escape_string($_POST['stationcode']);
	 	$stationname = $station->connection->real_escape_string($_POST['stationname']);
	 	$distance = $station->connection->real_escape_string($_POST['distance']);

	 	if($station->stationExists($stationcode)) {
	 		$errors[] = "* Station already exists! <br>";
		 	$errorexist = true;
	 	}
	 	else {
		 	list($errorexist, $errors) = $station->errorCheckStation($stationcode, $stationname, $distance);
			if (! $errorexist)
	 			$station->createStation($stationcode, $stationname, $distance);
	 	}
	}
	

?>
