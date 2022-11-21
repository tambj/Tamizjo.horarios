<?php

// Controlador principal, carga los models y views

class Controller {

    // Cargar model
    public function model($model){
        require_once '../src/model/' . $model . '.php';
        return new $model();
    }

    // Cargar view
    public function view($view, $data = []){
        if(file_exists('../src/view/' . $view . '.php')){
            require_once '../src/view/' . $view . '.php';
        } else {
            die('La vista no existe');
        }

    }
}