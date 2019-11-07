<?php

namespace App\Models;

class Chapitre extends Model {

    protected $table ="chapitres";
    protected $body;
    protected $title;

    public function setTitle($title) {
        if(empty($title)) {
            $this->errors['title'] = 'Le titre ne peut pas être vide';
        }
        $this->title= htmlspecialchars($title);
    }

    public function setBody($body) {
        
        if(empty($body)) {
            $this->errors['body'] = 'Le chapitre ne peut pas être vide';
        }
        $this->body= htmlspecialchars($body);
    }

    /**
     * Récupère les 3 derniers chapitres pour la page d'accueil
     */
    public function findLast() : array {
        $reponse = $this->bdd->query('SELECT id, title, SUBSTR(body,1,200) as body FROM chapitres ORDER BY id DESC LIMIT 0, 3');
        $chapitres = $reponse->fetchAll();

        return $chapitres;
    }
    
    /**
     * Permet l'édition d'un chapitre selon son ID depuis la page admin_edit
     */
    public function edit($id) {
        $query = $this->bdd->prepare('SELECT * FROM chapitres WHERE id = :id');
        $query->execute(['id' => $id]);
        if ($query->rowCount() === 0) {
            $this->errors['edit'] = 'Le chapitre $id n\'existe pas, vous ne pouvez donc pas l\'éditer !';
        }
        $reponse = $this->bdd->prepare('UPDATE chapitres SET title = :title, body = :body WHERE id = :id');
        $reponse->execute([
            'id' => $id,
            'title'=>$this->title,
            'body'=>$this->body
        ]);
        return $this;
    }
    
    /**
     * Permet l'ajout d'un chapitre via la page adminAddChapter
     */
    public function add() {
        if ($this->id == 0) {
        $reponse = $this->bdd->prepare('INSERT INTO chapitres SET title = :title, body = :body');
        $reponse->execute([
            'body'=>$this->body, 
            'title'=>$this->title
            ]);
        }
    }

    /**
     * Supprime un chapitre selon son ID
     */
    public function delete($id) {
        $query = $this->bdd->prepare('SELECT * FROM chapitres WHERE id = :id');
        $query->execute(['id' => $id]);
        if ($query->rowCount() === 0) {
            $this->errors['delete'] = 'Le chapitre $id n\'existe pas, vous ne pouvez donc pas le supprimer !';
        } else {
            $comment = new Comment();
            $comment->deleteAllOfArticle($id);
            $reponse = $this->bdd->prepare('DELETE FROM chapitres WHERE id = :id');
            $reponse->execute(['id' => $id]);
        }
    }
    
    /**
     * Récupère la liste de tous les chapitres
     */
    public function getAll() : array {
        $reponse = $this->bdd->query('SELECT id, title, SUBSTR(body,1,200) as body FROM chapitres ORDER BY id ASC');
        $chapitres = $reponse->fetchAll();

        return $chapitres;
    }
}