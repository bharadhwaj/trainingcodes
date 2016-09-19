<?php 
  session_start();
  include "controller/setup/users.php";
  $user = new Users();
  $id = $user->connection->real_escape_string($_GET['id']);
  $emailid = $user->connection->real_escape_string($_GET['emailid']);
  list($username, $hashedstring) = $user->getHashString($emailid);
  if (! ($hashedstring == $id) ) {
    include "error404.php";
  }
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

    <title>Pinnacle | Reset Password</title>

    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/styles.css" rel="stylesheet">
    <link href="assets/css/textstyles.css" rel="stylesheet">
    <link href="assets/css/navbar.css" rel="stylesheet">
  </head>

  <body>
    <?php include "navbar.php" ?>
    <hr class="navbar-inverse-line">

    <div class="container">
      <div align="center" class="col-md-8 col-md-offset-2">
        <form class="register-form" action="controller/resetpassword.php" method="post">

          <div class="terms-text"> Please enter your new password. </div>
          <input type="hidden" name="username" value="<?php echo $username;?>" >
          <input type="password" class="textbox-register" id="password" name="password" placeholder="Password" pattern="(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*\W)(?!.*[ ]).{6,}" required title="At least one special character, one capital letter, one numeric value, one small letter and should have more than 6 characters.">
          <span class="error-text"> <?php echo $errors['password']; ?> </span>

          <input type="password" class="textbox-register" id="confirm-password" name="confirm-password" placeholder="Confirm Password" pattern="(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*\W)(?!.*[ ]).{6,}" required title="At least one special character, one capital letter, one numeric value, one small letter and should have more than 6 characters."> 
          <span class="error-text"> <?php echo $errors['confirm-password'];?> </span>

          <input type="submit" class="submit-btn" name="resetpassword" value="CHANGE PASSWORD">

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
<?php } ?>