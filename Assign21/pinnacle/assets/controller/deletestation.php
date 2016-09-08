

<?php
	include_once 'dbconfig.php';
	function test_input($data) {
    	$data = trim($data);
    	$data = stripslashes($data);
    	$data = htmlspecialchars($data);
    	return $data;
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if ( !empty($_POST['stationcode'])) {
		 	$deletequery = "DELETE FROM Stations WHERE StationCode= ' " . $_POST['stationcode'] . "'";
		 	mysql_query($deletequery);
		 	header("Location: /pinnacle/stations.php");
		}
	}
?>

