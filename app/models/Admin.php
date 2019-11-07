<?php

namespace App\Models;

class Admin extends Model {

    public function count($table) {
        $reponse = $this->bdd->query('SELECT *, COUNT(id) as Nbr FROM ' . $table);
        $reponse->execute();
        $result = $reponse->fetch();

        return $result;
    }

    public function getLastChapter() {
        $reponse = $this->bdd->query('SELECT id, title, SUBSTR(body,1,200) as body FROM chapitres ORDER BY id DESC LIMIT 1');
        $chapitres = $reponse->fetch();

        return $chapitres;
    }

    public function getLastComment() {
        $reponse = $this->bdd->query('SELECT id, id_chapter, author, SUBSTR(body,1,200) as body FROM comments ORDER BY id DESC LIMIT 1');
        $comments = $reponse->fetchAll();

        return $comments;
    }
}