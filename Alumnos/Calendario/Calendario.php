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
    <link rel="stylesheet" href="Calendario.css">
    <link rel="icon" href="../../Recursos Visuales/Logo.jpg" type="image/x-icon">

</head>
<body>
    <div class="wrapper">
        <header>
            <h1 class="titulo">SISTEMA INTEGRAL DE SERVICIOS ACADÉMICOS <br> <center>(ALUMNOS)</center> </h1>
            <a href="../Alumno.php" class="In">Inicio</a>
            <a href="../../Index.php" class="logout">Cerrar Sesión</a>
            
        </header>
        <div style="text-align: center;" class="Calendario">
            <img src="../../Recursos Visuales/Calendario.jpg" alt="Calendario">
        </div>
    </div>
    <script src="Alumnos.js">
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
