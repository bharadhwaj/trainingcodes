<?php

	class Objects {
		public $name;
		public $description;
	}

	class Characters extends Objects{
        
		public $imageurl;

		public function __construct($name, $description, $imageurl) {
			$this->name = $name;
			$this->description = $description;
			$this->imageurl = $imageurl;
		}

		public function getDetails() {
			echo "\n Name: " . $this->name;
			echo "\n Desription: " . $this->description;
			echo "\n Image URL: " . $this->imageurl;
			echo "\n";
		}
	}

	class Obstacles extends Objects{
        
		public $movable;
		public $hittable;

		public function __construct($name, $description, $movable, $hittable) {
			$this->name = $name;
			$this->description = $description;
			$this->movable = $movable;
			$this->hittable = $hittable;
		}

		public function getDetails() {
			echo "\n Name: " . $this->name;
			echo "\n Desription: " . $this->description;
			echo "\n Movable: " . $this->movable;
			echo "\n Hittable: " . $this->hittable;
			echo "\n";
		}
	}

	$objectname = strtolower(readline(" Enter the name of object: "));

	$mario = new Characters('Mario',
	               'A short, pudgy, plumber who resides in the Mushroom Kingdom.',
	               'https://upload.wikimedia.org/wikipedia/en/9/99/MarioSMBW.png');

	$luigi = new Characters('Luigi',
	               'Younger brother of Mario.',
	               'https://upload.wikimedia.org/wikipedia/en/f/f1/LuigiNSMBW.png');
	
	$bowser = new Characters('Bowser',
	               'Bowser is the leader and most powerful of the turtle-like Koopa race.',
	               'https://upload.wikimedia.org/wikipedia/en/e/ec/Bowser_-_New_Super_Mario_Bros_2.png');
       
	$brick = new Obstacles('Brick',
	               'Characters cannot get pass through the bricks.',
	               'No', 'No');
	
	$coin = new Obstacles('Coin',
	               'Coins are added to each level, which reward an extra life.',
	               'No', 'Yes');

	if(isset(${$objectname}))
		${$objectname}->getDetails();
	else
		echo "\n Error: Invalid Object Name. \n";
    	
?>