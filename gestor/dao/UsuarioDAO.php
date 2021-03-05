<?php


class UsuarioDAO
{
    private $connection;
    public static $instance = null;

    /**
     * UsuarioDAO constructor.
     */
    public function __construct()
    {
        $this->connection = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    }

    public static function getInstance(){
        if(self::$instance == null){
            self::$instance = new UsuarioDAO();
        }
        return self::$instance;
    }

    /**
     * @param $usuario
     */
    public function insertUsuario($usuario){
        $bulk = new MongoDB\Driver\BulkWrite;
        $bulk->insert(['nombre' => $usuario->getNombre(), 'email' => $usuario->getEmail(), 'password' => $usuario->getPassword(), 'permisos' => $usuario->getPermisos()]);
        $this->connection->executeBulkWrite("Lista.Users", $bulk);
    }

    /**
     * @return \MongoDB\Driver\Cursor
     * @throws \MongoDB\Driver\Exception\Exception
     */
    public function comprobarMail($mail){
        $filter = ['email' => $mail];
        $query = new MongoDB\Driver\Query($filter);
        return $this->connection->executeQuery("Lista.Users", $query);
    }

    /**
     * @return \MongoDB\Driver\Cursor
     * @throws \MongoDB\Driver\Exception\Exception
     */
    public function comprobarUsuario($email, $password){
        $filter = ['email' => $email, 'password' => $password];
        $query = new MongoDB\Driver\Query($filter);
        return $this->connection->executeQuery("Lista.Users", $query);
    }

}