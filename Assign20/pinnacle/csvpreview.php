<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/favicon.ico">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <title>Pinnacle</title>

    <link href="assets/css/styles.css" rel="stylesheet">
    <link href="assets/css/navbar.css" rel="stylesheet">
    <link href="assets/css/textstyles.css" rel="stylesheet">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <script type="text/javascript">
      //gets the element by its id
 
      $('#myFile').bind('change', function() {

        //this.files[0].size gets the size of your file.
        alert(this.files[0].size);

      });
    </script>
  </head>

  <body>
    <div class="header-register">
      <ul class="navbar-static-invert" id="myTopnav">
        <li class="logo">
          <a href="/pinnacle">
            <img class="image-content" src="assets/images/pinnacle_lgo_black.png">
          </a>
        </li>
        <li class="link"><a href="register.php">Register</a></li>
        <li class="link"><a href="csvpreview.php">CSV Preview</a></li>
        <li class="link"><a href="/pinnacle">Home</a></li>

        <li class="icon">
          <a href="javascript:void(0);" style="font-size:15px;" onclick="myFunction()"><i class="fa fa-bars" aria-hidden="true"></i></a>
        </li>
      </ul>
      <hr class="navbar-static-invert-line">
    </div>
    <center>
    <div class="content-table">

      <?php
        
        if (isset($_FILES['file'])) {
          $errors= array();
          $file_name = $_FILES['file']['name'];
          $file_size = $_FILES['file']['size'];
          $file_tmp = $_FILES['file']['tmp_name'];
          $file_type = $_FILES['file']['type'];
          $file_ext = strtolower(end(explode('.', $_FILES['file']['name'])));
          if ($file_ext == '')
            $errors[] = "Please add any file.";
          else if ($file_ext != 'csv' || $file_type != 'text/csv')
             $errors[] = "Extension not allowed, Please choose a CSV file.";
          
          if ($file_size > 5120)
             $errors[] = 'File size must be less than 5 KB';
          
          if (empty($errors) == true) {
            $csvFile = file($file_tmp);
          }
       }
       else 
        $errors[] = 'Please select any file.';
      ?>
      
      <form action="" method="post" enctype="multipart/form-data" actiononsubmit="" >
        <fieldset>
          <legend>Upload CSV:</legend>
          <input type="file" name="file" id="file" accept=".csv">
          <input type="submit" class="form-button"/>
          <span class="error-text"> 
            <?php
              foreach ($errors as $key => $error) {
                 echo"<br> *";
                 print_r($error);
              }
            ?> 
          </span>
        </fieldset>
      </form>
      <fieldset>
        <legend>Preview of CSV Data:</legend>
        <table class="display">
          <?php 
            $heading = true;
            foreach ($csvFile as $line) {
              if ($heading) {
                echo "<tr><th class='heading'>"; echo str_getcsv($line)[0]; echo "</th>";
                echo "<th class='heading'>"; echo str_getcsv($line)[1]; echo "</th>";
                echo "<th class='heading'>"; echo str_getcsv($line)[2]; echo "</th></tr>";
                $heading = false;
              }
              else {
                echo "<tr class='print-value'><td>"; echo str_getcsv($line)[0]; echo "</td>";
                echo "<td>"; echo str_getcsv($line)[1]; echo "</td>";
                echo "<td>"; echo str_getcsv($line)[2]; echo "</td></tr>";
              }
            }
          ?>
        </table>
      </fieldset>
    </div>
    </center>

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
  </body>
</html>
