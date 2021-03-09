<?php

class Fatui implements JsonSerializable
{

    private $id;
    private $nombre;
    private $ataque;
    private $defensa;
    private $velocidad;
    private $tipo;
    private $imagen;
    private $carpeta;
    private $idUsu;

    /**
     * Fatui constructor.
     * @param $id
     * @param $nombre
     * @param $ataque
     * @param $defensa
     * @param $velocidad
     * @param $tipo
     * @param $idUsu
     */
    public function __construct($id="", $nombre = "", $tipo = "", $ataque = "", $defensa = "", $velocidad = "", $imagen = "", $carpeta="", $idUsu="")
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->tipo = $tipo;
        $this->ataque = $ataque;
        $this->defensa = $defensa;
        $this->velocidad = $velocidad;
        $this->imagen = $imagen;
        $this->carpeta = "fatuis/";
        $this->idUsu = $idUsu;
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

    /**
     * @return mixed|string
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * @param mixed|string $imagen
     */
    public function setImagen($imagen)
    {

        if(strlen($this->imagen)==0){
            $this->imagen = "noImage.png";
        }

        $this->imagen = $imagen;
    }

    /**
     * @return string
     */
    public function getCarpeta()
    {
        return $this->carpeta;
    }

    /**
     * @param string $carpeta
     */
    public function setCarpeta($carpeta)
    {
        $this->carpeta = $carpeta;
    }

    /**
     * @return mixed|string
     */
    public function getIdUsu()
    {
        return $this->idUsu;
    }

    /**
     * @param mixed|string $idUsu
     */
    public function setIdUsu($idUsu)
    {
        $this->idUsu = $idUsu;
    }

    public function validacionFatui($datos){
        $this->setNombre(addslashes($datos['nombre']));
        $this->setTipo(addslashes($datos['tipo']));
        $this->setAtaque(addslashes($datos['ataque']));
        $this->setDefensa(addslashes($datos['defensa']));
        $this->setVelocidad(addslashes($datos['velocidad']));
    }

    public function validacionFatuiId($datos){
        $this->setNombre(addslashes($datos['nombre']));
        $this->setTipo(addslashes($datos['tipo']));
        $this->setAtaque(addslashes($datos['ataque']));
        $this->setDefensa(addslashes($datos['defensa']));
        $this->setVelocidad(addslashes($datos['velocidad']));
        $this->setId(addslashes($datos['id']));
    }


    public function insertFatui($fatui,$imagen,$ideUsu)
    {
        $this->validacionFatui($fatui);

        $ruta = subirFoto($imagen, $this->carpeta);

        $this->setImagen($ruta);

        $this->setIdUsu($ideUsu);

        FatuiDAO::getInstance()->insertFatui($this);
    }

    public function deleteFatui($id,$carpeta,$rutaAborrar)
    {
        $carpeta="../../".$carpeta;
        unlink($carpeta.$rutaAborrar);
        FatuiDAO::getInstance()->deleteFatui($id);
    }

    public function updateFatui($fatui,$imagen)
    {
        $this->validacionFatuiId($fatui);

        if($imagen!=""){
            $ruta = subirFoto($imagen, $this->carpeta);
            $this->setImagen($ruta);
        }

        FatuiDAO::getInstance()->updateFatui($this);
    }

    public function imprimirEntrada(){

        if($this->imagen == null){
            $this->imagen = "noImage.png";
        }

        $html = "";

        $html .= "<div class='fatuiEnter'>
                            <div class='imageFatui'><img src='". $this->carpeta . $this->imagen . "'></div>
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
  
                                <button class='button bList ddBut' type='button' value='ddjson'
                                        onclick='ddFatui(`". $this->id ."`)'>Descargar</button>
                            </div>
                        </div>";

        return $html;

    }

    public function imprimirEntradaPorId(){

        $idUsu = $_SESSION['id'];

        if($this->imagen == null){
            $this->imagen = "noImage.png";
        }

        $html = "";

        $html .= "<div class='fatuiEnterBot'>
                            <div class='imageFatui'><img src='". $this->carpeta . $this->imagen . "'></div>
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

                                <button class='button bList editButton ediBut' type='button' value='Editar'
                                        onclick='abrirEditar(`". $this->id ."`)'>Editar</button>

                                <button class='button bList delBut' type='button' value='Eliminar'
                                        onclick='borrarFatui(`". $this->id ."`, `". $this->carpeta ."`,`". $this->imagen ."`,`". $idUsu ."`)'>Eliminar</button>
                                        
                                <button class='button bList ddBut' type='button' value='ddjson'
                                        onclick='ddFatui(`". $this->id ."`)'>Descargar</button>
                            </div>
                        </div>";

        return $html;

    }

    public function imprimirFormEdit(){

        if($this->imagen == null){
            $this->imagen = "noImage.png";
        }

        $html = "";

        $html .= "<div>
                        <img src='". $this->carpeta . $this->imagen . "'>
                    </div>

                    <ul>
                        <li><input type='hidden' name='id' value=".$this->id."></li>
                        <li><label>Nombre: </label></li>
                        <li><input class='inputs' type='text' name='nombre'
                                   placeholder='Nombre Fatui' value=".$this->nombre."></li>
                        <li><label>Tipo: </label></li>
                        <li>
                            <select class='inputs' name='tipo'>
                                <option value=".$this->tipo." selected>".$this->tipo." (Actual)</option>
                                <option value='Neutro'>Neutro</option>
                                <option value='Sagrado'>Sagrado</option>
                                <option value='Profano'>Profano</option>
                            </select>
                        </li>
                        <li><label>Ataque: </label><input class='inputs number' type='number' name='ataque'
                                                          placeholder='Ataque del Fatui' value=".$this->ataque." min='0'></li>
                        <li><label>Defensa: </label><input class='inputs number' type='number' name='defensa'
                                                           placeholder='Defensa del Fatui' value=".$this->defensa." min='0'></li>
                        <li><label>Velocidad: </label><input class='inputs number' type='number' name='velocidad'
                                                             placeholder='Velocidad del Fatui' value=".$this->velocidad." min='0'></li>

                        <li>
                            <label> Imagen: </label>
                            <div class='inputfile-box'>
                                <input type='file' id='file' class='inputfile' name='imagen' onchange='uploadFile(this), validacionFile(this,0)'>
                                <label for='file'>
                                    <span id='file-name' class='file-box'></span>
                                    <span class='file-button'>
                                        <i class='fa fa-upload' aria-hidden='true'></i>
                                        <img src='img/upload.png'>
                                    </span>
                                </label>
                            </div>
                        </li>

                        <li><button class='button' type='button' value='Editar'
                                    onclick='validacionEditar()'>Editar Fatui</button></li>
                    </ul>";

        return $html;

    }

    public function jsonSerialize()
    {
        return
            [
                'nombre' => $this->getNombre(),
                'ataque' => $this->getAtaque(),
                'defensa' => $this->getDefensa(),
                'velocidad' => $this->getVelocidad(),
                'tipo' => $this->getTipo(),
                'imagen' => $this->getImagen()
            ];
    }
}


