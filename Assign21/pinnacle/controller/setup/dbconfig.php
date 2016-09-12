<?php

	define('DB_SERVER', 'localhost');
	define('DB_USER', 'localhost');
	define('DB_PASSWORD','');
	define('DB_NAME','RailwayStations');

	class DBConfig {
		function __construct() {
			$connection = mysql_connect(DB_SERVER, DB_USER, DB_PASSWORD) or die('Error: Failed connecting to server.' . mysql_error());
		  	mysql_select_db(DB_NAME, $connection) or die('Error: Failed connecting to database. ' . mysql_error());
		}
	}
	
?>