<?php
require "../modelo/ListaFatuis.php";
require "../modelo/Fatui.php";
require "../dao/FatuiDAO.php";

session_start();

$idUsu = ($_GET['idUsu']);
$id = ($_GET['id']);
$carpeta = ($_GET['carpeta']);
$imagen = ($_GET['imagen']);

//echo ($id);

//borrar elemento
$fatui = new Fatui();
$fatui->deleteFatui($id,$carpeta,$imagen);

//renovamos la lista
$lista = new ListaFatuis();
$lista->getListaIdUsu($idUsu);

echo $lista->imprimirListaMisFatuis();