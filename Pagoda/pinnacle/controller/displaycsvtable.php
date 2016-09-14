<?php

  if (isset($loadtable))
    if ($loadtable) {
      echo '<fieldset class="table-display">';
      echo '<legend align="center">Preview of CSV Data</legend>';
      echo '<table class="display">';
         
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
        
      echo '</table>';
      echo '</fieldset>';
    }
?>