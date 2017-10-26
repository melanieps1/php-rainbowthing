<form class="form-inline" method="get" action="">

  <label class="sr-only" for="colorName">Color Name</label>
  <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="colorName" name="nameColor" placeHolder="The deep dark void...">

  <label class="sr-only" for="hexCode">Hex Code</label>
  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
    <div class="input-group-addon">#</div>
    <input type="text" class="form-control" id="hexCode" name="hexCode" placeholder="a1b2c3" maxlength="6" size="6">
  </div>

  <button type="submit" class="btn btn-secondary">Add Color</button>

</form>

<?php

  // Common functions...
  include_once('database.php');

  // Color-related functions...

  function getColors() {
    // Return a list of all colors in the database
    $sql = "SELECT * FROM colors ORDER BY hex_code;";
    $request = pg_query(getDb(), $sql);
    return pg_fetch_all($request);
  }

  function addColor() {
    // Insert a new color into the database

  }

  function deleteColor() {
    // Delete a color from the database


  }




?>