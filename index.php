<?php  

// var_dump(substr($_SERVER['HTTP_HOST'], 0, 9));

//   if (substr($_SERVER['HTTP_HOST'], 0, 9) == 'localhost') {
//     $url = $_SERVER['HTTP_HOST'] . '/app';
//   }
//   else {
//     $url = '/app';
//   }
  
// var_dump($url);

  $url = $_SERVER['HTTP_HOST'] . '/app';
  header("Location: http://" . $url);
  die();
?>