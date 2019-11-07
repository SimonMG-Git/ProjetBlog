<?php

namespace App\Models;

class User extends Model {

    protected $username;
    protected $email;
    protected $password;
    protected $password_confirm;
    public $errors = [];

    public function setUsername($username) {
        if(empty($username)) {
            $this->errors['username'] = 'Le champ "pseudo" ne peut pas être vide';
        }
        $this->username = htmlspecialchars($username);
    }

    public function setEmail($email) {
        if(empty($email)) {
            $this->errors['email'] = 'Le champ "email" ne peut pas être vide';
        }
        $this->email = htmlspecialchars($email);
    }

    public function setPassword($password) {
        if(empty($password)) {
            $this->errors['password'] = 'Le champ "mot de passe" ne peut pas être vide';
        }
        $this->password = htmlspecialchars($password);
    }

    public function setPassword_confirm($password_confirm) {
        if(empty($password_confirm)) {
            $this->errors['password'] = 'Le champ "vérification du mot de passe" ne peut pas être vide';
        } elseif ($this->password != $password_confirm) {
            $this->errors['password'] = 'Les mots de passes ne sont pas identiques';
        }
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
    }

    public function save() {
        $reponse = $this->bdd->prepare('INSERT INTO users SET username = :username, email = :email, userpassword = :userpassword');
        $reponse->execute([
            'username'=>$this->username, 
            'email'=>$this->email, 
            'userpassword'=>$this->password
        ]);
    }
}