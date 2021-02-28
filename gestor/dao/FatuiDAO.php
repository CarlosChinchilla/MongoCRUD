<?php

class FatuiDAO
{

    /**
     * @param $fatui
     */
    public static function insertFatui($fatui){
        $connection = new MongoDB\Driver\Manager("mongodb://localhost:27017");
        $bulk = new MongoDB\Driver\BulkWrite;
        $bulk->insert(['nombre' => $fatui["nombre"], 'tipo' => $fatui["tipo"], 'ataque' => $fatui["ataque"], 'defensa' => $fatui["defensa"], 'velocidad' => $fatui["velocidad"]]);
        $connection->executeBulkWrite("Lista.Fatuis", $bulk);
    }

    /**
     * @param $id
     */
    public static function deleteFatui($id){
        $connection= new MongoDB\Driver\Manager("mongodb://localhost:27017");
        $bulk = new MongoDB\Driver\BulkWrite;
        $filter = ['_id' => new MongoDB\BSON\ObjectId($id)];
        $bulk->delete($filter, ['limit' => 0]);
        $connection->executeBulkWrite("Lista.Fatuis", $bulk);
    }

    /**
     * @return \MongoDB\Driver\Cursor
     * @throws \MongoDB\Driver\Exception\Exception
     */
    public static function getFatuis(){
        $connection= new MongoDB\Driver\Manager("mongodb://localhost:27017");
        $filter = [];
        $query = new MongoDB\Driver\Query($filter);
        return $connection->executeQuery("Lista.Fatuis", $query);
    }

    /**
     * @return \MongoDB\Driver\Cursor
     * @throws \MongoDB\Driver\Exception\Exception
     */
    public static function getFatuisBuscar($busqueda){
        $connection= new MongoDB\Driver\Manager("mongodb://localhost:27017");
        $filter = ['nombre' => $busqueda];
        $query = new MongoDB\Driver\Query($filter);
        return $connection->executeQuery("Lista.Fatuis", $query);
    }

    /**
     * @return \MongoDB\Driver\Cursor
     * @throws \MongoDB\Driver\Exception\Exception
     */
    public static function getFatuibyId($id){
        $connection= new MongoDB\Driver\Manager("mongodb://localhost:27017");
        $filter = ['_id' => new MongoDB\BSON\ObjectId($id)];
        $query = new MongoDB\Driver\Query($filter);
        return $connection->executeQuery("Lista.Fatuis", $query);
    }

    /**
     * @param $fatui
     */
    public static function updateFatui($fatui){
        $connection= new MongoDB\Driver\Manager("mongodb://localhost:27017");
        $bulk = new MongoDB\Driver\BulkWrite;
        $filter = ['_id' => new MongoDB\BSON\ObjectId($fatui["id"])];
        $collation = ['$set' => ['nombre' => $fatui["nombre"], 'ataque' => $fatui["ataque"], 'defensa' => $fatui["defensa"], 'velocidad' => $fatui["velocidad"], 'tipo' => $fatui["tipo"]]];
        $bulk->update($filter, $collation);
        $connection->executeBulkWrite("Lista.Fatuis", $bulk);
    }

}