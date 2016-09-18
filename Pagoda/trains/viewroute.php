<?php 
  if (!$_SESSION["login"] && !$_COOKIE["login"])
      header("Location: /login.php");
  else {
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/favicon.ico">
    <title>Pinnacle | Route Details</title>

    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/styles.css" rel="stylesheet">
    <link href="assets/css/textstyles.css" rel="stylesheet">
    <link href="assets/css/navbar.css" rel="stylesheet">


  </head>

  <body>
    <?php include "navbar.php" ?>
    <hr class="navbar-inverse-line">

    <?php include "controller/viewroute.php" ?>

      <div class="container">
        <div align="center" class="col-md-6 col-md-offset-3">
          <fieldset class="table-display">
            <legend align="center">Route Details</legend>
            <h3> List of stations in <?php echo $currentroute; ?> Route: </h3>
            <table class="display">
              <tr>
                <th class='heading'> # </th>
                <th class='heading'> Station Code </th>
                <th class='heading'> Distance </th>
              </tr>
              <?php 
                $count = 1;
                while($stationdetails = $getstations->fetch_array()) {
              ?>
              <tr class='print-value'>
                <td> <?php echo $count++; ?> </td>
                <td> <?php echo $stationdetails[2]; ?> </td>
                <td> <?php echo $stationdetails[3]; ?> </td>
              </tr>
              <?php } ?>
            </table>
            <span class="tail-text"> 
              Wish to see list of all Routes? <strong><a class="login" href="routes.php">CLICK HERE</a></strong>
            </span>
          </fieldset>
        </div>
      </div>

    <?php include "footer.php" ?>
    
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

  </body>
</html>
<?php } ?>