<?php
class Students extends Controller {
    public function __construct(){
        $this->studentModel = $this->model('Student');
    }


    public function index() {

        $students = $this->studentModel->getStudents();
        $data = [
            'title' => 'Alumnos',
            'students' => $students
        ];

        $this->view('/students/index', $data);
    }
    

   
    public function addStudent()
    {
        $data = [
            'title' => 'Nuevo estudiante',
            'name' => '',
            'surname' => '',
            'username' => '',
            'email' => '',
            'telephone' => '',
            'nif' => '',
            'date_registered'=>'',
            'pass' => '',
            'confirmPassword' => '',
            'nameError' => '',
            'surnameError' => '',
            'usernameError' => '',
            'emailError' => '',
            'phoneError' => '',
            'nifError' => '',
            'date_registeredError'=>'',
            'passwordError' => '',
            'confirmPasswordError' => '',
        ];

        //Formulario de registro de estudiante
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST);

            $data = [
                'name' => trim($_POST['name']),
                'surname' => trim($_POST['surname']),
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'telephone' => trim($_POST['telephone']),
                'nif' => trim($_POST['nif']),
                'pass' => trim($_POST['pass']),                
                'nameError' => '',
                'surnameError' => '',
                'usernameError' => '',
                'emailError' => '',
                'phoneError' => '',
                'nifError' => '',
                'date_registeredError'=>'',
                'passwordError' => '',
                'confirmPasswordError' => '',
            ];

            // antes de crear el estudiente, comprobar que no hay errores
            if (empty($data['nameError']) && empty($data['surnameError']) && empty($data['usernameError'])
                && empty($data['emailError']) && empty($data['phoneError']) && empty($data['nifError'])
                && empty($data['passwordError']) && empty($data['confirmPasswordError'])) {

                // Hasheo de contrasena
                $data['pass'] = password_hash($data['pass'], PASSWORD_DEFAULT);

                //registrar al estudiante con el modelo
                if ($this->studentModel->registerStudent($data)) {
                    //Redirigir al login
                    header('location: ' . URLROOT . '/students');
                } else {
                    die('Ha ocurrido algún error, intentalo denuevo.');
                }
            }
        }
        $this->view('students/addStudent', $data);
    }

    public function update($id)
    {
        $student = $this->studentModel->findStudentById($id);
        
        $data = [
            'student' => $student,
            'title' => 'Modificar estudiante',
            'name' => '',
            'surname' => '',
            'username' => '',
            'email' => '',
            'telephone' => '',
            'nif' => '',
            'date_registered'=>'',
            'pass' => '',
            'confirmPassword' => '',
            'nameError' => '',
            'surnameError' => '',
            'usernameError' => '',
            'emailError' => '',
            'phoneError' => '',
            'nifError' => '',
            'date_registeredError'=>'',
            'passwordError' => '',
            'confirmPasswordError' => '',
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST);
            $data = [                
                'id' => $id,
                'name' => trim($_POST['name']),
                'surname' => trim($_POST['surname']),
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'telephone' => trim($_POST['telephone']),
                'nif' => trim($_POST['nif']),
                'pass' => trim($_POST['pass']),                
                'nameError' => '',
                'surnameError' => '',
                'usernameError' => '',
                'emailError' => '',
                'phoneError' => '',
                'nifError' => '',
                'date_registeredError'=>'',
                'passwordError' => '',
                'confirmPasswordError' => '',
            ];

            // antes de crear el usuario, comprobar que no hay errores
            if (empty($data['idError']) && empty($data['id_courseError']) && empty($data['id_scheduleError'])
                && empty($data['nameError']) && empty($data['colorError'])) {

                //registrar al usuario con el modelo
                if ($this->studentModel->update($data)) {
                    //Redirigir al index de cursos
                    header('location: ' . URLROOT . '/students');
                } else {
                    die('Algo ha ido mal, vuelvelo a intentar mas tarde');
                }
            } else {
                $this->view('student/update/', $data);
            }
        }
        $this->view('students/update', $data);
    }



    

    public function delete($id)
    { 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if ($this->studentModel->delete($id)) {
                header('location: ' . URLROOT . '/students');

            } else {
                die('Ha habido algun problema al borrar el estudiante, vuelve a intentarlo.');
            }
        }


    }

    public function login() {

        $students = $this->studentModel->getStudents();
        $data = [
            'title' => 'Alumnos',
            'students' => $students
        ];

        $this->view('/students/login', $data);
    }


}