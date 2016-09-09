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
    <title>Pinnacle | Stations</title>

    <link href="assets/css/styles.css" rel="stylesheet">
    <link href="assets/css/navbar.css" rel="stylesheet">
    <link href="assets/css/textstyles.css" rel="stylesheet">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
  </head>

  <body>
    <?php include "navbar.php" ?>
    <center>

    <?php include "controller/readstations.php" ?>


      <div class="content-table">
        <fieldset class="table-display">
          <legend>Railway Station Details</legend>
          <table class="display">
            <tr>
              <th class='heading'> # </th>
              <th class='heading'> Station Code </th>
              <th class='heading'> Station Name </th>
              <th class='heading'> Distance from Source </th>
              <th class='heading'> Delete </th>
              <th class='heading'> Edit </th>
            </tr>
            <tr class='print-value'>
              <td> 1 </td>
              <td> ERS </td>
              <td> Ernakulam South </td>
              <td> 0 </td>
              <td> - </td>
              <td> - </td>
            </tr>
            <?php 
              $count = 2;
              $readstations->bind_result($stationcode, $stationname, $distance);
              $readstations->execute();
              while($readstations->fetch()){
            ?>
            <tr class='print-value'>
              <td> <?php echo $count++; ?> </td>
              <td> <?php echo $stationcode; ?> </td>
              <td> <?php echo $stationname; ?> </td>
              <td> <?php echo $distance; ?> </td>
              <td> 
                <center>
                  <form method="post" action="controller/deletestation.php">
                    <input type="hidden" id="stationcode" name="stationcode" value="<?php echo $stationcode; ?>">
                    <button class="table-button" type="submit">
                      <i class="fa fa-trash fa-2x" aria-hidden="true"></i>
                    </button>
                  </form>
                </center>
              </td>
              <td> 
                <center>
                  <form method="get" action="editstation.php">
                    <input type="hidden" id="stationcode" name="stationcode" value="<?php echo $stationcode; ?>">
                    <button class="table-button edit" type="submit">
                      <i class="fa fa-pencil fa-2x" aria-hidden="true"></i>
                    </button>
                  </form> 
                </center>
              </td>
            </tr>
            <?php } ?>
          </table>
          <br>
          <a<strong><a class="login" href="addstation.php">ADD NEW STATION</a></strong>
          <br>
        </fieldset>
      </div>
    </center>

    <?php include "footer.php" ?>
  </body>
</html>
