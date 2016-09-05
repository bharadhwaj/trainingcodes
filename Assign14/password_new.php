<?php
	
	$password = readline("Enter your password: ");
	
	/* 
	* Regex for finding passwords of length between 6-12 which has atleast one 
	* upper case character, one lower case character, one digit and one special
	* character. 
	*/
	$regex = '/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*\W)(?!.*[ ]).{6,12}$/';
	
	$match = preg_match($regex, $password);
	
	if($match) 
		echo "Success: Good Password!\n";
	else
		echo "Error: Bad Password.\n";

?>