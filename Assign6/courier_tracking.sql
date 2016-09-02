CREATE DATABASE Courier;

USE Courier;

CREATE TABLE Couriers 
(
	CourierID int NOT NULL AUTO_INCREMENT, 
	ParcelNumber int NOT NULL, 
	ParcelDate datetime NOT NULL,
	CurrentLocation varchar(31) NOT NULL,
	Status varchar(31) NOT NULL, 
	Comments varchar(127), 
	PRIMARY KEY(CourierID)
);

INSERT INTO Couriers 
	(ParcelNumber, ParcelDate, CurrentLocation, Status)
VALUES 
	(123456789, '2016-08-16 10:00:23', 'New Delhi', 'Packaged'),
	(123456789, '2016-08-16 13:14:56', 'New Delhi', 'Shipped'),
	(456789123, '2016-08-17 08:00:56', 'Chennai', 'Packaged'),
	(456789123, '2016-08-17 12:00:00', 'Chennai', 'Shipped'),
	(456789123, '2016-08-17 12:00:00','Chennai', 'On Transit'),
	(456789123, '2016-08-18 07:45:00', 'Velankanni', 'Delivered'),
	(123456789, '2016-08-18 12:00:00', 'Chennai', 'On Transit'),
	(123456789, '2016-08-19 12:00:00', 'Kochi', 'On Transit'),
	(123456789, '2016-08-20 09:16:12', 'Infopark Kochi', 'Delivered');

UPDATE Couriers
SET 
	Comments = "Destination was nearby and hence delivered in less than 24 hours."
WHERE 
	ParcelNumber = 456789123 AND 
	ParcelDate =  '2016-08-18 07:45:00' AND
	CurrentLocation = 'Velankanni' AND
	Status = 'Delivered';

UPDATE Couriers
SET 
	Comments = "Unexpected delay due to downtime in Indian railway trains."
WHERE 
	ParcelNumber = 456789123 AND 
	ParcelDate =  '2016-08-17 12:00:00' AND
	CurrentLocation = 'Chennai' AND
	Status = 'On Transit';

SELECT COUNT(*) AS 'Number of parcels with status SHIPPED in August 2016' 
FROM Couriers
WHERE ParcelDate BETWEEN '2016-08-01 00:00:00' AND '2016-08-31 23:59:59' 
GROUP BY Status 
HAVING Status = 'Shipped';

SELECT DISTINCT ParcelNumber AS 'Parcel with status On transit between August 18 Noon and August 19 Noon' 
FROM Couriers 
WHERE ParcelDate BETWEEN '2016-08-18 11:59:59' AND '2016-08-19 12:00:00' AND 
Status = 'On Transit';

 SELECT D.ParcelNumber AS 'Parcel Number', DATEDIFF(D.ParcelDate, P.ParcelDate) AS 'Days Required for Delivery' 
 FROM Couriers D INNER JOIN Couriers P ON D.ParcelNumber = P.ParcelNumber AND
 D.Status = 'Delivered' AND 
 P.Status = 'Packaged';
