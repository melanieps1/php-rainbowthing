<form class="form-inline" method="get" action="">

  <label class="sr-only" for="paletteName">Palette Name</label>
  <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="paletteName"
  name="paletteName" placeholder="The most beautiful...">

  <button type="submit" class="btn btn-secondary">Add Palette</button>

</form>

<?php

  require_once('database.php');

  if (isset($_GET['paletteName'])) {
    $safeName = htmlentities($_GET['paletteName']);
    addPalette($safeName);
  }

  if (isset($_GET['removePaletteId'])) {
    $safeId = htmlentities($_GET['removePaletteId']);
    deletePalette($safeId);
  }

  if (isset($_GET['removeColorFromPaletteId'])) {
    $safeId = htmlentities($_GET['removeColorFromPaletteId']);
    deleteColorFromPalette($safeId);
  }

  if (isset($_GET['paletteIdToAddToRelation']) && isset($_GET['colorIdToAddToRelation'])) {
    $safeColorId = htmlentities($_GET['colorIdToAddToRelation']);
    $safePaletteId = htmlentities($_GET['paletteIdToAddToRelation']);
    addColorToPalette($safeColorId, $safePaletteId);
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

  function deleteColorFromPalette($id) {
    $sql = "DELETE FROM color_palette WHERE id=" . $id;
    $request = pg_query(getDb(), $sql);
  }

  function getColorsForPalette($id) {
    $sql = "
      SELECT color_palette.id as delete_id, colors.* FROM color_palette
      JOIN colors ON color_palette.color_id = colors.id
      WHERE palette_id = " . $id . ";
    ";
    $request = pg_query(getDb(), $sql);
    return pg_fetch_all($request);
  }

  function addColorToPalette($color_id, $palette_id) {
    $sql = 'INSERT INTO color_palette (color_id, palette_id) VALUES (' . $color_id . ', ' . $palette_id . ');';
    $request = pg_query(getDb(), $sql);
  }

  function colorOptionForPalette($color) {
    return '<option value="' . $color['id'] . '">' . $color['color_name'] . "</option>\n";
  }

?>
