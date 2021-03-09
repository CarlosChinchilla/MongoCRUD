<?php
require "gestor/modelo/Fatui.php";
require "gestor/modelo/ListaFatuis.php";
require_once "gestor/dao/FatuiDAO.php";
require "gestor/modelo/funciones.php";

session_start();

if(empty($_SESSION['nombre'])){
    header("Location: index.php");
}

$fatui = new Fatui();
$lista = new ListaFatuis();
$lista->getListaIdUsu($_SESSION['id']);

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

if(isset($_POST) && !empty($_POST)) {

    $i = $_POST['idfatui'];

    $mail = new PHPMailer();
    $mail->CharSet = 'UTF-8';

    $mail->IsSMTP();
    //$mail->SMTPDebug = 2;  // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true;  // authentication enabled
    $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
    $mail->SMTPAutoTLS = false;
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->Username = 'galeriart.info@gmail.com';
    $mail->Password = '';

    $mail->isHTML(true);

    //defino el email y nombre del remitente del mensaje
    $mail->SetFrom('galeriart.info@gmail.com', 'FatuiGenerator', 0);

    $adress = $_POST['mail'];
    $mail->addAddress($adress, $_SESSION['nombre']);

    $mail->Subject = "Envío de Fatui";

    $body = $_POST['mensaje'].json_encode($lista->getArrayLista()[$i],JSON_PRETTY_PRINT);

    $mail->MsgHTML($body);

    $fh = fopen("jsonfatui/".$lista->getArrayLista()[$i]->getNombre().".json", 'w')
    or die("Error al abrir fichero de salida");
    fwrite($fh, json_encode($lista->getArrayLista()[$i],JSON_PRETTY_PRINT));
    fclose($fh);

    $mail->AddAttachment($lista->getArrayLista()[$i]->getCarpeta().$lista->getArrayLista()[$i]->getImagen());
    $mail->AddAttachment("jsonfatui/".$lista->getArrayLista()[$i]->getNombre().".json");

    if($mail->Send()) {
        echo ('<script> alert("Mensaje enviado con éxito");</script>');
    } else {
        echo ('<script> alert("Error al enviar el mensaje: '. $mail->ErrorInfo .'");</script>');
    }

}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    include("includes/head.php");
    ?>
    <script src="https://cdn.ckeditor.com/ckeditor5/26.0.0/classic/ckeditor.js"></script>
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
                <li><a id="listLink" class="notSelected" href="ListaFatuis.php"><img src="img/trending.png"><span>FATUIS</span></a></li>
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

            <div id="contenidoSend">

                <h1>Enviar <a class="colorAccent">Fatui</a></h1>

                <form id="formularioEnviar" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                    <ul>
                        <li><label>Email: </label></li>
                        <li><input class="inputs" type="email" name="mail" placeholder="Email"></li>
                        <li><label>Fatui: </label></li>
                        <li>
                            <select class="inputs" name="idfatui">

                                <?php

                                for($i=0;$i<sizeof($lista->getArrayLista());$i++){
                                    echo ("<option value='".$i."'>".$lista->getArrayLista()[$i]->getNombre()."</option>");
                                }

                                ?>

                            </select>
                        </li>
                        <li><label>Mensaje: </label></li>
                        <li><textarea id="editor" name="mensaje"></textarea></li>
                        <li><button class="button" type="button" value="EnviarFatui" onclick="validacionEnviar()">Enviar Fatui</button></li>
                    </ul>
                </form>

                <script>
                    ClassicEditor
                        .create(document.querySelector('#editor'))
                        .catch(error => {
                            console.error(error);
                        });
                </script>

            </div>

        </section>

    </div>

</div>

<?php
include("includes/footer.php");
?>

</body>

</html>