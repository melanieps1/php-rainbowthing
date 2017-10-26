<?php  
  $url = $_SERVER['HTTP_HOST'] . '/app';
  header("Location: " . $url);
  die();
?>