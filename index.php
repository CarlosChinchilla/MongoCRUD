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
                <li><a id="homeLink" class="selected" href="index.php"><img src="img/home.png"><span>INICIO</span></a></li>
                <li><a id="newLink" class="notSelected" href="NuevoFatui.php"><img src="img/new.png"><span>NUEVO FATUI</span></a></li>
                <li><a id="listLink" class="notSelected" href="ListaFatuis.php"><img src="img/trending.png"><span>MIS FATUIS</span></a></li>
            </ul>
        </nav>

        <section>

            <div id="contenidoMain">

                <img class="logoWeb" src="img/logoW.png">

                <div class="textMain">

                    <h1>¿Qué es <a class="colorAccent">FatuiGenerator</a>?</h1>
                    <p><a class="colorAccent">FatuiGenerator</a> es el generador y Gestor de Fatuis.</p>
                    <p>Los <a class="colorAccent">Fatui</a> son los enemigos principales que te encuentras en tu aventura del videojuego <a class="colorAccent">"Down to Heaven"</a>.</p>

                    <img class="logoGame" src="img/DawnToHeavenLogo.png">
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