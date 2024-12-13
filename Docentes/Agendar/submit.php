<?php
include('HolaMundo.php');

if (!$enlace) {
    die("Conexion Fallida: " . mysqli_connect_error());
}

$docente = $_POST["Docente"];
$salon = $_POST["Salon"];
$fecha = $_POST["Fecha"];
$horario = $_POST["Horario"];
$comentarios = $_POST["Comentarios"];

// Preparar la sentencia SQL
$stmt = $enlace->prepare("INSERT INTO Agendacion (Docente, Salon, Fecha, Horario, Comentarios, Estado) VALUES (?, ?, ?, ?, ?, 'Pendiente')");
$stmt->bind_param("sssss", $docente, $salon, $fecha, $horario, $comentarios);

// Ejecutar la sentencia
if ($stmt->execute()) {
    echo "<script>alert('¡Tu registro se ha realizado con éxito! Agradecemos tu paciencia mientras el administrador revisa tu solicitud.');</script>"; // Ventana emergente con el mensaje "EXITOSO"
} else {
    echo "<script>alert('Error al agendar: " . $stmt->error . "');</script>"; // Ventana emergente en caso de error
}

$stmt->close();
$enlace->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Logout Script</title>
</head>
<body>
    <script>
    let logoutTimer;

    function resetTimer() {
        clearTimeout(logoutTimer);
        logoutTimer = setTimeout(logout, 0); // 300,000 ms = 5 minutos
    }

    function logout() {
        window.location.href = '../Disponibilidad/Disponibilidad.php'; // Redirige al disponibilidad.php
    }

    window.onload = resetTimer;
    window.onmousemove = resetTimer;
    window.onkeypress = resetTimer;
    window.onscroll = resetTimer;

    // Verificar si hay un mensaje en la URL y mostrarlo en una alerta
    const urlParams = new URLSearchParams(window.location.search);
    const message = urlParams.get('message');
    if (message) {
        alert(message);
    }
    </script>
</body>
</html>