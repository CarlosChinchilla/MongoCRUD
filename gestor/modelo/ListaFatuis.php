<?php


class ListaFatuis
{
    private $lista;

    public function __construct(){

        $this->lista = array();

    }

    public function getArrayLista()
    {
        return $this->lista;
    }

    public function getLista(){
        $rows = FatuiDAO::getInstance()->getFatuis();
        foreach ($rows as $document) {
            $fatui = json_decode(json_encode($document),true);
            $id = implode($fatui["_id"]);
            array_push($this->lista,new Fatui($id,$fatui["nombre"],$fatui["tipo"],$fatui["ataque"],$fatui["defensa"],$fatui["velocidad"],$fatui["imagen"]));
        }
    }

    public function getListaBusqueda($busqueda){
        $rows = FatuiDAO::getInstance()->getFatuisBuscar($busqueda);
        foreach ($rows as $document) {
            $fatui = json_decode(json_encode($document),true);
            $id = implode($fatui["_id"]);
            array_push($this->lista,new Fatui($id,$fatui["nombre"],$fatui["tipo"],$fatui["ataque"],$fatui["defensa"],$fatui["velocidad"],$fatui["imagen"]));
        }
    }

    public function getListaId($id){
        $rows = FatuiDAO::getInstance()->getFatuibyId($id);
        foreach ($rows as $document) {
            $fatui = json_decode(json_encode($document),true);
            $id = implode($fatui["_id"]);
            array_push($this->lista,new Fatui($id,$fatui["nombre"],$fatui["tipo"],$fatui["ataque"],$fatui["defensa"],$fatui["velocidad"],$fatui["imagen"]));
        }
    }

    public function imprimirLista(){
        $html = "";

        if(sizeof($this->lista) == 0){
            $html .= "<h1>La base de datos de <a class='colorAccent'>Fatuis</a> está vacía</h1>";
        }else{
            $html .= "<h1>Lista de <a class='colorAccent'>Fatuis</a></h1>";
        }

        for($i=0;$i<sizeof($this->lista);$i++){
            $html .= $this->lista[$i]->imprimirEntrada();
        }

        return $html;
    }

    public function imprimirListaEdit(){
        $html = "";

        for($i=0;$i<sizeof($this->lista);$i++){
            $html .= $this->lista[$i]->imprimirFormEdit();
        }

        return $html;
    }
}