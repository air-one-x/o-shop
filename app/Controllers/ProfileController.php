<?php

namespace App\Controllers;
use App\Models\User;
class ProfileController extends CoreController{

    public function see(){
       
       
        $userControle = new User();
        $userControle->setEmail($_SESSION['USER']->getEmail());
        $user= User::find($userControle);
        $this->show('main/profile',['user'=>$user]);
       
        

    }

    public function update(){
        
        $userControle = new User();
        $userControle->setEmail($_SESSION['USER']->getEmail());
        $user= User::find($userControle);
        $user->setEmail($_POST['email']);
        $user->setPassword(password_hash($_POST['password'],PASSWORD_DEFAULT));
        $user->setFirstName($_POST['prenom']);
        $user->setLastName($_POST['nom']);
        $user->setRole($_POST['role']);
        User::update($user);
        header('location:'.$_SERVER['BASE_URI'].'/profile');
    }

    public function supp(){
        
        $userControle = new User();
        $userControle->setEmail($_SESSION['USER']->getEmail());
        $user= User::find($userControle);

        $this->show('main/suppression',['user'=>$user,'supp'=>$userControle]);
    }

    public function seeUsers(){
        
        $allUsers = User::findAll();
        $this->show('main/users',['users'=>$allUsers]);

    }
}