<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, userscalable=no, initial-scale=1.0, maximum-scale=1.0, minimumscale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,300
' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/estilos.css">
    <title>Login</title>
</head>

<body>
    <div class="contenedor">
        <h1 class="titulo">Iniciar sesión</h1>
        <hr class="border">
        <form class="formulario" name="login" action="<?php
                                                        echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <div class="form-group">
                <i class="icono izquierda fa fa-user"></i><input class="usuario" type="text" name="usuario" placeholder="Usuario">
            </div>
            <div class="form-group">
                <i class="icono izquierda fa fa-lock"></i><input class="password" type="password" name="password" placeholder="Contraseña">
                <i class="submit-btn fa fa-arrow-right" onclick="login.submit()"></i>
            </div>
           
            <!-- Comprobamos si la variable errores esta
seteada, si es asi mostramos los errores -->
            <?php if (!empty($errores)) : ?>
                <div class="error">
                    <ul>
                        <?php echo $errores; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </form>
        <p class="texto-registrate">
            ¿No tienes cuenta ?
            <a href="registrate.php">Registrate</a>
        </p>
    </div>
</body>

</html>