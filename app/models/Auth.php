<?php

namespace App\Models;

class Auth extends Model {

    protected $username;
    protected $userpassword;

    public function setUsername($username) {
        if(empty($username)) {
            $this->errors['username'] = 'Le pseudo ne peut pas être vide';
        }
        $this->username = htmlspecialchars($username);
    }

    public function setUserpassword($userpassword) {
        if(empty($userpassword)) {
            $this->errors['password'] = 'Le mot de passe ne peut pas être vide';
        }
        $this->userpassword = htmlspecialchars($userpassword);
    }

    /**
     * Récupère le ndc et le mdp depuis la table users avec le nom correspondant à celui entré dans le formulaire de login
     * Retourne TRUE si le mdp est identique à celui de la bdd sinon retourne FALSE
     */
    public function verify($username) {
        $reponse = $this->bdd->prepare('SELECT username, userpassword FROM users WHERE username = :username');
        $reponse->bindParam(':username', $username);
        $reponse->execute();
        $data = $reponse->fetch();
        
        if(password_verify($this->userpassword, $data['userpassword']) == false) {
            $this->errors['verification'] = 'Mauvais identifiant ou mot de passe';
            return false;
        } else {
            return true;
        };
    }

    public function logout() {
        session_unset();
        session_destroy();
    }
}