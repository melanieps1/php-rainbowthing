<!DOCTYPE html>
<html>
<head>
  <title>Rainbowthing</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <link rel="stylesheet" href="/app/style.css">
  <script src="https://use.fontawesome.com/14f1f2c704.js"></script>
</head>
<body class="container">

  <!-- Gets rid of URL params upon clicking the button -->
  <!-- TODO: Hide params instead of needing this button crap -->
  <a href="/">Reset URL params</a>

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
        <li class="mb-2 mt-5">

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

          <div class="ml-5">
            <?php 
              $usedColors = getColorsForPalette($palette['id']);
              if ($usedColors) {
                foreach($usedColors as $color) {
                  echo displayColor($color['delete_id'], $color['color_name'], $color['hex_code'], 'removeColorFromPaletteId');
                } 
              }
            ?>
          </div>

          <form class="ml-5" method="get" action="">
            <input type="hidden" name="paletteIdToAddToRelation" value="<?=$palette['id']?>">
            <div class="form-inline ml-4">
              <label for="colorSelect" class="sr-only">Color Select</label>
              <select class="form-control form-control-sm mb-2 mr-sm-2 mb-sm-0" id="colorSelect" name="colorIdToAddToRelation">

                <?php 

                var_dump($usedColors);

                foreach (getColors() as $color) {
                
                  // Test to see if $color is in $usedColors?
                  if ($usedColors) {
                    if (in_array($color, $usedColors)) {
                      // ignore it
                      var_dump('IGNORE');
                    }
                    else {
                      var_dump('NOT IN');
                      print colorOptionForPalette($color);
                    }
                  }
                  else {
                    var_dump('NO USED COLORS');
                    print colorOptionForPalette($color);
                  }

                }?>

              </select>
              <button type="submit" class="btn btn-secondary btn-sm">Add to Palette</button>
            </div>
          </form> 

        </li>
      <?php } ?>
      </ul>

    </div>

    <div class="col-sm-12 col-md-6">

      <h4 class="text-center">Colors</h4>

      <ul>
      <?php foreach (getColors() as $color) { ?>
        <li><?=displayColor($color['id'], $color['color_name'], $color['hex_code'], 'removeColorId')?></li>
      <?php } ?>
      </ul>

    </div>

  </div>


</body>
</html>