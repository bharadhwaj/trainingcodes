<?php
  
  if (!$_SESSION["login"] && !$_COOKIE["login"])
    header("Location: /login.php");
  
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
      $loadtable = true;
    }
  }
  
?>