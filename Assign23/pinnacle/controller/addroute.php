<?php

	include_once 'setup/routes.php';
	include_once 'setup/stations.php';


	$route = new Routes();
	$station = new Stations();
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
	 			$stationarray[] = array($currentstationcode, $currentdistance);
	 		}

 			list($errorexist, $errors) = $route->errorCheckRoutes($routename, $sourcestation, $destinationstation, $stationarray);
 			if (! $errorexist) {
				$route->createRoute($routename, $sourcestation, $destinationstation);

				$getstation = $station->getStation($sourcestation);
				$currentstationdistance = $getstation->fetch_array()[2];

				
				foreach ($stationarray as $key => $stations) {
					$route->createRouteDetails($routename, $stations[0], abs($stations[1]-$currentstationdistance));
				}
				header("Location: /routes.php");
			}
	 	}
	}
	

?>
