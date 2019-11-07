<?php

namespace App\controllers;

class Admin extends Controller {

    protected $modelName = "App\Models\Admin";

    public function home() {
        $chapterNbr = $this->model->count('chapitres');
        $commentsNbr = $this->model->count('comments');
        $usersNbr = $this->model->count('users');

        $chapitre = $this->model->getLastChapter();
        $comments = $this->model->getLastComment();

        \Renderer::render('admin_home', compact('chapterNbr', 'commentsNbr', 'usersNbr', 'chapitre', 'comments'));
    }
}