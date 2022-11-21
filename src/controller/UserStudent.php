<?php
class UserStudent extends Controller {
    public function __construct(){
        $this->userStudentModel = $this->model('UserStudent');
    }


    public function index() {
        $data = [
            'title' => 'Bienvenido'
        ];

        $this->view('/student/index', $data);
    }

    public function login() {
        $data = [
            'title' => 'Bienvenido'
        ];

        $this->view('/student/login', $data);
    }


}