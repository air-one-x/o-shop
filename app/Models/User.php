<?php

namespace App\Models;
use PDO;
class User extends CoreModel{
    private $email;
    private $password;
    protected $firstname;
    private $lastname;
    private $role;
    private $status;

    


    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of firstName
     */ 
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */ 
    public function setFirstname($firstName)
    {
        $this->firstname = $firstName;

        return $this;
    }

    /**
     * Get the value of lastName
     */ 
    public function getLastName()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */ 
    public function setLastName($lastName)
    {
        $this->lastname = $lastName;

        return $this;
    }

    /**
     * Get the value of role
     */ 
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @return  self
     */ 
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    public static function find($objet){
        $bdd = new PDO('mysql:host=localhost;dbname=oshop;charset=utf8','oshop','oshop',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING));
        $req = $bdd->prepare('SELECT * FROM `app_user` WHERE `email`=:email');
        $req->execute([
            ':email'=>$objet->getEmail()
        ]);
        $resultat = $req->fetchObject('\App\Models\User');

        return $resultat;
        
    }

    public static function insert($objet){
        $bdd = new PDO('mysql:host=localhost;dbname=oshop','oshop','oshop',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING));
        $req = $bdd->prepare('INSERT INTO app_user(`email`,`password`,`firstname`,`lastname`,`role`)VALUES(:email, :password, :firstname, :lastname, :role)');
        $req->execute([
            ':email'=>$objet->getEmail(),
            ':password'=>$objet->getPassword(),
            ':firstname'=>$objet->getFirstname(),
            ':lastname'=>$objet->getLastName(),
            ':role'=>$objet->getRole()
        ]);
    }

    public static function update($objet){
        $bdd = new PDO('mysql:host=localhost;dbname=oshop;charset=utf8','oshop','oshop',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING));
        $req = $bdd->prepare('UPDATE `app_user` SET `email`=:email, `password`=:password, `firstname`=:firstname, `lastname`=:lastname, `role`=:role WHERE id=:id');
        $req->execute([
            ':email'=>$objet->getEmail(),
            ':password'=>$objet->getPassword(),
            ':firstname'=>$objet->getFirstname(),
            ':lastname'=>$objet->getLastName(),
            ':role'=>$objet->getRole(),
            ':id'=>$objet->getId()

        ]);
    }

    public static function delete($objet){
        $bdd = new PDO('mysql:host=localhost;dbname=oshop','oshop','oshop',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING));
        $req = $bdd->prepare('DELETE FROM `app_user` WHERE id = :id');
        $req->execute([
            ':id'=>$objet->getId()
        ]);
    }

    public function findAll(){
        $bdd = new PDO('mysql:host=localhost;dbname=oshop;charset=utf8','oshop','oshop',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING));
        $req = $bdd->query('SELECT * FROM `app_user`');
        $allUsers = $req->fetchAll(PDO::FETCH_CLASS, 'App\Models\User');
        return $allUsers;
    }

  
}