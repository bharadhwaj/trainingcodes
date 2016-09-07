<html>
	<body>
		<table>
		<?php session_start(); ?>
			<tr>
				<th> Username </th>
				<th> Email </th>
				<th> Password </th>
				<th> Country </th>
			</tr>
			<tr>
				<td> <?php echo $_SESSION["username"] ?> </td>
				<td> <?php echo $_SESSION["email"] ?> </td>
				<td> <?php echo $_SESSION["password"] ?> </td>
				<td> <?php echo $_SESSION["country"] ?> </td>
			</tr>
		</table>
		<br>
		<a href = "/pinnacle/register.php"> Goto Register </a>
		<br>
		<?php session_destroy(); ?>
	</body>
</html>