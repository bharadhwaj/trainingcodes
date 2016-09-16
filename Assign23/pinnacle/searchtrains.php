<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/favicon.ico">
    <title>Pinnacle | Search Trains</title>

    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/styles.css" rel="stylesheet">
    <link href="assets/css/textstyles.css" rel="stylesheet">
    <link href="assets/css/navbar.css" rel="stylesheet">


  </head>

  <body>
    <?php include "navbar.php" ?>
    <hr class="navbar-inverse-line">

    <?php include "controller/searchtrains.php" ?>

      <div class="container">
        <div align="center" class="col-md-10 col-md-offset-1">
          <fieldset class="table-display">
            <legend align="center">Train Passing through a Station</legend>
            <?php 
              $loggedin = false;
              if (isset($_COOKIE['username'])) { 
                $username = $_COOKIE['username'];
                $loggedin = true;
              }
              else if (isset($_SESSION['username'])) { 
                $username = $_SESSION['username'];
                $loggedin = true;
              } 
              if ($loggedin)
                echo "<h3> Hello, $username </h3>";
            ?>
            <form class="register-form" action="" method="post">
            
                <select required class="custom-dropdown textbox-register" name="stationcode" >
                  <option value="error" disabled selected hidden>Station Name</option>
                    <?php
                      $readstations->bind_result($stationcode, $stationname, $distance);
                      $readstations->execute();
                      while($readstations->fetch()){
                    ?>
                  <option value="<?php echo $stationcode; ?>"> 
                    <?php echo $stationname . " (" . $stationcode . ")"; ?> 
                  </option>
                  <?php } ?>
                </select>

                <input type="submit" class="submit-btn" name="showtrains" value="SHOW TRAINS">
                
            </form>
            <?php if ($trainarray) { ?>
              <h3> List of trains passing through <?php echo $searchstation; ?>: </h3>
              <table class="display">
                <tr>
                  <th class='heading'> # </th>
                  <th class='heading'> Train Number </th>
                  <th class='heading'> Train Name </th>
                  <th class='heading'> Route Name </th>
                </tr>
                <?php 
                  $count = 1;
                  foreach ($trainarray as $trains) {
                     
                ?>
                <tr class='print-value'>
                  <td> <?php echo $count++; ?> </td>
                  <td> <?php echo $trains[0]; ?> </td>
                  <td> <?php echo $trains[1]; ?> </td>
                  <td> <?php echo $trains[2]; ?> </td>
                </tr>
                <?php } ?>
              </table>
            <?php } elseif ($didpost) { ?>
              <span class="error-text"> Sorry! No trains passing through <?php echo $searchstation; ?>! </span>
            <?php } ?>
            <span class="tail-text"> 
              Wish to see list of all Trains? <strong><a class="login" href="trains.php">CLICK HERE</a></strong>
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
