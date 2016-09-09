<?php

	include_once 'setup/stations.php';
	$station = new Stations();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    	$stationcode = $station->connection->real_escape_string($_POST['stationcode']);
    	echo "<h1> Hello, $stationcode </h1>";
		if (!empty($stationcode)) 
			if ($stationcode != 'ERS')
				$station->deleteStation($stationcode);
	}
	
?>

