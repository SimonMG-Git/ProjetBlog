<?php

namespace App\controllers;
use App\Models\Comment;


class Chapitre extends Controller {

    
    protected $modelName = "App\Models\Chapitre";

    /**
     * Récupère une chapitre, puis ses commentaires, puis l'affiche
     */
    public function show($id) {
        $chapitre = $this->model->findById($id);

        $comments = (new Comment())->find($id);
        
        \Renderer::render('chapter', compact('chapitre', 'comments'));
    }

    /**
     * Modifie title et body suite au formulaire selon $id
     */
    public function update() {
        $this->model->hydrate($_POST);
        if ($this->model->isValid()){
            $this->model->edit($_POST['id']);
        }
        header('Location:/admin/chapters');
    }

    /**
     * Renvoie à la page de création d'un chapitre
     */
    public function create() {
        \Renderer::render('admin_add_chapter');
    }

    /**
     * Ajoute un Chapitre
     */
    public function store() {
        $this->model->hydrate($_POST);
        if ($this->model->isValid()){
            $this->model->add();
            header('Location:/admin/chapters');
            die();
        }
        header('Location:/admin/chapters/create');
    }

    /**
     * Supprime un chapitre selon $id
     */
    public function delete($id) {
        $this->model->delete($id);
        header('Location:/admin/chapters');
    }

    /**
     * Récupère tous les chapitres
     */
    public function list() {
        $chapitres = $this->model->getAll();

        \Renderer::render('admin_chapter', compact('chapitres'));
    }

    /**
     * Récupère un chapitre selon son $id pour le modifier sur la page d'édition du panel admin
     */
    public function edit() {
        $chapitre = $this->model->findById($_GET['id']);
        \Renderer::render('admin_edit', compact('chapitre'));
    }
}