<?php

	include_once 'setup/stations.php';
	include_once 'setup/users.php';
	
	if (!$_SESSION["login"] && !$_COOKIE["login"])
			header("Location: /login.php");
	if (!$_SESSION["isadmin"] && !$_COOKIE["isadmin"])
			header("Location: /error404.php");

	$station = new Stations();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    	$stationcode = $station->connection->real_escape_string($_POST['stationcode']);
		if (!empty($stationcode)) 
			if ($stationcode != 'ERS')
				$station->deleteStation($stationcode);
	}
	
?>