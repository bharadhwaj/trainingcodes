<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/favicon.ico">
    <title>Pinnacle | Stations</title>

    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/styles.css" rel="stylesheet">
    <link href="assets/css/textstyles.css" rel="stylesheet">
    <link href="assets/css/navbar.css" rel="stylesheet">


  </head>

  <body>
    <?php include "navbar.php" ?>
    <hr class="navbar-inverse-line">


    <?php include "controller/readstations.php" ?>

      <div class="container">
        <div align="center" class="col-md-10 col-md-offset-1">
          <fieldset class="table-display">
            <legend align="center">Railway Station Details</legend>
            <?php 
              if (!empty($stationexist->fetch())) { 
            ?>
              <table class="display">
                <tr>
                  <th class='heading'> # </th>
                  <th class='heading'> Station Code </th>
                  <th class='heading'> Station Name </th>
                  <th class='heading'> Distance from Source </th>
                  <?php if ($_SESSION["isadmin"]|| $_COOKIE["isadmin"]) {?>
                  <th class='heading'> Edit </th>
                  <th class='heading'> Delete </th>
                  <?php } ?>
                </tr>
                
                <?php 
                  $count = 1;
                  $readstations->bind_result($stationcode, $stationname, $distance);
                  $readstations->execute();
                  while($readstations->fetch()){
                ?>
                <tr class='print-value'>
                  <td> <?php echo $count++; ?> </td>
                  <td> <?php echo $stationcode; ?> </td>
                  <td> <?php echo $stationname; ?> </td>
                  <td> <?php echo $distance; ?> </td>
                  <?php if ($_SESSION["isadmin"] || $_COOKIE["isadmin"]) {?>
                  <td> 
                    <center>
                      <form method="get" action="editstation.php">
                        <input type="hidden" id="stationcode" name="stationcode" value="<?php echo $stationcode; ?>">
                        <button class="table-button<?php if ($distance == 0) echo "-disabled"; else echo " edit";?>" type="submit" <?php if ($distance == 0) echo "disabled";?>>
                          <i class="fa fa-pencil fa-2x" aria-hidden="true"></i>
                        </button>
                      </form> 
                    </center>
                  </td>
                  <td> 
                    <center>
                      <form method="post" action="controller/deletestation.php">
                      <input type="hidden" id="stationcode" name="stationcode" value="<?php echo $stationcode; ?>">
                      <button class="table-button<?php if ($distance == 0) echo "-disabled"; else echo " trash";?>" type="submit" <?php if ($distance == 0) echo "disabled";?>>
                        <i class="fa fa-trash fa-2x" aria-hidden="true"></i>
                      </button>
                    </form>
                    </center>
                  </td>
                  <?php } ?>
                </tr>
                <?php } ?>
              </table>
            <?php } else { ?>
              <span class="error-text"> 
                Sorry, No Stations to display! Add Stations using below link. 
              </span> <br>
            <?php } ?>
            <br>
            <?php if ($_SESSION["isadmin"]|| $_COOKIE["isadmin"]) {?>
            <a class="login" href="addstation.php">ADD NEW STATION</a></strong>
            <?php } ?>
            <br>
          </fieldset>
        </div>
      </div>

    <?php include "footer.php" ?>
    
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

  </body>
</html>
