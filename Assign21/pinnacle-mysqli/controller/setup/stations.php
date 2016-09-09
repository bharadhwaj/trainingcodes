<?php
	
	define('DB_SERVER', 'localhost');
	define('DB_USER', 'localhost');
	define('DB_PASSWORD', '');
	define('DB_NAME','RailwayStations');
	
	class Stations {
		public $connection;

		public function __construct() {
			$this->connection = new MySQLi(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
			if ($connection->connect_error) {
			    die('Error: ('. $connection->connect_errno .') '. $connection->connect_error);
			}
		}
	 
		public function createStation($stationcode, $stationname, $distance) {
			$addstation = $this->connection->prepare("INSERT INTO Stations (StationCode, StationName, Distance) VALUES(?, ?, ?)");
			$addstation->bind_param("ssi", $stationcode, $stationname, $distance);
			$addstation->execute();
			$addstation->close();
			header("Location: /pinnacle/stations.php");

		}
	 	
		public function readStations() {
			$stationcode = 'ERS';
			$readstations = $this->connection->prepare("SELECT * FROM Stations WHERE StationCode != ? ORDER BY Distance");
			$readstations->bind_param('s', $stationcode);
			return $readstations;
		}

		public function deleteStation($stationcode) {
			$deletestation = $this->connection->prepare("DELETE FROM Stations WHERE StationCode = ?");
			$deletestation->bind_param("s", $stationcode);
			$deletestation->execute();
			$deletestation->close();
			header("Location: /pinnacle/stations.php");
		}
	 
	 	public function updateStation($originalstationcode, $stationcode, $stationname, $distance) {
	 		$updatestation = $this->connection->prepare("UPDATE Stations SET StationCode = ?, StationName = ?, Distance = ? WHERE StationCode = ?");
	 		$updatestation->bind_param("ssis", $stationcode, $stationname, $distance, $originalstationcode);
			$updatestation->execute();
			header("Location: /pinnacle/stations.php");

		}

		public function getStation($stationcode) {
			$getstation = $this->connection->query("SELECT * FROM Stations WHERE StationCode = '$stationcode'");
			return $getstation;
		}

		public function stationExists($stationcode) {
			$result = $this->getStation($stationcode);
			$line = $result->fetch_array();
	 		if ($line) 
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
