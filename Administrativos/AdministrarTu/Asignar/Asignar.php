<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'RegistroAdministrativos') {
    header('Location: ../../Index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Integral de Servicios Académicos</title>
    <link rel="stylesheet" href="Asignar.css">
    <link rel="icon" href="../../../Recursos Visuales/Logo.jpg" type="image/x-icon">
</head>
<body>
    <div class="wrapper">
        <header>
            <h1 class="titulo">SISTEMA INTEGRAL DE SERVICIOS ACADÉMICOS <br> <center>(ADMINISTRATIVOS)</center> </h1>
            <a href="../../Administrativos.html" class="In">Inicio</a>
            <a href="../../../Index.php" class="logout">Cerrar Sesión</a>
            
        </header>
        <div class="container">
            <div class="login-container">
                <form class="login-form" onsubmit="handleLogin(event)">
                    <p>NOMBRE</p>
                    <input type="text" style="text-align: center;" id="nombre">
                    <p>GRUPO</p>
                    <input type="text" id="grupo">
                    <br>
                    <button type="submit" class="re" id="re">REGISTRAR</button>
                    <hr>
                    <button type="submit" class="reg" id="reg">REGRESAR</button>
                </form>
            </div>
            
            <div class="footer"></div>
        </div>
    </div>
    <script>
        document.querySelector('.logout').addEventListener('click', function(event) {
    event.preventDefault(); // Previene la acción por defecto del enlace
    var mensaje = 'Quiere cerrar sesión?'; // Cambia esto por el mensaje que desees
    var confirmacion = confirm(mensaje);
    if (confirmacion) {
        window.location.href = '../../../Index.php'; // Asegúrate de que esta es la página a la que quieres redirigir
    }
});

document.querySelector('.reg').addEventListener('click', function(event) {
    event.preventDefault(); // Prevents the default action of the button
    window.location.href = '../AdministrarTu.html'; // Redirects to the agendacion.html page
});

document.querySelector('.re').addEventListener('click', function(event) {
    event.preventDefault(); // Previene la acción por defecto del enlace
    var mensaje = 'Quiere jugar los cambios?'; // Cambia esto por el mensaje que desees
    var confirmacion = confirm(mensaje);
    if (confirmacion) {
    }
});
        let logoutTimer;

        function resetTimer() {
            clearTimeout(logoutTimer);
            logoutTimer = setTimeout(logout, 300000); // 300,000 ms = 5 minutos
        }

        function logout() {
            window.location.href = '../Index.php'; // Redirige al logout.php
        }

        window.onload = resetTimer;
        window.onmousemove = resetTimer;
        window.onkeypress = resetTimer;
        window.onscroll = resetTimer;
    </script>
</body>
</html>
