<?php
    //load the model and the view
    class Controller {
        public function model($model) {
            require_once '../app/models/' . $model . '.php';
            return new $model;
        }

        public function view($view , $data = []) {
            if(file_exists('../app/views/' . $view . '.php')){
                require_once '../app/views/' . $view . '.php';
            }
            else{
                die("The page you are looking for does not exsist.");
            }
        }

    }