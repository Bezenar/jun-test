<?php
  // Array with Columns name.
  $columns = array( "sku", "name", "price" );
  /**
   * Checking POST data to create complement to columns name.
   */
  if ($_POST["size"])
  {
    array_push($columns, "size");
  }
  else if ($_POST["weight"])
  {
    array_push($columns, "weight");
  }
  else
  {
    array_push($columns, "height");
    array_push($columns, "width");
    array_push($columns, "length");
  }
  // Insert data to DB.
  $db->insert("products", $_POST, $columns);
  // Clearing POST data.
  $_POST = array();