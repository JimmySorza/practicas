<?php session_start();
// Comprobamos tenga sesion, si no entonces redirigimos y
if(isset($_SESSION['usuario'])) {
header('Location: contenido.php');
die();
} else {
// Enviamos al usuario al formulario de registro
header('Location: registrate.php');
}
?>
