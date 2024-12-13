<?php
    include ("Registro2.php");

    session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'RegistroAdministrativos') {
    header('Location: ../../Administrativos/Administrativos.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistema Integral de Servicios Académicos</title>
        <link rel="stylesheet" href="Registro.css">
        <link rel="icon" href="../../Recursos Visuales/Logo.jpg" type="image/x-icon">
    </head>
    <body>
        <header class="header">
            <h2 class="title">SISTEMA INTEGRAL DE SERVICIOS ACADÉMICOS®</h2>
        </header>
        <div class="outer-container">
            <div class="login-container">
                <form class="login-form" action="Registro2.php" method="post">
                    <p>NOMBRE(S):</p>
                    <input type="text" style="text-align: center;" id="nombre" name="nombre" required>
                    <p>APELLIDO PATERNO:</p>
                    <input type="text" style="text-align: center;" id="ApellidoP" name="ApellidoP" required>
                    <p>APELLIDO MATERNO:</p>
                    <input type="text" style="text-align: center;" id="ApellidoM" name="ApellidoM" required>
                    <p>USUARIO:</p>
                        <label><input type="radio" name="Usuario" value="Alumno" required>Alumno</label>
                        <label><input type="radio" name="Usuario" value="Docente" required>Docente</label>
                        <label><input type="radio" name="Usuario" value="Administrativo" required>Administrativo</label>
                    <p>CORREO:</p>
                    <input type="email" style="text-align: center;" id="correo" name="correo" required>
                    <p>CONTRASEÑA:</p>
                    <input type="password" style="text-align: center;" id="contrasena" name="contra" required>
                    <button type="submit" name="registro" class="button">REGISTRAR</button>
            </form>
        </div>
        <img src="../../Recursos Visuales/Logo.jpg" alt="Emblema SISU" class="logo">
    </div>
    <footer class="footer">
        <h3 class="institution-name">Universidad Tecnológica de Ciudad Juárez©</h3>
    </footer>
    <script>
        document.querySelector('.REGISTRO').addEventListener('click', function(event) {
        event.preventDefault(); // Prevents the default action of the button
        window.location.href = '../Inicio/Registro/Registro.php'; // Redirects to the disponibilidad.php page
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
