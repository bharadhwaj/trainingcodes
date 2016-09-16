<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/favicon.ico">
    
    <title>Pinnacle | Trains</title>

    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/styles.css" rel="stylesheet">
    <link href="assets/css/textstyles.css" rel="stylesheet">
    <link href="assets/css/navbar.css" rel="stylesheet">
  </head>

  <body>
    <?php include "navbar.php" ?>
    <hr class="navbar-inverse-line">

    <?php include "controller/readtrains.php" ?>

      <div class="container">
        <div align="center" class="col-md-10 col-md-offset-1">
          <fieldset class="table-display">
            <legend align="center">All Train Details</legend>
            <?php 
              if (!empty($trainexist->fetch())) { 
            ?>
              <table class="display">
                <tr>
                  <th class='heading'> # </th>
                  <th class='heading'> Train Number </th>
                  <th class='heading'> Train Name </th>
                  <th class='heading'> Route Name </th>
                  <?php if ($_SESSION["isadmin"]|| $_COOKIE["isadmin"]) {?>
                  <th class='heading'> Edit </th>
                  <th class='heading'> Delete </th>
                  <?php } ?>
                </tr>
                <?php 
                  $count = 1;
                  $readtrains->bind_result($trainnumber, $trainname, $routename);
                  $readtrains->execute();
                  while($readtrains->fetch()){
                ?>
                  <tr class='print-value'>
                    <td> <?php echo $count++; ?> </td>
                    <td> <?php echo $trainnumber; ?> </td>
                    <td> <?php echo $trainname; ?> </td>
                    <td> <?php echo $routename; ?> </td>
                    <?php if ($_SESSION["isadmin"]|| $_COOKIE["isadmin"]) {?>
                    <td> 
                      <center>
                        <form method="get" action="edittrain.php">
                          <input type="hidden" id="trainnumber" name="trainnumber" value="<?php echo $trainnumber; ?>">
                          <button class="table-button edit" type="submit">
                            <i class="fa fa-pencil fa-2x" aria-hidden="true"></i>
                          </button>
                        </form> 
                      </center>
                    </td>
                    <td> 
                      <center>
                        <form method="post" action="controller/deletetrain.php">
                          <input type="hidden" id="trainnumber" name="trainnumber" value="<?php echo $trainnumber; ?>">
                          <button class="table-button trash" type="submit">
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
                Sorry, No Trains to display! Add Trains using below link. 
              </span>
              <br/>
            <?php } ?>
            <br>
            <?php if ($_SESSION["isadmin"]|| $_COOKIE["isadmin"]) {?>
            <a class="login" href="addtrain.php">ADD NEW TRAIN</a></strong>
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
