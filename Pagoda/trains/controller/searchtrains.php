<?php

	include_once 'setup/routes.php';
	include_once 'setup/trains.php';
	include_once 'setup/stations.php';
	
	
	$route = new Routes();
	$train = new Trains();
	$station = new Stations();

	$routearray = array();
	$trainarray = array();
	$didpost = false;
	$searchstation;

	$readstations = $route->readStations();

		if (isset($_POST['showtrains'])) {
			$didpost = true;
			$stationdetails = $route->connection->real_escape_string($_POST['stationdetails']);
			preg_match('~\((.*?)\)~', $stationdetails, $output);
			$stationcode = $output[1];
			$searchstation = $stationcode;
			$getroute = $route->getRoutes($stationcode);
			while ($newroutedetails = $getroute->fetch_array()) {
				$routearray[] = $newroutedetails[1];
			}

			foreach ($routearray as $routename) {
				$gettrain = $route->getTrains($routename);
				while ($newtraindetails = $gettrain->fetch_array()) {
					$trainarray[] = $newtraindetails;
				}
			}

		}

?>

