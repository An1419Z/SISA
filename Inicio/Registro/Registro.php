<?php
    include ("Registro2.php");
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
                <form class="login-form" action="" method="post">
                    <p>NOMBRE COMPLETO</p>
                    <input type="text" style="text-align: center;" id="nombre" name="nombre">
                    <p>USUARIO</p>
                    <input type="text" style="text-align: center;" id="usuario" name="usuario" placeholder="(al, dc, ad)00000000">
                    <p>CORREO</p>
                    <input type="text" style="text-align: center;" id="correo" name="correo">
                    <p>CONTRASEÑA</p>
                    <input type="password" style="text-align: center;" id="contrasena" name="contra">
                    <button type="submit" name="registro" class="button">REGISTRAR</button>
            </form>
        </div>
        <img src="../../Recursos Visuales/Logo.jpg" alt="Emblema SISU" class="logo">
    </div>
    <footer class="footer">
        <h3 class="institution-name">Universidad Tecnológica de Ciudad Juárez©</h3>
    </footer>
</body>
</html>
