<?php
    class Furniture extends Product
    {
    protected $height, $width, $length;
    function __construct($id, $sku, $name, $price, $height, $width, $length)
    {
      parent::__construct($id, $sku, $name, $price);
      $this->height = $height;
      $this->width = $width;
      $this->length = $length;
    }
    public function getHeight()
    {
      return $this->height;
    }
    public function getWidth()
    {
      return $this->width;
    }
    public function getLength()
    {
      return $this->length;
    }
  }
