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

                <div id="listaFatuis">

                    <div class="fatuiEnter">

                        <div class="imageFatui"><img src="img/fatuiD.png"></div>
                        <div class="dataFatui">

                            <div class="dataTop">

                                <p>Nombre: </p> <label>Nombre</label>

                                <p>Tipo: </p> <label>Tipo</label>

                            </div>

                            <div class="dataBot">

                                <p>Ataque: </p> <label>0</label>

                                <p>Defensa: </p> <label>0</label>

                                <p>Velocidad: </p> <label>0</label>

                            </div>

                        </div>
                        <div class="botones">

                            <button class="button bList" type="button" value="Enviar"
                                    onclick="">Editar</button>

                            <button class="button bList" type="button" value="Enviar"
                                    onclick="">Eliminar</button>

                        </div>

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