<?php

namespace App\Controllers;
use App\Models\Product;

class UpdateProductController extends CoreController{

    public function see($params){
        
        $productId = $params;
        $product = new Product();
        $dataProduct = $product->find($productId);
        $this->show('main/updateProduct',['product'=>$dataProduct]);
    }

    public function update($params){
      
        $productId=$params;
        $product = new Product();
        $product->setName($_POST['name']);
        $product->setDescription($_POST['description']);
        $product->setPicture($_POST['picture']);
        $product->setPrice($_POST['price']);
        $product->setBrandId($_POST['brandId']);
        $product->setCategoryId($_POST['categoryId']);
        $product->setTypeId($_POST['typeId']);
        $product->setId($productId);

        Product::update($product);
        header('location:'.$_SERVER['BASE_URI'].'/produits');
        
    }
}