<?php

	include_once 'dbconfig.php';

	class Stations {

		public function __construct() {
			$db = new DBConfig();
		}
	 
		public function createStation($stationcode, $stationname, $distance) {
			mysql_query("INSERT INTO Stations (StationCode, StationName, Distance) VALUES('$stationcode', '$stationname', $distance)");
			header("Location: /pinnacle/stations.php");

		}
	 
		public function readStations() {
			return mysql_query("SELECT * FROM Stations WHERE StationCode != 'ERS' ORDER BY Distance");
		}

		public function deleteStation($stationcode) {
			mysql_query("DELETE FROM Stations WHERE StationCode = '$stationcode'");
			header("Location: /pinnacle/stations.php");
		}
	 
	 	public function updateStation($originalstationcode, $stationcode, $stationname, $distance) {
			mysql_query("UPDATE Stations SET StationCode = '$stationcode', StationName = '$stationname', Distance = $distance WHERE StationCode = '$originalstationcode'");
			header("Location: /pinnacle/stations.php");

		}

		public function getStation($stationcode) {
			return mysql_query("SELECT * FROM Stations WHERE StationCode = '$stationcode'");
		}

		public function stationExists($stationcode) {
			$result = $this->getStation($stationcode);
	 		if (mysql_fetch_row($result)) 
	 			return true;
	 		else
	 			return false;
		}

		public function errorCheckStation($stationcode, $stationname, $distance) {
			$errors = array();
			$errorexist = false;
			if (! preg_match("/^[A-Za-z]{3,4}$/", $stationcode)) {
		    	$errors[] = "* Invalid Station Code Format.<br>";
		    	$errorexist = true;
		 	}
		 	if (! preg_match("/^[A-Za-z][A-Za-z0-9 ]{1,32}$/", $stationname)) {
		    	$errors[] = "* Invalid Station Name Format.<br>";
		    	$errorexist = true;
		 	}
		 	if (! preg_match("/^[0-9]+$/", $distance)) {
		 		$errors[] = "* Distance should be number.<br>";
		    	$errorexist = true;
		 	}
		 	if ($distance < 0 || $distance > 4999) {
		    	$errors[] = "* Invalid distance.<br>";
		    	$errorexist = true;
		 	}
		 	return array($errorexist, $errors);
		}
	}
?>
