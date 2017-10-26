<form class="form-inline" method="get" action="">

  <label class="sr-only" for="colorName">Color Name</label>
  <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="colorName" name="colorName" placeHolder="The deep dark void...">

  <label class="sr-only" for="hexCode">Hex Code</label>
  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
    <div class="input-group-addon">#</div>
    <input type="text" class="form-control" id="hexCode" name="hexCode" placeholder="a1b2c3" maxlength="6" size="6">
  </div>

  <button type="submit" class="btn btn-secondary">Add Color</button>

</form>

<?php
  
  include_once('database.php');
  
  if (isset($_GET['colorName']) && isset($_GET['hexCode'])) {
    $safeName = htmlentities($_GET['colorName']);
    $safeHex = htmlentities($_GET['hexCode']);
    addColor($safeName, $safeHex);
  }

  if (isset($_GET['removeColorId'])) {
    $safeId = htmlentities($_GET['removeColorId']);
    deleteColor($safeId);
  }

  function getColors() {
    $sql = "SELECT * FROM colors ORDER BY id desc;";
    $request = pg_query(getDb(), $sql);
    return pg_fetch_all($request);
  }

  function addColor($name, $hex) {
    $sql = "INSERT INTO colors (color_name, hex_code) VALUES ('" . $name . "', '" . $hex . "');";
    $request = pg_query(getDb(), $sql);
  }

  function deleteColor($id) {
    $sql = "DELETE FROM colors WHERE id=" . $id;
    $request = pg_query(getDb(), $sql);
  }

?>