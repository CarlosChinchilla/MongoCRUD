<?php
require "gestor/modelo/Fatui.php";
require "gestor/modelo/ListaFatuis.php";
require_once "gestor/dao/FatuiDAO.php";
require "gestor/modelo/funciones.php";

$fatui = new Fatui();
$lista = new ListaFatuis();
$lista->getLista();


if(isset($_POST['id']) && !empty($_POST['id'])) {

    $fatui->updateFatui($_POST,$_FILES['imagen']);

    header("Location: ListaFatuis.php");
    exit();
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

    <div id="modalEdit">
            <div id="form">

                <form id="formRestEdit" name="editFat" action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
                </form>
                <span id="cerrrarEdit">x</span>
            </div>
    </div>

    <div class="main">

        <?php
        include("includes/header.php");
        ?>

        <nav>
            <ul id="navegadorMain">
                <li><a id="homeLink" class="notSelected" href="index.php"><img src="img/home.png"><span>INICIO</span></a></li>
                <li><a id="newLink" class="notSelected" href="NuevoFatui.php"><img src="img/new.png"><span>NUEVO FATUI</span></a></li>
                <li><a id="listLink" class="selected" href="ListaFatuis.php"><img src="img/trending.png"><span>MIS FATUIS</span></a></li>
            </ul>
        </nav>

        <section>

            <div id="contenidoList">

                <div id="contenidoPaginaLista">

                    <div class="buscador">
                        <h1>Buscador de <a class="colorAccent">Fatuis</a></h1>
                        <div class="busqueda">
                            <form id="formBuscar" action="ListaFatuis.php" method="get">
                                <input class="buscar" type="search" id="busqueda" name="busqueda" placeholder="Nombre de Fatui">
                                <input class="botBusqueda" type="button" value="Buscar" onclick="buscarFatui(document.getElementById('busqueda').value)">
                            </form>
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