<?php
	
	// Array '$employee' containing Employee name and their id and designation.
	$employee = array('Bing'	=> array(1, 'Director'),
	                  'Joey'	=> array(2, 'Director'),
	                  'Ross'	=> array(3, 'Project Manager'),
	                  'Rachel'	=> array(4, 'Project Manager'),
	                  'Monica' 	=> array(5, 'Employee'),
	                  'Phoebe'	=> array(6, 'Employee'));
	
	// Array '$pages' containing Designation and the pages that particular designation can access.
	$pages = array('Director'       => array('Employees List', 
	                                         'Projects List', 
	                                         'Vacation Request List', 
	                                         'Salary List'),
	               'Project Manager'=> array('Employees List', 
	                                         'Projects List', 
	                                         'Vacation Request List'),
	               'Employee'       => array('Employees List'));

	/*
	* This function, isPrivileged() takes two parameters Employee Name 
	* and Page Name. If the Employee has privilege to access the Page, 
	* the function returns True else it return False. 
	*/
	function isPrivileged($name, $page) {
		global $employee, $pages;
		$designation = $employee[$name][1];
		if(in_array($page, $pages[$designation]))
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
		echo "\n Employee Name: " . $name ."\t Designation: " . $details[1];

	/*
	* Listing the pages from array '$pages'
	*/
	echo "\n\n List of pages: ";
	echo "\n-----------------";
	foreach ($pages['Director'] as $pagename)
		echo "\n Page Name: " . $pagename;

	echo "\n-----------------------------------------";

	$employeename = readline("\n Enter the Employee Name: ");
	$pagename = readline(" Enter the page: ");

	if (array_key_exists($employeename, $employee))	 // Checking whether Employee with '$employeename' exists.
		if (in_array($pagename, $pages['Director'])) // Checking whether Page with '$pagename' exists.
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