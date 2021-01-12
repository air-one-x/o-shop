<?php


// POINT D'ENTRÉE UNIQUE : 
// FrontController

// inclusion des dépendances via Composer
// autoload.php permet de charger d'un coup toutes les dépendances installées avec composer
// mais aussi d'activer le chargement automatique des classes (convention PSR-4)
require_once __DIR__.'/../vendor/autoload.php';
session_start();
/* ------------
--- ROUTAGE ---
-------------*/


// création de l'objet router
// Cet objet va gérer les routes pour nous, et surtout il va 
$router = new AltoRouter();

// le répertoire (après le nom de domaine) dans lequel on travaille est celui-ci
// Mais on pourrait travailler sans sous-répertoire
// Si il y a un sous-répertoire
if (array_key_exists('BASE_URI', $_SERVER)) {
    // Alors on définit le basePath d'AltoRouter
    $router->setBasePath($_SERVER['BASE_URI']);
    // ainsi, nos routes correspondront à l'URL, après la suite de sous-répertoire
}
// sinon
else {
    // On donne une valeur par défaut à $_SERVER['BASE_URI'] car c'est utilisé dans le CoreController
    $_SERVER['BASE_URI'] = '/';
}

// On doit déclarer toutes les "routes" à AltoRouter, afin qu'il puisse nous donner LA "route" correspondante à l'URL courante
// On appelle cela "mapper" les routes
// 1. méthode HTTP : GET ou POST (pour résumer)
// 2. La route : la portion d'URL après le basePath
// 3. Target/Cible : informations contenant
//      - le nom de la méthode à utiliser pour répondre à cette route
//      - le nom du controller contenant la méthode
// 4. Le nom de la route : pour identifier la route, on va suivre une convention
//      - "NomDuController-NomDeLaMéthode"
//      - ainsi pour la route /, méthode "home" du MainController => "main-home"
$router->map(
    'GET',
    '/',
    [
        'method' => 'home',
        'controller' => '\App\Controllers\MainController'
    ],
    'main-home'
);

/*$router->map('GET','/categories',['controller'=>'\App\Controllers\CategoryController','method'=>'listCategory'],'category-listCategory');*/
$router->map(
    'GET',
    '/categories',
    [
        'method' => 'category',
        'controller' => '\App\Controllers\CategoryController'
    ],
    'ListCategory'
);

$router->map('GET','/produits',['controller'=>'\App\Controllers\ProductsController','method'=>'listProducts'],'products-listProducts');

$router->map('GET','/ajouter-une-categorie',['controller'=>'\App\Controllers\AddCategoryController','method'=>'addCategory'],'addCategory-addCategory');

$router->map('GET','/ajouter-un-produit',['controller'=>'\App\Controllers\AddProductController','method'=>'addProduct'],'addProduct-addProduct');

$router->map('POST','/ajouter-une-categorie',['controller'=>'\App\Controllers\AddCategoryController','method'=>'addCat'],'addCat');

$router->map('POST','/ajouter-un-produit',['controller'=>'\App\Controllers\AddProductController','method'=>'addProd'],'addProd');

$router->map('GET','/modifier-une-categorie/[i:categoryId]',['controller'=>'\App\Controllers\UpdateCategoryController','method'=>'see'],'update');

$router->map('POST','/modifier-une-categorie/[i:categoryId]',['controller'=>'\App\Controllers\UpdateCategoryController','method'=>'update'],'update-products');

$router->map('GET','/modifier-un-produit/[i:productId]',['controller'=>'\App\Controllers\UpdateProductController','method'=>'see'],'update-product');

$router->map('POST','/modifier-un-produit/[i:productId]',['controller'=>'\App\Controllers\UpdateProductController','method'=>'update'],'updateProduct');

$router->map('GET','/supprimer-une-categorie/[i:categorieId]',['controller'=>'\App\Controllers\DeleteCategoryController','method'=>'see'],'delete-categorie');

$router->map('GET','/supprimer-un-produit/[i:productId]',['controller'=>'\App\Controllers\DeleteProductController','method'=>'see'],'delete-product');

$router->map('GET','/connexion',['controller'=>'\App\Controllers\ConnexionController','method'=>'connexion'],'connexion');

$router->map('POST','/connexion',['controller'=>'\App\Controllers\ConnexionController','method'=>'checkConnexion'],'checkConnexion');
$router->map('GET','/deconnexion',['controller'=>'\App\Controllers\ConnexionController','method'=>'deconnexion'],'deconnexion');

$router->map('GET','/inscription',['controller'=>'\App\Controllers\InscriptionController','method'=>'see'],'inscription');

$router->map('POST','/inscription',['controller'=>'\App\Controllers\InscriptionController','method'=>'inscription'],'inscription2');

$router->map('GET','/profile',['controller'=>'App\Controllers\ProfileController','method'=>'see'],'profile');

$router->map('POST','/profile',['controller'=>'App\Controllers\ProfileController','method'=>'update'],'profile-update');

$router->map('GET','/suppression',['controller'=>'App\Controllers\ProfileController','method'=>'supp'],'suppression');

$router->map('GET','/liste-des-utilisateurs',['method'=>'seeUsers','controller'=>'App\Controllers\ProfileController'],'users-list');

$router->map('GET','/selection-categories',['controller'=>'App\Controllers\CategoryController','method'=>'selectCategory'],'select-category');

$router->map('POST','/selection-categories',['controller'=>'App\Controllers\CategoryController','method'=>'categoryHome'],'select-categoryhome');
/* -------------
--- DISPATCH ---
--------------*/

// On demande à AltoRouter de trouver une route qui correspond à l'URL courante
$match = $router->match();

// Ensuite, pour dispatcher le code dans la bonne méthode, du bon Controller
// On délègue à une librairie externe : https://packagist.org/packages/benoclock/alto-dispatcher
// 1er argument : la variable $match retournée par AltoRouter
// 2e argument : le "target" (controller & méthode) pour afficher la page 404
$dispatcher = new Dispatcher($match, '\App\Controllers\ErrorController::err404');
// Une fois le "dispatcher" configuré, on lance le dispatch qui va exécuter la méthode du controller
$dispatcher->dispatch(/*$match['params']*/);
//ICI l'envoi du parametre est réalisé automatiquelent poar le dispatch
