<?php

	class Train {

		public $trainname;
		public $trainnumber;

		public function __construct($trainname, $trainnumber) {
			$this->trainname = $trainname;
			$this->trainnumber = $trainnumber;
		}	
	}

	class Station{

		public $stationname;

		public function __construct($stationname) {
			$this->stationname = $stationname;
		}

	}

	class Passenger {

		public $name;

		public function __construct($name) {
			$this->name = $name;
		}
        
	}

	class FareCalculation {

		public $rate;

		public function calculateRate(Station $fromstation, Station $tostation, Train $train) {
			$rate = 500;
			return $rate;
		}

	}

	class TrainTicket {

		public $personname;
		public $fromstation;
		public $tostation;
		public $trainnumber;
		public $fare;

		public function generateTicket(Passenger $person, $fare, Station $fromstation, Station $tostation, Train $train) {
			$this->personname = $person->name;
			$this->fromstation = $fromstation->stationname;
			$this->tostation = $tostation->stationname;
			$this->trainnumber = $train->trainnumber;
			$this->fare = $fare;
		}

	}

	$joey = new Passenger('Joey');
	$chandler = new Passenger('Chandler');

	$palakkad = new Station('Palakkad');
	$kochi = new Station('Kochi');
	$bangalore = new Station('Bangalore');

	$train12678 = new Train('Bangalore Express',12678);
	$train12679 = new Train('Kochi Express',12679);

	$fare1 = FareCalculation::calculateRate($palakkad, $bangalore, $train12678);
	$fare2 = FareCalculation::calculateRate($bangalore, $kochi, $train12679);

	$ticket1 = new TrainTicket();
	$ticket2 = new TrainTicket();
	$ticket1->generateTicket($joey, $fare1, $palakkad, $bangalore, $train12678);
	$ticket2->generateTicket($chandler, $fare2, $bangalore, $kochi, $train12679);
	
	print_r($ticket1);
	print_r($ticket2);

	

?>