<?php
Class Student
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    //Select todos los estudiantes
    public function getStudents()
    {
        $this->db->query('SELECT * FROM students');

        $results = $this->db->resultSet();

        return $results;
    }

    public function registerStudent($data) {
        //Creacion de la query
        $this->db->query('INSERT INTO students (username, pass, email, name, surname, telephone, nif, date_registered) VALUES (:username, :pass, :email, :name, :surname, :telephone, :nif, :date_registered)');

        // asignar los valores a la query
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':pass', $data['pass']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':surname', $data['surname']);
        $this->db->bind(':telephone', $data['telephone']);
        $this->db->bind(':nif', $data['nif']);
        $this->db->bind(':date_registered', date('Y-m-d H:i:s'));

        // control de errores
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function login($username, $password)
    {
        $this->db->bind(':username', $username);

        //contruccionde la consulta
        $this->db->query('SELECT * FROM students  WHERE username = :username');
        $student = $this->db->single();
        /* Comprobar la contrasena  */
        $hashedPwd = $student->pass;

        //Verificacion de la contraseña
        if (password_verify($password, $hashedPwd)) {
            return $student;
        } else {
            return false;
        }

    }
    //Encontrar a un estudiente en bbdd por id
    public function findStudentById($id) {
        //contruccionde la consulta
        $this->db->query('SELECT * FROM students WHERE id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }
    public function findStudentByName($name) {
        //contruccionde la consulta
        $this->db->query('SELECT * FROM student WHERE name = :name');
        $this->db->bind(':name', $name);

        $row = $this->db->single();

        return $row;
    }


    public function findStudentByEmail($email) {
        //contruccionde la consulta
        $this->db->query('SELECT * FROM students WHERE email = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        return $row;
    }

    public function update($data)
    
    {
        $this->db->query('UPDATE students SET surname = :surname, username = :username, email = :email, telephone = :telephone, nif = :nif, pass = :pass WHERE id = :id');
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':surname', $data['surname']);
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':telephone', $data['telephone']);
        $this->db->bind(':nif', $data['nif']);
        $this->db->bind(':pass', $data['pass']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }





    //Delete student
    public function delete($id)
    {

        $this->db->query('DELETE FROM students WHERE id = :id');

        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
 }