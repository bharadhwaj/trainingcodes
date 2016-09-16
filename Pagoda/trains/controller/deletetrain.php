<?php

	include_once 'setup/trains.php';
	$train = new Trains();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    	$trainnumber = $train->connection->real_escape_string($_POST['trainnumber']);
		if (!empty($trainnumber)) 
			$train->deleteTrain($trainnumber);
	}
	
?>