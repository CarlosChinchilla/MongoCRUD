<?php

class FatuiDAO
{

    private $connection;
    public static $instance = null;


    /**
     * FatuiDAO constructor.
     */
    public function __construct()
    {
        $this->connection = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    }

    public static function getInstance(){
        if(self::$instance == null){
            self::$instance = new FatuiDAO();
        }
        return self::$instance;
    }

    /**
     * @param $fatui
     */
    public function insertFatui($fatui){
        $bulk = new MongoDB\Driver\BulkWrite;
        $bulk->insert(['nombre' => $fatui->getNombre(), 'tipo' => $fatui->getTipo(), 'ataque' => $fatui->getAtaque(), 'defensa' => $fatui->getDefensa(), 'velocidad' => $fatui->getVelocidad(), 'imagen' => $fatui->getImagen(), 'idUsu' => $fatui->getIdUsu()]);
        $this->connection->executeBulkWrite("Lista.Fatuis", $bulk);
    }

    /**
     * @param $id
     */
    public function deleteFatui($id){
        $bulk = new MongoDB\Driver\BulkWrite;
        $filter = ['_id' => new MongoDB\BSON\ObjectId($id)];
        $bulk->delete($filter, ['limit' => 0]);
        $this->connection->executeBulkWrite("Lista.Fatuis", $bulk);
    }

    /**
     * @return \MongoDB\Driver\Cursor
     * @throws \MongoDB\Driver\Exception\Exception
     */
    public function getFatuis(){
        $filter = [];
        $query = new MongoDB\Driver\Query($filter);
        return $this->connection->executeQuery("Lista.Fatuis", $query);
    }

    /**
     * @return \MongoDB\Driver\Cursor
     * @throws \MongoDB\Driver\Exception\Exception
     */
    public function getFatuisBuscar($busqueda){
        $filter = ['nombre' => new MongoDB\BSON\Regex($busqueda)];
        $query = new MongoDB\Driver\Query($filter);
        return $this->connection->executeQuery("Lista.Fatuis", $query);
    }

    /**
     * @return \MongoDB\Driver\Cursor
     * @throws \MongoDB\Driver\Exception\Exception
     */
    public function getFatuisBuscarByIdUsu($busqueda,$idUsu){
        $filter = ['nombre' => new MongoDB\BSON\Regex($busqueda),'idUsu' => $idUsu];
        $query = new MongoDB\Driver\Query($filter);
        return $this->connection->executeQuery("Lista.Fatuis", $query);
    }

    /**
     * @return \MongoDB\Driver\Cursor
     * @throws \MongoDB\Driver\Exception\Exception
     */
    public function getFatuibyId($id){
        $filter = ['_id' => new MongoDB\BSON\ObjectId($id)];
        $query = new MongoDB\Driver\Query($filter);
        return $this->connection->executeQuery("Lista.Fatuis", $query);
    }

    /**
     * @return \MongoDB\Driver\Cursor
     * @throws \MongoDB\Driver\Exception\Exception
     */
    public function getFatuibyIdUsu($idusu){
        $filter = ['idUsu' => $idusu];
        $query = new MongoDB\Driver\Query($filter);
        return $this->connection->executeQuery("Lista.Fatuis", $query);
    }

    /**
     * @param $fatui
     */
    public function updateFatui($fatui){
        $bulk = new MongoDB\Driver\BulkWrite;
        $filter = ['_id' => new MongoDB\BSON\ObjectId($fatui->getId())];
        if($fatui->getImagen() != ""){
            $collation = ['$set' => ['nombre' => $fatui->getNombre(), 'tipo' => $fatui->getTipo(), 'ataque' => $fatui->getAtaque(), 'defensa' => $fatui->getDefensa(), 'velocidad' => $fatui->getVelocidad(), 'imagen' => $fatui->getImagen()]];
        }else{
            $collation = ['$set' => ['nombre' => $fatui->getNombre(), 'tipo' => $fatui->getTipo(), 'ataque' => $fatui->getAtaque(), 'defensa' => $fatui->getDefensa(), 'velocidad' => $fatui->getVelocidad()]];
        }
        $bulk->update($filter, $collation);
        $this->connection->executeBulkWrite("Lista.Fatuis", $bulk);
    }
}