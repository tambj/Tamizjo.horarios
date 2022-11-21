<?php
class Admin extends Controller {
    public function __construct(){
        $this->userAdminsModel = $this->model('UserAdmin');
    }


    public function index() {
        $data = [
            'title' => 'Bienvenidos'
        ];

        $this->view('/admin/index', $data);
    }

    public function login() {
        $data = [
            'title' => 'Bienvenidos'
        ];

        $this->view('/admin/login', $data);
    }


    
    public function registerUserAdmin()
    {
        $data = [
            'name' => '',
            'email' => '',
            'username' => '',
            'password' => '',
            'confirmPassword' => '',
            'nameError' => '',
            'usernameError' => '',
            'emailError' => '',
            'nifError' => '',
            'passwordError' => '',
            'confirmPasswordError' => '',
        ];

        //Formulario de registro de user admins
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

            $data = [
                'name' => trim($_POST['name']),
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'nameError' => '',
                'usernameError' => '',
                'emailError' => '',
                'passwordError' => '',
                'confirmPasswordError' => '',
            ];

            $nameValidation = "/^[a-zA-Z]*$/";
            $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

            //Validar inputs del usuario
            if (empty($data['name'])) {
                $data['nameError'] = 'Introduzca su nombre';
            }


            if (empty($data['username'])) {
                $data['usernameError'] = 'Introduzca un nombre de usuario';
            } elseif (!preg_match($nameValidation, $data['username'])) {
                $data['usernameError'] = 'El nombre de usuario solo puede tener letras';
            } else if ($this->userAdminsModel->findUserAdminByName($data['username'])) {
                $data['usernameError'] = 'Este nombre de usuario no está disponible';
            }

            if (empty($data['email'])) {
                $data['emailError'] = 'Introduzca su email';
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['emailError'] = 'Formato incorrecto';
            } else {
                //Comprobar si el email existe
                if ($this->userAdminsModel->findUserAdminByEmail($data['email'])) {
                    $data['emailError'] = 'Este email no está disponible';
                }
            }

            if (empty($data['password'])) {
                $data['passwordError'] = 'Introduzca una contrasena';
            } elseif (strlen($data['password']) < 6) {
                $data['passwordError'] = 'La contrasena debe ser minimo de 6 caracteres';
            } elseif (preg_match($passwordValidation, $data['password'])) {
                $data['passwordError'] = 'La contrasena debe tener como minimo un valor numerico';
            }

            if (empty($data['confirmPassword'])) {
                $data['confirmPasswordError'] = 'Introduzca la contrasena';
            } else {
                if ($data['password'] != $data['confirmPassword']) {
                    $data['confirmPasswordError'] = 'Las contrasenas no coinciden';
                }
            }

            // antes de crear el estudiente, comprobar que no hay errores
            if (empty($data['nameError']) &&  empty($data['usernameError']) && empty($data['emailError'])  && empty($data['passwordError']) && empty($data['confirmPasswordError'])) {

                // Hasheo de contrasena
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                //registrar al user admin con el modelo
                if ($this->userAdminsModel->registerUserAdmin($data)) {
                    //Redirigir al login
                    header('location: ' . URLROOT . '/userAdmin/login');
                } else {
                    die('Ha habido algun problema al registrar usuario adminintrador, vuelve a intentarlo.');
                }
            }
        }
        $this->view('userAdmin/register', $data);
    }

    public function delete($id_user_admin)
    {
        $teacher = $this->userAdminsModel->findUserAdminById($id_user_admin);

        $data = [
            'name' => '',
            'username' => '',
            'email' => '',
            'password' => '',
            'confirmPassword' => '',
            'nameError' => '',
            'usernameError' => '',
            'emailError' => '',
            'passwordError' => '',
            'confirmPasswordError' => '',

        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

            if ($this->userAdminsModel->delete($id_user_admin)) {
                header('location: ' . URLROOT . '/students/index');

            } else {
                die('Ha habido algun problema al borrar el usuario administrador, vuelve a intentarlo.');
            }
        }


    }



}