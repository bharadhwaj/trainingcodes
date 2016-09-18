<?php 
  if (!$_SESSION["isadmin"] && !$_COOKIE["isadmin"])
    include "error404.php";
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

    <title>Pinnacle | Add Route</title>

    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/styles.css" rel="stylesheet">
    <link href="assets/css/textstyles.css" rel="stylesheet">
    <link href="assets/css/navbar.css" rel="stylesheet">
  </head>

  <body>
    <?php include "navbar.php" ?>
    <hr class="navbar-inverse-line">
    
    <?php include "controller/addroute.php" ?>

      <div class="container">
        <div align="center" class="col-md-6 col-md-offset-3">
          <fieldset class="table-display">
            <legend align="center">Add Route</legend>
            <form class="register-form" action="" method="post">
              <?php foreach ($errors as $error) { ?>
                <span class="error-text"> <?php echo $error;?> </span>
              <?php } ?>
               
               <input type="text" class="textbox-register" name="routename" placeholder="Route Name" required title="Name of the Route.">

               <select required class="custom-dropdown textbox-register" name="sourcestation" >
                <option value="error" disabled selected hidden>Source Station</option>
                <?php 
                  $readstationsforsource->bind_result($sstationcode, $sstationname, $sdistance);
                  $readstationsforsource->execute();
                  while($readstationsforsource->fetch()) {
                ?>
                  <option value="<?php echo $sstationcode; ?>"> <?php echo $sstationname; ?> </option>
                <?php } ?>
              </select>

              <select required class="custom-dropdown textbox-register" name="destinationstation" >
                <option value="error" disabled selected hidden>Destination Name</option>
                <?php 
                  $readstationsfordest->bind_result($sstationcode, $sstationname, $sdistance);
                  $readstationsfordest->execute();
                  while($readstationsfordest->fetch()) {
                ?>
                  <option value="<?php echo $sstationcode; ?>"> <?php echo $sstationname; ?> </option>
                <?php } ?>
              </select>

             
              <div align="center" class="col-md-12">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title">Select stations included in this route</h3>
                  </div>
                  <div align="left" class="panel-body">
                    <?php 
                      $readstations->bind_result($stationcode, $stationname, $distance);
                      $readstations->execute();
                      while($readstations->fetch()){
                    ?>
                      <input type="checkbox" value="<?php echo $stationname;?>" name="<?php echo $stationcode;?>"> <?php echo $stationname; ?> <br>
                    <?php } ?>
                  </div>
                </div>
              </div>

              <input type="submit" class="submit-btn" name="addroute" value="ADD ROUTE">

              <span class="tail-text"> 
                Wish to see list of all Routes? <strong><a class="login" href="routes.php">CLICK HERE</a></strong>
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
<?php 
  }
?>