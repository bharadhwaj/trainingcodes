<?php

	include_once "dbconfig.php";
		
	class Stations {
		public $connection;

		public function __construct() {
			$this->connection = new MySQLi(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);

		}
	 
		public function createStation($stationcode, $stationname, $distance) {
			$addstation = $this->connection->prepare("INSERT INTO Stations (StationCode, StationName, Distance) VALUES(?, ?, ?)");
			$addstation->bind_param("ssi", $stationcode, $stationname, $distance);
			$addstation->execute();
			$addstation->close();
			header("Location: /stations.php");

		}
	 	
		public function readStations() {
			$readstations = $this->connection->prepare("SELECT * FROM Stations ORDER BY Distance");
			return $readstations;
		}

		public function getRoutes($stationcode) {
			$routearray = array();
			$readroute = $this->connection->prepare("SELECT RouteName FROM Routes WHERE SourceStation = ? OR DestinationStation = ?");
			$readroute->bind_param('ss', $stationcode, $stationcode);
			$readroute->bind_result($routename);
            $readroute->execute();
            while($readroute->fetch())
            	$routearray[] = $routename;
			$readroute->close();
            return $routearray;
		}

		public function updateTrain($route) {
			$updatetrain = $this->connection->prepare("UPDATE Trains SET RouteName = 'N/A' WHERE RouteName = ?");
	 		$updatetrain->bind_param("s", $route);
			$updatetrain->execute();
			$updatetrain->close();
		}

		public function deleteStation($stationcode) {

			$routearray = $this->getRoutes($stationcode);

            foreach ($routearray as $index => $route)
            	$this->updateTrain($route);

			$deletestation = $this->connection->prepare("DELETE FROM Stations WHERE StationCode = ?");
			$deletestation->bind_param("s", $stationcode);
			$deletestation->execute();
			$deletestation->close();
			header("Location: /stations.php");
		}
	 
	 	public function updateStation($originalstationcode, $stationcode, $stationname, $distance) {
	 		$updatestation = $this->connection->prepare("UPDATE Stations SET StationCode = ?, StationName = ?, Distance = ? WHERE StationCode = ?");
	 		$updatestation->bind_param("ssis", $stationcode, $stationname, $distance, $originalstationcode);
			$updatestation->execute();
			header("Location: /stations.php");

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
