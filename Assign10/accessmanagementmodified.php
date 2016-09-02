<?php

	// Array '$employee' containing Employee ID and their Name and Sesignation.
	$employee = array('Bing' => array('ID' => 1, 'Designation' => 'Director'),
	                  'Joey' => array('ID' => 2, 'Designation' => 'Director'),
	                  'Ross' => array('ID' => 3, 'Designation' => 'Project Manager'),
	                  'Rachel' => array('ID' => 4, 'Designation' => 'Project Manager'),
	                  'Monica' => array('ID' => 5, 'Designation' => 'Employee'),
	                  'Phoebe' => array('ID' => 6, 'Designation' => 'Employee'));

	// Array '$heirarchy' containing Designation and the designations higher than given designation.
	$heirarchy = array('Employee' => array('Employee', 'Project Manager', 'Director'),
	                   'Project Manager' => array('Project Manager', 'Director'),
	                   'Director' => array('Director'));

	
	// Array '$pages' containing Designation and the pages that particular designation can access.
	$pages = array('Employees List' => 'Employee',
	               'Projects List'=> 'Project Manager',
	               'Vacation Request List' => 'Project Manager',
	               'Salary List' => 'Director');

	/*
	* This function, isPrivileged() takes two parameters Employee Name 
	* and Page Name. If the Employee has privilege to access the Page, 
	* the function returns True else it return False. 
	*/
	function isPrivileged($name, $page) {
		global $employee, $heirarchy, $pages;
		$lowestdesignation = $pages[$page];
		$designation = $employee[$name]['Designation'];
		if(in_array($designation, $heirarchy[$lowestdesignation]))
			return true;
		else
			return false;
	}

	/*
	* Listing name of employees and their destination from array '$employee'.
	*/
	echo "\n List of employees and their designation: ";
	echo "\n-----------------------------------------";
	foreach ($employee as $name => $details)
		echo "\n ID: " . $details['ID'] . "\t Employee Name: " . $name ."\t Designation: " . $details['Designation'];

	/*
	* Listing the pages from array '$pages'
	*/
	echo "\n\n List of pages: ";
	echo "\n-----------------";
	foreach ($pages as $pagename =>  $lowestdesignation)
		echo "\n Page Name: " . $pagename;

	echo "\n-----------------------------------------";

	$employeename = readline("\n Enter the Employee Name: ");
	$pagename = readline(" Enter the page: ");

	if (array_key_exists($employeename, $employee))	 // Checking whether Employee with '$employeename' exists.
		if (array_key_exists($pagename, $pages)) // Checking whether Page with '$pagename' exists.
			if (isPrivileged($employeename, $pagename))
				echo "\n " . $employeename. " is privileged to access " . $pagename .".";
			else
				echo "\n " . $employeename. " cannot access " . $pagename .".";
		else
			echo "\n Error: Page with name '" . $pagename . "' doesn't exist!";
	else
		echo "\n Error: Employee with name '" . $employeename . "' doesn't exist!";
	echo "\n"; 
	
?>