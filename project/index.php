<?php
require 'Controller/conexion.php';
$db = new Database();
$con = $db->connectar();

session_start();

if (isset($_POST['cerrar_sesion'])) {
    include_once 'Model/cerrar.php';
}

if (isset($_POST['nombre']) && isset($_POST['cedula'])) {
    $username = $_POST['nombre'];
    $password = $_POST['cedula'];

    $userStatement = $con->prepare('SELECT Nombre, Cedula FROM Gluky_Vibra.Lideres WHERE Nombre=:nombre AND Cedula=:cedula');
    $userStatement->bindParam(':nombre', $username);
    $userStatement->bindParam(':cedula', $password);
    $userStatement->execute();
    $user = $userStatement->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Establecer variables de sesión
        $_SESSION['Nombre'] = $user['Nombre'];
        $_SESSION['Cedula'] = $user['Cedula'];

        // Redirigir al usuario después de establecer las variables de sesión
        header('Location: Model/formulario/formulario.php');
        exit();
    } else {
        $error_message = "Usuario o cédula incorrecto";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap">
    <link rel="stylesheet" type="text/css" href="CSS/login.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
</head>
<style>
    body {
        font-family: 'Montserrat', sans-serif;
    }
</style>
<body>
    <div id="particles-js"></div>
    <form action="index.php" method="post" id="">
        <div class="enlace-container"><img src="IMG/logo2.png" alt="logo" id="logo"></div>
        <h1 class="ini">Iniciar sesión </h1>
        <label for="numDoc">Nombre</label>
        <input type="text" placeholder="" id="numDoc" name="nombre">
        <label for="contra">Cedúla</label>
        <input type="number" placeholder="" id="contra" name="cedula">
        <input type="submit" value="Ingresar">
        <?php
        if (isset($error_message)) {
            echo '<p class="error-message">' . $error_message . '</p>';
        }
        ?>
        <!--<a class="perdimicontra"  href="../Model/registrarse.php"> ¿Aún no tienes cuenta?</a>-->
    </form>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script src="Js/particulas.js"></script>
</body>
</html>
