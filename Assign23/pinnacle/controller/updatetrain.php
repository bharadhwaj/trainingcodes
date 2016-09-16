<?php

	include_once 'setup/trains.php';
	
	$errors = array();
	$errorexist = false;
	$currenttrainnumber = $train->connection->real_escape_string($_GET['trainnumber']);
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (isset($_POST['updatetrain'])) {

			$newtrainnumber = $train->connection->real_escape_string($_POST['trainnumber']);
			$newtrainname = $train->connection->real_escape_string($_POST['trainname']);
			$newroutename = $train->connection->real_escape_string($_POST['routename']);

			$currenttrain = $train->getTrain($currenttrainnumber);
			$currenttraindetails = $currenttrain->fetch_array();

			$newtrain = $train->getTrain($newtrainnumber);
			$newtraindetails = $newtrain->fetch_array();


			if ($newtraindetails && $newtraindetails['TrainNumber'] != $currenttrainnumber) {
				$errors[] = "* Train already exists!  <br>";
				$errorexist = true;
			}

			else if (($newtraindetails && $newtraindetails == $currenttraindetails) || !$newtraindetails ) {
				list($errorexist, $errors) = $train->errorCheckTrain($newtrainnumber, $newtrainname, $newroutename);
				if (! $errorexist) {
					$train->updateTrain($currenttrainnumber, $newtrainnumber, $newtrainname, $newroutename);
				}
			}
		}
	}

?>