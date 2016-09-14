<?php
	
	include_once "dbconfig.php";

	class Routes {
		public $connection;

		public function __construct() {
			$this->connection = new MySQLi(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
		}
	 
		public function createRoute($routename, $sourcestation, $destinationstation) {
			$addroute = $this->connection->prepare("INSERT INTO Routes (RouteName, SourceStation, DestinationStation) VALUES(?, ?, ?)");
			$addroute->bind_param("sss", $routename, $sourcestation, $destinationstation);
			$addroute->execute();
			$addroute->close();
		}

		public function createRouteDetails($routename, $stationcode, $distance) {
			$addstationroute = $this->connection->prepare("INSERT INTO RouteDetails (RouteName, StationCode, Distance) VALUES(?, ?, ?)");
			$addstationroute->bind_param("sss", $routename, $stationcode, $distance);
			$addstationroute->execute();
			$addstationroute->close();
		}

		public function readRoutes() {
			$readroutes = $this->connection->prepare("SELECT * FROM Routes WHERE RouteName != 'N/A'");
			return $readroutes;
		}

		public function readStations() {
			$readstations = $this->connection->prepare("SELECT * FROM Stations ORDER BY Distance");
			return $readstations;
		}

		public function deleteRoute($routename) {
			$deleteroute = $this->connection->prepare("DELETE FROM Routes WHERE RouteName = ?");
			$deleteroute->bind_param("s", $routename);
			$deleteroute->execute();
			$deleteroute->close();
			header("Location: /routes.php");
		}

		public function getRoutes($stationcode) {
			$getroute = $this->connection->query("SELECT * FROM RouteDetails WHERE StationCode = '$stationcode' ORDER BY Distance");
			return $getroute;
		}

		public function getTrains($routename) {
			$gettrains = $this->connection->query("SELECT * FROM Trains WHERE RouteName = '$routename'");
			return $gettrains;
		}

		public function getStations($routename) {
			$getstations = $this->connection->query("SELECT * FROM RouteDetails WHERE RouteName = '$routename' ORDER BY Distance");
			return $getstations;
		}

		public function getStationDetails($routename) {
			$getstations = $this->connection->query("SELECT * FROM RouteDetails WHERE RouteName = '$routename' ORDER BY Distance");
			return $getstations;
		}

		public function routeExists($routename) {
			$getroute = $this->connection->query("SELECT * FROM Routes WHERE RouteName = '$routename'");
			$line = $getroute->fetch_array();
	 		if ($line) 
	 			return true;
	 		else
	 			return false;
		}
	}
?>
