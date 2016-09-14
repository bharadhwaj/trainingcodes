CREATE DATABASE RailwayStations;

CREATE TABLE Stations ( 
	StationCode varchar(4) NOT NULL, 
	StationName varchar(32) NOT NULL, 
	Distance int NOT NULL, 
	PRIMARY KEY(StationCode) 
);

INSERT INTO Stations VALUES ('ERS', 'Ernakulam South', 0);

CREATE TABLE Routes ( 
	RouteName varchar(64) NOT NULL,
	SourceStation varchar(4),
	DestinationStation varchar(4),
	PRIMARY KEY(RouteName),
	FOREIGN KEY (SourceStation) REFERENCES Stations(StationCode) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (DestinationStation) REFERENCES Stations(StationCode) ON UPDATE CASCADE ON DELETE CASCADE
);

INSERT INTO Routes(RouteName) VALUES ('N/A');

CREATE TABLE RouteDetails ( 
	RouteID int NOT NULL AUTO_INCREMENT,
	RouteName varchar(64) NOT NULL,
	StationCode varchar(4) NOT NULL, 
	Distance int NOT NULL,
	PRIMARY KEY(RouteID),
	FOREIGN KEY (RouteName) REFERENCES Routes(RouteName) ON UPDATE CASCADE ON DELETE CASCADE ,
	FOREIGN KEY (StationCode) REFERENCES Stations(StationCode) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE Trains ( 
	TrainNumber int NOT NULL, 
	TrainName varchar(64) NOT NULL, 
	RouteName varchar(64),
	PRIMARY KEY(TrainNumber),
	FOREIGN KEY (RouteName) REFERENCES Routes(RouteName) ON UPDATE CASCADE
);