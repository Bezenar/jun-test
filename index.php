<?php
  // Creating global variables.
  define('SERVER','localhost');
  define('USER','root');
  define('PASS','root');
  define('DBNAME','juniortest');
  // INCLUDES.
  include ("./Classes/product.php"); // Product Class.
  include ("./Classes/book.php");
  include ("./Classes/dvd.php");
  include ("./Classes/furniture.php");
  include ("./Classes/database.php"); // Database Class.

  // Creating DB.
  $db = new DB(SERVER, USER, PASS, DBNAME);
  /**
   * Checking post data.
   * IF -> Adding logic for add product action.
   */
  if(isset($_POST["name"]) & isset($_POST["sku"]) && isset($_POST["price"]))
  {
    include("./actions/addProduct.php");
  }
  // Including page header.
  include ("./views/header.php");
  /**
   * Check GET data.
   * If -> Include page part with form for adding products.
   * ElSE -> Include page part with product list.
   */
  if(isset($_GET["page"])) {
    if($_GET["page"] === "addForm")
    {
      include ("./views/add.php");
    }
  }
  else
  {
    include ("./views/list.php");
  }
  // Including page footer.
  include ("./views/footer.php");
?>