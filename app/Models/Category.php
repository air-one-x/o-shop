<?php

namespace App\Models;

use App\Utils\Database;
use PDO;

class Category extends CoreModel {

    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $subtitle;
    /**
     * @var string
     */
    private $picture;
    private $home_order;

    /**
     * Get the value of subtitle
     */ 
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * Set the value of subtitle
     *
     * @return  self
     */ 
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    /**
     * Get the value of picture
     */ 
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set the value of picture
     *
     * @return  self
     */ 
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get the value of home_order
     */ 
    public function getHomeOrder()
    {
        return $this->home_order;
    }

    /**
     * Set the value of home_order
     *
     * @return  self
     */ 
    public function setHomeOrder($home_order)
    {
        $this->home_order = $home_order;

        return $this;
    }

    /**
     * Méthode permettant de récupérer un enregistrement de la table Category en fonction d'un id donné
     * 
     * @param int $categoryId ID de la catégorie
     * @return Category
     */
    public function find($categoryId)
    {
        // se connecter à la BDD
        $pdo = Database::getPDO();

        // écrire notre requête
        $sql = 'SELECT * FROM `category` WHERE `id` =' . $categoryId;

        // exécuter notre requête
        $pdoStatement = $pdo->query($sql);

        // un seul résultat => fetchObject
        $category = $pdoStatement->fetchObject('App\Models\Category');

        // retourner le résultat
        return $category;
    }

    /**
     * Méthode permettant de récupérer tous les enregistrements de la table category
     * 
     * @return Category[]
     */
    public function findAll()
    {
        $pdo = Database::getPDO();
        $sql = 'SELECT * FROM `category` ORDER BY `home_order` ';
        $pdoStatement = $pdo->query($sql);
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'App\Models\Category');
        
        return $results;
    }

    /**
     * Récupérer les 5 catégories mises en avant sur la home
     * 
     * @return Category[]
     */
    public function findAllHomepage()
    {
        $pdo = Database::getPDO();
        $sql = '
            SELECT *
            FROM category
            WHERE home_order > 0
            ORDER BY home_order ASC
        ';
        $pdoStatement = $pdo->query($sql);
        $categories = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'App\Models\Category');
        
        return $categories;
    }

    /**
     * Get the value of name
     *
     * @return  string
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @param  string  $name
     *
     * @return  self
     */ 
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    public static function insert($objet){
        $bdd = new PDO('mysql:host=localhost;dbname=oshop','oshop','oshop',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING));
        $req = $bdd->prepare('INSERT INTO `category`(`name`,`subtitle`,`picture`)VALUES(?,?,?)');
        $req->execute(array(
             $objet->getName(),
             $objet->getSubtitle(),
             $objet->getPicture()
        ));
    }

    public static function update($objet){
        $bdd = new PDO('mysql:host=localhost;dbname=oshop','oshop','oshop',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING));
    $req = $bdd->prepare('UPDATE `category` SET `name`=?, `subtitle`=?, `picture`=? WHERE `id`=?');
    $req->execute(array(
        $objet->getName(),
        $objet->getSubtitle(),
        $objet->getPicture(),
        $objet->getId()
    ));
    }

    public static function deleteTest($objet){
        $bdd = new PDO('mysql:host=localhost;dbname=oshop','oshop','oshop',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING));

        $req = $bdd->prepare('DELETE FROM `category` WHERE `id`= :id');
        $req->execute(array(
            ':id'=>$objet->getId()
        ));
    }

    public function updateHomeOrder($objet){
        $bdd = new PDO('mysql:host=localhost;dbname=oshop','oshop','oshop',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING));
        $req = $bdd->prepare('UPDATE `category` SET `home_order`=:order WHERE id=:id');
        $req->execute([
            ':order'=>$objet->getHomeOrder(),
            ':id'=>$objet->getId()
        ]);
    }


}
