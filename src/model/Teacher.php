<?php
Class Teacher
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    //Select todos los profesores
    public function getTeachers()
    {
        $this->db->query('SELECT * FROM teachers');

        $results = $this->db->resultSet();

        return $results;
    }

    public function registerTeacher($data) {
        //consruccion de la sentencia
        $this->db->query('INSERT INTO teachers ( email, name, surname, telephone, nif) VALUES (:email, :name, :surname, :telephone, :nif)');

        // asignar los valores a la query
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':surname', $data['surname']);
        $this->db->bind(':telephone', $data['telephone']);
        $this->db->bind(':nif', $data['nif']);


        // Ejecucion sentencia
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    // Encontrar a un profesor en bbdd por id
    public function findTeacherById($id_teacher) {
        //contruccionde la consulta
        $this->db->query('SELECT * FROM teachers WHERE id_teacher = :id_teacher');
        $this->db->bind(':id_teacher', $id_teacher);

        $row = $this->db->single();

        return $row;
    }
    // Encontrar a un profesor en bbdd por email
    public function findTeacherByEmail($email) {
        //Contruccion del statement
        $this->db->query('SELECT * FROM teachers WHERE email = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        return $row;
    }

    public function update($data)
    {
        $this->db->query('UPDATE teachers SET name = :name, surname = :surname,
        telephone = :telephone, nif = :nif, email = :email
        WHERE id_teacher = :id_teacher');
        $this->db->bind(':id_teacher', $data['id_teacher']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':surname', $data['surname']);
        $this->db->bind(':telephone', $data['telephone']);
        $this->db->bind(':nif', $data['nif']);
        $this->db->bind(':email', $data['email']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


//Delete teacher
    public function delete($id_teacher)
    {

        $this->db->query('DELETE FROM teachers WHERE id_teacher = :id_teacher');

        $this->db->bind(':id_teacher', $id_teacher);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

}