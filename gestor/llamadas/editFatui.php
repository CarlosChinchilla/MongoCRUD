<?php
require "../modelo/ListaFatuis.php";
require "../modelo/Fatui.php";
require "../dao/FatuiDAO.php";

$id = ($_GET['id']);

//renovamos la lista
$lista = new ListaFatuis();

$lista->getListaId($id);

echo($lista->imprimirListaEdit());