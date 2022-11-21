<?php
class Course{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getCourses()
    {
        $this->db->query("SELECT * FROM courses");

        $results = $this->db->resultSet();

        return $results;
    }

    // Metodo para comprobar si un id_course de curso existe en la base de datos
    public function findCourseById($id_course)
    {
        // Preparar query para la base de datos
        $this->db->query('SELECT * FROM courses 
        WHERE id_course = :id_course');

        // agregamos el parametro de id_course a la variable
        $this->db->bind(':id_course', $id_course);

        $row = $this->db->single();

        return $row;

    }

    // Metodo para buscar cursos por nombre
    public function findCourseByName($name)
    {
        // Preparar query para la base de datos
        $this->db->query('SELECT * FROM courses WHERE name = :name');

        // agregamos el parametro de name a la variable
        $this->db->bind(':name', $name);

        // comprobar si el email existe
        if ($this->db->rowCount() > 0) { // comprobar si los resultados recibidos tienen algun match
            return true;
        } else {
            return false;
        }
    }

    public function registerCourse($data)
    {
        $this->db->query('INSERT INTO courses (name, description, date_start, date_end, active) VALUES (:name, :description, :date_start, :date_end, :active)');

        $this->db->bind(':name', $data['name']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':date_start', $data['date_start']);
        $this->db->bind(':date_end', $data['date_end']);
        $this->db->bind(':active', $data['active']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update($data)
    {
        $this->db->query('UPDATE courses SET name = :name, description = :description,
         date_start = :date_start, date_end =:date_end, active = :active  WHERE id_course = :id_course');

        $this->db->bind(':id_course', $data['id_course']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':date_start', $data['date_start']);
        $this->db->bind(':date_end', $data['date_end']);
        $this->db->bind(':active', $data['active']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id_course)
    {

        $this->db->query('DELETE FROM courses WHERE id_course = :id_course');

        $this->db->bind(':id_course', $id_course);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

}