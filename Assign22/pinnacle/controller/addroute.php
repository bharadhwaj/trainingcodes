<?php

	include_once 'setup/routes.php';

	$route = new Routes();
	$errors = array();
	$stationarray = array();
	$errorexist = false;
	$readstations = $route->readStations();
	$readstationsforsource = $readstations;
	$readstationsfordest = $readstations;
	$allstations  = $readstations;
	
    
	if ( isset($_POST['addroute']) ) {
		$routename = $route->connection->real_escape_string($_POST['routename']);
		$sourcestation = $route->connection->real_escape_string($_POST['sourcestation']);
		$destinationstation = $route->connection->real_escape_string($_POST['destinationstation']);

	 	if($route->routeExists($routename)) {
	 	 	$errors[] = "* Route already exists! <br>";
			$errorexist = true;
	 	}
	 	else {

	 		$allstations->bind_result($currentstationcode, $currentstationname, $currentdistance);
			$allstations->execute();

	 		while($allstations->fetch()) {
	 			if(isset($_POST[$currentstationcode]))
	 			$stationarray[] = $currentstationcode;
	 		}

			$route->createRoute($routename, $sourcestation, $destinationstation);
		echo "<h1> Hello, $routename, $sourcestation, $destinationstation </h1>";
			
			foreach ($stationarray as $key => $stationcode) {
				$route->createRouteDetails($routename, $stationcode);
			}
			header("Location: /pinnacle/routes.php");
	 	}
	}
	

?>
