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
    <link rel="stylesheet" href="Tutores.css">
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
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>TUTOR</th>
                            <th>GRUPO</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Karin Manuel Montelongo Sánchez</td>
                            <td>TDM31</td>
                        </tr>
                        <tr>
                            <td>Felipe Torres Molina</td>
                            <td>TDM32</td>
                        </tr>
                        <tr>
                            <td>Kevin Alexis Zamora Santos</td>
                            <td>TDM33</td>
                        </tr>
                        <tr>
                            <td>Ángel Gabriel Zatarain Sánchez</td>
                            <td>TDM34</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

        <div class="boton1" id="boton1">
            <button class="REGRESAR" id="REGRESAR">REGRESAR</button>
            <button class="MODIFICAR" id="MODIFICAR">MODIFICAR</button>
        </div>
        
        <div class="boton2" id="boton2" style="display: none;">
            <button class="CONFIRMAR" id="CONFIRMAR">ACEPTAR</button>
            <button class="CANCELAR" id="CANCELAR">CANCELAR</button>
        </div>
        
        <div class="footer"></div>
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

document.querySelector('.REGRESAR').addEventListener('click', function(event) {
    event.preventDefault(); // Prevents the default action of the button
    window.location.href = '../AdministrarTu.html'; // Redirects to the agendacion.html page
});

document.getElementById('MODIFICAR').addEventListener('click', function() {
    document.getElementById('boton1').style.display = 'none'; // Hides the MODIFICAR button
    document.getElementById('boton2').style.display = 'block'; // Shows the CONFIRMAR button
});

document.getElementById('CANCELAR').addEventListener('click', function() {
    document.getElementById('boton1').style.display = 'block'; // Shows the MODIFICAR button
    document.getElementById('boton2').style.display = 'none'; // Hides the CONFIRMAR button
});

document.querySelector('.CONFIRMAR').addEventListener('click', function(event) {
    event.preventDefault(); // Previene la acción por defecto del enlace
    var mensaje = 'Quieres guardar los cambios?'; // Cambia esto por el mensaje que desees
    var confirmacion = confirm(mensaje);
    if (confirmacion) {
        document.getElementById('boton1').style.display = 'block'; // Shows the MODIFICAR button
        document.getElementById('boton2').style.display = 'none'; // Hides the CONFIRMAR button
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
