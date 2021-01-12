<?php

namespace App\Controllers;
use App\Models\Product;
class DeleteProductController extends CoreController{
    
    public function see($params){
        
        $productId = $params;
        $product = new Product();
        $dataProduct = $product->find($productId);
        $productControlle = new Product();
       $this->show('main/deleteProduct',['product'=>$dataProduct,'supp'=>$productControlle]);
    }

}