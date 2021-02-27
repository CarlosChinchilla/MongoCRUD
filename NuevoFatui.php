<?php
require "gestor/modelo/Fatui.php";

$fatui = new fatui();
if(isset($_POST) && !empty($_POST)) {
    if (!empty($_POST['id'])) { //editar videojuego existente

        //$id = intval($_POST['id']);

        //$fatui->editFatui($id, $_POST,$_FILES['caratula']);

    } else { //insertar nuevo videojuego

        $fatui->insertFatui($_POST);

        header("ListaFatuis.php");

    }
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


    <div class="main">

        <?php
        include("includes/header.php");
        ?>

        <nav>
            <ul id="navegadorMain">
                <li><a id="homeLink" class="notSelected" href="index.php"><img src="img/home.png"><span>INICIO</span></a></li>
                <li><a id="newLink" class="selected" href="NuevoFatui.php"><img src="img/new.png"><span>NUEVO FATUI</span></a></li>
                <li><a id="listLink" class="notSelected" href="ListaFatuis.php"><img src="img/trending.png"><span>MIS FATUIS</span></a></li>
            </ul>
        </nav>

        <section>

            <div id="contenidoNew">

                <h1>Crear nuevo <a class="colorAccent">Fatui</a></h1>

                <div id="form">

                    <form id="formRest" name="newRest" action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">

                        <div>
                            <img src="img/fatuiD.png">
                        </div>

                        <ul>
                            <li><input type="hidden" name="id" value="0"></li>
                            <li><label>Nombre: </label></li>
                            <li><input class="inputs" type="text" name="nombre"
                                       placeholder="Nombre Fatui" onchange=""></li>
                            <li><label>Tipo: </label></li>
                            <li>
                                <select class="inputs" name="tipo">
                                    <option value='Neutro'>Neutro</option>
                                    <option value='Sagrado'>Sagrado</option>
                                    <option value='Profano'>Profano</option>
                                </select>
                            </li>
                            <li><label>Ataque: </label><input class="inputs number" type="number" name="ataque"
                                       placeholder="Ataque del Fatui"value="0" min="0" onchange=""></li>
                            <li><label>Defensa: </label><input class="inputs number" type="number" name="defensa"
                                       placeholder="Defensa del Fatui" value="0" min="0" onchange=""></li>
                            <li><label>Velocidad: </label><input class="inputs number" type="number" name="velocidad"
                                       placeholder="Velocidad del Fatui" value="0" min="0" onchange=""></li>

                            <li><button class="button" type="button" value="Enviar"
                                        onclick="validacion()">Crear Fatui</button></li>
                        </ul>
                    </form>
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