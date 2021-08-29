<?php
    class Pages extends Controller{

        public function __construct(){
            $this->userModel = $this->model('User');

        }

        public function index(){
            $users = $this->userModel->getUsers();
            $data = [
                'title' => 'home page',
                'users' => $users
            ];
            $this->view('pages/index' , $data);
        }

        public function about(){
            $this->view('pages/about');
        }

        public function libraries(){
            $this->view('pages/libraries');
        }
    }
?>