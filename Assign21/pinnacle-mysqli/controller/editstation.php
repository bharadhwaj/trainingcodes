<?php

	include_once 'setup/stations.php';
	$station = new Stations();
	
	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		$stationcode = $stationname = $distance =  "";
		$checkstationcode = $station->connection->real_escape_string($_GET['stationcode']);
		if ($checkstationcode != 'ERS') {
			$getstation = $station->getStation($checkstationcode);
			$line = $getstation->fetch_array();
		}
		else {
			header("Location: /pinnacle/stations.php");
		}
	}

?>