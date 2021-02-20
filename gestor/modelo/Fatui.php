<?php

class Fatui
{

    private $nombre;
    private $ataque;
    private $defensa;
    private $velocidad;
    private $tipo;

    /**
     * Fatui constructor.
     * @param $nombre
     * @param $ataque
     * @param $defensa
     * @param $velocidad
     * @param $tipo
     */
    public function __construct($nombre = "", $ataque = "", $defensa = "", $velocidad = "", $tipo = "")
    {
        $this->nombre = $nombre;
        $this->ataque = $ataque;
        $this->defensa = $defensa;
        $this->velocidad = $velocidad;
        $this->tipo = $tipo;
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


    public function insertarFatui($fatui){

        FatuiDAO::insertarFatui($fatui);

    }


}