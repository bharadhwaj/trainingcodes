<?php

	include_once 'setup/stations.php';

	$errors = array();
	$errorexist = false;
	$currentstationcode = $station->connection->real_escape_string($_GET['stationcode']);
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (isset($_POST['updatestation'])) {

			$newstationcode = $station->connection->real_escape_string($_POST['stationcode']);
			$newstationname = $station->connection->real_escape_string($_POST['stationname']);
			$newdistance = $station->connection->real_escape_string($_POST['distance']);

			$currentstation = $station->getStation($currentstationcode);
			$currentstationdetails = $currentstation->fetch_array();

			$newstation = $station->getStation($newstationcode);
			$newstationdetails = $newstation->fetch_array();


			if ($newstationdetails && $newstationdetails['StationCode'] != $currentstationcode) {
				$errors[] = "* Station already exists!  <br>";
				$errorexist = true;
			}

			else if (($newstationdetails && $newstationdetails == $currentstationdetails) || !$newstationdetails ) {
				list($errorexist, $errors) = $station->errorCheckStation($newstationcode, $newstationname, $newdistance);
				if (! $errorexist) {
					$station->updateStation($currentstationcode, $newstationcode, $newstationname, $newdistance);
				}
			}
		}
	}

?>