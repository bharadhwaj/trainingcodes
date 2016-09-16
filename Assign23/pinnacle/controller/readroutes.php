<?php

	include_once 'setup/routes.php';
	
	$route = new Routes();
	$readroutes = $route->readRoutes();
	$routeexist = $readroutes;
    $routeexist->execute();

?>