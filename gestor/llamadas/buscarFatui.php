<?php
require "../modelo/ListaFatuis.php";
require "../modelo/Fatui.php";
require "../dao/FatuiDAO.php";

$busqueda = ($_GET['busqueda']);

//renovamos la lista
$lista = new ListaFatuis();

if($busqueda == ""){
    $lista->getLista();
}else{
    $lista->getListaBusqueda($busqueda);
}

echo $lista->imprimirLista();