<?php
class Schedules extends Controller
{
    public function __construct()
    {
        // Llamar al modelo para recibir los datos en el controlador
        $this->scheduleModel = $this->model('Schedule');
        $this->claseModel = $this->model('Clase');
    }

    // crear vista
    public function index()
    {
        $schedules = $this->scheduleModel->getSchedules();

        $data = [
            'schedules' => $schedules,
            'title' => 'Horarios'

        ];

        $this->view('schedules/index', $data);
    }

    public function addSchedule()
    {

        $data = [
            'title' => 'Nuevo horario',
            'id_class' => '',
            'time_start' => '',
            'time_end' => '',
            'day' => '',
            'id_classError' => '',
            'time_startError' => '',
            'time_endError' => '',
            'dayError' => '',
        ];

        // Funcion para el formulario de registro de schedule
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST);
            $data = [
                'id_class' => trim($_POST['id_class']),
                'time_start' => trim($_POST['time_start']),
                'time_end' => trim($_POST['time_end']),
                'day' => trim($_POST['day']),
                'id_classError' => '',
                'time_startError' => '',
                'time_endError' => '',
                'dayError' => '',
            ];


            // antes de crear el schedule, comprobar que no estan vacios
            if (empty($data['id_classError']) && empty($data['time_startError'])
                && empty($data['time_endError']) && empty($data['dayError'])) {

                //registrar el schedule  con el modelo
                if ($this->scheduleModel->registerSchedule($data)) {
                    //Redirigir al index de schedule
                    header('location: ' . URLROOT . '/schedules/index');
                } else {
                    die('Ha habido algun problema al registrar el Schedule, por favor vuelve a intentarlo.');
                }
            } else {
                $this->view('schedules/addSchedule', $data);
            }
        }
        $this->view('schedules/addSchedule', $data);

    }


    public function update($id_schedule)
    {
        $schedule = $this->scheduleModel->findScheduleById($id_schedule);

        $data = [
            'title' => 'Modificar horario',
            'schedule' => $schedule,
            'id_class' => '',
            'time_start' => '',
            'time_end' => '',
            'day' => '',
            'id_classError' => '',
            'time_startError' => '',
            'time_endError' => '',
            'dayError' => '',
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST);
            $data = [
                'id_schedule' => $id_schedule,
                'id_class' => trim($_POST['id_class']),
                'time_start' => trim($_POST['time_start']),
                'time_end' => trim($_POST['time_end']),
                'day' => trim($_POST['day']),
                'id_classError' => '',
                'time_startError' => '',
                'time_endError' => '',
                'dayError' => '',
            ];


            // antes de crear el Schedule comprobamos que no estén vacios
            if (empty($data['id_classError']) && empty($data['time_startError'])
                && empty($data['time_endError']) && empty($data['dayError'])) {

                //hacer el update del Schedule
                if ($this->scheduleModel->update($data)) {
                    //Redirigir al index de cursos
                    header('location: ' . URLROOT . '/schedules/index');
                } else {
                    die('Ha habido algun problema al actualizar el Schedule, vuelve e intentarlo mas tarde.');
                }
            } else {
                $this->view('schedules/update', $data);
            }
        }
        $this->view('schedules/update', $data);
    }

    public function delete($id_schedule)
    {
        $schedule = $this->scheduleModel->findScheduleById($id_schedule);

        $data = [
            'schedule' => $schedule,
            'id_class' => '',
            'time_start' => '',
            'time_end' => '',
            'day' => '',
            'id_classError' => '',
            'time_startError' => '',
            'time_endError' => '',
            'dayError' => '',
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST);

            if ($this->scheduleModel->delete($id_schedule)) {
                header('location: ' . URLROOT . '/schedules/index');

            } else {
                die('Ha habido algun problema al borrar el Schedule, vuelve e intentarlo mas tarde.');
            }
        }
    }







}
