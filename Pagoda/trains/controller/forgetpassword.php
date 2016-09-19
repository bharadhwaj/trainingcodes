<?php

	include_once 'setup/users.php';

	$user = new Users();

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (isset($_POST['forgetpassword'])) {

			$emailid = $user->connection->real_escape_string($_POST['emailid']);

			if ($user->emailExists($emailid)) {
				list($username, $hashedstring) = $user->getHashString($emailid);
				$resetpasswordurl = "http://trains.gopagoda.io/resetpassword.php?id=$hashedstring&emailid=$emailid";
				include "PHPMailer/mail.php";
			}

			header("Location: /changepassword.php");

		}
	}

?>