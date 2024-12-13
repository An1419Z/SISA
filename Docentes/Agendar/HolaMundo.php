<?php
    $servidor = "fdb1030.awardspace.net";
    $usuario = "4506764_wpressec801ecf";
    $clave = "JqcK]*+e43J%p6VI";
    $baseDeDatos = "4506764_wpressec801ecf";

    $enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);

    if (!$enlace) {
        die("Conexión fallida: " . mysqli_connect_error());
    }
?>
