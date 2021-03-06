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

    <div class="header-home">
      <ul class="navbar-static" id="myTopnav">
        <li class="logo">
          <a href="/pinnacle">
          <img class="image-content" src="assets/images/pinnacle_lgo_white.png">
          </a>
        </li>
        <li class="link"><a href="stations.php">Stations</a></li>
        <li class="link"><a href="register.php">Register</a></li>
        <li class="link"><a href="csvpreview.php">CSV Preview</a></li>
        <li class="link"><a href="/pinnacle">Home</a></li>
        <li class="icon">
          <a href="javascript:void(0);" style="font-size:15px;" onclick="myFunction()"><i class="fa fa-bars fa-2x" aria-hidden="true"></i></a>
        </li>
      </ul>
      <hr class="navbar-static-line">
      <div class="heading-text">
        <strong>PINNACLE</strong>
      </div>
    </div>

    <div class="contents">
      <div class="subheading-text">
        Latest Post
        <hr class= "subheading">
      </div>
      <table>
        <tr>  
          <td>
            <div class="navbar-links">
              <img class="image-content" src="assets/images/demo_img_48-370x247.jpg" alt="">
                <h4 class="image-caption-text">Carousel Gallery</h4>
                <p class="image-text">by <b> BENJAMIN RITNER </b> on <b> AUGUST 30, 2014 </b></p>
                <p class="article-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vel auctor neque. Nunc lacinia, dolor in interdum tincidunt, arcu purus porta dolor, et vulputate massa lorem vel ipsum. Etiam imperdiet enim justo, id pellentesque mauris mollis a. Proin ...</p>
                <p class="link-text">Read more</p>
            </div>
          </td>

          <td>
            <div class="navbar-links">
              <img class="image-content" src="assets/images/demo_img_02-370x246.jpg" alt="">
                <h4 class="image-caption-text">Gallery Grid</h4>
                <p class="image-text">by <b> BENJAMIN RITNER </b> on <b> AUGUST 30, 2014 </b></p>
                <p class="article-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vel auctor neque. Nunc lacinia, dolor in interdum tincidunt, arcu purus porta dolor, et vulputate massa lorem vel ipsum. Etiam imperdiet enim justo, id pellentesque mauris mollis a. Proin ...</p>
                <p class="link-text">Read more</p>
            </div>
          </td>

          <td>
            <div class="navbar-links">
              <img class="image-content" src="assets/images/demo_img_25-370x246.jpg" alt="">
              <h4 class="image-caption-text">Gallery Slider</h4>
              <p class="image-text">by <b> BENJAMIN RITNER </b> on <b> AUGUST 30, 2014 </b></p>
              <p class="article-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vel auctor neque. Nunc lacinia, dolor in interdum tincidunt, arcu purus porta dolor, et vulputate massa lorem vel ipsum. Etiam imperdiet enim justo, id pellentesque mauris mollis a. Proin ...</p>
              <p class="link-text">Read more</p>
            </div>
          </td>
        </tr>
      </table>
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

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "navbar-static") {
        x.className += " responsive";
    } else {
        x.className = "navbar-static";
    }
}
</script>
  </body>
</html>
