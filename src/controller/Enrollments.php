<?php
class Enrollments extends Controller
{
    public function __construct()
    {
       //Modelo
        $this->enrollmentModel = $this->model('Enrollment');

        $this->courseModel = $this->model('Course');

    }

    // Lista enrollmets
    public function index()
    {
        $enrollments = $this->enrollmentModel->getEnrollments();


        $data = [
            'title' => 'Matrículas',
            'enrollments' => $enrollments,
        ];

        $this->view('enrollments/index', $data);
    }

    public function addEnrollment()
    {

        $data = [
            'title' =>'Nueva matrícula',
            'id_student' => '',
            'id_course' => '',
            'status' => '',
            'id_courseError' => '',
            'id_studentError' => '',
            'statusError' => '',

        ];

        // Funcion para el formulario de registro
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST);
            $data = [
                'id_student' => trim($_POST['id_student']),
                'id_course' => trim($_POST['id_course']),
                'status' => trim($_POST['status']),

                'id_courseError' => '',
                'id_studentError' => '',

            ];

            // antes de crear el enrollment comprobamos errores
            if (empty($data['idError']) && empty($data['id_courseError'])) {

                //registrar el enrollment con el modelo
                if ($this->enrollmentModel->registerEnrollment($data)) {
                    //Redirigir al index de enrollment
                    header('location: ' . URLROOT . '/enrollments');
                } else {
                    die('Ha habido algún problema al registrar el enrollment, vuelva a intentarlo mas tarde');
                }
            } else {
                $this->view('enrollments/addenrollment', $data);
            }
        }
        $this->view('enrollments/addenrollment', $data);
    }

    public function update($id_enrollment)
    {
        $enrollment = $this->enrollmentModel->findEnrollmentById($id_enrollment);

        $data = [
            'title' => 'Modificar matrícula',
            'enrollment' => $enrollment,
            'id_student' => '',
            'id_course' => '',
            'status' => '',
            'id_courseError' => '',
            'id_studentError' => '',
            'statusError' => '',
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST);
            $data = [
                'id_enrollment' => $id_enrollment,
                'id_student' => trim($_POST['id_student']),
                'id_course' => trim($_POST['id_course']),
                'status' => trim($_POST['status']),

                'id_courseError' => '',
                'id_studentError' => '',
                'statusError' => '',
            ];

            // antes de crear el enrollment, comprobar que no hay errores
            if (empty($data['idError']) && empty($data['id_courseError'])) {

                //registrar el enrollment
                if ($this->enrollmentModel->update($data)) {
                    //Redirigir al index de enrollment
                    header('location: ' . URLROOT . '/enrollments');
                } else {
                    die('Ha habido algún problema al guardar el enrollment, vuelva a intentarlo mas tarde');
                }
            } else {
                $this->view('enrollments/update', $data);
            }
        }
        $this->view('enrollments/update', $data);
    }

    public function delete($id_enrollment)
    {
        $enrollment = $this->enrollmentModel->findEnrollmentById($id_enrollment);

        $data = [
            'enrollment' => $enrollment,
            'id' => '',
            'id_course' => '',
            'status' => '',

            'id_courseError' => '',
            'idError' => '',
            'statusError' => '',
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST);

            if ($this->enrollmentModel->delete($id_enrollment)) {
                header('location: ' . URLROOT . '/enrollments/index');

            } else {
                die('Ha habido algún problema al borrar el enrollment, vuelva a intentarlo mas tarde');
            }
        }
    }



}
