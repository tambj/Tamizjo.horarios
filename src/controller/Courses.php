<?php
class Courses extends Controller
{
    public function __construct()
    {
        // Llamar al modelo para recibir los datos en el controlador
        $this->courseModel = $this->model('Course');
    }

    public function index()
    {
        $courses = $this->courseModel->getCourses();
        $data = [
            'title' => 'Cursos',
            'courses' => $courses
        ];
        

        $this->view('courses/index', $data);
    }

    public function addCourse()
    {

        $data = [            
            'title' => 'Nuevo curso',
            'name' => '',
            'description' => '',
            'date_start' => '',
            'date-end' => '',
            'active' => '',
            'nameError' => '',
            'descriptionError' => '',
            'date_startError' => '',
            'date_endError' => '',
            'activeError' => '',
        ];

        // formulario de registro
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST);
            $data = [
                'name' => trim($_POST['name']),
                'description' => trim($_POST['description']),
                'date_start' => trim($_POST['date_start']),
                'date_end' => trim($_POST['date_end']),
                'active' => trim($_POST['active']),
                'nameError' => '',
                'descriptionError' => '',
                'date_startError' => '',
                'date_endError' => '',
                'activeError' => '',
            ];

           
            // antes de crear el curso, comprobar que no estan vacios
            if (empty($data['nameError']) && empty($data['descriptionError']) && empty($data['date_startError'])
                && empty($data['date_endError'])) {

                //registrar el curso
                if ($this->courseModel->registerCourse($data)) {
                    //Redirigir al index de cursos
                    header('location: ' . URLROOT . '/courses/index');
                } else {
                    die('Problema registrando Curso, Vueve a intentarlo');
                }
            } else {
                $this->view('courses/addCourse', $data);
            }
        }
        $this->view('courses/addCourse', $data);
    }

    public function update($id_course)
    {
        $course = $this->courseModel->findCourseById($id_course);

        $data = [
            'title' => 'Modificar curso',
            'course' => $course,
            'name' => '',
            'description' => '',
            'date_start' => '',
            'date_end' => '',
            'active' => '',
            'nameError' => '',
            'descriptionError' => '',
            'date_startError' => '',
            'date_endError' => '',
            'activeError' => '',
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST);
            $data = [
                'id_course' => $id_course,
                'name' => trim($_POST['name']),
                'description' => trim($_POST['description']),
                'date_start' => trim($_POST['date_start']),
                'date_end' => trim($_POST['date_end']),
                'active' => trim($_POST['active']),
                'nameError' => '',
                'descriptionError' => '',
                'date_startError' => '',
                'date_endError' => '',
                'activeError' => '',
            ];

            $dataValidation = "/^\d{4}\-(0?[1-9]|1[012])\-(0?[1-9]|[12][0-9]|3[01])$/";

            //Validar inputs del usuario
            if (empty($data['name'])) {
                $data['nameError'] = 'Nombre del curso';
            } else if ($this->courseModel->findCourseByName($data['name'])) {
                $data['nameError'] = 'Nombre de curso ya utilizado';
            }

            if (empty($data['description'])) {
                $data['descriptionError'] = 'Descripcion del curso';
            }

            if (empty($data['date_start'])) {
                $data['date_startError'] = 'Fecha de inicio de curso';
            } elseif (!preg_match($dataValidation, $data['date_start'])) {
                $data['date_startError'] = 'Formato Fecha: AAAA-MM-DD. Fecha inicio';
            }

            if (empty($data['date_end'])) {
                $data['date_endError'] = 'Fecha de fin de curso';
            } elseif (!preg_match($dataValidation, $data['date_end'])) {
                $data['date_startError'] = 'Formato Fecha: AAAA-MM-DD. Fecha fin';
            }

            // antes de crear el curso
            if (empty($data['nameError']) && empty($data['descriptionError']) && empty($data['date_startError'])
                && empty($data['date_endError'])) {

                //registrar el curso en el modelo
                if ($this->courseModel->update($data)) {
                    //Redirigir al index de cursos
                    header('location: ' . URLROOT . '/courses/index');
                } else {
                    die('Vuelve a intentarlo, ha habido algun problema');
                }
            } else {
                $this->view('courses/update', $data);
            }
        }

        $this->view('courses/update', $data);

    }

    public function delete($id_course)
    {
        $course = $this->courseModel->findCourseById($id_course);

        $data = [
            'course' => $course,
            'name' => '',
            'description' => '',
            'date_start' => '',
            'date_end' => '',
            'active' => '',
            'nameError' => '',
            'descriptionError' => '',
            'date_startError' => '',
            'date_endError' => '',
            'activeError' => '',
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
             $_POST = filter_input_array(INPUT_POST);

            if ($this->courseModel->delete($id_course)) {
                header('location: ' . URLROOT . '/courses/index');

            } else {
                die('Ha habido un problema borrando el curso,vuelve a intentarlo.');
            }
        }
    }

}