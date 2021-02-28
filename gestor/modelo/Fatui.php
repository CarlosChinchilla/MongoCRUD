<?php

class Fatui
{

    private $id;
    private $nombre;
    private $ataque;
    private $defensa;
    private $velocidad;
    private $tipo;

    /**
     * Fatui constructor.
     * @param $id
     * @param $nombre
     * @param $ataque
     * @param $defensa
     * @param $velocidad
     * @param $tipo
     */
    public function __construct($id="", $nombre = "", $tipo = "", $ataque = "", $defensa = "", $velocidad = "")
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->tipo = $tipo;
        $this->ataque = $ataque;
        $this->defensa = $defensa;
        $this->velocidad = $velocidad;
    }

    /**
     * @return mixed|string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed|string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed|string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed|string $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed|string
     */
    public function getAtaque()
    {
        return $this->ataque;
    }

    /**
     * @param mixed|string $ataque
     */
    public function setAtaque($ataque)
    {
        $this->ataque = $ataque;
    }

    /**
     * @return mixed|string
     */
    public function getDefensa()
    {
        return $this->defensa;
    }

    /**
     * @param mixed|string $defensa
     */
    public function setDefensa($defensa)
    {
        $this->defensa = $defensa;
    }

    /**
     * @return mixed|string
     */
    public function getVelocidad()
    {
        return $this->velocidad;
    }

    /**
     * @param mixed|string $velocidad
     */
    public function setVelocidad($velocidad)
    {
        $this->velocidad = $velocidad;
    }

    /**
     * @return mixed|string
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed|string $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    public function validacionFatui($datos){
        $this->setNombre(addslashes($datos['nombre']));
        $this->setTipo(addslashes($datos['tipo']));
        $this->setAtaque(addslashes($datos['ataque']));
        $this->setDefensa(addslashes($datos['defensa']));
        $this->setVelocidad(addslashes($datos['velocidad']));
    }


    public function insertFatui($fatui)
    {
        FatuiDAO::insertFatui($fatui);
    }

    public function deleteFatui($id)
    {
        FatuiDAO::deleteFatui($id);
    }

    public function updateFatui($fatui)
    {
        FatuiDAO::updateFatui($fatui);
    }

    public function imprimirEntrada($n){

        $n+=1;

        $html = "";

        $html .= "<div class='fatuiEnter'>
                            <div class='imageFatui'><img src='img/fatuiD.png'></div>
                            <div class='dataFatui'>
                                <div class='dataTop'>
                                    <p>Nombre: </p> <label>".$this->nombre."</label>
                                    <p>Tipo: </p> <label>".$this->tipo."</label>
                                </div>
                                <div class='dataBot'>
                                    <p>Ataque: </p> <label>".$this->ataque."</label>
                                    <p>Defensa: </p> <label>".$this->defensa."</label>
                                    <p>Velocidad: </p> <label>".$this->velocidad."</label>
                                </div>
                            </div>
                            <div class='botones'>

                                <a href='?pos=".$n."'><button class='button bList editButton' type='button' value='Editar'
                                        onclick=''>Editar</button></a>

                                <button class='button bList' type='button' value='Eliminar'
                                        onclick='borrarFatui(`". $this->id ."`)'>Eliminar</button>
                            </div>
                        </div>";

        return $html;

    }

}


