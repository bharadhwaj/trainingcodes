<?php

	include_once 'setup/users.php';

	$user = new Users();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    	$username = $user->connection->real_escape_string($_POST['username']);
    	$isadmin = $user->connection->real_escape_string($_POST['isadmin']);
		if (!empty($username)) 
			if ($isadmin)
				$user->changeRole($username, 0);
			else 
				$user->changeRole($username, 1);
	}
	
?>