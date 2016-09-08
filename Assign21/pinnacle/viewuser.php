<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/favicon.ico">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <title>Pinnacle | View User</title>

    <link href="assets/css/styles.css" rel="stylesheet">
    <link href="assets/css/navbar.css" rel="stylesheet">
    <link href="assets/css/textstyles.css" rel="stylesheet">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
  </head>

  <body>
    <?php include "navbar.php" ?>
    <center>
	    <div class="content-table">
				<fieldset class="table-display">
					<legend>User login credentials</legend>
					<table class="display">
					<?php session_start(); ?>
						<tr>
							<th class='heading'> Username </th>
							<th class='heading'> Email </th>
							<th class='heading'> Password </th>
							<th class='heading'> Country </th>
						</tr>
						<tr class='print-value'>
							<td> <?php echo $_SESSION["username"] ?> </td>
							<td> <?php echo $_SESSION["email"] ?> </td>
							<td> <?php echo $_SESSION["password"] ?> </td>
							<td> <?php echo strtoupper($_SESSION["country"]) ?> </td>
						</tr>
					</table>
					<br>
					<a<strong><a class="login" href="register.php">GOTO REGISTER</a></strong>
					<br>
				</fieldset>
			</div>
		</center>
    <?php include "footer.php" ?>
	</body>
</html>