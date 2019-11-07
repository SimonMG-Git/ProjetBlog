<?php
require '../vendor/autoload.php';
require_once('../libraries/Database.php');
require_once('../libraries/Renderer.php');

$method = $_SERVER['REQUEST_METHOD'];

$router = new AltoRouter();

$router->map('GET','/', function() {
    $controller = new App\Controllers\Index();
    $controller->home();
});

$router->map('GET','/home', function() {
    $controller = new App\Controllers\Index();
    $controller->home();
});

$router->map('GET', '/chapter/[i:id]', function($id) {
    $controller = new App\Controllers\Chapitre();
    $controller->show($id);
});

$router->map('POST', '/comments', function() {
    $controller = new App\Controllers\Comment();
    $controller->create();
});

$router->map('GET', '/blog', function () {
    $controller = new App\Controllers\Blog();
    $controller->index();
});

$router->map('GET', '/contact', function() {
    Renderer::render('contact');
});

$router->map('POST', '/contact', function() {
    $controller = new App\Controllers\Contact();
    $controller->send();
});

$router->map('GET', '/inscription', function() {
    Renderer::render('inscription');
});

$router->map('POST', '/inscription', function() {
    $controller = new App\Controllers\User();
    $controller->create();
});

$router->map('GET', '/login', function() {
    Renderer::render('login');
});

$router->map('POST', '/login', function() {
    $controller = new App\Controllers\Auth();
    $controller->connect();
});

$router->map('GET', '/logout', function () {
    $controller = new App\Controllers\Auth();
    $controller->disconnect();
});

$router->map('GET', '/admin/home', function() {
    $controller = new App\Controllers\Admin();
    $controller->home();
});

$router->map('GET', '/admin/chapters', function() {
    $controller = new App\Controllers\Chapitre();
    $controller->list();
});

$router->map('POST', '/chapters/delete/[i:id]', function($id) {
    $controller = new App\Controllers\Chapitre();
    $controller->delete($id);
});

$router->map('GET', '/chapters/edit', function() {
    $controller = new App\Controllers\Chapitre();
    $controller->edit();
});

$router->map('POST', '/chapters/edit/[i:id]', function($id) {
    $controller = new App\Controllers\Chapitre();
    $controller->update($id);
});

$router->map('GET', '/admin/chapters/create', function() {
    $controller = new App\Controllers\Chapitre();
    $controller->create();
});

$router->map('POST', '/chapters', function() {
    $controller = new App\Controllers\Chapitre();
    $controller->store();
});

$router->map('GET', '/admin/comments', function() {
    $controller = new App\Controllers\Comment();
    $controller->list();
});

$router->map('POST', '/comments/[i:id]', function($id) {
    $controller = new App\Controllers\Comment();
    $controller->delete($id);
});

$router->map('POST', '/comments/report', function() {
    $controller = new App\Controllers\Comment();
    $controller->report($id);
});

$router->map('POST', '/comments/approve', function() {
    $controller = new App\Controllers\Comment();
    $controller->unreport($id);
});

$match = $router->match();

// $method = $_SERVER['REQUEST_METHOD'];
// var_dump($router);
// die();

if (is_array($match)) {
    if (is_callable($match['target'])){
        call_user_func_array($match['target'],$match['params']);
    } else {
        $params = $match['params'];
        require  "../Views/{$match['target']}.php";
    }
} else {
    echo '404';
}