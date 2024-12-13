<?php
include('HolaMundo.php'); 

$estado = $enlace->real_escape_string($_POST["estado"]);
$docente = $enlace->real_escape_string($_POST["docente"]);
$salon = $enlace->real_escape_string($_POST["salon"]);
$fecha = $enlace->real_escape_string($_POST["fecha"]);
$horarios = $enlace->real_escape_string($_POST["horarios"]);

$sql = "UPDATE Agendacion SET Estado = '$estado' WHERE Docente = '$docente' AND Salon = '$salon' AND Fecha = '$fecha' AND Horario = '$horarios'";

if ($enlace->query($sql) === TRUE) {
    echo "Registro actualizado correctamente";
} else {
    // Manejo de errores mejorado (puedes registrar el error en un archivo de registro)
    error_log("Error al actualizar el registro: " . $enlace->error);
    echo "Error al actualizar el registro. Por favor, inténtalo de nuevo más tarde."; 
}

$enlace->close();
?>