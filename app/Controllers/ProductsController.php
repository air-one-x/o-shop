<?php

namespace App\Controllers;
use App\Models\Product;

class ProductsController extends CoreController{

    public function listProducts(){
      $product = new Product();
      $findAllProducts = $product ->findAll();
      $this->show('main/listProducts',['allProducts'=>$findAllProducts]);
    }
}