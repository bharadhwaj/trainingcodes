<?php

	include_once 'dbconfig.php';
	if ( isset($_POST['addstation']) ) {
	 
		$stationcode = $_POST['stationcode'];
	 	$stationname = $_POST['stationname'];
	 	$distance = (int) $_POST['distance'];
	 
	 	$insertquery = " INSERT INTO Stations (StationCode, StationName, Distance) VALUES('$stationcode', '$stationname', $distance)";
	 	mysql_query($insertquery);
	}
	        
?>
