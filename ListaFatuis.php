<?php
require "gestor/modelo/Fatui.php";
require "gestor/modelo/ListaFatuis.php";
require_once "gestor/dao/FatuiDAO.php";

$lista = new ListaFatuis();
$lista->getLista();

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