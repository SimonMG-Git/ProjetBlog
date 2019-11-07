<?php

namespace App\Controllers;

class Index extends Controller {

    protected $modelName = "App\Models\Chapitre";

    /**
     * Récupère les 3 derniers chapitres pour la page d'accueil et les affichent
     */
    public function home() {
        $chapitres = $this->model->findLast();

        \Renderer::render('accueil', compact('chapitres'));
    }
}
