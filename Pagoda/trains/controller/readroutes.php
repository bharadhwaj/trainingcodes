<?php

	include_once 'setup/routes.php';
	
	if (!$_SESSION["login"] && !$_COOKIE["login"])
		header("Location: /login.php");
	
	$route = new Routes();
	$readroutes = $route->readRoutes();
	$routeexist = $readroutes;
    $routeexist->execute();

?>