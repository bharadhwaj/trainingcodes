<?php 
  session_start();
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
    <title>Pinnacle | Routes</title>

    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/styles.css" rel="stylesheet">
    <link href="assets/css/textstyles.css" rel="stylesheet">
    <link href="assets/css/navbar.css" rel="stylesheet">


  </head>

  <body>
    <?php include "navbar.php" ?>
    <hr class="navbar-inverse-line">


    <?php include "controller/readroutes.php" ?>

      <div class="container">
        <div align="center" class="col-md-6 col-md-offset-3">
          <fieldset class="table-display">
            <legend align="center">Route Details</legend>
            <?php 
              if (!empty($routeexist->fetch())) { 
            ?>
              <table class="display">
                <tr>
                  <th class='heading'> # </th>
                  <th class='heading'> Route Name </th>
                  <th class='heading'> Source Station </th>
                  <th class='heading'> Destination Station </th>
                  <th class='heading'> View </th>
                  <?php if ($_SESSION["isadmin"]|| $_COOKIE["isadmin"]) {?>
                  <th class='heading'> Delete </th>
                  <?php } ?>
                </tr>
                <?php 
                  $count = 1;
                  $readroutes->bind_result($routename, $sourcestation, $destinationstation);
                  $readroutes->execute();
                  while($readroutes->fetch()){
                ?>
                <tr class='print-value'>
                  <td> <?php echo $count++; ?> </td>
                  <td> <?php echo $routename; ?> </td>
                  <td> <?php echo $sourcestation; ?> </td>
                  <td> <?php echo $destinationstation; ?> </td>
                  <td> 
                    <center>
                      <form method="get" action="viewroute.php">
                        <input type="hidden" id="routename" name="routename" value="<?php echo $routename; ?>">
                        <button class="table-button view" type="submit">
                          <i class="fa fa-eye fa-2x" aria-hidden="true"></i>
                        </button>
                      </form>
                    </center>
                  </td>
                  <?php if ($_SESSION["isadmin"]|| $_COOKIE["isadmin"]) {?>
                  <td> 
                    <center>
                      <form method="post" action="controller/deleteroute.php">
                        <input type="hidden" id="routename" name="routename" value="<?php echo $routename; ?>">
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
                Sorry, No Routes to display! Add Routes using below link. 
              </span><br/>
            <?php } ?>

            <br>
            <?php if ($_SESSION["isadmin"]|| $_COOKIE["isadmin"]) {?>
            <a class="login" href="addroute.php">ADD NEW ROUTE</a></strong>
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
<?php } ?>