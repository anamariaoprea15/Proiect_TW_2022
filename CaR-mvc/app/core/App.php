<?php

class App{

    protected $controller = 'home';
    protected $method = 'index';

    protected $paramas = [];

    public function __construct()
    {
        $url = $this->parseUrl(); //array including controller, method, params

        if(file_exists('../app/controllers/'. $url[0] . '.php')){
            $this->controller = $url[0];
            unset($url[0]);
        }

        //require default home if controller does not exist
        require_once '../app/controllers/'. $this->controller . '.php';
        
        $this->controller = new $this->controller;

        if(isset($url[1])){
            if(method_exists($this->controller, $url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        $this->params = $url ? array_values($url) : [];

        // calls method dynamicly from controller with params
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    // give the different path from the url
    // give controller, method and params
    public function parseUrl(){

        if(isset($_GET['url'])){

            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
            
        }
    }
}