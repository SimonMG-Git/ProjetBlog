<?php

namespace App\Models;

class Contact extends Model {

    protected $sujet;
    protected $email_to = 'mongruel.simon@gmail.com';
    protected $message;

    public function setSujet($sujet) {
        if(empty($sujet)) {
            $this->errors['sujet'] = 'Le sujet ne peut pas être vide';
        }
        $this->sujet = htmlspecialchars($sujet);
    }

    public function setMessage($message) {
        if(empty($message)) {
            $this->errors['message'] = 'Le message ne peut pas être vide';
        }
        $this->message = htmlspecialchars($message);
    }

    /**
     * Envoi un mail depuis la page contact
     */
    public function send() {
        $this->sujet = $_POST['sujet'];
        $this->message = $_POST['message'];
        
        mail($this->email_to, $this->sujet, $this->message);
    }
}