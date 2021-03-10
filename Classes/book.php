<?php
  class Book extends Product
  {
    protected $weight;
    function __construct($id, $sku, $name, $price, $weight)
    {
      parent::__construct($id, $sku, $name, $price);
      $this->weight = $weight;
    }
    public function getWeight() {
      return $this->weight;
    }
  }
