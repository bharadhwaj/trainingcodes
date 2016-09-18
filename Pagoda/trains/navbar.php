<?php 
  include_once "controller/setup/dbconfig.php";
  include_once "controller/setup/users.php";
  $user = new Users();
  session_start();
?>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="/">
        <img alt="Brand" src="assets/images/pinnacle_lgo_black.png">
      </a>
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
       <?php 
          $loggedin = false;
          if (isset($_COOKIE['username'])) { 
            $username = $_COOKIE['username'];
            $loggedin = true;
          }
          else if (isset($_SESSION['username'])) { 
            $username = $_SESSION['username'];
            $loggedin = true;
          } 
          if ($loggedin) {
        ?>
        <li><a href="stations.php"><i class="fa fa-home" aria-hidden="true"></i> &nbsp; Stations</a></li>
        <li><a href="routes.php"><i class="fa fa-road" aria-hidden="true"></i> &nbsp; Routes</a></li>
        <li><a href="trains.php"><i class="fa fa-train" aria-hidden="true"></i> &nbsp; Trains</a></li>
        <li><a href="searchtrains.php"><i class="fa fa-search" aria-hidden="true"></i> &nbsp; Search</a></li>
        <?php if($_COOKIE['isadmin'] || $_SESSION['isadmin']) { ?>
          <li><a href="panel.php"><i class="fa fa-wrench" aria-hidden="true"></i> &nbsp; Admin</a></li>
        <?php } ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" >
            <i class="fa fa-user" aria-hidden="true"></i> &nbsp; Hi, <?php echo $username; ?> <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> &nbsp; Logout</a></li>
          </ul>
        </li>
        
        <?php } else { ?>
        <li><a href="login.php"><i class="fa fa-sign-in" aria-hidden="true"></i> &nbsp; Login</a></li>
        <li><a href="register.php"><i class="fa fa-user-plus" aria-hidden="true"></i> &nbsp; Register</a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>
