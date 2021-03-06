<?php

	$paragraph = 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Proin convallis magna ac leo ornare consequat. Ut a condimentum lorem. Nunc a quam non sem malesuada viverra. Donec eu quam velit. Morbi porta dolor molestie vehicula tristique urna erat lacinia diam id ultrices lorem nibh quis dui. In iaculis nunc et imperdiet cursus risus lorem sodales lorem vel euismod tellus ante sit amet mauris. Pellentesque ligula mi maximus non ornare et molestie non eros. Praesent faucibus pellentesque ultrices. Sed placerat augue nec magna accumsan varius. Cras id est sit amet nibh tincidunt rutrum. Nulla sit amet volutpat eros.';

	/*
	* Getting number of words in the paragraph by using regular expressions.
	* Regular expression is used to catch any number of alphanumerics letters 
	* (but atleast one) followed by an optional punctuation and one or more spaces. 
	*/
	$wordregex = '/[a-zA-Z0-9]+[ ,!.?:-]+/';
	$words = preg_match_all($wordregex, $paragraph);

	/*
	* Getting number of sentences in the paragraph by using regular expressions.
	* Regular expression is used to catch any number of alphanumericals or spaces 
	* (but a sentence should contain atleast one alphabet) followed by a punctuation.
	*/
	$sentenceregex = '/([a-zA-Z0-9]*[ ]*[a-zA-Z0-9]+[ ]*)+[.!?]+/';
	$sentence = preg_match_all($sentenceregex, $paragraph); 
	$average = $words / $sentence; // Finding average number of words per sentence.

	echo "\n Average words per sentence is: " . round($average, 1);
	echo "\n";

?>