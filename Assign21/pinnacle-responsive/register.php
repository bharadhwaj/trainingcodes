<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/favicon.ico">

    <title>Pinnacle | Register</title>

    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/styles.css" rel="stylesheet">
    <link href="assets/css/textstyles.css" rel="stylesheet">
    <link href="assets/css/navbar.css" rel="stylesheet">
  </head>

  <body>
    <?php include "navbar.php" ?>
    <hr class="navbar-inverse-line">

    <?php include "controller/registervalidation.php" ?>
      
    <div class="container">
      <div align="center" class="col-md-8 col-md-offset-2">
        <form class="register-form" action="" method="post">
          <input type="text" class="textbox-register" name="username" placeholder="Username" pattern="[A-Za-z0-9]{6,12}" value='<?php echo $username ?>' required title="Can only have alphanumeric characters with length 6-12 characters.">
          <span class="error-text"> <?php echo $usernameerror;?> </span>

          <input type="email" class="textbox-register" name="email" placeholder="Email ID" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" value='<?php echo $email ?>' required title="Enter a valid email.">  
          <span class="error-text"> <?php echo $emailerror;?> </span>

          <input type="password" class="textbox-register" id="password" name="password" placeholder="Password" pattern="(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*\W)(?!.*[ ]).{6,}" required title="At least one special character, one capital letter, one numeric value, one small letter and should have more than 6 characters.">
          <span class="error-text"> <?php echo $passworderror;?> </span>

          <input type="password" class="textbox-register" id="confirm-password" name="confirm-password" placeholder="Confirm Password" pattern="(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*\W)(?!.*[ ]).{6,}" required title="At least one special character, one capital letter, one numeric value, one small letter and should have more than 6 characters."> 
          <span class="error-text"> <?php echo $confirmpassworderror;?> </span>

          <select required class="custom-dropdown" name="country" >
            <option value="error" disabled selected hidden>Select Country</option>
            <option value="usa" <?php if ($country == 'usa') echo 'selected' ?> > USA </option>
            <option value="canada" <?php if ($country == 'canada') echo 'selected' ?>> Canada </option>
          </select>
          <span class="error-text"> <?php echo $countryerror;?> </span>
          <br>

          <div class="terms-text">
            <label class="item">
              <input required title="Please accept terms and condition." class="radio" type="radio" id="terms" value="terms" name="terms" />
              <div class="radio-image"></div>
            </label>
            <label for="terms"><span> &nbsp; Agree terms and condition</span></label>
          </div>
          <span class="error-text"> <?php echo $termserror;?> </span>
          <br>

          <input type="submit" class="submit-btn" name="submit" value="SIGN UP">

          <span class="tail-text"> 
            Already a member? <strong><a class="login" href="#">LOGIN</a></strong>
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
