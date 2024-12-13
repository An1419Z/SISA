<?php
include('HolaMundo.php');

$sql = "SELECT Docente, Salon, Fecha, Horario, Comentarios, Estado FROM agendacion_prestamos";
$result = $enlace->query($sql);

$estado = $_POST["estado"];
$docente = $_POST["docente"];
$salon = $_POST["salon"];
$fecha = $_POST["fecha"];
$horarios = $_POST["horarios"];

$sql = "UPDATE agendacion_prestamos SET Estado = '$estado' WHERE Docente = '$docente' AND Salon = '$salon' AND Fecha = '$fecha' AND Horario = '$horarios'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
