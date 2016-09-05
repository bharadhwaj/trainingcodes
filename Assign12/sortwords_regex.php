<?php
	
	/*
	* This function, sortWords() takes an input of an array of string.
	* Then iterating through the loop, it compares two adjacent elements
	* if they are not placed in the right way, it swap the elements. After
	* n such iterations a sorted list is returned back to the user.
	* As this string can have numbers also, strnatcasecmp() function is used
	* to compare any two strings in the array.
	* The complexity of this algorithm is O(n^2), as it iterates through a
	* two level nested for loop.
	*/
	function sortWords($list) {
		$len = count($list);
		for ($i = 0; $i < $len-1; $i++) 
			for ($j = $i+1; $j < $len; $j++) 
				if (strnatcasecmp($list[$i], $list[$j]) > 0) {
					$temp = $list[$i];
					$list[$i] = $list[$j];
					$list[$j] = $temp;
				}
		return $list;
	}

	$str = readline(" Enter the input string: ");
	
	$wordregex = '/[A-Za-z0-9]+/';

	preg_match_all($wordregex, $str, $wordsarray);

	$sortedarray =  array_unique(sortWords($wordsarray[0]));

	foreach ($sortedarray as $key => $value) {
		echo " " . $value . "\n";
	}

?>