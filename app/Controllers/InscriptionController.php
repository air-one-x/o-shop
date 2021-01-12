<?php

namespace App\Controllers;

use App\Models\User;

class InscriptionController extends CoreController
{

    public function see()
    {
        
        $this->show('main/inscription');
    }

    public function inscription()
    {
        

        //Contrôle des variables susceptible de rentrer en BDD
        if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['role'])) {

            $email = htmlspecialchars(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL));
            $password = htmlspecialchars(password_hash($_POST['password'], PASSWORD_DEFAULT));
            $prenom = htmlspecialchars(filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING));
            $nom = htmlspecialchars(filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING));
            $role = htmlspecialchars(filter_input(INPUT_POST, 'role', FILTER_SANITIZE_STRING));

            // création d'un nouvel objet que l'on va comparer avec les données existantes en BDD
            $newUser = new User();
            $newUser->setEmail($email);
            $newUser->setPassword($password);
            $newUser->setFirstname($prenom);
            $newUser->setLastName($nom);
            $newUser->setRole($role);

            // test de comparaison avec email en BDD
            $comparaison = User::find($newUser);
            if ($comparaison === false) {
                User::insert($newUser);
                header('location:' . $_SERVER['BASE_URI']);
            } else {
                echo 'L email existe déja';
            }
        } else {
            echo 'Veuillez remplir le ou les champ(s) manquant(s)';
        }
    }
}
