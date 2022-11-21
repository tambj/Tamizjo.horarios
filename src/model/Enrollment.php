<?php
class Enrollment
{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getEnrollments()
    {
        $this->db->query('SELECT * FROM enrollment');

        $results = $this->db->resultSet();

        return $results;
    }

    public function findEnrollmentById($id_enrollment)
    {
        $this->db->query('SELECT * FROM enrollment
        WHERE id_enrollment = :id_enrollment');

        $this->db->bind(':id_enrollment', $id_enrollment);

        $row = $this->db->single();

        return $row;
    }


    public function registerEnrollment($data)
    {
        $this->db->query('INSERT INTO enrollment (id_student, id_course, status)
        VALUES (:id_student, :id_course, :status)');

        $this->db->bind(':id_student', $data['id_student']);
        $this->db->bind(':id_course', $data['id_course']);
        $this->db->bind(':status', $data['status']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update($data)
    {
        $this->db->query('UPDATE enrollment SET id_student = :id_student, id_course = :id_course, status = :status
        WHERE id_enrollment = :id_enrollment');

        $this->db->bind(':id_enrollment', $data['id_enrollment']);
        $this->db->bind(':id_student', $data['id_student']);
        $this->db->bind(':id_course', $data['id_course']);
        $this->db->bind(':status', $data['status']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id_enrollment)
    {
        $this->db->query('DELETE FROM enrollment WHERE id_enrollment = :id_enrollment');

        $this->db->bind(':id_enrollment', $id_enrollment);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
