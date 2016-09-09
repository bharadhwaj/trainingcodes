<?php

	include_once 'dbconfig.php';
	if ( isset($_POST['updatestation']) ) {
		

		$originalstationcode = $_POST['originalstationcode'];
		$stationcode = $_POST['stationcode'];
	 	$stationname = $_POST['stationname'];
	 	$distance = (int) $_POST['distance'];
	 	$updatequery = " UPDATE Stations SET StationCode = '$stationcode', StationName = '$stationname', Distance = $distance WHERE StationCode = '$originalstationcode'";
	 	mysql_query($updatequery);
		header("Location: /pinnacle/stations.php");

	}

?>