<?php

namespace App\controllers;

class Blog extends Controller {

    protected $modelName = "App\Models\Chapitre";

    /**
     * Récupère tous les chapitres et les affichent
     */
    public function index() {
        $chapitres = $this->model->getAll();

        \Renderer::render('blog', compact('chapitres', 'chapitre'));
    }
}