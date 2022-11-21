<?php
class Classes extends Controller
{
    public function __construct()
    {
        // Llamar al modelo para recibir los datos en el controlador
        $this->claseModel = $this->model('Clase');
        $this->userModel = $this->model('Teacher');
        $this->courseModel = $this->model('Course');
        $this->scheduleModel = $this->model('Schedule');
    }

    //Listar todas las clases
    public function index()
    {
        $classes = $this->claseModel->findAllClasses();


        $data = [
            'title' => 'Clases',
            'classes' => $classes

        ];

        $this->view('classes/index', $data);
    }

    public function addClass()
    {

        $data = [
            'title' => 'Nueva clase',
            'id_class' => '',
            'id_teacher' => '',
            'id_course' => '',
            'id_schedule' => '',
            'name' => '',
            'color' => '',
            'idError' => '',
            'id_courseError' => '',
            'id_scheduleError' => '',
            'nameError' => '',
            'colorError' => '',
        ];

        /* Funcion para el formulario de registro */
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST);
            $data = [
                'id_teacher' => trim($_POST['id_teacher']),
                'id_course' => trim($_POST['id_course']),
                'id_schedule' => trim($_POST['id_schedule']),
                'name' => trim($_POST['name']),
                'color' => trim($_POST['color']),
                'idError' => '',
                'id_courseError' => '',
                'id_scheduleError' => '',
                'nameError' => '',
                'colorError' => '',
            ];


            //Validar inputs del usuario
            if (empty($data['id_teacher'])) {
                $data['idError'] = 'Introduzca el id del profesor';
            } else if (!$this->userModel->findTeacherById($data['id_teacher'])) {
                $data['idError'] = 'Este usuario no existe';
            } 
            // antes de crear el usuario, comprobar que no hay errores
            if (empty($data['idError']) && empty($data['id_courseError']) && empty($data['id_scheduleError'])
                && empty($data['nameError']) && empty($data['colorError'])) {

                //registrar al usuario con el modelo
                if ($this->claseModel->update($data)) {
                    //Redirigir al index de cursos
                    header('location: ' . URLROOT . '/classes');
                } else {
                    die('Algo ha ido mal, vuelvelo a intentar mas tarde');
                }
            } else {
                $this->view('classes/update/', $data);
            }
        }
        $this->view('classes/update', $data);
    }


    public function delete($id_class)
    {        

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            if ($this->claseModel->delete($id_class)) {
                header('location: ' . URLROOT . '/classes');

            } else {
                die('Algo ha ido mal, vuelvelo a intentar mas tarde');
            }
        }
    }



}