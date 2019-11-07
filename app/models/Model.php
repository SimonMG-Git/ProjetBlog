<?php

namespace App\Models;

require_once('../libraries/Session.php');

abstract class Model {
    protected $bdd;
    protected $table;
    protected $errors = [];
    protected $success = [];


    public function __construct() {
        $this->bdd = \Database::connect();
    }

    /**
     * Récupère un chapitre donné selon l'id pour la page chapter
     */
    public function findById(int $id) : array {
        $reponse = $this->bdd->prepare('SELECT * FROM chapitres WHERE id = ?');
        $reponse->execute([$id]);
        $item = $reponse->fetch();

        return $item;
    }

    public function hydrate($data) {
        foreach($data as $item => $value) {
            if (property_exists($this, $item))  {
                $methode = 'set' . ucfirst($item);
                $this->$methode($value); 
            }
        }
        return $this;
    }

    public function isValid() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(count($this->errors) > 0) {
            \Session::message('Erreur : ', $_POST, $this->errors);
            return false;
        }
        \Session::message('Succès.', $_POST, $this->success);
        return true;
    }
}