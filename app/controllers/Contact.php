<?php

namespace App\Controllers;

class Contact extends Controller {

    protected $modelName = "App\Models\Contact";

    /**
     * Permet l'envoi d'un mail via le formulaire de contact
     */
    public function send() {
        $this->model->hydrate($_POST);
        if ($this->model->isValid()){
            $this->model->send();
        }
        header('Location:/contact');
    }
}