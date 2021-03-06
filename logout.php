<?php
Session_start();
Session_destroy();

echo ("<script> alert('Sesión cerrada con éxito'); </script>");

header('Location: index.php');
?>