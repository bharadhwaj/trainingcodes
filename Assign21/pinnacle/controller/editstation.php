<?php

	include_once 'setup/stations.php';
	$station = new Stations();

	$stationcode = $stationname = $distance =  "";
	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		if ($_GET['stationcode'] != 'ERS') {
			$result = $station->getStation($_GET['stationcode']);
			$line = mysql_fetch_row($result);
			$stationcode = $line[0];
			$stationname = $line[1];
			$distance = $line[2];
		}
		else {
			header("Location: /pinnacle/stations.php");
		}
	}


?>