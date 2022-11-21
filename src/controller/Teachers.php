<?php
class Teachers extends Controller
{
    public function __construct()
    {

        $this->teacherModel = $this->model('Teacher');

    }

    public function index()
    {
        $teachers = $this->teacherModel->getTeachers();
        $data = [
            'title' => 'Profesores',
            'teachers' => $teachers,
        ];

        $this->view('teachers/index', $data);
    }

    public function addTeacher()
    {

        $data = [
            'title' => 'Nuevo profesor',
            'name' => '',
            'surname' => '',
            'email' => '',
            'telephone' => '',
            'nif' => '',
            'nameError' => '',
            'surnameError' => '',
            'emailError' => '',
            'telephoneError' => '',
            'nifError' => '',

        ];

        /* Funcion para el formulario de registro */
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST);
            $data = [
                'name' => trim($_POST['name']),
                'surname' => trim($_POST['surname']),

                'email' => trim($_POST['email']),
                'user_type' => trim($_POST['user_type']),
                'telephone' => trim($_POST['telephone']),
                'nif' => trim($_POST['nif']),
                'nameError' => '',
                'surnameError' => '',
                'emailError' => '',
                'telephoneError' => '',
                'nifError' => '',

            ];
            $nameValidation = "/^[a-zA-Z]*$/";
            $passValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

            //Validar inputs del profesor
            if (empty($data['name'])) {
                $data['nameError'] = 'Introduzca su nombre';
            }

            if (empty($data['surname'])) {
                $data['surnameError'] = 'Introduzca su apellido';
            }


            if (empty($data['email'])) {
                $data['emailError'] = 'Introduzca su email';
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['emailError'] = 'Formato incorrecto';
            } else {
                //Comprobar si el email existe
                if ($this->teacherModel->findTeacherByEmail($data['email'])) {
                    $data['emailError'] = 'Este email ya lo tiene asignado un profesor';
                }
            }

            if (empty($data['telephone'])) {
                $data['phoneError'] = 'Introduzca su telefono de contacto';
            }

            if (empty($data['nif'])) {
                $data['nifError'] = 'Introduzca su DNI';
            }



                    // antes de crear el usuario, comprobar que no hay errores
            if (empty($data['nameError']) && empty($data['surnameError']) && empty($data['usernameError'])
                && empty($data['emailError']) && empty($data['phoneError']) && empty($data['nifError']))
            {


                //registrar al profesont con el modelo
                if ($this->teacherModel->registerTeacher($data)) {
                    //Redirigir al login
                    header('location: ' . URLROOT . '/teachers/index');
                } else {
                    die('Ha habido algún problema al crear el profesor, vuelve a intentarlo.');
                }
            }else {
                $this->view('teachers/addTeacher', $data);
            }
        }
        $this->view('teachers/addTeacher', $data);
    }

    public function update($id_teacher)
    {
        $teacher = $this->teacherModel->findTeacherById($id_teacher);

        $data = [
            'title' => 'Modificar profesor',
            'teacher' => $teacher,
            'name' => '',
            'surname' => '',
            'email' => '',
            'telephone' => '',
            'nif' => '',
            'nameError' => '',
            'surnameError' => '',
            'emailError' => '',
            'telephoneError' => '',
            'nifError' => '',


        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST);
            $data = [
                'id_teacher' => $id_teacher,
                'name' => trim($_POST['name']),
                'surname' => trim($_POST['surname']),
                'email' => trim($_POST['email']),

                'telephone' => trim($_POST['telephone']),
                'nif' => trim($_POST['nif']),
                'nameError' => '',
                'surnameError' => '',
                'emailError' => '',
                'telephoneError' => '',
                'nifError' => '',
            ];

            // antes de crear el profesor, comprobar que no hay errores
            if (empty($data['nameError']) && empty($data['surnameError']) && empty($data['usernameError'])
                && empty($data['emailError']) && empty($data['phoneError']) && empty($data['nifError'])
                ) {

                //registrar al profesor con el modelo
                if ($this->teacherModel->update($data)) {
                    //Redirigir al index
                    header('location: ' . URLROOT . '/teachers');
                } else {
                    die('Algo ha ido mal, vuelvelo a intentar mas tarde');
                }
            }else {
                $this->view('teachers/update', $data);
            }
        }
        $this->view('teachers/update', $data);
    }

    public function delete($id)
    {
        $teacher = $this->teacherModel->findTeacherById($id);

        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST);

            if ($this->teacherModel->delete($id)) {
                header('location: ' . URLROOT . '/teachers');

            } else {
                die('Ha habido algun problema al borrar el profesor, vuelve a intentarlo.');
            }
        }


    }

}