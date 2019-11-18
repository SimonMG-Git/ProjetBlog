<?php

namespace App\Models;

class Admin extends Model {

    /**
     * Récupere le nombre d'entrées d'une $table définie
     */
    public function count($table) {
        $reponse = $this->bdd->query('SELECT *, COUNT(id) as Nbr FROM ' . $table);
        $reponse->execute();
        $result = $reponse->fetch();

        return $result;
    }

    /**
     * Récupère le dernier chapitre pour la page d'accueil du panel admin
     */
    public function getLastChapter() {
        $reponse = $this->bdd->query('SELECT id, title, SUBSTR(body,1,200) as body FROM chapitres ORDER BY id DESC LIMIT 1');
        $chapitres = $reponse->fetch();

        return $chapitres;
    }

    /**
     * Récupère le dernier commentaire pour la page d'accueil du panel admin
     */
    public function getLastComment() {
        $reponse = $this->bdd->query('SELECT id, id_chapter, author, SUBSTR(body,1,200) as body FROM comments ORDER BY id DESC LIMIT 1');
        $comments = $reponse->fetchAll();

        return $comments;
    }
}