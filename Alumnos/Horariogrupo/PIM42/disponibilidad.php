<?php
include('HolaMundo.php');

// Consulta SQL para obtener los datos
$sql = "SELECT Horario, Lunes, Martes, Miercoles, Jueves, Viernes FROM PIM42";
$result = $enlace->query($sql);

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
                background-color: #000;
                border-radius: 20px;
                transition: transform 0.5s ease;
                opacity: 0.1;
            }
            #guardarButton:hover::before {
                transform: translate(-50%, -50%) scale(1);
            }
          </style>';

    echo '<h1 align="center">PIM42</h1>'; 

    
    echo '<table align="center" border=10; align: center; style=\'background-color:#F9AD30\;';
    echo "<tr style='background-color: black; font-family:georgia; height: 100px;'>
            <th style='background-color:#F9AD30'>HORARIO</th>
            <th style='background-color:#F9AD30'>LUNES</th>
            <th style='background-color:#F9AD30'>MARTES</th>
            <th style='background-color:#F9AD30'>MIERCOLES</th>
            <th style='background-color:#F9AD30'>JUEVES</th>
            <th style='background-color:#F9AD30'>VIERNES</th>
          </tr>";

    $horarios = [];  // Array para almacenar los horarios
    while ($row = $result->fetch_assoc()) {
        $horarios[] = $row["Horario"]; // Agregar el horario al array
        echo "<tr class='myTable' style='text-align:center; background-color:#FDE3B7; font-family:verdana;'>
                <td class='horario'>" . $row["Horario"] . "</td> 
                <td><input style='text-align:center; background-color:#FDE3B7; font-family:georgia;' type='text' name='lunes_" . $row["Horario"] . "' value='" . $row["Lunes"] . "'></td>
                <td><input style='text-align:center; background-color:#FDE3B7; font-family:georgia;' type='text' name='martes_" . $row["Horario"] . "' value='" . $row["Martes"] . "'></td>
                <td><input style='text-align:center; background-color:#FDE3B7; font-family:georgia;' type='text' name='miercoles_" . $row["Horario"] . "' value='" . $row["Miercoles"] . "'></td>
                <td><input style='text-align:center; background-color:#FDE3B7; font-family:georgia;' type='text' name='jueves_" . $row["Horario"] . "' value='" . $row["Jueves"] . "'></td>
                <td><input style='text-align:center; background-color:#FDE3B7; font-family:georgia;' type='text' name='viernes_" . $row["Horario"] . "' value='" . $row["Viernes"] . "'></td>
              </tr>";
    }
    echo '</table>';
}
</script>