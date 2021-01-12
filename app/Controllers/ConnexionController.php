<?php

namespace App\Controllers;

use App\Models\User;

class ConnexionController extends CoreController
{

    public function connexion()
    {
        $this->checkConnexionUser();
        $this->show('main/connexion');
    }

    public function checkConnexion()
    {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {

            $email = htmlspecialchars(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL));
            $mdp = htmlspecialchars(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
            $mdpHash= password_hash($mdp,PASSWORD_DEFAULT);


            $test = new User();
            $test->setEmail($email);
            $test->setPassword($mdp);
            $userBdd = User::find($test);
            


            if ($userBdd != false) {
                if (password_verify($mdp,$userBdd->getPassword())) {
                    
                    $_SESSION['USER'] = $userBdd;
                    header('location:'.$_SERVER['BASE_URI']);
                   
                    
                } else {
                    echo 'le mot de passe ne correspond pas';
                }
            } else {
                echo "l'utilisateur n'existe pas";
            }
        } else {
            echo 'Veuillez saisir le ou les champs manquant(s)';
        }
    }

    public function deconnexion()
    {
        $this->checkConnexion();
        $this->show('main/deconnexion');
    }
}
