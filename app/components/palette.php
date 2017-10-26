<form class="form-inline" method="get" action="">

  <label class="sr-only" for="paletteName">Palette Name</label>
  <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="paletteName"
  name="paletteName" placeholder="The most beautiful...">

  <button type="submit" class="btn btn-secondary">Add Palette</button>

</form>

<?php

  include_once('database.php');

  if (isset($_GET['paletteName'])) {
    $safeName = htmlentities($_GET['paletteName']);
    addPalette($safeName);
  }

  if (isset($_GET['removePaletteId'])) {
    $safeId = htmlentities($_GET['removePaletteId']);
    deletePalette($safeId);
  }

  function getPalettes() {
    // Return a list of all palettes in the database
    $sql = "SELECT * FROM palettes ORDER BY id desc;";
    $request = pg_query(getDb(), $sql);
    return pg_fetch_all($request);
  }

  function addPalette($name) {
    $sql = "INSERT INTO palettes (palette_name) VALUES ('" . $name . "');";
    $request = pg_query(getDb(), $sql);
  }

  function deletePalette($id) {
    $sql = "DELETE FROM palettes WHERE id=" . $id;
    $request = pg_query(getDb(), $sql);
  }

?>
