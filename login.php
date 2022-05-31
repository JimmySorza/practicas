<?php session_start();
// Comprobamos si ya tiene una sesion
# Si ya tiene una sesion redirigimos al contenido, para que no pueda
if (isset($_SESSION['usuario'])) {
    header('Location: index.php');
    die();
}
$errores = '';
function write_to_console($data) {
    $console = $data;
    if (is_array($console))
    $console = implode(',', $console);
   
    echo "<script>console.log('Console: " . $console . "' );</script>";
   }
   write_to_console("Hello World!");
   write_to_console([1,2,3]);
// Comprobamos si ya han sido enviado los datos
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = filter_var(
        strtolower($_POST['usuario']),
        FILTER_SANITIZE_STRING
    );
    $password = $_POST['password'];
    // Nos conectamos a la base de datos
    try {
        $conexion = new
            PDO('mysql:host=localhost;dbname=curso_login', 'root', '');
        $password = hash('sha512', $password);
        $statement = $conexion->prepare('SELECT usuario , pass
FROM usuarios WHERE usuario = :usuario AND pass = :password');
        $statement->execute(array(
            ':usuario' => $usuario,
            ':password' => $password
        ));
        $resultado = $statement->fetch();
        write_to_console($usuario);
        write_to_console($password);
        if ($resultado !== false) {
            $_SESSION['usuario'] = $usuario;
            header('Location: index.php');
        } else {
            $errores = '<li>Datos incorrectos</li>';
        }
    } catch (PDOException $e) {
        echo "Error:" . $e->getMessage();
    }
}
require 'views/login.view.php';
