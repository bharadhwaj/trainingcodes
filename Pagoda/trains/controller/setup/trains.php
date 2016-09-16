<?php

	include_once "dbconfig.php";
		
	class Trains {
		public $connection;

		public function __construct() {
			$this->connection = new MySQLi(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
		}
	 
		public function createTrain($trainnumber, $trainname, $routename) {
			$addtrain = $this->connection->prepare("INSERT INTO Trains (TrainNumber, TrainName, RouteName) VALUES(?, ?, ?)");
			$addtrain->bind_param("iss", $trainnumber, $trainname, $routename);
			$addtrain->execute();
			$addtrain->close();
			header("Location: /trains.php");
		}
	 	
		public function readTrains() {
			$readtrains = $this->connection->prepare("SELECT * FROM Trains");
			return $readtrains;
		}
		
		public function readRoutes() {
			$readroutes = $this->connection->prepare("SELECT RouteName FROM Routes");
			return $readroutes;
		}

		public function deleteTrain($trainnumber) {
			$deletetrain = $this->connection->prepare("DELETE FROM Trains WHERE TrainNumber = ?");
			$deletetrain->bind_param("i", $trainnumber);
			$deletetrain->execute();
			$deletetrain->close();
			header("Location: /trains.php");
		}
	 
	 	public function updateTrain($originaltrainnumber, $trainnumber, $trainname, $routename) {
	 		$updatetrain = $this->connection->prepare("UPDATE Trains SET TrainNumber = ?, TrainName = ?, RouteName = ? WHERE TrainNumber = ?");
	 		$updatetrain->bind_param("issi", $trainnumber, $trainname, $routename, $originaltrainnumber);
			$updatetrain->execute();
			header("Location: /trains.php");

		}

		public function getTrain($trainnumber) {
			$gettrain = $this->connection->query("SELECT * FROM Trains WHERE TrainNumber = '$trainnumber'");
			return $gettrain;
		}

		public function trainExists($trainnumber) {
			$result = $this->getTrain($trainnumber);
			$line = $result->fetch_array();
	 		if ($line) 
	 			return true;
	 		else
	 			return false;
		}

		public function errorCheckTrain($trainnumber, $trainname, $routename) {
			$errors = array();
			$errorexist = false;
			if (! preg_match("/^[0-9]{5,6}$/", $trainnumber)) {
		    	$errors[] = "* Invalid Train Number Format.<br>";
		    	$errorexist = true;
		 	}
		 	if (! preg_match("/^[A-Za-z][A-Za-z0-9 ]{1,32}$/", $trainname)) {
		    	$errors[] = "* Invalid Train Name Format.<br>";
		    	$errorexist = true;
		 	}
		 	return array($errorexist, $errors);
		}
	}
?>
