<?php
require "../modelo/ListaFatuis.php";
require "../modelo/Fatui.php";
require "../dao/FatuiDAO.php";

$id = ($_GET['id']);
$carpeta = ($_GET['carpeta']);
$imagen = ($_GET['imagen']);

//echo ($id);

//borrar elemento
$fatui = new Fatui();
$fatui->deleteFatui($id,$carpeta,$imagen);

//renovamos la lista
$lista = new ListaFatuis();
$lista->getLista();

echo $lista->imprimirLista();