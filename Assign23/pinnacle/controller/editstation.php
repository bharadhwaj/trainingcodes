<?php

	include_once 'setup/stations.php';
	include_once 'setup/users.php';

	if (!$_SESSION["login"] || !$_COOKIE["login"])
			header("Location: /login.php");
	if (!$_SESSION["isadmin"] || !$_COOKIE["isadmin"])
			header("Location: /error404.php");

	
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