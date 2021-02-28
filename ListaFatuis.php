<?php
require "gestor/modelo/Fatui.php";
require "gestor/modelo/ListaFatuis.php";
require_once "gestor/dao/FatuiDAO.php";

$formEdit = false;

$fatui = new Fatui();
$lista = new ListaFatuis();
$lista->getLista();

if(isset($_GET['pos']) && !empty($_GET['pos'])){

    $position = $_GET['pos'] - 1;

    $fatui = $lista->getArrayLista()[$position];

    $formEdit = true;

}

if(isset($_POST) && !empty($_POST)) {

    $fatui->updateFatui($_POST);

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

                    <div>
                        <img src="img/fatuiD.png">
                    </div>

                    <ul>
                        <li><input type="hidden" name="id" value="<?php echo($fatui->getId()) ?>"></li>
                        <li><label>Nombre: </label></li>
                        <li><input class="inputs" type="text" name="nombre"
                                   placeholder="Nombre Fatui" value="<?php echo($fatui->getNombre()) ?>"></li>
                        <li><label>Tipo: </label></li>
                        <li>
                            <select class="inputs" name="tipo"">
                                <option value="<?php echo($fatui->getTipo()) ?>" selected><?php echo($fatui->getTipo()) ?> (Actual)</option>
                                <option value='Neutro'>Neutro</option>
                                <option value='Sagrado'>Sagrado</option>
                                <option value='Profano'>Profano</option>
                            </select>
                        </li>
                        <li><label>Ataque: </label><input class="inputs number" type="number" name="ataque"
                                                          placeholder="Ataque del Fatui"value="<?php echo($fatui->getAtaque()) ?>" min="0" onchange=""></li>
                        <li><label>Defensa: </label><input class="inputs number" type="number" name="defensa"
                                                           placeholder="Defensa del Fatui" value="<?php echo($fatui->getDefensa()) ?>" min="0" onchange=""></li>
                        <li><label>Velocidad: </label><input class="inputs number" type="number" name="velocidad"
                                                             placeholder="Velocidad del Fatui" value="<?php echo($fatui->getVelocidad()) ?>" min="0" onchange=""></li>

                        <li><button class="button" type="button" value="Editar"
                                    onclick="validacionEditar()">Editar Fatui</button></li>
                    </ul>

                    <span id="cerrrarEdit">x</span>
                </form>
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

if($formEdit){

    echo "<script> abrirEditar() </script>";

}

include("includes/footer.php");
?>

</body>

</html>