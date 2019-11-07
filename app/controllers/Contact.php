<?php

namespace App\Controllers;

class Contact extends Controller {

    protected $modelName = "App\Models\Contact";

    public function send() {
        $this->model->hydrate($_POST);
        if ($this->model->isValid()){
            $this->model->send();
        }
        header('Location:/contact');
    }
}