<?php
	
	interface ITrainList {

		public function addTrain(Train $train);
		public function getTrain($trainNumber);
	}

	interface ITrain {

		const TYPE_PASSENGER = 'Passenger';
		const TYPE_EXPRESS = 'Express';
	    const TYPE_SUPERFAST = 'Superfast';

	    public function getType();
	    public function setType($type);
	}

	interface IStation {

		const DISTANCE_FROM_START_ST0 = 0;
		const DISTANCE_FROM_START_ST1 = 1;
		const DISTANCE_FROM_START_ST2 = 2;
		const DISTANCE_FROM_START_ST3 = 3;
		const DISTANCE_FROM_START_ST4 = 4;
		const DISTANCE_FROM_START_ST5 = 5;

		const CODE_ST0 = 'ST0';
		const CODE_ST1 = 'ST1';
		const CODE_ST2 = 'ST2';
		const CODE_ST3 = 'ST3';
		const CODE_ST4 = 'ST4';
		const CODE_ST5 = 'ST5';

		const NAME_ST0 = 'START STATION';
		const NAME_ST1 = 'STATION 1';
		const NAME_ST2 = 'STATION 2';
		const NAME_ST3 = 'STATION 3';
		const NAME_ST4 = 'STATION 4';
		const NAME_ST5 = 'STATION 5';

		public function getDistanceFromStart();

	}

	interface Ticket {

		public function calculateFare();
		public function printDetails();
	}

	class TrainList implements ITrainList{
		
		private $trainlist = array();
		private $trainobject;

		public function addTrain(Train $train) {
			array_push($this->trainlist, $train);
		}

		public function getTrain($trainNumber) {
		    foreach ($this->trainlist as $train) {
		    	$trainobject = $train->getTrain();
        		if ($trainobject->trainnumber == $trainNumber)
            		return $trainobject;
		    }
		}

		public function printAllTrains() {
			foreach ($this->trainlist as $train) {
				$trainobject = $train->getTrain();
				echo "\n TRAIN NUMBER: " . $trainobject->trainnumber;
				echo "\t TRAIN NAME: " . $trainobject->trainname;
				echo "\t TYPE: " . $trainobject->type;
			}
		}
	}

	class StationList {
		
		private $stationlist = array();
		private $stationobject;

		public function addStation(Station $station) {
			array_push($this->stationlist, $station);
		}

		public function printAllStations() {
			foreach ($this->stationlist as $station) {
				$this->stationobject = $station->getStation();
				echo "\n STATION CODE: " . $this->stationobject->stationcode;
				echo "\t STATION NAME: " . $this->stationobject->stationname;
			}
		}
	}

	class PassengerList {
		
		private $passengerslist = array();
		private $passengerobject;

		public function addPassenger(Passenger $person) {
			array_push($this->passengerslist, $person);
		}

		public function printAllPassengers() {
			foreach ($this->passengerslist as $passenger) {
				$this->passengerobject = $passenger->getPassenger();
				echo "\n PASSENGER NAME: " . $this->passengerobject->name;
				echo "\t AGE: " . $this->passengerobject->age;	
				echo "\t GENDER: " . $this->passengerobject->gender;
			}
		}

		public function getPassengerList() {
			return $this->passengerslist;
		}

		public function flushList() {
			$this->passengerslist = array();
		}
	}

	class TicketList {
		
		private $ticketslist = array();

		public function addTicket(TrainTicket $ticket) {
			array_push($this->ticketslist, $ticket);
		}

		public function printAllTickets() {
			foreach ($this->ticketslist as $ticket) {
				$ticket->printDetails();
				echo "\n";
			}
		}
	}

	class Train implements ITrain {

		private $trainname;
		private $trainnumber;
		private $type;

		public function __construct($trainnumber, $trainname) {
			$this->trainnumber = $trainnumber;
			$this->trainname = $trainname;
			
		}

		public function getType() {
			return $this->type;
		}

	    public function setType($type) {
	    	$this->type = $type;
	    }

	    public function getTrain() {
	    	return (Object) array('trainname'=>$this->trainname, 
	    	                      'trainnumber'=>$this->trainnumber, 
	    	                      'type' => $this->type);
	    }
	}

	class Station implements IStation {

		private $stationcode;
		private $stationname;

		public function __construct($stationcode, $stationname) {
			$this->stationcode = $stationcode;
			$this->stationname = $stationname;
		}

		public function getDistanceFromStart() {
			return constant('self::DISTANCE_FROM_START_' . $this->stationcode);
		}

		public function getStation() {
	    	return (Object) array('stationcode'=>$this->stationcode, 
	    	                      'stationname'=>$this->stationname);
	    }


	}

	class Passenger {

		private $name;
		private $gender;
		private $age;
		private $category;

		public function __construct($name, $gender, $age) {
			$this->name = $name;
			$this->gender = ucfirst($gender);
			$this->age = $age;
			if ($age < 8)
				$this->category = 'Child';
			else
				$this->category = $gender;
		}

		public function getPassenger() {
	    	return (Object) array('name'=>$this->name, 
	    	                      'gender'=>$this->gender, 
	    	                      'age' => $this->age,
	    	                      'category' => $this->category);
	    }
        
	}

	class TrainTicket {

		const FARE_SUPERFAST = 40;
		const FARE_EXPRESS = 20;
		const FARE_PASSENGER = 0;

		const FARE_MALE = 10;
		const FARE_FEMALE = 8;
		const FARE_CHILD = 5;

		private static $counter = 1;

		private $trainobject;
		private $passengerobject;
		private $fromstationobject;
		private $tostationobject;

		private $ticketnumber;
		private $personname;
		private $fromstation;
		private $tostation;
		private $trainnumber;
		private $malenumber = 0;
		private $femalenumber = 0;
		private $childnumber = 0;

		private $totalfare = 0;
		private $distance;
		private $typefare;
		private $categoryfare;

		function __construct() {
			$this->ticketnumber = self::$counter++;
		}

		public function calculateFare($passengers, Station $fromstation, Station $tostation, Train $train) {

			$this->trainobject = $train->getTrain();
			$this->passengerobject = $passengers[0]->getPassenger();
			$this->fromstationobject = $fromstation->getStation();
			$this->tostationobject = $tostation->getStation();
			$this->personname = $this->passengerobject->name;
			$this->trainnumber = $this->trainobject->trainnumber;
			$this->fromstation = $this->fromstationobject->stationname;
			$this->tostation = $this->tostationobject->stationname;
			$this->distance = $tostation->getDistanceFromStart() - $fromstation->getDistanceFromStart();
			$this->traintype = $train->getType();
			$this->typefare = constant('self::FARE_' . strtoupper($this->traintype));
			foreach ($passengers as $person) {
				$this->passengerobject = $person->getPassenger();
				$this->{strtolower($this->passengerobject->category) . 'number'}++;
				$this->categoryfare = constant('self::FARE_' . strtoupper($this->passengerobject->category));
				$this->totalfare += $this->distance * $this->categoryfare + $this->typefare;
			}

		}

		public function printDetails() {	

			echo "\n " . str_repeat("-", 45);
			echo "\n\t\t TRAIN TICKET";
			echo "\n Ticket Number: " .$this->ticketnumber;
			echo "\n Name of Person: " . $this->personname;
			echo "\n From: " . $this->fromstation . " To: " . $this->tostation;
			echo "\n Train: " . $this->trainnumber . " Type: " . $this->traintype;
			echo "\n Total Distance: " . $this->distance;
			echo "\n Passengers: Male - " . $this->malenumber;
			echo " Female - " . $this->femalenumber;
			echo " Child - " . $this->childnumber;
			echo "\n Total Fare: Rs." . $this->totalfare;
			echo "\n " . str_repeat("-", 45) . "\n";
		}

	}

	function addPassenger() {

		global $passengerslist;
		global $currentlist;
		$name = ucfirst(readline("\n Enter the name of the passenger: "));

		do {
			$gender = strtolower(readline(" Enter the Gender: "));
		} while (!($gender == 'male' || $gender == 'female'));

		do {
			$age = strtolower(readline(" Enter the Age: "));
		} while (! is_numeric($age));

		${$name} = new Passenger($name, $gender, $age);
		$passengerslist->addPassenger(${$name});
		$currentlist->addPassenger(${$name});
	}


	$st0 = new Station(IStation::CODE_ST0, IStation::NAME_ST0);
	$st1 = new Station(IStation::CODE_ST1, IStation::NAME_ST1);
	$st2 = new Station(IStation::CODE_ST2, IStation::NAME_ST2);
	$st3 = new Station(IStation::CODE_ST3, IStation::NAME_ST3);
	$st4 = new Station(IStation::CODE_ST4, IStation::NAME_ST4);
	$st5 = new Station(IStation::CODE_ST5, IStation::NAME_ST5);

	$stationslist = new StationList;
	$stationslist->addStation($st0);
	$stationslist->addStation($st1);
	$stationslist->addStation($st2);
	$stationslist->addStation($st3);
	$stationslist->addStation($st4);
	$stationslist->addStation($st5);


	$train12345 = new Train(12345, 'Rajadani Superfast');
	$train12345->setType(ITrain::TYPE_SUPERFAST);

	$train12346 = new Train(12346, 'Malabar Express');
	$train12346->setType(ITrain::TYPE_EXPRESS);

	$train12347 = new Train(12347, 'Ernakulam Memu');
	$train12347->setType(ITrain::TYPE_PASSENGER);



	$trainslist = new TrainList;
	$trainslist->addTrain($train12345);
	$trainslist->addTrain($train12346);
	$trainslist->addTrain($train12347);

	$passengerslist = new PassengerList;
	$currentlist = new PassengerList;

	$ticketslist = new TicketList;
	$count = 0;

	do {
		echo "\n Train Ticket Service";
		echo "\n ******************** ";
		echo "\n 1. View all Trains.";
		echo "\n 2. View all Stations.";
		echo "\n 3. View all Passengers.";
		echo "\n 4. View all Tickets.";
		echo "\n 5. Train Ticket Booking.";
		echo "\n 6. Exit.";
		$option = readline("\n Enter you option: ");
		switch ($option) {

			case 1:
				echo "\n " . str_repeat("-", 75);
				echo "\n List of Trains: \n";
				$trainslist->printAllTrains();
				echo "\n " . str_repeat("-", 75) . "\n";
				break;

			case 2:
				echo "\n " . str_repeat("-", 55);
				echo "\n List of Stations: \n";
				$stationslist->printAllStations();
				echo "\n " . str_repeat("-", 55) . "\n";
				break;

			case 3:
				echo "\n " . str_repeat("-", 55);
				echo "\n List of Passengers: \n";
				$passengerslist->printAllPassengers();
				echo "\n " . str_repeat("-", 55) . "\n";
				break;

			case 4:
				echo "\n " . str_repeat("-", 55);
				echo "\n List of Tickets: \n";
				$ticketslist->printAllTickets();
				echo "\n " . str_repeat("-", 55) . "\n";
				break;

			case 5:
				$currentlist->flushList();
				$passengercount = readline("\n Enter the number of passengers: ");

				for ($i = 1; $i <= $passengercount; $i++)
					addPassenger();
				$currentpassengerlist = $currentlist->getPassengerList();

				$stationslist->printAllStations();
				do {
					$source = strtolower(readline("\n\n Enter the Source Station Code: "));
				} while (is_null(${$source}));

				do {
					$destination = strtolower(readline(" Enter the Destination Station Code: "));
				} while (is_null(${$source}));

				$trainslist->printAllTrains();
				do {
					$trainnumber = readline("\n\n Enter the Train number: ");
				} while (is_null($trainslist->getTrain($trainnumber)));
				$trainvar = 'train' . $trainnumber;
				$ticket{$count} = new TrainTicket();
				$ticket{$count}->calculateFare($currentpassengerlist, ${$source}, ${$destination}, ${$trainvar});
				$ticket{$count}->printDetails();
				$ticketslist->addTicket($ticket{$count++});
				break;

			case 6:
				break;

			default:
				echo "\n Error: Invalid Option! \n\n";
				break;
		}

	} while ($option != 6)
?>