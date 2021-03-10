<?php
  /**
   * Creating query to database.
   * Returning all products from database.
   */
  $products = $db->select("*", "products");
?>
<div class="container product-list">
  <div class="d-flex flex-wrap justify-content-center"> 
  <?php 
    /**
     * Creation of markup for the list of products.* 
     */
    foreach($products as $product):
  ?>
    <div class="col-3 p-3 product-list__item">
      <div class="card p-2 text-center el--height-full">
        <div class="form-check" data-cb="product-cb">
          <input 
            id="flexCheckDefault"
            class="form-check-input"
            type="checkbox"
            value="<?php echo $product->getSku(); ?>"
            name="check-box"
          >
        </div>
        <p class="product-list__item__line product-list__item__sku">
          <?php echo strtoupper($product->getSku()); ?>
        </p>
        <p class="product-list__item__line product-list__item__name">
          <?php echo ucfirst($product->getName()); ?>
        </p>
        <p class="product-list__item__line product-list__item__price">
          <?php echo number_format($product->getPrice(), 2)."$"; ?>
        </p>
        <p class="product-list__item__line product-list__item__features">
          <?php
            $class = get_class($product); // Class of received data from database.
            /**
             * Depending on class, changing method for outputting data.
             */
            switch ($class) {
              case "Book":
                echo "Weight: ".$product->getWeight()."KG";
                break;
              case "DVD":
                echo "Size: ".$product->getSize()."MB";
                break;
              case "Furniture":
              default:
                echo "Dimension: ".$product->getHeight()."x".$product->getWidth()."x".$product->getLength();
                break;
            }
          ?>
        </p>
      </div>
    </div>
  <?php endforeach; ?>
  </div>
</div>
