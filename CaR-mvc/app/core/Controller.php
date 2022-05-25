<?php

class Controller{

    //method that allows to load in a model
    public function model($model, $params = []){
        require_once '../app/models/'. $model .'.php';
        return new $model(...$params);
    }

    // load view
    public function view($view, $data = []){
        
        require_once '../app/views/' . $view . '.php';
    }
}