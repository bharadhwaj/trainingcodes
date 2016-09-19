<?php
	require 'PHPMailerAutoload.php';

	$mail = new PHPMailer();
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'ssl'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 465;
	$mail->IsHTML(true);
	$mail->Username = "trainspinnacle@gmail.com";
	$mail->Password = "TrainPinnacle";
	$mail->SetFrom('trainspinnacle@gmail.com', 'Reset Password Pinnacle');
	$mail->Subject = "Password Reset Request";
	$mail->Body = "
	<html> 
	  <body> 
	    <b> Hi, $username </b> <br><br>
	    <p>We have received your request for reseting your Password. Please <a href='$resetpasswordurl'>click here</a> to reset the password. If the link doesn't work, click on the below URL</p>
	    <pre> $resetpasswordurl </pre>
	    <p>If you haven't triggered this operation, please ignore this message. </p><br>
	    Thanks, <br><br>
	    <b> Team Trains Pinnacle </b>
	    </body>
	    </html>";
	$mail->AddAddress("bharadhwaj@qburst.com");
	$mail->Send();

?>