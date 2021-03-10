<?php
  define('SERVER','localhost');
  define('USER','root');
  define('PASS','root');
  define('DBNAME','juniortest');

  include ("../Classes/product.php");
  include ("../Classes/book.php");
  include ("../Classes/dvd.php");
  include ("../Classes/furniture.php");
  include ("../Classes/database.php");
  $db = new DB(SERVER, USER, PASS, DBNAME);

if (isset($_POST["data"]))
{
  $data = $_POST["data"];

  $result = $db->delete("products", "sku", $data);
  if ($result)
  {
    echo "db true";
  }
}
else 
{
  die("dp false");
}
  
  
