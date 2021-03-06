<?php
require "../modelo/ListaFatuis.php";
require "../modelo/Fatui.php";
require "../dao/FatuiDAO.php";
require "../modelo/Usuario.php";
require "../dao/UsuarioDAO.php";

session_start();

$busqueda = ($_GET['busqueda']);
$idUsu = $_SESSION['id'];

//renovamos la lista
$lista = new ListaFatuis();

if($busqueda == ""){
    $lista->getListaIdUsu($idUsu);
}else{
    $lista->getListaBusquedaIdUsu($busqueda,$idUsu);
}

echo $lista->imprimirListaMisFatuis();