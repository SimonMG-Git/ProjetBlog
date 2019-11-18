<?php

namespace App\Controllers;

class Comment extends Controller {

    protected $modelName = "App\Models\Comment";

    /**
     * Insérer un commentaire via le formulaire sur chaque chapitre
     */
    public function create() {
        $this->model->hydrate($_POST);
        if ($this->model->isValid()){
            $this->model->save();
        }

        header('Location:/chapter/' . $_POST['id_chapter']);
    }

    /**
     * Permet de report un commentaire selon son ID
     */
    public function report($id) {
        if ($this->model->isValid()){
            $this->model->report($_POST['comment_id']);
        }
        header('Location:/chapter/' . $_POST['id_chapter']);        
    }

    /**
     * Permet d'unreport un commentaire selon son ID
     */
    public function unreport($id) {
        $this->model->unreport($_POST['comment_id']);
        header('Location:/admin/comments');        
    }

    /** 
     * Récupère tous les commentaires 
     */
    public function list() {
        $comments = $this->model->getAll();

        \Renderer::render('admin_comments', compact('comments'));
    }

    /**
     * Supprime un commentaire selon $id 
     */
    public function delete($id) {
        $this->model->delete($id);
        header('Location:/admin/comments');
    }
}