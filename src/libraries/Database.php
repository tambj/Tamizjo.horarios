<?php


class Database
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $name = DB_NAME;

    private $stmt;
    private $dbHandler;
    private $error;

    public function __construct()
    {
        $conn = 'mysql:host=' . $this->host . ';dbname=' . $this->name;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        //Creacion del PDO
        try {
            $this->dbHandler = new PDO($conn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    //Preparacion de las queries
    public function query($sql) {
        $this->stmt = $this->dbHandler->prepare($sql);
    }

    //Valores
    public function bind($parameter, $value, $type = null) {
        switch (is_null($type)) {
            case is_int($value):
                $type = PDO::PARAM_INT;
                break;
            case is_bool($value):
                $type = PDO::PARAM_BOOL;
                break;
            case is_null($value):
                $type = PDO::PARAM_NULL;
                break;
            default:
                $type = PDO::PARAM_STR;
        }
        $this->stmt->bindValue($parameter, $value, $type);
    }

    //Ejecución del prepared statement
    public function execute() {
        return $this->stmt->execute();
    }

    // Devolder  el result set en un array de objetos
    public function resultSet() {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Devuelve una fila de una tabla como un objeto
    public function single() {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    // Recibir el count
    public function rowCount() {
        return $this->stmt->rowCount();
    }




}