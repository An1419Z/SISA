<?php
$servidor = "fdb1030.awardspace.net";
$usuario = "4506764_wpressec801ecf";
$clave = "JqcK]*+e43J%p6VI";
$baseDeDatos = "4506764_wpressec801ecf";

$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);

if (!$enlace) {
    die("Conexión fallida: " . mysqli_connect_error());
}

$mensaje = "";
$redireccion = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    $consultaUsuario = "SELECT * FROM `Registro` WHERE `Usuario` = '$usuario'";
    $resultado = mysqli_query($enlace, $consultaUsuario);

    if (mysqli_num_rows($resultado) > 0) {
        $fila = mysqli_fetch_assoc($resultado);
        if (password_verify($contrasena, $fila['Contraseña'])) {
            $tipoUsuario = substr($usuario, 0, 2);
            if ($tipoUsuario === 'al') {
                $redireccion = 'Alumnos/Alumno.html';
            } elseif ($tipoUsuario === 'dc') {
                $redireccion = 'Docentes/Docente.html';
            } elseif ($tipoUsuario === 'ad') {
                $redireccion = 'Administrativos/Administrativos.html';
            } else {
                $mensaje = 'Usuario no válido';
            }
        } else {
            $mensaje = 'Contraseña incorrecta';
        }
    } else {
        $mensaje = 'Usuario no registrado';
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
    <link rel="stylesheet" href="Inicio.css">
    <link rel="icon" href="Recursos Visuales/Logo.jpg" type="image/x-icon">
</head>
<body>
    <header class="header">
        <h2 class="title">SISTEMA INTEGRAL DE SERVICIOS ACADÉMICOS®</h2>
    </header>
    <div class="outer-container">
        <div class="login-container">
            <form class="login-form" method="post">
                <p>USUARIO</p>
                <input type="text" style="text-align: center;" id="usuario" name="usuario" placeholder="(al, dc, ad)00000000">
                <p>CONTRASEÑA</p>
                <input type="password" style="text-align: center;" id="contrasena" name="contrasena">
                <button type="submit" class="button">INICIAR SESIÓN</button>
            </form>
        </div>
        <img src="Recursos Visuales/Logo.jpg" alt="Emblema SISU" class="logo">
    </div>
    <h6 class="register-text">¿No tienes cuenta? <a href="Inicio/Registro/Registro.php">REGISTRATE</a></h6>
    <footer class="footer">
        <h3 class="institution-name">Universidad Tecnológica de Ciudad Juárez©</h3>
    </footer>
    <?php if ($mensaje) : ?>
        <script>alert('<?php echo $mensaje; ?>');</script>
    <?php endif; ?>
    <?php if ($redireccion) : ?>
        <script>window.location.href = '<?php echo $redireccion; ?>';</script>
    <?php endif; ?>
</body>
</html>
