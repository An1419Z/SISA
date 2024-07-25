<?php
$servidor = "fdb1030.awardspace.net";
$usuario = "4506764_wpressec801ecf";
$clave = "JqcK]*+e43J%p6VI";
$baseDeDatos = "4506764_wpressec801ecf";

$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);

if (!$enlace) {
    die("Conexión fallida: " . mysqli_connect_error());
}

$consulta = "SELECT `Usuario`, `Contraseña` FROM `Registro`";
$resultado = mysqli_query($enlace, $consulta);

if ($resultado) {
    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo "Usuario: " . $fila['Usuario'] . " - Contraseña (Hash): " . $fila['Contraseña'] . "<br>";
    }
} else {
    echo "Error en la consulta: " . mysqli_error($enlace);
}

mysqli_close($enlace);
?>
