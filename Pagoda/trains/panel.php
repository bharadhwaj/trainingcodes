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
    
    <title>Pinnacle | Admin Panel</title>

    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/styles.css" rel="stylesheet">
    <link href="assets/css/textstyles.css" rel="stylesheet">
    <link href="assets/css/navbar.css" rel="stylesheet">
  </head>

  <body>
    <?php include "navbar.php" ?>
    <hr class="navbar-inverse-line">

    <?php include "controller/panel.php" ?>

      <div class="container">
        <div align="center" class="col-md-10 col-md-offset-1">
          <fieldset class="table-display">
            <legend align="center">All User Details</legend>
              <table class="display">
                <tr>
                  <th class='heading'> # </th>
                  <th class='heading'> Username </th>
                  <th class='heading'> Email ID </th>
                  <th class='heading'> Country </th>
                  <th class='heading'> Is Admin </th>
                  <th class='heading'> Manage </th>
                </tr>
                <?php 
                  $count = 1;
                  $readuser->bind_result($username, $email, $country, $isadmin);
                  $readuser->execute();
                  while($readuser->fetch()){
                ?>
                  <tr class='print-value'>
                    <td> <?php echo $count++; ?> </td>
                    <td> <?php echo $username; ?> </td>
                    <td> <?php echo $email; ?> </td>
                    <td> <?php echo $country; ?> </td>
                    <td> 
                      <center>
                        <?php if ($isadmin) {?>
                          <i class="fa fa-check fa-2x table-button" aria-hidden="true"></i>
                        <?php } else { ?>
                          <i class="fa fa-times fa-2x table-button wrong" aria-hidden="true"></i>
                        <?php } ?>
                      </center>
                    </td>
                    <td>
                      <center>
                        <?php if ($isadmin && $username == 'admin123') {?>
                          <i class="fa fa-user-secret fa-2x table-button-disabled" aria-hidden="true"></i>
                        <?php } else if ($isadmin) { ?>
                          <form action="controller/togglerole.php" method="post">
                            <input type="hidden" id="username" name="username" value="<?php echo $username; ?>">
                            <input type="hidden" id="isadmin" name="isadmin" value="<?php echo $isadmin; ?>">
                            <button class="table-button black trash" type="submit">
                              <i class="fa fa-user-times fa-2x" aria-hidden="true"></i>
                            </button>
                          </form>
                        <?php } else { ?>
                          <form action="controller/togglerole.php" method="post">
                            <input type="hidden" id="username" name="username" value="<?php echo $username; ?>">
                            <input type="hidden" id="isadmin" name="isadmin" value="<?php echo $isadmin; ?>">
                            <button class="table-button black success" type="submit">
                              <i class="fa fa-user-plus fa-2x" aria-hidden="true"></i>
                            </button>
                          </form>
                        <?php } ?>
                      </center>
                    </td>
                  </tr>
                <?php } ?>
              </table>
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