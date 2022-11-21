<?php
class UserAdmin
{

private $db;

public function __construct()
{
$this->db = new Database;
}
//Listar todos los User_Admins
public function getUserAdmins()
{
$this->db->query("SELECT * FROM users_admin");

$results = $this->db->resultSet();

return $results;
}

// Encontrar un useradmin por id
public function findAdminById($id_user_admin)
{
// Preparar query para la base de datos
$this->db->query('SELECT * FROM users_admin WHERE id_user_admin = :id_user_admin');

// agregamos el parametro de id_course a la variable
$this->db->bind(':id_user_admin', $id_user_admin);

$row = $this->db->single();

return $row;

}

// Encontrar por Email
public function findAdminByEmail($email)
{
// Preparar query para la base de datos
$this->db->query('SELECT * FROM users_admin WHERE email = :email');

// agregamos el parametro de name a la variable
$this->db->bind(':email', $email);

// comprobar si el email existe
if ($this->db->rowCount() > 0) { // comprobar si los resultados recibidos tienen algun match
return true;
} else {
return false;
}
}

//Register
public function registerUserAdmin($data)
{
$this->db->query('INSERT INTO users_admin (username, name, email, password) VALUES (:username, :name, :email, :password)');

$this->db->bind(':username', $data['username']);
$this->db->bind(':name', $data['name']);
$this->db->bind(':email', $data['email']);
$this->db->bind(':password', $data['password']);

if ($this->db->execute()) {
return true;
} else {
return false;
}
}
//update
public function update($data)
{
$this->db->query('UPDATE users_admin SET username = :username, name = :name, email = :email, password = :password  WHERE id_user_admin = :id_user_admin');

$this->db->bind(':id_teacher', $data['id_teacher']);
$this->db->bind(':name', $data['name']);
$this->db->bind(':surname', $data['surname']);
$this->db->bind(':telephone', $data['telephone']);
$this->db->bind(':nif', $data['nif']);
$this->db->bind(':email', $data['email']);
$this->db->bind(':user_type', $data['user_type']);

if ($this->db->execute()) {
return true;
} else {
return false;
}
}
//Delete
public function delete($id_user_admin)
{

    $this->db->query('DELETE FROM users_admin WHERE id_user_admin = :id_user_admin');

    $this->db->bind(':id_user_admin', $id_user_admin);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
}


    // Encontrar a un userAdmin  en bbdd por email
    public function findUserAdminByEmail($email) {
        //Contruccion del statement
        $this->db->query('SELECT * FROM users_admin WHERE email = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        return $row;
    }

    // Encontrar a un user admin en bbdd por id
    public function findUserAdminById($id_user_admin) {
        //contruccionde la consulta
        $this->db->query('SELECT * FROM users_admin WHERE id_user_admin = :id_user_admin');
        $this->db->bind(':id_user_admin', $id_user_admin);

        $row = $this->db->single();

        return $row;
    }

}
