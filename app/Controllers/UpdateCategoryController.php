<?php

namespace App\Controllers;
use App\Models\Category;


class UpdateCategoryController extends CoreController{

    public function see($params){
        
        $categoryId= $params;
        $category = new Category();
        $dataCategory = $category->find($categoryId);
        $this->show('main/updateCategory',['categoryId'=>$categoryId,'categorie'=>$dataCategory]);
        
    }

   

    public function update($params){
       
        $categoryId= $params;
        $category = new Category();
        $category->setName($_POST['name']);
        $category->setSubtitle($_POST['subtitle']);
        $category->setPicture($_POST['picture']);
        $category->setId($categoryId);
        
        Category::update($category);

        header('location:'.$_SERVER['BASE_URI'].'/categorie');
      


    }
}