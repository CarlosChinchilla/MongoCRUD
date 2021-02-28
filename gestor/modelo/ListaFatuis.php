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
        $rows = FatuiDAO::getFatuis();
        foreach ($rows as $document) {
            $fatui = json_decode(json_encode($document),true);
            $id = implode($fatui["_id"]);
            array_push($this->lista,new Fatui($id,$fatui["nombre"],$fatui["tipo"],$fatui["ataque"],$fatui["defensa"],$fatui["velocidad"]));
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
            $html .= $this->lista[$i]->imprimirEntrada($i);
        }

        return $html;
    }
}