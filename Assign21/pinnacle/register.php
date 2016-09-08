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

    <link href="assets/css/styles.css" rel="stylesheet">
    <link href="assets/css/navbar.css" rel="stylesheet">
    <link href="assets/css/textstyles.css" rel="stylesheet">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
  </head>

  <body>
    <?php include "navbar.php" ?>

    <?php include "assets/controller/registervalidation.php" ?>
      
    <div class="content">

      <form class="register-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <center>

          <input type="text" class="textbox" name="username" placeholder="Username" pattern="[A-Za-z0-9]{6,12}" value='<?php echo $username ?>' required title="Can only have alphanumeric characters with length 6-12 characters.">
          <!-- <input type="text" class="textbox" name="username" placeholder="Username" value='<?php echo $username ?>'> -->
          <span class="error-text"> <?php echo $usernameerror;?> </span>


          <input type="email" class="textbox" name="email" placeholder="Email ID" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" value='<?php echo $email ?>' required title="Enter a valid email.">  
          <!-- <input type="email" class="textbox" name="email" placeholder="Email ID" value='<?php echo $email ?>'>  -->
          <span class="error-text"> <?php echo $emailerror;?> </span>


          <input type="password" class="textbox" id="password" name="password" placeholder="Password" pattern="(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*\W)(?!.*[ ]).{6,}" required title="At least one special character, one capital letter, one numeric value, one small letter and should have more than 6 characters.">
          <!-- <input type="password" class="textbox" id="password" name="password" placeholder="Password">  --> 
          <span class="error-text"> <?php echo $passworderror;?> </span>


          <input type="password" class="textbox" id="confirm-password" name="confirm-password" placeholder="Confirm Password" pattern="(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*\W)(?!.*[ ]).{6,}" required title="At least one special character, one capital letter, one numeric value, one small letter and should have more than 6 characters."> 
          <!-- <input type="password" class="textbox" id="confirm-password" name="confirm-password" placeholder="Confirm Password"> -->
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


          <input type="submit" class="btn" name="submit" value="SIGN UP">


          <span class="tail-text"> 
            Already a member? <strong><a class="login" href="">LOGIN</a></strong>
          </span>

        </center>
      </form>

    </div>

    <?php include "footer.php" ?>
    <script>

      var password = document.getElementById("password");
      var confirm_password = document.getElementById("confirm-password");
      function validatePassword() {
        if(password.value != confirm_password.value) {
          confirm_password.setCustomValidity("Passwords Don't Match");
        } else {
          confirm_password.setCustomValidity('');
        }
      }
      password.onchange = validatePassword;
      confirm_password.onkeyup = validatePassword;

      function myFunction() {
          var x = document.getElementById("myTopnav");
          if (x.className === "navbar-static-inverse") {
              x.className += " responsive";
          } else {
              x.className = "navbar-static-inverse";
          }
      }

    </script>
  </body>
</html>
