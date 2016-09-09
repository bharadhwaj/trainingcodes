<?php

	include_once 'setup/stations.php';
	$stations = new Stations();
	$errors = array();
	$errorexist = false;
	$originalstationcode = $station->connection->real_escape_string($_GET['stationcode']);
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if ( isset($_POST['updatestation']) ) {
			if ($originalstationcode != 'ERS') {
				$stationcode = $station->connection->real_escape_string($_POST['stationcode']);
				$stationname = $station->connection->real_escape_string($_POST['stationname']);
				$distance = $station->connection->real_escape_string($_POST['distance']);

				$getstation = $station->getStation($originalstationcode);
				$line = $getstation->fetch_array();

				$currentstation = $stations->getStation($stationcode);
				$row = $currentstation->fetch_array();


				if($row && $row[0] != $originalstationcode) {
					$errors[] = "* Station already exists!  <br>";
					$errorexist = true;
				}
					
				else if (($row && $row == $line) || !$row) {
					list($errorexist, $errors) = $station->errorCheckStation($stationcode, $stationname, $distance);
					if (! $errorexist) {
						$station->updateStation($originalstationcode, $stationcode, $stationname, $distance);
					}
				}

				else {
					header("Location: /pinnacle/stations.php");
				}

			}
			else
				header("Location: /pinnacle/stations.php");
		}
	}

?>