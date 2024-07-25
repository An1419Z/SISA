<?php
$servidor = "fdb1030.awardspace.net";
$usuario = "4506764_wpressec801ecf";
$clave = "JqcK]*+e43J%p6VI";
$baseDeDatos = "4506764_wpressec801ecf";

$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);

if (!$enlace) {
    die("Conexión fallida: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    $consultaUsuario = "SELECT * FROM `Registro` WHERE `Usuario` = '$usuario'";
    $resultado = mysqli_query($enlace, $consultaUsuario);

    if (mysqli_num_rows($resultado) > 0) {
        $fila = mysqli_fetch_assoc($resultado);
        if (password_verify($contrasena, $fila['Contraseña'])) {
            $tipoUsuario = substr($usuario, 0, 2);
            echo json_encode(['success' => true, 'tipoUsuario' => $tipoUsuario]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Contraseña incorrecta']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Usuario no registrado']);
    }
}

mysqli_close($enlace);
?>
