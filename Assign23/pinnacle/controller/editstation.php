<?php

	include_once 'setup/stations.php';
	include_once 'setup/users.php';
	
	$station = new Stations();
	$currentstationcode = $station->connection->real_escape_string($_GET['stationcode']);

	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		$stationcode = $stationname = $distance =  "";
		if ($currentstationcode != 'ERS') {
			$getstation = $station->getStation($currentstationcode);
			$currentstationdetails = $getstation->fetch_array();
		}
		else {
			header("Location: /pinnacle/stations.php");
		}
	}

?>