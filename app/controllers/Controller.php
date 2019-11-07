<?php

namespace App\Controllers;

abstract class Controller {
    protected $modelName;
    protected $model;

    public function __construct() {
        $this->model = new $this->modelName();
    }
}
