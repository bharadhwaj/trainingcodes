<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/favicon.ico">

    <title>Pinnacle | Login</title>

    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/styles.css" rel="stylesheet">
    <link href="assets/css/textstyles.css" rel="stylesheet">
    <link href="assets/css/navbar.css" rel="stylesheet">
  </head>

  <body>
    <?php include "navbar.php" ?>
    <hr class="navbar-inverse-line">

    <?php include "controller/login.php" ?>
      
    <div class="container">
      <div align="center" class="col-md-8 col-md-offset-2">
        <form class="register-form login-form" action="" method="post">
          <?php if ($errorexist) { ?>
            <span class="error-text"> <?php echo $errortext;?> </span>
          <?php } ?>

          <input type="text" class="textbox-register" name="username" placeholder="Username" pattern="[A-Za-z0-9]{6,12}" value='<?php echo $username ?>' required title="Can only have alphanumeric characters with length 6-12 characters.">

          <input type="password" class="textbox-register" id="password" name="password" placeholder="Password" pattern="(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*\W)(?!.*[ ]).{6,}" required title="At least one special character, one capital letter, one numeric value, one small letter and should have more than 6 characters.">

          <span class="form-text"><input type="checkbox" name="remember"> Remember Me. </span>

          <input type="submit" class="submit-btn" name="login" value="Login">

          <span class="tail-text"> 
            New member here? <strong><a class="login" href="register.php">SIGN UP</a></strong>
          </span>
        </form>
      </div>
    </div>

    <?php include "footer.php" ?>

    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/passwordcheck.js"></script>
    
  </body>
</html>