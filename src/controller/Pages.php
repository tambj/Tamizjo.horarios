<?php
class Pages extends Controller {
    public function __construct(){

    }

    public function index() {
        $data = [
            'title' => ' ¡ Bienvenidos a Tamizjo.horarios !'
        ];

        $this->view('pages/index', $data);

    }

}
