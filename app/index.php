<!DOCTYPE html>
<html>
<head>
  <title>Rainbowthing</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <link rel="stylesheet" href="/app/style.css">
  <script src="https://use.fontawesome.com/14f1f2c704.js"></script>
</head>
<body class="container">

  <h1 class="text-center mt-5">Rainbowthing</h1>

  <h4 class="mt-5">New Color</h4>
  <?php include('./components/color.php'); ?>

  <h4 class="mt-5">New Palette</h4>
  <?php include('./components/palette.php'); ?>

  <div class="row mt-5">

    <div class="col-sm-12 col-md-6">
    
      <h4 class="text-center">Palettes</h4>
      <ul>
      <?php foreach (getPalettes() as $palette) { ?>
        <li class="mb-2">

          <div class="row">

            <div class="col-2 text-right">
              <form method="get" action="">
                <input name="removePaletteId" value="<?=$palette['id']?>" type="hidden">
                <button class="btn btn-sm btn-outline-secondary" type="submit"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
              </form>
            </div>         

            <div class="col-10" style="padding-left: 0px;">
              <?=$palette['palette_name']?>
            </div>
        
          </div>

        </li>
      <?php } ?>
      </ul>

    </div>

    <div class="col-sm-12 col-md-6">

      <h4 class="text-center">Colors</h4>

      <ul>
      <?php foreach (getColors() as $color) { ?>
        <li class="mb-2">

          <div class="row">

            <div class="col-2 text-right">
              <form method="get" action="">
                <input name="removeColorId" value="<?=$color['id']?>" type="hidden">
                <button class="btn btn-sm btn-outline-secondary" type="submit"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
              </form>
            </div>

            <div class="col-6 btn btn-sm" style="min-height: 25px; max-width: 100px; background-color: #<?=$color['hex_code']?>;">&nbsp;
            </div>

            <div class="col-4">
              <?=$color['color_name']?>
            </div>
          
        </li>
      <?php } ?>
      </ul>

    </div>

  </div>


</body>
</html>