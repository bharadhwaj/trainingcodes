<?php

	if( !defined('DB_EXECUTED') ) {

		define('DB_SERVER', '192.168.0.3');
		define('DB_USER', 'margurite');
		define('DB_PASSWORD', 'RL1CK2hD');
		define('DB_NAME', 'gopagoda');

		$connection = new MySQLi(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);

	    $stationtable = "CREATE TABLE Stations ( 
		StationCode varchar(4) NOT NULL, 
		StationName varchar(32) NOT NULL, 
		Distance int NOT NULL, 
		PRIMARY KEY(StationCode))";

	    $connection->query($stationtable);

	    $stationinsert = "INSERT INTO Stations VALUES ('ERS', 'Ernakulam South', 0)";

	    $connection->query($stationinsert);

	    $routetable = "CREATE TABLE Routes ( 
		RouteName varchar(64) NOT NULL,
		SourceStation varchar(4),
		DestinationStation varchar(4),
		PRIMARY KEY(RouteName),
		FOREIGN KEY (SourceStation) REFERENCES Stations(StationCode) ON UPDATE CASCADE ON DELETE CASCADE,
		FOREIGN KEY (DestinationStation) REFERENCES Stations(StationCode) ON UPDATE CASCADE ON DELETE CASCADE)";

	    $connection->query($routetable);

	    $routeinsert = "INSERT INTO Routes(RouteName) VALUES ('N/A')";

	    $connection->query($routeinsert);

	    $routedetailtable = "CREATE TABLE RouteDetails ( 
		RouteID int NOT NULL AUTO_INCREMENT,
		RouteName varchar(64) NOT NULL,
		StationCode varchar(4) NOT NULL, 
		Distance int NOT NULL,
		PRIMARY KEY(RouteID),
		FOREIGN KEY (RouteName) REFERENCES Routes(RouteName) ON UPDATE CASCADE ON DELETE CASCADE ,
		FOREIGN KEY (StationCode) REFERENCES Stations(StationCode) ON UPDATE CASCADE ON DELETE CASCADE
		)";

		$connection->query($routedetailtable);

		$trainstable = "CREATE TABLE Trains ( 
		TrainNumber int NOT NULL, 
		TrainName varchar(64) NOT NULL, 
		RouteName varchar(64),
		PRIMARY KEY(TrainNumber),
		FOREIGN KEY (RouteName) REFERENCES Routes(RouteName) ON UPDATE CASCADE
		)";

		$connection->query($trainstable);

	    $connection->close();
		
	    define('DB_EXECUTED', TRUE);
	}

?>