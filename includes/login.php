<?php
require "gestor/modelo/Usuario.php";
require "gestor/dao/UsuarioDAO.php";

$usuario = new Usuario();

if(isset($_POST) && !empty($_POST)) {
    if (!empty($_POST['reg'])) {

        $usuario->insertUsuario($_POST);

    }
}
if (isset($_POST['login']) && !empty($_POST['login'])) {

    $email = addslashes($_POST['email']);
    $password = addslashes($_POST['password']);

    if ($usuario->comprobarLogin($email, $password)) {
        //el usuario existe
        session_start();
        $_SESSION['id'] = $usuario->getId();
        $_SESSION['nombre'] = $usuario->getNombre();
        $_SESSION['email'] = $usuario->getEmail();
        $_SESSION['permisos'] = $usuario->getPermisos();
        session_write_close();

        echo ("<script> alert('Bienvenido '" . $_SESSION['nombre'] ."); </script>");

        header('Location: index.php');
    }else{
        echo ("<script> alert('Error: No existe esa combinaciín de email/contraseña.'); </script>");
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
                            onclick='validacionLogin()'>Iniciar sesión</button></li>
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