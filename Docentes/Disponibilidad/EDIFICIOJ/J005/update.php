<?php
include('HolaMundo.php');

$datos = json_decode($_POST['datos'], true);

foreach ($datos as $item) {
    $horario = $item['horario'];
    $lunes = $item['lunes'];
    $martes = $item['martes'];
    $miercoles = $item['miercoles'];
    $jueves = $item['jueves'];
    $viernes = $item['viernes'];

    $sql = "UPDATE J005 SET Lunes='$lunes', Martes='$martes', Miercoles='$miercoles', Jueves='$jueves', Viernes='$viernes' WHERE Horario='$horario'";
    
    if (!$enlace->query($sql)) {
        echo "Error al actualizar el horario $horario: " . $enlace->error;
        exit; // Detener la ejecución si hay un error
    }
}

echo "Todos los horarios actualizados correctamente"; 
?>