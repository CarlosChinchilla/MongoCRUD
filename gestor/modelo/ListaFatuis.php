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
            array_push($this->lista,new Fatui($id,$fatui["nombre"],$fatui["tipo"],$fatui["ataque"],$fatui["defensa"],$fatui["velocidad"],$fatui["imagen"],$fatui["idUsu"]));
        }
    }

    public function getListaBusqueda($busqueda){
        $rows = FatuiDAO::getInstance()->getFatuisBuscar($busqueda);
        foreach ($rows as $document) {
            $fatui = json_decode(json_encode($document),true);
            $id = implode($fatui["_id"]);
            array_push($this->lista,new Fatui($id,$fatui["nombre"],$fatui["tipo"],$fatui["ataque"],$fatui["defensa"],$fatui["velocidad"],$fatui["imagen"],$fatui["idUsu"]));
        }
    }

    public function getListaBusquedaIdUsu($busqueda,$idUsu){
        $rows = FatuiDAO::getInstance()->getFatuisBuscarByIdUsu($busqueda,$idUsu);
        foreach ($rows as $document) {
            $fatui = json_decode(json_encode($document),true);
            $id = implode($fatui["_id"]);
            array_push($this->lista,new Fatui($id,$fatui["nombre"],$fatui["tipo"],$fatui["ataque"],$fatui["defensa"],$fatui["velocidad"],$fatui["imagen"],$fatui["idUsu"]));
        }
    }

    public function getListaId($id){
        $rows = FatuiDAO::getInstance()->getFatuibyId($id);
        foreach ($rows as $document) {
            $fatui = json_decode(json_encode($document),true);
            $id = implode($fatui["_id"]);
            array_push($this->lista,new Fatui($id,$fatui["nombre"],$fatui["tipo"],$fatui["ataque"],$fatui["defensa"],$fatui["velocidad"],$fatui["imagen"],$fatui["idUsu"]));
        }
    }

    public function getListaIdUsu($idusu){
        $rows = FatuiDAO::getInstance()->getFatuibyIdUsu($idusu);
        foreach ($rows as $document) {
            $fatui = json_decode(json_encode($document),true);
            $id = implode($fatui["_id"]);
            array_push($this->lista,new Fatui($id,$fatui["nombre"],$fatui["tipo"],$fatui["ataque"],$fatui["defensa"],$fatui["velocidad"],$fatui["imagen"],$fatui["idUsu"]));
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

    public function imprimirListaMisFatuis(){
        $html = "";

        if(sizeof($this->lista) == 0){
            $html .= "<h1>La base de datos de <a class='colorAccent'>Fatuis</a> está vacía</h1>";
        }else{
            $html .= "<h1>Mis <a class='colorAccent'>Fatuis</a></h1>";
        }

        for($i=0;$i<sizeof($this->lista);$i++){
            $html .= $this->lista[$i]->imprimirEntradaPorId();
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