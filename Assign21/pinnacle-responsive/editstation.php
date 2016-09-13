<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/favicon.ico">

    <title>Pinnacle | Edit Station</title>

    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/styles.css" rel="stylesheet">
    <link href="assets/css/textstyles.css" rel="stylesheet">
    <link href="assets/css/navbar.css" rel="stylesheet">
  </head>

  <body>
    <?php include "navbar.php" ?>
    <hr class="navbar-inverse-line">
    
    <?php include "controller/editstation.php" ?>
    <?php include "controller/updatestation.php" ?>
      
    <div class="container">
      <div align="center" class="col-md-6 col-md-offset-3">
        <fieldset class="table-display">
          <legend align="center">Edit Railway Station</legend>
          <form class="register-form" action="" method="post">
            <?php foreach ($errors as $error) { ?>
              <span class="error-text"> <?php echo $error;?> </span>
            <?php } ?>

            <input type="text" class="textbox-register" name="stationcode" placeholder="Station Code" pattern="^[A-Za-z]{3,4}$" value='<?php echo $currentstationdetails[0]; ?>' required title="3-4 alphabet character code for Railway Station.">

            <input type="text" class="textbox-register" name="stationname" max="" placeholder="Station Name"  value='<?php echo $currentstationdetails[1]; ?>' required title="Name of the Railway station.">

            <input type="number" class="textbox-register" id="distance" name="distance" min = "0" max="4999" value='<?php echo $currentstationdetails[2]; ?>' placeholder="Distance from Source Station in KMs." required title="Distance from the source station of the train in KMs.">

            <input type="submit" class="submit-btn" name="updatestation" value="UPDATE">

            <span class="tail-text"> 
              Wish to see list of all stations? <strong><a class="login" href="stations.php">CLICK HERE</a></strong>
            </span>

          </form>
        </fieldset>
      </div>
    </div>
      
    <?php include "footer.php" ?>
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
