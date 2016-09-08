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
    <title>Pinnacle | Stations</title>

    <link href="assets/css/styles.css" rel="stylesheet">
    <link href="assets/css/navbar.css" rel="stylesheet">
    <link href="assets/css/textstyles.css" rel="stylesheet">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
  </head>

  <body>
    <?php include "navbar.php" ?>
    <center>
    <div class="content-table">
<?php include_once 'dbconfig.php'; ?>
  <?php include "assets/controller/readstations.php" ?>

  <?php
    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
    echo "<h1> Hello, " . test_input($_POST['stationcode']) . "</h1>";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(!empty($_POST['stationcode'])) {
      $sql_query = "DELETE FROM Stations WHERE StationCode='" . test_input($_POST['stationcode'])."'";
      mysql_query($sql_query);
    }
  }
?>
  <?php include "assets/controller/readstations.php" ?>


 

      <div class="content-table">
        <fieldset class="table-display">
          <legend>Railway Station Details</legend>
          <table class="display">
            <tr>
              <th class='heading'> # </th>
              <th class='heading'> Station Code </th>
              <th class='heading'> Station Name </th>
              <th class='heading'> Distance from Source </th>
              <th class='heading'> Delete </th>
              <th class='heading'> Edit </th>
            </tr>
            <?php 
              $count = 1;
              while ($line = mysql_fetch_row($result)) { 
            ?>
            <tr class='print-value'>
              <td> <?php echo $count++; ?> </td>
              <td> <?php echo $line[0]; ?> </td>
              <td> <?php echo $line[1]; ?> </td>
              <td> <?php echo $line[2]; ?> </td>
              <td> 
                <form method="post" action="">
                  <input type="hidden" id="stationcode" name="stationcode" value="<?php echo $line[0]; ?>">
                  <i class="fa fa-trash fa-2x" aria-hidden="true"></i> 
                  <input type="submit" name="deletesubmit">
                </form>
              </td>
              <td> <i class="fa fa-pencil fa-2x" aria-hidden="true"></i> </td>
            </tr>
            <?php } ?>
          </table>
          <br>
          <a<strong><a class="login" href="addstation.php">ADD NEW STATION</a></strong>
          <br>
        </fieldset>
      </div>
    </center>

    <?php include "footer.php" ?>
  </body>
</html>
