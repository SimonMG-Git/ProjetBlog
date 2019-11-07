<?php
//sessionmessage
class Session {

    public static function message($message, $request, $errors) {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['message'] = [
            'request' => $request,
            'message' => $message,
            'type' => count($errors) > 0 ? 'error' : 'success',
            'errors' => $errors,
        ];
    }

    public static function value($item) {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(isset($_SESSION['message']['request'][$item])) { 
            return $_SESSION['message']['request'][$item];
        };
    }

    public static function unset() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(isset($_SESSION['message']['request'])) {
            foreach($_SESSION['message']['request'] as $key => $var) {
                unset($_SESSION['message']['request'][$key]);
            }
        }
    }
}