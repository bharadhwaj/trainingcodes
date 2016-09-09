<?php

	include_once 'dbconfig.php';
	$stationcode = $stationname = $distance =  "";
	if ($_SERVER["REQUEST_METHOD"] == "GET") {
	    $selectquery = "SELECT * FROM Stations WHERE StationCode = '" . $_GET['stationcode'] . "'";
		$result = mysql_query($selectquery);
		$line = mysql_fetch_row($result);
		$stationcode = $line[0];
		$stationname = $line[1];
		$distance = $line[2];
	}

?>