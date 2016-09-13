CREATE DATABASE RailwayStations;

CREATE TABLE Stations ( 
	StationCode varchar(4) NOT NULL, 
	StationName varchar(32) NOT NULL, 
	Distance int NOT NULL, 
	PRIMARY KEY(StationCode) 
);

CREATE TABLE Routes ( 
	RouteName varchar(32) NOT NULL,
	SourceStation varchar(4) NOT NULL,
	DestinationStation varchar(4) NOT NULL,
	PRIMARY KEY(RouteName),
	FOREIGN KEY (SourceStation) REFERENCES Stations(StationCode),
	FOREIGN KEY (DestinationStation) REFERENCES Stations(StationCode)
);

INSERT INTO Routes VALUES
	('ERS-PGT');

CREATE TABLE RouteDetails ( 
	RouteID int NOT NULL AUTO_INCREMENT,
	RouteName varchar(32) NOT NULL,
	StationCode varchar(32) NOT NULL, 
	PRIMARY KEY(RouteID),
	FOREIGN KEY (RouteName) REFERENCES Routes(RouteName) ON DELETE CASCADE,
	FOREIGN KEY (StationCode) REFERENCES Stations(StationCode) ON DELETE CASCADE
);


INSERT INTO RouteDetails (RouteName, StationCode) VALUES
	('ERS-PGT', 'ERS'),
	('ERS-PGT', 'TCR'),
	('ERS-PGT', 'PGT');

CREATE TABLE Trains ( 
	TrainNumber int NOT NULL, 
	TrainName varchar(32) NOT NULL, 
	RouteName varchar(32) NOT NULL,
	PRIMARY KEY(TrainNumber),
	FOREIGN KEY (RouteName) REFERENCES Routes(RouteName) ON DELETE CASCADE
);
