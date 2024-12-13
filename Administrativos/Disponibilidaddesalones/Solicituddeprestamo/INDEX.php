<?php
include('HolaMundo.php');

$sql = "SELECT Docente, Salon, Fecha, Horario, Comentarios, Estado FROM agendacion_prestamos";
$result = $enlace->query($sql);

echo '<style>
        @media only screen and (max-width: 600px) {
        .myTable { height: 60px; }
        }

        input[type="text"] { 
            width: 100%;
            text-align: center;
            border: none;
        }

        table {
            width: 90%;
            margin: 20px auto;
            border-left-color: #004494;
            border-top-color: #004494;
            border-bottom-color: #004494;
            border-right-color: #004494;
            color: black;
            background-color: black;
        }

        th, td {
            padding: 15px;
        }

        #guardarButton, #regresarButton {
            display: block;
            margin: 20px auto;
            font-size: 18px;
            cursor: pointer;
            text-align: center;
            position: relative;
            overflow: hidden;
            background-color: #004494;
            color: white;
            border: none;
            padding: 35px 50px;
            border-radius: 20px;
            transition: background-color 0.5s ease;
        }

        #guardarButton:hover, #regresarButton:hover {
            background-color: #003B7A;
        }

        #guardarButton::before, #regresarButton::before {
            content: "";            
            position: absolute;
            top: 50%; left: 50%;
            transform: translate(-50%, -50%) scale(0);
            width: 100%; height: 100%;
            background-color: #000;
            border-radius: 20px;
            transition: transform 0.5s ease;
            opacity: 0.1;
        }
        #guardarButton:hover::before, #regresarButton:hover::before {
            transform: translate(-50%, -50%) scale(1);
        }
      </style>';
echo '<h1 align="center">AGENDACIÓN DE SALONES</h1>'; 

echo '<table align="center" border=10 style="background-color:#F9AD30;">';
echo "<tr style='background-color: black; font-family:georgia; height: 100px;'>
        <th style='background-color:#F9AD30'>DOCENTE</th>
        <th style='background-color:#F9AD30'>SALÓN</th>
        <th style='background-color:#F9AD30'>FECHA</th>
        <th style='background-color:#F9AD30'>HORARIO</th>
        <th style='background-color:#F9AD30'>COMENTARIOS</th>
        <th style='background-color:#F9AD30'>ESTADO</th>
      </tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr class='myTable' style='text-align:center; background-color:#FDE3B7; font-family:verdana;'>
            <td>" . $row["Docente"] . "</td> 
            <td>" . $row["Salon"] . "</td>
            <td>" . $row["Fecha"] . "</td>
            <td>" . $row["Horario"] . "</td>
            <td>" . $row["Comentarios"] . "</td>
            <td>" . $row["Estado"] . "</td>
            <td>
                <button onclick='cambiarEstado(\"ACEPTADO\", \"" . $row["Docente"] . "\", \"" . $row["Salon"] . "\", \"" . $row["Fecha"] . "\", \"" . $row["Horario"] . "\")'>Aceptar</button>
                <button onclick='cambiarEstado(\"RECHAZADO\", \"" . $row["Docente"] . "\", \"" . $row["Salon"] . "\", \"" . $row["Fecha"] . "\", \"" . $row["Horario"] . "\")'>Rechazar</button>
            </td>
          </tr>";
}
echo '</table>';    

echo '<button id="regresarButton" class="guardarButton" onclick="window.history.back();">Regresar</button>';
?>

<script>
function cambiarEstado(estado, docente, salon, fecha, horarios) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            location.reload(); // Recargar la página para ver los cambios
        }
    };
    xhttp.open("POST", "update.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("estado=" + estado + "&docente=" + docente + "&salon=" + salon + "&fecha=" + fecha + "&horarios=" + horarios);

    // Deshabilitar el otro botón
    if (estado == "Aceptado") {
        document.getElementById('rechazar_' + fecha).disabled = true;
    } else {
        document.getElementById('aceptar_' + fecha).disabled = true;
    }
}

document.querySelector('.regresarButton').addEventListener('click', function(event) {
    event.preventDefault(); // Prevents the default action of the button
    window.location.href = '../'; // Redirects to the agendacion.html page
});
</script>