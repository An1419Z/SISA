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
    <link rel="stylesheet" href="Administrativos.css">
    <link rel="icon" href="../Recursos Visuales/Logo.jpg" type="image/x-icon">
</head>
<body>
    <div class="wrapper">
        <header>
            <button id="toggleMenu" class="menu-icon"><span class="signo"></span></button>
            <h1>SISTEMA INTEGRAL DE SERVICIOS ACADÉMICOS <br> <center>(ADMINISTRATIVOS)</center></h1>
            <a href="logout.php" class="logout">Cerrar Sesión</a>
        </header>
        <div class="container" id="container">
            <div class="menu">
                <button class="DISPONIBILIDAD">DISPONIBILIDAD DE SALONES</button>
                <button class="SALONES">AGENDACIÓN DE SALONES</button>
                <button class="REGISTRO">REGISTRAR NUEVO USUARIO</button>
            </div>
            <div class="logo">
                <img src="../Recursos Visuales/Logo.jpg" alt="Logo">
            </div>
            <div class="footer"></div>
        </div>
    </div>
    <script>
        // Confirmación de cierre de sesión
        document.querySelector('.logout').addEventListener('click', function(event) {
            event.preventDefault(); // Previene la acción por defecto del enlace
            var mensaje = '¿Quiere cerrar sesión?'; // Mensaje de confirmación
            var confirmacion = confirm(mensaje);
            if (confirmacion) {
                window.location.href = '../Index.php'; // Redirige al archivo logout.php
            }
        });

        // Navegación a otras páginas
        document.querySelector('.SALONES').addEventListener('click', function(event) {
            window.location.href = 'Agendacion/INDEX.php'; // Redirige a la página de agendación
        });

        document.querySelector('.DISPONIBILIDAD').addEventListener('click', function(event) {
            window.location.href = 'Disponibilidaddesalones/Consultardisponibilidad/IndexDispo.php'; // Redirige a la página de disponibilidad
        });

        document.querySelector('.REGISTRO').addEventListener('click', function(event) {
            window.location.href = '../Inicio/Registro/Registro.php'; // Redirige a la página de registro
        });

        // Toggle del menú
        document.addEventListener('DOMContentLoaded', function(){
            const menu = document.getElementById('container');
            const toggle = document.getElementById('toggleMenu');

            toggle.addEventListener("click", function(){
                if(menu.style.display === "none" || menu.style.display === ""){
                    menu.style.display = "block";
                } else {
                    menu.style.display = "none";
                }
            });
        });

        // Cierre de sesión automático
        let logoutTimer;

        function resetTimer() {
            clearTimeout(logoutTimer);
            logoutTimer = setTimeout(logout, 300000); // 5 minutos de inactividad
        }

        function logout() {
            window.location.href = 'logout.php'; // Redirige al logout.php
        }

        window.onload = resetTimer;
        window.onmousemove = resetTimer;
        window.onkeypress = resetTimer;
        window.onscroll = resetTimer;
    </script>
</body>
</html>
