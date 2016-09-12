<?php

	include_once 'setup/stations.php';
	$station = new Stations();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    	$stationcode = $_POST['stationcode'];
		if (!empty($stationcode)) 
			if ($stationcode != 'ERS')
				$station->deleteStation($_POST['stationcode']);
	}
	
?>

