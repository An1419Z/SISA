<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'RegistroAlumnos') {
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
    <link rel="stylesheet" href="Horariogrupo.css">
    <link rel="icon" href="../../Recursos Visuales/Logo.jpg" type="image/x-icon">
</head>
<body>
    <div class="wrapper">
        <header>
            <h1 class="title">SISTEMA INTEGRAL DE SERVICIOS ACADÉMICOS <br> <center>(ALUMNOS)</center> </h1>
            <a href="../Alumno.php" class="In">Inicio</a>
            <a href="../../Index.php" class="logout">Cerrar Sesión</a>
            
        </header>
        <div class="container">
            <table class="tabla-grupo">
                <tr>
                    <th>GRUPOS</th>
                </tr>
                <tr><td>TDM31</td></tr>
                <tr><td><button class="TDM32-button" id="TDM32">TDM32</button></td></tr>
                <tr><td>TDM33</td></tr>
                <tr><td>TRM31</td></tr>
                <tr><td>TRM32</td></tr>
                <tr><td>TRM33</td></tr>
                <tr><td>IRCM31</td></tr>
                <tr><td>IRCM32</td></tr>
                <tr><td>IRCM33</td></tr>
                <tr><td>IDSM31</td></tr>
                <tr><td>IDSM32</td></tr>
                <tr><td>IDSM33</td></tr>
                <tr><td>PIM31</td></tr>
                <tr><td>PIM32</td></tr>
                <tr><td>PIM33</td></tr>
                <tr><td>IPIM31</td></tr>
                <tr><td>IPIM32</td></tr>
                <tr><td>IPIM33</td></tr>
            </table>

            <div>
                <table class="tabla-horarios" id="tableh" style="display: none;">
                    <thead>
                        <tr>
                            <th>HORARIO/DÍAS</th>
                            <th>LUNES</th>
                            <th>MARTES</th>
                            <th>MIERCOLES</th>
                            <th>JUEVES</th>
                            <th>VIERNES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>7:00 - 8:00</td>
                            <td>APLICACIONES WEB</td>
                            <td>SISTEMAS OPERATIVOS</td>
                            <td>CÁLCULO DIFERENCIAL</td>
                            <td>PROBABILIDAD Y ESTADISTICA</td>
                            <td>PROBABILIDAD Y ESTADÍSTICA</td>
                        </tr>
                        <tr>
                            <td>8:00 - 9:00</td>
                            <td>BASE DE DATOS PARA APLICACIONES</td>
                            <td>SISTEMAS OPERATIVOS</td>
                            <td>CÁLCULO DIFERENCIAL</td>
                            <td>PROBABILIDAD Y ESTADISTICA</td>
                            <td>FORMACIÓN SOCIOCULTURAL II</td>
                        </tr>
                        <tr>
                            <td>9:00 - 10:00</td>
                            <td>BASE DE DATOS PARA APLICACIONES</td>
                            <td>BASE DE DATOS PARA APLICACIONES</td>
                            <td>PROBABILIDAD Y ESTADISTICA</td>
                            <td>PROBABILIDAD Y ESTADISTICA</td>
                            <td>CÁLCULO DIFERENCIAL</td>
                        </tr>
                        <tr>
                            <td>10:00 - 11:00</td>
                            <td>INGLÉS III</td>
                            <td>BASE DE DATOS PARA APLICACIONES</td>
                            <td>INGLÉS III</td>
                            <td>CÁLCULO DIFERENCIAL</td>
                            <td>BASE DE DATOS PARA APLICACIONES</td>
                        </tr>
                        <tr>
                            <td>11:00 - 12:00</td>
                            <td>INGLÉS III</td>
                            <td>BASE DE DATOS PARA APLICACIONES</td>
                            <td>INGLÉS III</td>
                            <td>FORMACIÓN SOCIOCULTURAL II</td>
                            <td>BASE DE DATOS PARA APLICACIONES</td>
                        </tr>
                        <tr>
                            <td>12:00 - 1:00</td>
                            <td>APLICACIONES WEB</td>
                            <td>INTEGRADORA</td>
                            <td>SISTEMAS OPERATIVOS</td>
                            <td>APLICACIONES WEB</td>
                            <td>SISTEMAS OPERATIVOS</td>
                        </tr>
                        <tr>
                            <td>1:00 - 2:00</td>
                            <td>APLICACIONES WEB</td>
                            <td>INTEGRADORA</td>
                            <td>APLICACIONES WEB</td>
                            <td>APLICACIONES WEB</td>
                            <td>SISTEMAS OPERATIVOS</td>
                        </tr>
                    </tbody>
                </table>
                <div class="buttons" id="buttons" style="display: none;">
                    <button class="back" id="back">REGRESAR</button>
                </div>
            </div>
            <div class="Logo">
                <img src="../../Recursos Visuales/Logo.jpg" alt="Logo" id="Logo">
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

document.getElementById('TDM32').addEventListener('click', function() {
    document.getElementById('tableh').style.display = 'block';
    document.getElementById('buttons').style.display = 'block';
    document.getElementById('Logo').style.display = 'none';
});

document.getElementById('back').addEventListener('click', function() {    
    document.getElementById('tableh').style.display = 'none';
    document.getElementById('buttons').style.display = 'none';
    document.getElementById('Logo').style.display = 'block';
});

document.querySelector('.modify').addEventListener('click', function(event) {
    event.preventDefault(); // Previene la acción por defecto del enlace
    var mensaje = 'Quieres guardar los cambios?'; // Cambia esto por el mensaje que desees
    var confirmacion = confirm(mensaje);
    if (confirmacion) {
        document.getElementById('tableh').style.display = 'none';
        document.getElementById('buttons').style.display = 'none';
        document.getElementById('Logo').style.display = 'block';
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
