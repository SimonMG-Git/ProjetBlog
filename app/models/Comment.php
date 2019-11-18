<?php

namespace App\Models;

class Comment extends Model {

    protected $id = 0;
    protected $body;
    protected $id_chapter;
    protected $author;
    protected $report;

    public function setBody($body) {
        if(empty($body)) {
            $this->errors['body'] = 'Le commentaire ne peut pas être vide';
        }
        $this->body = htmlspecialchars($body);
    }

    public function setId_chapter($id) {
        if(empty($id)) {
            $this->errors['id_chapter'] = "Le chapitre n'existe pas";
        }
        $this->id_chapter = htmlspecialchars($id);
    }

    public function setAuthor($author) {
        if(empty($author)) {
            $this->errors['author'] = 'Le champ "auteur" ne peut pas être vide';
        }
        $this->author = htmlspecialchars($author);
    }

    public function setId($id) {
        $this->id= $id;
    }

    /**
     * Récupère les commentaires selon l'id pour la page chapter
     */
    public function find(int $id) : array {
        $reponse = $this->bdd->prepare('SELECT * FROM comments WHERE id_chapter = ? ORDER BY id DESC');
        $reponse->execute([$id]);
        $comments = $reponse->fetchAll();

        return $comments;
    }

    /**
     * Ajouter un commentaire
     */
    public function save() {
        if ($this->id == 0) {
            $reponse = $this->bdd->prepare('INSERT INTO comments SET body = :body, author = :author, id_chapter = :id_chapter');
            $reponse->execute([
                'body'=>$this->body, 
                'author'=>$this->author, 
                'id_chapter'=>$this->id_chapter,
                ]);
        }
    }

    /**
     * Récupère tous les commentaires
     */
    public function getAll() : array {
        $reponse = $this->bdd->query('SELECT id, id_chapter, author, report, SUBSTR(body,1,50) as body FROM comments');
        $comments = $reponse->fetchAll();

        return $comments;
    }

    /**
     * supprimer une commentaire selon son ID
     */
    public function delete($id) {
        $query = $this->bdd->prepare('SELECT * FROM comments WHERE id = :id');
        $query->execute(['id' => $id]);
        if ($query->rowCount() === 0) {
            $this->errors['delete'] = 'Le commentaire n\'existe pas, vous ne pouvez donc pas le supprimer !';
        } else {
            $reponse = $this->bdd->prepare('DELETE FROM comments WHERE id = :id');
            $reponse->execute(['id' => $id]);
        }       
    }

    /**
     * Permets de supprimer les commentaires correspondant à un article
     */
    public function deleteAllOfArticle($articleId) {
        $reponse = $this->bdd->prepare('DELETE FROM comments WHERE id_chapter = :id');
        $reponse->execute(['id' => $articleId]);
    }

    /**
     * Permet de report un commentaire selon son ID
     */
    public function report($id) {
        $query = $this->bdd->prepare('SELECT * FROM comments WHERE id = :id');
        $query->execute(['id' => $id]);
        if ($query->rowCount() === 0) {
            $this->errors['report'] = 'Le commentaire n\'existe pas, vous ne pouvez donc pas le signaler !';
        }
        $reponse = $this->bdd->prepare('UPDATE comments SET report = :report WHERE id = :id');
        $reponse->execute([
            'id' => $id,
            'report'=>1,
        ]);
        return $this;
    }

    /**
     * Permet d'unreport un commentaire selon son ID
     */
    public function unreport($id) {
        $query = $this->bdd->prepare('SELECT * FROM comments WHERE id = :id');
        $query->execute(['id' => $id]);
        if ($query->rowCount() === 0) {
            $this->errors['report'] = 'Le commentaire n\'existe pas, vous ne pouvez donc pas le signaler !';
        }
        $reponse = $this->bdd->prepare('UPDATE comments SET report = :report WHERE id = :id');
        $reponse->execute([
            'id' => $id,
            'report'=>0,
        ]);
    }
}