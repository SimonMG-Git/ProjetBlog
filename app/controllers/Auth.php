<?php

namespace App\controllers;

class Auth extends Controller {

    protected $modelName = "App\Models\Auth";

    public function connect() {
        $model = new $this->modelName();
        $model->hydrate($_POST);
        //On vérifie si le formulaire n'a aucun champ vide sinon retour sur la page de login
        if ($model->isValid()){
            //Si il est bien rempli on vérifie que le compte existe dans la bdd sinon retour sur la page de login
            if($model->verify($_POST['username']) == FALSE) {
                header('Location:/login'); 
            } else {
                //Si le compte existe, on connecte l'utilisateur et on renvoie vers la page d'accueil
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['connected'] = TRUE;
                header('Location:/home'); 
            }
        } else {
            header('Location:/login');
        }
    }

    public function disconnect() {
        session_start();
        $model = new $this->modelName();
        $model->logout();
        header('Location:/home'); 
    }
}