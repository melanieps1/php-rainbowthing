<form class="form-inline" method="get" action="">

  <label class="sr-only" for="paletteName">Palette Name</label>
  <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="paletteName" placeholder="The most beautiful...">

  <button type="submit" class="btn btn-secondary">Add Palette</button>

</form>

<?php

  // Common functions...
  include_once('database.php');

  // Palette-related functions...
  function getPalettes() {
    // Return a list of all palettes in the database
    $sql = "SELECT * FROM palettes ORDER BY palette_name;";
    $request = pg_query(getDb(), $sql);
    return pg_fetch_all($request);
  }


?>
