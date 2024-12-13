
<?php
    include('HolaMundo.php');

    if (!$enlace) {
        die("Conexion Fallida: " . mysqli_connect_error());
    }
    ?>
    
<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Solicitud de Agendación de Salón</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>

    <div class="titulo">
        <h1>FORMULARIO DE SOLICITUD DE AGENDACIÓN DE SALÓN</h1>
    </div>

    <form action="submit.php" method="post">
        <label for="docente">Docente:</label>
        <input type="text" id="docente" name="Docente" required>
        <label for="salon">Salón:</label>
        <input type="text" id="salon" name="Salon" required>
        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="Fecha" required>
        <label for="horario">Horario:</label>
        <input type="text" id="horario" name="Horario" required>
        <label for="comentarios">Comentarios:</label>
        <input type="text" id="comentarios" name="Comentarios">
        <input type="submit" value="Subir">
    </form> 
</body>
</html>