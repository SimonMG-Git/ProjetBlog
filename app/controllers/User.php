<?php

namespace App\Controllers;

class User extends Controller {

    protected $modelName = "\Models\User";

    /**
     * Insérer un utilisateur via le formulaire d'inscription
     */
    public function create() {
        $this->model->hydrate($_POST);
        if ($this->model->isValid()){
            $this->model->save();
            header('Location: /home');
        } else {
            header('Location: /inscription');
        }
    }
}