<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FatuiGenerator</title>
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="js/scripts.js"></script>
    <script type="text/javascript" src="gestor/js/scripts.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="shortcut icon" href="img/fatuiD.png" />

</head>

<body>


<div class="container">

    <div id="modal">
        <form id="login">
            <span id="cerrrarLogin">x</span>
        </form>
    </div>

    <div class="main">

        <?php
        include("includes/header.php");
        ?>

        <?php
        include("includes/nav.php");
        ?>

        <section></section>

    </div>

</div>

<?php
include("includes/footer.php");
?>

</body>

</html>