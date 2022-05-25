<?php

class Cat extends Controller
{
    public function index()
    { 
        $this->view('cat/cat-page');
    }

    public function profile()
    { 
        $this->view('cat/cat-page');
    }

}
