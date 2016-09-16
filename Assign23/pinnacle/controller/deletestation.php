<?php

	include_once 'setup/stations.php';
	include_once 'setup/users.php';
	
	$station = new Stations();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    	$stationcode = $station->connection->real_escape_string($_POST['stationcode']);
		if (!empty($stationcode)) 
			if ($stationcode != 'ERS')
				$station->deleteStation($stationcode);
	}
	
?>