<?php

	include_once 'setup/trains.php';
	
	
	$train = new Trains();
	$readtrains = $train->readTrains();
	$trainexist = $readtrains;
    $trainexist->execute();

?>
