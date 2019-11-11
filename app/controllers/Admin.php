<?php

namespace App\controllers;

class Admin extends Controller {

    protected $modelName = "App\Models\Admin";

    /**
     * Function permettant de compter le nombre de chapitre, commentaires et utilisateurs
     * Et affichage du dernier chapitre et dernier commentaire sur la page d'accueil du panel admin
     */
    public function home() {
        $chapterNbr = $this->model->count('chapitres');
        $commentsNbr = $this->model->count('comments');
        $usersNbr = $this->model->count('users');

        $chapitre = $this->model->getLastChapter();
        $comments = $this->model->getLastComment();

        \Renderer::render('admin_home', compact('chapterNbr', 'commentsNbr', 'usersNbr', 'chapitre', 'comments'));
    }
}