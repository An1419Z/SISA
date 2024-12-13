<?php
include("HolaMundo.php");

session_start(); // Iniciar sesión


if (!$enlace) {
    die("Conexión fallida: " . mysqli_connect_error());
}

if (isset($_POST['login'])) {
    $correo = $_POST['usuarios'];
    $contra = $_POST['contrasenas'];
    $_SESSION['loggedin_time'] = time();

    // Array de tablas y sus correspondientes páginas de redirección
    $tablas = [
        'RegistroAdministrativos' => 'Administrativos/Administrativos.php',
        'RegistroDocentes' => 'Docentes/Docente.php',
        'RegistroAlumnos' => 'Alumnos/Alumno.php'
    ];

    $usuarioEncontrado = false;

    foreach ($tablas as $tabla => $paginaRedireccion) {
        $consulta = "SELECT * FROM `$tabla` WHERE `Correo` = '$correo'";
        $resultado = mysqli_query($enlace, $consulta);

        if (mysqli_num_rows($resultado) > 0) {
            $fila = mysqli_fetch_assoc($resultado);

            // Verificación de la contraseña
            if (password_verify($contra, $fila['Contrasena'])) {
                $usuarioEncontrado = true;
                
                $_SESSION['user_id'] = $fila['Correo']; // ID del usuario
                $_SESSION['user_role'] = $tabla; // Rol del usuario (nombre de la tabla)

                // Redirigir al archivo correspondiente según el tipo de usuario
                echo "<script>window.location.href = '$paginaRedireccion';</script>";
                exit(); // Detener el script después de la redirección
            } else {
                echo "<script>alert('Contraseña incorrecta');</script>";
                break;
            }
        }
    }

    if (!$usuarioEncontrado) {
        echo "<script>alert('Correo no encontrado');</script>";
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
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background: #f4f4f4;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    justify-content: center;
    position: relative;
}

.header {
    position: absolute;
    top: 40px;
    left: 40px;
    width: 100%;
    background-color: #f4f4f4;
    text-align: left;
    padding: 10px;
}

.title {
    font-size: 30px;
    color: #004494;
    margin: 0;
}

.outer-container {
    display: flex;
    align-items: center;
    width: 100%;
    justify-content: center;
    position: relative;
}

.login-container {
    border: 2px solid gray;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 750px;
    padding: 20px;
    background: #fff;
    margin-right: 460px;
    border-radius: 10px;
}

.login-form {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.login-form input[type="text"],
.login-form input[type="password"] {
    width: 100%;
    padding: 10px 100px;
    text-aling: center;
    margin-left: -100px;
    margin-bottom: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.login-form button {
    width: 100%;
    padding: 10px;
    border-radius: 10px;
    background: #0056b3;
    color: white;
    cursor: pointer;
    height: 40px;
}

.login-form button:hover {
    background: #004494;
}

.logo {
    max-width: 100%;
    height: auto;
    position: relative;
    left: -200px;
}

.footer {
    position: absolute;
    bottom: 20px;
    left: 20px;
    width: auto;
    background-color: #f4f4f4;
    text-align: left;
    padding: 10px;
}

.institution-name {
    margin: 0;
    font-weight: bold;
    color: burlywood;
}

.button {
    display: inline-block;
    padding: 10px 20px;
    font-size: 20px;
    text-align: center;
    cursor: pointer;
    outline: none;
    color: #ffffff;
    background-color: #004494;
    border: none;
    border-radius: 15px;
    text-decoration: none;
    transition: background-color 0.5s ease;
    position: relative;
    overflow: hidden;
}

.button::before {
    content: "";
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%) scale(0);
    width: 100%;
    height: 100%;
    background-color: #000;
    border-radius: 15px;
    transition: transform 0.5s ease;
    opacity: 0.1;
}

.button:hover {
    background-color: #003B7A;
}

.button:hover::before {
    transform: translate(-50%, -50%) scale(1);
}

.button:active {
    background-color: #004494;
    transform: translateY(4px);
}

.register-text {
    margin-top: 20px;
    text-align: center;
    position: relative;
    top: -100px;
    left: -700px;
}

/* Media Queries para dispositivos móviles */
@media (max-width: 768px) {
    .header {
        top: 20px;
        left: 20px;
        width: calc(100% - 40px);
        text-align: center; /* Centrar texto en móviles */
    }

    .outer-container {
        flex-direction: column; /* Ajustar dirección de elementos en móviles */
        align-items: center;
    }

    .login-container {
        width: 80%;
        margin-right: -5px;
    }

    .logo {
        position: relative;
        left: 0;
        /* Añadir margen superior para colocar el logo encima del login */
        margin-top: -600px; /* Ajustar valor según la altura del logo */
        margin-bottom: -260px;
        max-width: 70%; /* Ajustar tamaño del logo en móviles */
        transform: translate(0px, 0px);
    }

    .register-text {
        top: 300px;
        left: 0;
        margin-top: 140px;
    }

    .footer {
        bottom: 10px;
        left: 10px;
        width: calc(100% - 20px);
        text-align: center; /* Centrar texto en móviles */
    }
}


    </style>
    <link rel="icon" href="Recursos Visuales/Logo.jpg" type="image/x-icon">
</head>
<body>
    <header class="header">
        <h1 class="title">SISTEMA INTEGRAL DE SERVICIOS ACADÉMICOS®</h1>
    </header>
    <div class="outer-container">
        <div class="login-container">
            <form class="login-form" method="post">
                <label for="usuario"> 
                    <p>CORREO:</p>
                    <input type="text" style="text-align: center;" id="usuario" name="usuarios" placeholder="(al, dc, ad)00000000">
                    
                </label>
                <label for="contrasena">
                    <p>CONTRASEÑA:</p>
                    <input type="password" style="text-align: center;" id="contrasena" name="contrasenas" placeholder="Contraseña"> </input>
                </label>
                <button type="submit" class="button" name="login">INICIAR SESIÓN</button>
            </form>
        </div>
        <img src="Recursos Visuales/Logo.png" alt="Logo Sistema Integral de Servicios Académicos" class="logo">
    </div>
</body>
</html>
