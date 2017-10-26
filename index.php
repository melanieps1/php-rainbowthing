<?php  

  // var_dump($_SERVER);

  $url = $_SERVER['HTTP_HOST'] . '/app';
  header("Location: " . $url);
  die();
?>