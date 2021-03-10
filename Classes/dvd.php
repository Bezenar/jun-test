<?php
  class DVD extends Product
  {
    protected $size;
    function __construct($id, $sku, $name, $price, $size)
    {
      parent::__construct($id, $sku, $name, $price);
      $this->size = $size;
    }
    public function getSize()
    {
      return $this->size;
    }
  }