<?php

session_start();

if(empty($_SESSION['nombre'])){
    header("Location: index.php");
}

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

if(isset($_POST) && !empty($_POST)) {

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
    $mail->Password = 'foaoqesvcduxnrdg';

    $mail->isHTML(true);

    //defino el email y nombre del remitente del mensaje
    $mail->SetFrom('galeriart.info@gmail.com', 'FatuiGenerator', 0);

    $adress = $_POST['mail'];
    $mail->addAddress($adress, $_SESSION['nombre']);

    $mail->Subject = "Envío de Fatui";

    $body = $_POST['mensaje'];

    $mail->MsgHTML($body);

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

                <h1>Enviar <a class="colorAccent">Email</a></h1>

                <form id="formularioEnviar" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                    <ul>
                        <li><label>Email: </label></li>
                        <li><input class="inputs" type="email" name="mail" placeholder="Email"></li>
                        <li><label>Mensaje: </label></li>
                        <li><textarea id="editor" name="mensaje"></textarea></li>
                        <li><button class="button" type="button" value="EnviarFatui" onclick="validacionEnviar()">Enviar Email</button></li>
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