<?php

namespace App\Controllers;
use App\Models\Category;

class DeleteCategoryController extends CoreController{

    public function see($params){
        
       $categoryId = $params;
       $category = new Category();
       $categoryControlle = new Category();
       $dataCategory = $category->find($categoryId);
       $this->show('main/deleteCategory',['category'=>$dataCategory,'supp'=>$categoryControlle]);
    }
}