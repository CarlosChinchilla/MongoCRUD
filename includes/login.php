<?php
require "gestor/modelo/Usuario.php";
require "gestor/dao/UsuarioDAO.php";

$usuario = new Usuario();

if(isset($_POST) && !empty($_POST)) {
    if (!empty($_POST['reg'])) {

        $usuario->insertUsuario($_POST);

    }
}
?>

<div id="modal">
    <div id="formLogin">

        <form id="login" name="newUser" action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">

            <h1>Inicia sesión en</h1>
            <img src="img/logoW.png">

            <ul>
                <li><input type='hidden' name='id' value=""></li>

                <li><label>Email </label></li>
                <li><input class='inputs' type='email' name='email'
                           placeholder='Email'></li>

                <li><label>Contraseña </label></li>
                <li><input class='inputs' type='password' name='password'
                           placeholder='Contraseña'></li>

                <div class="registrate"><h3>¿No tienes cuenta?</h3><a id="regButton">¡Registrate!</a></div>

                <li><input type='hidden' name='login' value="1"></li>

                <li><button class='button' type='button' value='Editar'
                            onclick='tryLogin()'>Iniciar sesión</button></li>
            </ul>

        </form>
        <span id="cerrrarLogin">x</span>
    </div>
</div>

<div id="modalReg">
    <div id="formReg">

        <form id="reg" name="regUser" action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">

            <h1>Crea una nueva cuenta en</h1>
            <img src="img/logoW.png">

            <ul>
                <li><input type='hidden' name='id' value=""></li>

                <li><label>Nombre de usuario </label></li>
                <li><input class='inputs' type='text' name='nombre'
                           placeholder='Nombre de usuario'></li>

                <li><label>Email </label></li>
                <li><input class='inputs' type='email' name='email'
                           placeholder='Email'></li>

                <li><label>Contraseña </label></li>
                <li><input class='inputs' type='password' name='password'
                           placeholder='Contraseña'></li>

                <li><label>Repita la contraseña </label></li>
                <li><input class='inputs' type='password' name='password'
                           placeholder='Repetir contraseña'></li>

                <div class="registrate"><h3>¿Ya tienes cuenta?</h3><a id="logButton">¡Inicia sesión!</a></div>

                <li><input type='hidden' name='reg' value="1"></li>

                <li><button class='button' type='button' value='Editar'
                            onclick='validacionRegistro()'>Registrarse</button></li>
            </ul>

        </form>
        <span id="cerrrarReg">x</span>
    </div>
</div>