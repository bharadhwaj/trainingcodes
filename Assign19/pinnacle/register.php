<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/favicon.ico">

    <title>Pinnacle</title>

    <link href="assets/css/styles.css" rel="stylesheet">
    <link href="assets/css/navbar.css" rel="stylesheet">
    <link href="assets/css/textstyles.css" rel="stylesheet">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
  </head>

  <body>
    <div class="header-register">
      <ul class="navbar-static-invert" id="myTopnav">
        <li class="logo">
          <a href="/pinnacle">
            <img class="image-content" src="assets/images/pinnacle_lgo_black.png">
          </a>
        </li>
        <li class="link"><a href="/pinnacle">Home</a></li>
        <li class="link"><a href="#">Portfolio <i class="fa fa-caret-down"></i></a></li>
        <li class="link"><a href="#">Contact Us</a></li>
        <li class="link"><a href="#">Galleries <i class="fa fa-caret-down"></i></a></li>
        <li class="link"><a href="#">Blog <i class="fa fa-caret-down"></i></a></li>
        <li class="link"><a href="#">Shop <i class="fa fa-caret-down"></i></a></li>
        <li class="link"><a href="#">Register</a></li>

        <li class="icon">
          <a href="javascript:void(0);" style="font-size:15px;" onclick="myFunction()"><i class="fa fa-bars" aria-hidden="true"></i></a>
        </li>
      </ul>
      <hr class="navbar-static-invert-line">
    </div>

    <?php

  		$usernameerror = $emailerror = $passworderror = $confirmpassworderror = $countryerror =  $termserror = "";
  		$username = $email = $password = $confirmpassword = $country = $terms = "";	

  		if ($_SERVER["REQUEST_METHOD"] == "POST") {

  		  if (empty($_POST["username"]))
  		    $usernameerror = "* Name field can't be empty.";
  		  else {
  		    $username = test_input($_POST["username"]);
  		    if (! preg_match("/^[a-zA-Z0-9]{6,12}$/", $username))
  		      $usernameerror = "* Invalid Username format.";
  		  }

  		  if (empty($_POST["email"])) 
  		      $emailerror = "* Email field can't be empty.";
  		  else {
  		    $email = test_input($_POST["email"]);
  		    if (! filter_var($email, FILTER_VALIDATE_EMAIL))
  		    	$emailerror = "* Invalid Email format.";
  		  }

  		  if (empty($_POST["password"])) 
  		      $passworderror = "* Password field can't be empty.";
  		  else {
  		    $password = test_input($_POST["password"]);
  		    if (! preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W)(?!.*[ ]).{6,12}$/", $password))
  		    	$passworderror = "* Invalid password format.";
  		  }

  	    if (empty($_POST["confirm-password"]))
  	      $confirmpassworderror = "* Confirm Password field can't be empty.";
  	    else {
  	      $confirmpassword = test_input($_POST["confirm-password"]);
  		    if ($password != $confirmpassword) 
  		      $confirmpassworderror = "* Passwords do not match";
  	    }

  	    if (empty($_POST["country"]))
  	    	$countryerror = "* Select one option.";
  	    else
  		    $country = test_input($_POST["country"]);

  		  $terms = $_POST["terms"];
  	    if ($_POST["terms"] != 'terms')
  	    	$termserror = "* Please accept the terms to continue.";
  	    
  	    if($usernameerror == "" && $emailerror == "" && $passworderror == "" && $confirmpassworderror=="" && $countryerror == "" && $termserror == "") {

  				session_start();
  				$_SESSION["username"]=$_POST["username"];
  				$_SESSION["email"]=$_POST["email"];
  				$_SESSION["password"]=$_POST["password"];
  				$_SESSION["country"]=$_POST["country"];
  				header("Location:viewall.php");
          exit();
  			}
  		}

  	  function test_input($data) {
  	  	$data = trim($data);
  	  	$data = stripslashes($data);
  	  	$data = htmlspecialchars($data);
  	  	return $data;
  	  }

		?>
      
    <div class="content">

      <form class="register-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <center>

          <input type="text" class="textbox" name="username" placeholder="Username" pattern="[A-Za-z0-9]{6,12}" value='<?php echo $username ?>' required title="Can only have alphanumeric characters with length 6-12 characters.">
          <span class="error-text"> <?php echo $usernameerror;?> </span>


          <input type="email" class="textbox" name="email" placeholder="Email ID" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" value='<?php echo $email ?>' required title="Enter a valid email.">  
          <span class="error-text"> <?php echo $emailerror;?> </span>


          <input type="password" class="textbox" id="password" name="password" placeholder="Password" pattern="(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*\W)(?!.*[ ]).{6,}" required title="At least one special character, one capital letter, one numeric value, one small letter and should have more than 6 characters.">
          <span class="error-text"> <?php echo $passworderror;?> </span>


          <input type="password" class="textbox" id="confirm-password" name="confirm-password" placeholder="Confirm Password" pattern="(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*\W)(?!.*[ ]).{6,}" required title="At least one special character, one capital letter, one numeric value, one small letter and should have more than 6 characters."> 
          <span class="error-text"> <?php echo $confirmpassworderror;?> </span>


          <select class="custom-dropdown" name="country">
            <option value="error" disabled="" selected hidden>Select Country</option>
            <option value="usa" <?php if ($country == 'usa') echo 'selected' ?> > USA </option>
            <option value="canada" <?php if ($country == 'canada') echo 'selected' ?>> Canada </option>
          </select>
          <span class="error-text"> <?php echo $countryerror;?> </span>
          <br>


          <div class="terms-text">
            <label class="item">
              <input type="radio" value="terms" name="terms"/>
              <div class="radio-image"></div>
            </label>
            <span> &nbsp; Agree terms and condition</span>
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

    <div class="footer">
      <table>
        <tr>
          <td class="footer-logo">
            <img class="footer-image" src="assets/images/footer_logo.png">
          </td>
          <td class="footer-space">
          </td>
          <td class="footer-links">
            <div class="footer-text">
              Resources
              <hr class= "footer-underline">
              <p class="links">Home</p>
              <p class="links">Slider Gallery</p>
              <p class="links">Contact Us</p>
              <p class="links">My Account</p>
              <p class="links">Cart</p>
            </div>              
          </td>
          <td class="footer-space">
          </td>
          <td class="footer-space">
          </td>
        </tr>
        <tr>
          <td class="footer-links">
            <p class="copyright-text">&copy; 2016 Pinnacle Kadence Thomas</p>
          </td>
          <td></td>
        </tr>
      </table>
    </div>

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
