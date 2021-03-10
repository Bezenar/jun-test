<?php
  class Product {
    protected $id, $sku, $name, $price;
    function __construct($id, $sku, $name, $price) {
      $this->id = $id;
      $this->sku = $sku;
      $this->name = $name;
      $this->price = $price;
    }
    public function getId() {
      return $this->id;
    }
    public function getSku() {
      return $this->sku;
    }
    public function getName() {
      return $this->name;
    }
    public function getPrice() {
      return $this->price;
    }
  }
