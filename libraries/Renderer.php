<?php

class Renderer {
    //Sert à l'affichage
    public static function render(string $path, array $variables = []) {
        extract($variables);
    
        ob_start();
        require '../views/' . $path .'.php';
        $content = ob_get_clean();
    
        ob_start();
        require '../views/layout.php';
        echo ob_get_clean();
    }
}