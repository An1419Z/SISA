<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'RegistroAdministrativos') {
    header('Location: ../Index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Integral de Servicios Académicos</title>
    <link rel="stylesheet" href="Administrarho.css">
</head>
<body>
    <div class="wrapper">
        <header>
            <button id="toggleMenu" class="menu-icon"><span class="signo"></span></button>
            <h1 class="titulo">SISTEMA INTEGRAL DE SERVICIOS ACADÉMICOS <br> <center>(ADMINISTRATIVOS)</center> </h1>
            <a href="../Administrativos.php" class="In">Inicio</a>
            <a href="../../Index.php" class="logout">Cerrar Sesión</a>
            
        </header>
        <div class="container" id="container">
            <table class="tabla-grupo">
                <tr>
                    <th>GRUPOS</th>
                </tr>
                <tr><td><button class="TDM32-button" id="TDM32">TDM32</button></td></tr>
                <tr><td>TRM32</td></tr>
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
                    <button class="modify" id="modify">MODIFICAR</button>
                    <button class="back" id="back">REGRESAR</button>
                </div>
            </div>

            <div class="footer"></div>
        </div>
    </div>
    <script>
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
    <script src="Administrarho.js"></script>
</body>
</html>
