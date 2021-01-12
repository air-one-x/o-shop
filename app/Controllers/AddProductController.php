<?php

namespace App\Controllers;
use App\Models\Product;

class AddProductController extends CoreController{

    public function addProduct(){
        
        $this->show('main/addProduct');
    }

    public function addProd(){
        $newProduct = new Product();
        $newProduct->setName($_POST['name']);
        $newProduct->setDescription($_POST['description']);
        $newProduct->setPicture($_POST['picture']);
        $newProduct->setPrice(intval($_POST['price']));
        $newProduct->setBrandId(intval($_POST['brandId']));
        $newProduct->setCategoryId(intval($_POST['categoryId']));
        $newProduct->setTypeId(intval($_POST['typeId']));

        Product::insert($newProduct);

        header("location:{$_SERVER['BASE_URI']}/produits");

    }
}