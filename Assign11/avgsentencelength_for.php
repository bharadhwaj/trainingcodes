<?php

	$paragraph = 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Proin convallis magna ac leo ornare consequat. Ut a condimentum lorem. Nunc a quam non sem malesuada viverra. Donec eu quam velit. Morbi porta dolor molestie vehicula tristique urna erat lacinia diam id ultrices lorem nibh quis dui. In iaculis nunc et imperdiet cursus risus lorem sodales lorem vel euismod tellus ante sit amet mauris. Pellentesque ligula mi maximus non ornare et molestie non eros. Praesent faucibus pellentesque ultrices. Sed placerat augue nec magna accumsan varius. Cras id est sit amet nibh tincidunt rutrum. Nulla sit amet volutpat eros.';

	/*
	* Initializing the word count to one as there will be no space used at the
	* end of string and sentence count to zero.
	*/
	$words = 1; 
	$sentence = 0;

	/*
	* Iterating through each letters in the string in $paragraph and checking
	* whether the current letter is space or fullstop. If it is a space, then
	* the word count is increased and if it is fullstop then the sentence count
	* is increased. A variable holding the previous letter in the string is used
	* to avoid the multiple use of fullstops, so that a more accurate result is
	* obtained.
	*/
	for ($i = 0; $paragraph[$i]; $i++) {
		if ($paragraph[$i] == ' ' && ($prev > 'A' || $prev > 'a' || $prev < 'Z' || $prev < 'z'))
			$words++;
		if ($paragraph[$i] == '.' && ($prev > 'A' || $prev > 'a' || $prev < 'Z' || $prev < 'z'))
			$sentence++;
		$prev = $paragraph[$i];
	}

	$average = ($words) / $sentence; // Finding average number of words per sentence.

	echo "\n Average words per sentence is: " . round($average, 1);
	echo "\n"

?>