<?php
    $servidor = "fdb1030.awardspace.net";
    $usuario = "4506764_wpressec801ecf";
    $clave = "JqcK]*+e43J%p6VI";
    $baseDeDatos = "4506764_wpressec801ecf";

    $enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);

    if (!$enlace) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    if (isset($_POST['registro'])) {
        $nombre = $_POST['nombre'];
        $usuario = $_POST['usuario'];
        $correo = $_POST['correo'];
        $contra = password_hash($_POST['contra'], PASSWORD_DEFAULT); // Hashing de la contraseña

        // Verificar si el usuario ya existe
        $consultaUsuario = "SELECT * FROM `Registro` WHERE `Usuario` = '$usuario' OR `Correo` = '$correo'";
        $resultado = mysqli_query($enlace, $consultaUsuario);

        if (mysqli_num_rows($resultado) > 0) {
            echo "<script>alert('El Correo ya están registrado');</script>";
        } else {
            $insertarDatos = "INSERT INTO `Registro` (`Nombre`, `Usuario`, `Correo`, `Contraseña`) VALUES ('$nombre', '$usuario', '$correo', '$contra')";

            if (mysqli_query($enlace, $insertarDatos)) {
                echo "<script>alert('Usuario registrado exitosamente');</script>";
                echo "<script>window.location.href = '../../Index.html';</script>";
            } else {
                echo "Error: " . $insertarDatos . "<br>" . mysqli_error($enlace);
            }
        }
    }

    mysqli_close($enlace);
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
