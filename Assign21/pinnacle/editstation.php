<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/favicon.ico">

    <title>Pinnacle | Add Station</title>

    <link href="assets/css/styles.css" rel="stylesheet">
    <link href="assets/css/navbar.css" rel="stylesheet">
    <link href="assets/css/textstyles.css" rel="stylesheet">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
  </head>

  <body>
    <?php include "navbar.php" ?>

    <?php include "assets/controller/editstation.php" ?>
    <?php include "assets/controller/updatestation.php" ?>

      
    <center>
      <div class="content-table">
        <fieldset class="table-display">
          <legend>Edit Railway Station</legend>
          <form class="register-form" action="" method="post">
            <center>

            	<input type="hidden" name="originalstationcode" value="<?php echo $stationcode; ?>">
              <input type="text" class="textbox" name="stationcode" placeholder="Station Code" pattern="^[A-Za-z]{3,4}$" value='<?php echo $stationcode; ?>' required title="3-4 alphabet character code for Railway Station.">
              <!-- <input type="text" class="textbox" name="username" placeholder="Username" value='<?php //echo $username ?>'> -->
              <span class="error-text"> <?php //echo $usernameerror;?> </span>


              <input type="text" class="textbox" name="stationname" max="" placeholder="Station Name"  value='<?php echo $stationname; ?>' required title="Name of the Railway station.">
              <!-- <input type="email" class="textbox" name="email" placeholder="Email ID" value='<?php echo $email ?>'>  -->
              <span class="error-text"> <?php //echo $emailerror;?> </span>


              <input type="number" class="textbox" id="distance" name="distance" min = "0" max="5000" value='<?php echo $distance; ?>' placeholder="Distance from Source Station in KMs." required title="Distance from the source station of the train in KMs.">
              <!-- <input type="password" class="textbox" id="password" name="password" placeholder="Password">  --> 
              <span class="error-text"> <?php //echo $passworderror;?> </span>

              <input type="submit" class="btn" name="updatestation" value="UPDATE">


              <span class="tail-text"> 
                Wish to see list of all stations? <strong><a class="login" href="stations.php">CLICK HERE</a></strong>
              </span>

            </center>
          </form>
        </fieldset>
      </div>
    </center>

    <?php include "footer.php" ?>
  </body>
</html>
