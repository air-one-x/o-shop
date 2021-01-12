<?php

namespace App\Controllers;
use App\Models\Category;

class AddCategoryController extends CoreController{

    public function addCategory(){
        $this->checkAuthorization(['admin','catalog-manager']);
        $this->show('main/addCategory');
    }

    public function addCat(){
        $newCategory = new Category();
        $newCategory->setName($_POST['name']);
        $newCategory->setSubtitle($_POST['subtitle']);
        $newCategory->setPicture($_POST['picture']);

        Category::insert($newCategory);
        
        header("location:{$_SERVER['BASE_URI']}/categories");

    }
}