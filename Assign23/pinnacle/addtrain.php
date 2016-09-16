<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/favicon.ico">

    <title>Pinnacle | Add Route</title>

    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/styles.css" rel="stylesheet">
    <link href="assets/css/textstyles.css" rel="stylesheet">
    <link href="assets/css/navbar.css" rel="stylesheet">
  </head>

  <body>
    <?php include "navbar.php" ?>
    <hr class="navbar-inverse-line">
    
    <?php include "controller/addtrain.php" ?>

      <div class="container">
        <div align="center" class="col-md-6 col-md-offset-3">
          <fieldset class="table-display">
            <legend align="center">Add Train</legend>
            <form class="register-form" action="" method="post">
                <?php 
                  if (! empty($errors))
                    foreach ($errors as $error) { 
                ?>
                  <span class="error-text"> <?php echo $error;?> </span>
                <?php } ?>

                <input type="number" class="textbox-register" name="trainnumber" placeholder="Train Number" min="0" max="999999" pattern="^[0-9]{5,6}$" required title="5/6 integer Train Number required.">

                <input type="text" class="textbox-register" name="trainname" placeholder="Train Name" required title="Name of the Train.">

                <select required class="custom-dropdown textbox-register" name="routename" >
                  <option value="error" disabled selected hidden>Route Name</option>
                  <?php 
                    $readroutes->bind_result($routename);
                    $readroutes->execute();
                    while($readroutes->fetch()){
                  ?>
                  <option value="<?php echo $routename; ?>"> <?php echo $routename; ?> </option>
                  <?php } ?>
                </select>

                <input type="submit" class="submit-btn" name="addtrain" value="ADD TRAIN">

                <span class="tail-text"> 
                  Wish to see list of all Trains? <strong><a class="login" href="trains.php">CLICK HERE</a></strong>
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
