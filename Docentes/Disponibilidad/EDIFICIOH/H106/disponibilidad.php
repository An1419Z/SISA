<?php
include('HolaMundo.php');

session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'RegistroDocentes') {
    header('Location: ../../../Index.php');
    exit();
}
// Consulta SQL para obtener los datos
$sql = "SELECT Horario, Lunes, Martes, Miercoles, Jueves, Viernes FROM H106";
$result = $enlace->query($sql);

// Consulta SQL para obtener las agendas ACEPTADAS o PENDIENTES
$sqlAgendacion = "SELECT Horario, Estado FROM Agendacion 
                  WHERE Salon = 'H106' AND (Estado = 'ACEPTADO' OR Estado = 'PENDIENTE')"; 
$resultAgendacion = $enlace->query($sqlAgendacion);

// Almacenar los horarios reservados en un array asociativo
$horariosReservados = [];
while ($rowAgendacion = $resultAgendacion->fetch_assoc()) {
    $horarioReservado = $rowAgendacion['Horario'];
    $estadoReserva = $rowAgendacion['Estado'];

    // Si el estado es ACEPTADO, el color es rojo, si es PENDIENTE, es naranja
    $colorReserva = ($estadoReserva == 'ACEPTADO') ? 'red' : 'orange'; 

    $horariosReservados[$horarioReservado] = $colorReserva;
}

if ($result->num_rows > 0) {
    echo '<style>
            @media only screen and (max-width: 600px) {
                .myTable { height: 60px; }
            }

            input[type="text"] { 
                width: 100%;
                text-align: center;
                border: none;
            }

            .horario {
                background-color: #F9AD30;
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

            #guardarButton {
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

            #guardarButton:hover {
                background-color: #003B7A;
            }

            #guardarButton::before {
                content: "";                 
                position: absolute;
                top: 50%; left: 50%;
                transform: translate(-50%, -50%) scale(0);
                width: 100%; height: 100%;
                background-color:   
 #000;
                border-radius: 20px;
                transition: transform 0.5s ease;
                opacity: 0.1;
            }
            #guardarButton:hover::before {
                transform: translate(-50%, -50%) scale(1);
            }
                            .Boton {
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

            .Boton:hover {
                background-color: #003B7A;
            }

            .Boton::before {
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
            .Boton:hover::before {
                transform: translate(-50%, -50%) scale(1);
            }
        </style>';

    echo '<h1 align="center">H-106</h1>'; 

    echo '<table align="center" border=10; align: center; style=\'background-color:#F9AD30\;';
    echo "<tr style='background-color: black; font-family:georgia; height: 100px;'>
            <th style='background-color:#F9AD30'>HORARIO</th>
            <th style='background-color:#F9AD30'>LUNES</th>
            <th style='background-color:#F9AD30'>MARTES</th>
            <th style='background-color:#F9AD30'>MIERCOLES</th>
            <th style='background-color:#F9AD30'>JUEVES</th>
            <th style='background-color:#F9AD30'>VIERNES</th>
          </tr>";

    $horarios = []; // Array para almacenar los horarios
    while ($row = $result->fetch_assoc()) {
        $horarios[] = $row["Horario"]; // Agregar el horario al array
        $horario = $row["Horario"];
        echo "<tr class='myTable' style='text-align:center; background-color:#FDE3B7; font-family:verdana;'>
                <td class='horario'>" . $horario . "</td>"; 

        // Iterar sobre los días de la semana
        foreach (['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes'] as $dia) {
            $valorCelda = $row[$dia];
            $colorCelda = ($valorCelda == 'DISPONIBLE') ? 'green' : 'red'; 

            // Si el horario está reservado, sobrescribir el color con el de la reserva
            if (isset($horariosReservados[$horario])) {
                $colorCelda = $horariosReservados[$horario];
            }

            echo "<td><input style='text-align:center; background-color: $colorCelda; font-family:georgia;' 
                         type='text' name='$dia" . "_" . $horario . "' value='" . $valorCelda . "'></td>";
        }

        echo "</tr>";
    }
    echo '</table>';

    // Botón para guardar todos los cambios (con id para aplicar estilos)
    //echo '<button id="guardarButton" type="button" onclick="guardarTodosLosCambios()">Guardar Todos los Cambios</button>';
    echo '<button class="Boton" onclick="window.location.href =\'../../../Agendar/FORM.php\';">Agendar</button>';
    echo '<button class="Boton" onclick="window.location.href =\'../../Disponibilidad.php\';">Regresar</button>';
} else {
    echo "0 resultados";
}
?>

<script>
    // Array de horarios (declarado globalmente)
    var horarios = <?php echo json_encode($horarios); ?>; 

    function guardarTodosLosCambios() {
        var datos = [];
        
        for (var i = 0; i < horarios.length; i++) {
            var horario = horarios[i];
            datos.push({
                horario: horario,
                lunes: document.getElementsByName('lunes_' + horario)[0].value,
                martes: document.getElementsByName('martes_' + horario)[0].value,
                miercoles: document.getElementsByName('miercoles_' + horario)[0].value,
                jueves: document.getElementsByName('jueves_' + horario)[0].value,
                viernes: document.getElementsByName('viernes_' + horario)[0].value
            });
        }

        // Enviar datos al servidor (AJAX)
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                alert(this.responseText); 
            }
        };
        xhttp.open('POST', 'update.php', true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send('datos=' + JSON.stringify(datos)); 
    }
    let logoutTimer;

function resetTimer() {
    clearTimeout(logoutTimer);
    logoutTimer = setTimeout(logout, 300000); // 300,000 ms = 5 minutos
}

function logout() {
    window.location.href = '../Index.php'; // Redirige al logout.php
}

window.onload = resetTimer;
window.onmousemove = resetTimer;
window.onkeypress = resetTimer;
window.onscroll = resetTimer;
</script>