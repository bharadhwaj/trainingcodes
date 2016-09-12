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
    <title>Pinnacle | CSV Preview</title>

    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/styles.css" rel="stylesheet">
    <link href="assets/css/textstyles.css" rel="stylesheet">
    <link href="assets/css/navbar.css" rel="stylesheet">
  </head>

  <body>
    <?php include "navbar.php" ?>
    <hr class="navbar-inverse-line">
    
    <div class="container">
      <div align="center" class="col-md-6 col-md-offset-3">
        <?php include "controller/csvfile.php" ?>

        <form action="" method="post" enctype="multipart/form-data" >
          <fieldset class="table-display">
            <legend align="center">Upload CSV</legend>
            <input type="file" class="file-text" name="file" id="file" accept=".csv">
            <input type="submit" value="Upload" class="btn form-button"/>
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
        <?php include "controller/displaycsvtable.php" ?>
      </div>
    </div>

    <?php include "footer.php" ?>

    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      $('#file').bind('change', function() {
          if (this.files[0].size > 5120) {
            alert(' Error: Maximum of 5KB is allowed. \n This file size is: ' + this.files[0].size/1024 + "KB");
            $('input[type="submit"]').prop('disabled', true);
            $('input[type="submit"]').attr('class', 'btn form-button-disabled');
          }
          else {
            $('input[type="submit"]').prop('disabled', false);
            $('input[type="submit"]').attr('class', 'btn form-button');
          }
      });
    </script>
  </body>
</html>
