<?php
require "gestor/modelo/Fatui.php";
require "gestor/modelo/ListaFatuis.php";
require_once "gestor/dao/FatuiDAO.php";
require "gestor/modelo/funciones.php";

session_start();

$fatui = new Fatui();
$lista = new ListaFatuis();
$lista->getLista();


if(isset($_POST['id']) && !empty($_POST['id'])) {

    $fatui->updateFatui($_POST,$_FILES['imagen']);

    header("Location: ListaFatuis.php");
    exit();
}

if(isset($_GET['busqueda']) && !empty($_GET['busqueda'])) {

    $lista->getListaBusqueda($_GET['busqueda']);

}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    include("includes/head.php");
    ?>
</head>

<body>

<div class="container">

    <?php
    include("includes/login.php");
    ?>

    <div class="main">

        <?php
        include("includes/header.php");
        ?>

        <nav>
            <ul id="navegadorMain">
                <li><a id="homeLink" class="notSelected" href="index.php"><img src="img/home.png"><span>INICIO</span></a></li>
                <li><a id="newLink" class="notSelected" href="NuevoFatui.php"><img src="img/new.png"><span>NUEVO</span></a></li>
                <li><a id="listLink" class="selected" href="ListaFatuis.php"><img src="img/trending.png"><span>FATUIS</span></a></li>
                <?php
                if(!empty($_SESSION['nombre'])){
                    echo("<li><a id='listLink' class='notSelected' href='MisFatuis.php'><img src='img/misfat.png'><span>MIS FATUI</span></a></li>");
                }
                ?>
            </ul>
            <?php
            include("includes/navUser.php");
            ?>
        </nav>

        <section>

            <div id="contenidoList">

                <div id="contenidoPaginaLista">

                    <div class="buscador">
                        <h1>Buscador de <a class="colorAccent">Fatuis</a></h1>
                        <div class="busqueda">
                            <div id="formBuscar">
                                <input class="buscar" type="search" id="busqueda" name="busqueda" placeholder="Nombre de Fatui">
                                <input class="botBusqueda" type="button" value="Buscar" onclick="buscarFatui(document.getElementById('busqueda').value)">
                            </div>
                        </div>
                    </div>

                    <div id="listaFatuis">

                        <?php

                        echo ($lista->imprimirLista());

                        ?>

                    </div>

                </div>

            </div>

        </section>

    </div>

</div>

<?php
include("includes/footer.php");
?>

</body>

</html>