<?php

session_start();

?>

<header>

    <!-- MENU VISTA MOVIL -->
    <div id="movMenu">
        <img class="logo" src="img/burg.png">
    </div>

    <!-- LOGO -->
    <a href="index.php"><img src="img/logoW.png"></a>

    <?php

    if (empty($_SESSION['nombre'])) {

        echo ("<!-- INICIAR SESION -->
                <div id='iniciarSesion'>
                    <span>Iniciar Sesion</span>
                    <div class='iconUser'><img class='avatar' src='img/user.png'></div>
                </div>");

    }else{
        echo ("<!-- MENU USER -->
                <div id='userInfo'>
                    <span>". $_SESSION['nombre'] ."</span>
                    <div class='iconUser'><img class='avatar' src='img/fatuiI.png'></div>
                </div>");
    }
    ?>

</header>