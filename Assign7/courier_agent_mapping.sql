CREATE DATABASE Parcel;

USE Parcel;

CREATE TABLE Locations
(
	LocationID int NOT NULL AUTO_INCREMENT,
	Name varchar(255) NOT NULL,
	PRIMARY KEY (LocationID)
);

CREATE TABLE Agents
(
	AgentID int NOT NULL AUTO_INCREMENT,
	Name varchar(255) NOT NULL,
	LocationID int NOT NULL,
	PRIMARY KEY (AgentID),
	FOREIGN KEY (LocationID) REFERENCES Locations(LocationID)
);

CREATE TABLE Parcels
(
	ID int NOT NULL AUTO_INCREMENT,
	ParcelID int NOT NULL,
	AgentID int NOT NULL,
	FromTime datetime NOT NULL,
	ToTime datetime NOT NULL CHECK (ToTime > FromTime),
	PRIMARY KEY (ID),
	FOREIGN KEY (AgentID) REFERENCES Agents(AgentID),
	UNIQUE KEY `Unique_ParcelID_AgentID_Constraint` (`ParcelID`, `AgentID`)
);

INSERT INTO Locations
	(Name) VALUES 
	('Trivandrum'),
	('Kochi'),
	('Palakkad'),
	('Calicut');

INSERT INTO Agents
	(Name, LocationID) VALUES 
	('John', 1),
	('Smith', 1),
	('David', 1),
	('Barney', 2),
	('Ted', 2),
	('Ross', 2),
	('Joey', 3),
	('Chandler', 3),
	('Max',4),
	('Marshal',4);

INSERT INTO Parcels
	(ParcelID, AgentID, FromTime, ToTime) VALUES 
	(1, 1, '2016-08-01 07:00:45', '2016-08-01 11:30:30'),
	(1, 4, '2016-08-02 09:15:15', '2016-08-02 15:20:50'),
	(1, 7, '2016-08-04 08:35:00', '2016-08-04 13:15:50'),
	(1, 9, '2016-08-05 07:30:15', '2016-08-05 17:00:00'),
	(2, 2, '2016-08-01 07:10:45', '2016-08-01 11:40:30'),
	(2, 6, '2016-08-02 09:45:15', '2016-08-02 16:20:50'),
	(2, 8, '2016-08-04 08:50:00', '2016-08-04 13:30:50'),
	(2, 10, '2016-08-05 07:45:15', '2016-08-05 17:10:00'),
	(3, 1, '2016-08-01 07:20:45', '2016-08-01 11:50:30'),
	(3, 6, '2016-08-02 09:55:15', '2016-08-02 16:30:50'),
	(3, 7, '2016-08-04 09:00:00', '2016-08-04 13:40:50'),
	(3, 10, '2016-08-05 07:55:15', '2016-08-05 17:30:00');

SELECT P.ParcelID FROM Parcels P 
	INNER JOIN Agents A ON P.AgentID = A.AgentID 
	WHERE A.Name = 'John';

SELECT A.Name, L.Name FROM Agents A 
	INNER JOIN Locations L ON A.LocationID = L.LocationID  
	INNER JOIN Parcels P ON A.AgentId = P.AgentID 
	WHERE P.ParcelID = 1;

SELECT A.Name FROM Agents A 
	INNER JOIN Parcels P ON A.AgentID = P.AgentID
	WHERE ParcelID = 1 AND 
	FromTime BETWEEN '2016-08-01' AND '2016-08-10';
