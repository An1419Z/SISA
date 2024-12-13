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
    <link rel="stylesheet" href="AdministrarTu.css">
    <link rel="icon" href="../../Recursos Visuales/Logo.jpg" type="image/x-icon">

</head>
<body>
    <div class="wrapper">
        <header>
            <button id="toggleMenu" class="menu-icon"><span class="signo"></span></button>
            <h1 class="titulo">SISTEMA INTEGRAL DE SERVICIOS ACADÉMICOS <br> <center>(ADMINISTRATIVOS)</center> </h1>
            <a href="../Administrativos.html" class="In">Inicio</a>
            <a href="../../Index.php" class="logout">Cerrar Sesión</a>
            
        </header>
        <div class="container" id="container">
            <div class="menu">
                <button class="tutores">TUTORES ASIGNADOS</button>
                <button class="asignar"> ASIGNAR TUTOR</button>
            </div>
            <div class="logo">
                <img src="../../Recursos Visuales/Logo.jpg" alt="Logo">
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
        window.location.href = '../../Index.php'; // Asegúrate de que esta es la página a la que quieres redirigir
    }
});

document.querySelector('.tutores').addEventListener('click', function(event) {
    event.preventDefault(); // Prevents the default action of the button
    window.location.href = 'Tutores/Tutores.html'; // Redirects to the agendacion.html page
});

document.querySelector('.asignar').addEventListener('click', function(event) {
    event.preventDefault(); // Prevents the default action of the button
    window.location.href = 'Asignar/Asignar.html'; // Redirects to the agendacion.html page
});

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
