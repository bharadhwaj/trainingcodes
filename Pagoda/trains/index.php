<?php 
  session_start();
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

    <title>Pinnacle | Home</title>

    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/styles.css" rel="stylesheet">
    <link href="assets/css/textstyles.css" rel="stylesheet">
    <link href="assets/css/navbar.css" rel="stylesheet">
  </head>

  <body>

    <div class="header-home">
      <?php include "navbar-home.php" ?>
      <hr class="navbar-line">
      <div class="heading-text">
        <strong>PINNACLE</strong>
      </div>
    </div>

    <div class="contents">
      <div class="subheading-text">
        Latest Post
        <hr class= "subheading">
      </div>
      <div class="container">
        <div class="col-md-4">
          <div class="thumbnail">
            <img src="assets/images/demo_img_48-370x247.jpg" alt="Carousel Gallery">
            <div class="caption">
              <h4 class="image-caption-text">Carousel Gallery</h4>
              <p class="image-text">by <b> BENJAMIN RITNER </b> on <b> AUGUST 30, 2014 </b></p>
              <p class="article-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vel auctor neque. Nunc lacinia, dolor in interdum tincidunt, arcu purus porta dolor, et vulputate massa lorem vel ipsum. Etiam imperdiet enim justo, id pellentesque mauris mollis a. Proin ...</p>
              <p class="link-text">Read more</p>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="thumbnail">
            <img src="assets/images/demo_img_02-370x246.jpg" alt="Gallery Grid">
            <div class="caption">
              <h4 class="image-caption-text">Gallery Grid</h4>
              <p class="image-text">by <b> BENJAMIN RITNER </b> on <b> AUGUST 30, 2014 </b></p>
              <p class="article-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vel auctor neque. Nunc lacinia, dolor in interdum tincidunt, arcu purus porta dolor, et vulputate massa lorem vel ipsum. Etiam imperdiet enim justo, id pellentesque mauris mollis a. Proin ...</p>
              <p class="link-text">Read more</p>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="thumbnail">
            <img src="assets/images/demo_img_25-370x246.jpg" alt="Gallery Slider">
            <div class="caption">
              <h4 class="image-caption-text">Gallery Slider</h4>
              <p class="image-text">by <b> BENJAMIN RITNER </b> on <b> AUGUST 30, 2014 </b></p>
              <p class="article-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vel auctor neque. Nunc lacinia, dolor in interdum tincidunt, arcu purus porta dolor, et vulputate massa lorem vel ipsum. Etiam imperdiet enim justo, id pellentesque mauris mollis a. Proin ...</p>
              <p class="link-text">Read more</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php include "footer.php" ?>

    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

  </body>
</html>