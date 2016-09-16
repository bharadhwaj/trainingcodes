<?php

	include_once 'setup/trains.php';
	include_once 'setup/users.php';
	
	if (!$_SESSION["login"] && !$_COOKIE["login"])
			header("Location: /login.php");
	if (!$_SESSION["isadmin"] && !$_COOKIE["isadmin"])
			header("Location: /error404.php");


	$train = new Trains();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    	$trainnumber = $train->connection->real_escape_string($_POST['trainnumber']);
		if (!empty($trainnumber)) 
			$train->deleteTrain($trainnumber);
	}
	
?>