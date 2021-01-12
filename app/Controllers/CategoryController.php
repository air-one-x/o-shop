<?php

namespace App\Controllers;
use App\Models\Category;

/*class CategoryController extends CoreController{

    public function listCategory(){
      $category = new Category();
      $findAllCategory = $category ->findAllHomePage();
      $this->show('main/listCategory',['allCategory'=>$findAllCategory]);
    }*/

class CategoryController extends CoreController {
    public function category(){
        $category = new Category();
        $findAllCategory = $category->findAll();
        $this->show('main/listCategory',['allCategory'=>$findAllCategory]);
    }

    public function selectCategory(){
        $this->show('main/selectCategory');
    }

    public function categoryHome(){
        
        foreach($_POST['emplacement']as $index => $value){
           $result = Category::find($value);
           $result->setHomeOrder($index+1);
           Category::updateHomeOrder($result);
        }
        header('location:'.$_SERVER['BASE_URI']);

    }
}