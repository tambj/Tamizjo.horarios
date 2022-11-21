<?php
class UserStudent
{

private $db;

public function __construct()
{
$this->db = new Database;
}
//Listar todos los User_Admins
public function getUserAdmins()
{
$this->db->query("SELECT * FROM students");

$results = $this->db->resultSet();

return $results;
}

// Encontrar un useradmin por id
public function findAdminById($id)
{
// Preparar query para la base de datos
$this->db->query('SELECT * FROM students WHERE id = :id');

// agregamos el parametro de id_course a la variable
$this->db->bind(':id', $id);

$row = $this->db->single();

return $row;

}

// Encontrar por Email
public function findAdminByEmail($email)
{
// Preparar query para la base de datos
$this->db->query('SELECT * FROM students WHERE email = :email');

// agregamos el parametro de name a la variable
$this->db->bind(':email', $email);

// comprobar si el email existe
if ($this->db->rowCount() > 0) { // comprobar si los resultados recibidos tienen algun match
return true;
} else {
return false;
}
}




}
