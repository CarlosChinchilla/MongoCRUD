<?php
require "../modelo/ListaFatuis.php";
require "../modelo/Fatui.php";
require "../dao/FatuiDAO.php";

$id = ($_GET['id']);

$lista = new ListaFatuis();

$lista->getListaId($id);

$fh = fopen("../../jsonfatui/".$lista->getArrayLista()[0]->getNombre().".json", 'w')
or die("Error al abrir fichero de salida");
fwrite($fh, json_encode($lista->getArrayLista()[0],JSON_PRETTY_PRINT));
fclose($fh);

$ruta = "jsonfatui/".$lista->getArrayLista()[0]->getNombre().".json";

echo $ruta;
