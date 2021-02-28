<?php
require "../modelo/ListaFatuis.php";
require "../modelo/Fatui.php";
require "../dao/FatuiDAO.php";

$id = ($_GET['id']);

//echo ($id);

//borrar elemento
$fatui = new Fatui();
$fatui->deleteFatui($id);

//renovamos la lista
$lista = new ListaFatuis();
$lista->getLista();

echo $lista->imprimirLista();