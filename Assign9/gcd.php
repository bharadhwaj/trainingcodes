<?php
	
	/*
	* This is a funtion used to find the GCD or HCF
	* of two integer numbers.
	* GCD, here is found out using a recursive
	* implementation of Extended Euclidean Method.
	*/
	function gcd($num1, $num2) {
		if($num2 == 0)
			return $num1;
		else
			return gcd($num2, $num1%$num2);
	}

	$num1 = readline("Enter the first number: ");
	$num2 = readline("Enter the second number: ");

	if($num1 == 0 || $num2 == 0) 
		echo "Error: Invalid Input. Zero not allowed! \n";

	else {
		$gcd_num = gcd($num1, $num2);
		echo "GCD(". $num1 . ", " . $num2 . ") = " . abs($gcd_num) . "\n";
	}
?>