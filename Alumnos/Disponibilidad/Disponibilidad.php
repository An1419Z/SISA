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
    <link rel="stylesheet" href="Disponibilidad.css">
    <link rel="icon" href="../../Recursos Visuales/Logo.jpg" type="image/x-icon">

</head>
<body>
    <div class="wrapper">
        <header>
            <h1 class="title">SISTEMA INTEGRAL DE SERVICIOS ACADÉMICOS <br> <center>(ALUMNOS)</center> </h1>
            <a href="../Alumno.php" class="In">Inicio</a>
            <a href="../../Index.php" class="logout">Cerrar Sesión</a>
            
        </header>
        <div class="containe">
            <div class="container">
                <div class="date-picker">
                    <div class="header">SELECCIONAR FECHA</div>
                    <div class="body">
                        <label for="date-input">INGRESE FECHA <span class="icon">📅</span> </label>
                        <div>
                            <hr id="linea">
                        </div>
                        <div class="input-container">
                            <input type="text" id="date-input" placeholder="mes/año" style="background-color: #FFEFD5;">
                        </div>
                        <div id="error-message" class="error-message" style="display: none;"></div>
                    </div>
                    <div class="footer">
                        <button id="clear">Clear</button>
                        <button id="cancel">Cancel</button>
                        <button id="ok">OK</button>
                    </div>
                </div>
                <div class="table-container" id="table-container" style="display: none;">
                    <table>
                        <thead>
                            <tr>
                                <th>DOCENTE</th>
                                <th>SALÓN</th>
                                <th>DÍA</th>
                                <th>HORARIO</th>
                                <th>ESTADO</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Karim Manuel Montelongo Sánchez</td>
                                <td>J004</td>
                                <td>11/07/2027</td>
                                <td>7:00 - 8:00</td>
                                <td>Espera</td>
                            </tr>
                            <tr>
                                <td>Felipe Torres Molina</td>
                                <td>J001</td>
                                <td>15/07/2024</td>
                                <td>10:00 - 12:00</td>
                                <td>ACEPTADO</td>
                            </tr>
                            <tr>
                                <td>Kevin Alexis Zamora Santos</td>
                                <td>J008</td>
                                <td>31/07/2024</td>
                                <td>9:00 - 10:00</td>
                                <td>RECHAZADO</td>
                            </tr>
                            <tr>
                                <td>Ángel Gabriel Zatarain Sánchez</td>
                                <td>J008</td>
                                <td>02/08/2024</td>
                                <td>12:00 - 2:00</td>
                                <td>ACEPTADO</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="logo">
                <img src="../../Recursos Visuales/Logo.jpg" alt="Logo">
            </div>
            <div class="footer"></div>
        </div>
    </div>
    <script src="Disponibilidad.js">
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

document.querySelector('.logout').addEventListener('click', function(event) {
    event.preventDefault(); // Previene la acción por defecto del enlace
    var mensaje = 'Quiere cerrar sesión?'; // Cambia esto por el mensaje que desees
    var confirmacion = confirm(mensaje);
    if (confirmacion) {
        window.location.href = '../../Index.php'; // Asegúrate de que esta es la página a la que quieres redirigir
    }
});

document.getElementById('ok').addEventListener('click', function() {
    const dateInput = document.getElementById('date-input').value;
    const regex = /7\/2024$/; // Modificamos la expresión regular para que solo acepte fechas en el formato MM/2024

    if (dateInput === '') {
        // Si no se ingresa ninguna fecha, muestra un mensaje de error diferente
        document.getElementById('error-message').style.display = 'block';
        document.getElementById('error-message').innerText = 'Por favor, ingresa una fecha.';
        document.getElementById('table-container').style.display = 'none';
    } else if (regex.test(dateInput)) {
        // Si la fecha cumple con el formato MM/2024, muestra la tabla
        document.getElementById('table-container').style.display = 'block';
        document.getElementById('error-message').style.display = 'none';
    } else {
        // Si la fecha no cumple con el formato, muestra un mensaje de error
        document.getElementById('error-message').style.display = 'block';
        document.getElementById('error-message').innerText = 'Fecha no válida. Por favor, use el formato mm/aaaa.';
        document.getElementById('table-container').style.display = 'none';
    }
});

document.getElementById('clear').addEventListener('click', function() {
    // Limpia el campo de entrada y oculta la tabla y el mensaje de error
    document.getElementById('date-input').value = '';
    document.getElementById('error-message').style.display = 'none';
    document.getElementById('table-container').style.display = 'none';
});

document.getElementById('cancel').addEventListener('click', function() {
    // Limpia el campo de entrada y oculta la tabla y el mensaje de error
    document.getElementById('date-input').value = '';
    document.getElementById('error-message').style.display = 'none';
    document.getElementById('table-container').style.display = 'none';
});
    </script>
</body>
</html>
