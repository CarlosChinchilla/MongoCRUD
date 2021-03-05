<?php


class Usuario
{

    private $id;
    private $nombre;
    private $email;
    private $password;
    private $permisos;

    /**
     * Usuario constructor.
     * @param $id
     * @param $nombre
     * @param $email
     * @param $password
     */
    public function __construct($id = "", $nombre = "", $email = "", $password = "", $permisos = "")
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->password = $password;
        $this->permisos = $permisos;
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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed|string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed|string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed|string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed|string
     */
    public function getPermisos()
    {
        return $this->permisos;
    }

    /**
     * @param mixed|string $permisos
     */
    public function setPermisos($permisos)
    {
        $this->permisos = $permisos;
    }

    public function validacionUsuario($datos){
        $this->setNombre(addslashes($datos['nombre']));
        $this->setEmail(addslashes($datos['email']));
        $this->setPassword(addslashes($datos['password']));
        $this->setPermisos(1);
    }

    public function insertUsuario($usuario)
    {
        $this->validacionUsuario($usuario);
        if(!$this->comprobarMail($this->getEmail())){
            UsuarioDAO::getInstance()->insertUsuario($this);
            echo ("<script> alert('Éxito: Usuario registrado correctamente'); </script>");
        }else{
            echo ("<script> alert('Error: Ya existe un usuario registrado con ese Email'); </script>");
        }
    }

    public function comprobarMail($email){
        $rows = UsuarioDAO::getInstance()->comprobarMail($email);
        foreach ($rows as $document) {
            return true;
        }
        return false;
    }

}