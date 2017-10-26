<!DOCTYPE html>
<html>
<head>
  <title>Rainbowthing</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <link rel="stylesheet" href="/app/style.css">
</head>
<body class="container">

  <h1 class="text-center mt-5">Rainbowthing</h1>

  <h4 class="mt-5">New Color</h4>
  <?php include('./components/color.php'); ?>

  <h4 class="mt-5">New Palette</h4>
  <?php include('./components/palette.php'); ?>

  <div class="row mt-5">

    <div class="col">
    
      <!-- Palettes list with colors listed below -->
      <h4 class="text-center">Palettes</h4>

    </div>

    <div class="col">

      <!-- Color list -->
      <h4 class="text-center">Colors</h4>

    </div>

  </div>


</body>
</html>