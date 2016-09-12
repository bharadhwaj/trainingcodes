<?php

	include_once 'setup/stations.php';
	$station = new Stations();
	$errors = array();
	$errorexist = false;

	if ( isset($_POST['updatestation']) ) {
		$originalstationcode = $_POST['originalstationcode'];
		if ($originalstationcode != 'ERS') {
		 	$stationcode = $_POST['stationcode'];
	 		$stationname = $_POST['stationname'];
	 		$distance = (int) $_POST['distance'];
	 		$currentstation = mysql_fetch_row($station->getStation($stationcode));
	 		if($currentstation[0] != $originalstationcode) {
		 		$errors[] = "* Station already exists! <br>";
			 	$errorexist = true;
		 	}
		 	else {
		 		list($errorexist, $errors) = $station->errorCheckStation($stationcode, $stationname, $distance);
		 		if (! $errorexist) {
					$station->updateStation($originalstationcode, $stationcode, $stationname, $distance);
				}
			}

		}
		else
			header("Location: /pinnacle/stations.php");
	}

?>