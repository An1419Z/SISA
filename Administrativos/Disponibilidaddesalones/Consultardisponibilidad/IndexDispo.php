<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'RegistroAdministrativos') {
    header('Location: ../../Index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú con Listas</title>
    <link rel="stylesheet" href="AgendarSalon.css">
    <header>
        <h1>SISTEMA INTEGRAL DE SERVICIOS ACADÉMICOS <br> <center>(ADMINISTRATIVOS)</center> </h1>
        <a href="../../../../Index.php" class="logout">Cerrar Sesión</a>
    </header>
</head>
<body>
    <button class="boton" onclick="mostrarLista('lista1')">EDIFICIO H</button>
    <button class="boton" onclick="mostrarLista('lista2')">EDIFICIO I</button>
    <button class="boton" onclick="mostrarLista('lista3')">EDIFICIO J</button>

    <ul id="lista1" class="lista">
        <lo><button id="H001" class="boton">H-001</button></lo>
        <lo><button id="H002" class="boton">H-002</button></lo>
        <lo><button id="H003" class="boton">H-003</button></lo>
        <lo><button id="H004" class="boton">H-004</button></lo>
        <lo><button id="H005" class="boton">H-005</button></lo>
        <lo><button id="H006" class="boton">H-006</button></lo>
        <lo><button id="H101" class="boton">H-101</button></lo>
        <lo><button id="H102" class="boton">H-102</button></lo>
        <lo><button id="H103" class="boton">H-103</button></lo>
        <lo><button id="H104" class="boton">H-104</button></lo>
        <lo><button id="H105" class="boton">H-105</button></lo>
        <lo><button id="H106" class="boton">H-106</button></lo>
        <lo><button id="H107" class="boton">H-107</button></lo>
        <lo><button id="H108" class="boton">H-108</button></lo>
        <lo><button id="H109" class="boton">H-109</button></lo>
        <lo><button id="H110" class="boton">H-110</button></lo>
        <lo><button id="H111" class="boton">H-111</button></lo>
        <lo><button id="H112" class="boton">H-112</button></lo>
        <lo><button id="H113" class="boton">H-113</button></lo>
        <lo><button id="H114" class="boton">H-114</button></lo>
        <lo><button id="H115" class="boton">H-115</button></lo>
        <lo><button id="AUDIOVISUALH" class="boton">AUDIOVISUAL H</button></lo>
    </ul>

    <ul id="lista2" class="lista">
        <lo><button id="I001" class="boton">I-001</button></lo>
        <lo><button id="I002" class="boton">I-002</button></lo>
        <lo><button id="I003" class="boton">I-003</button></lo>
        <lo><button id="I004" class="boton">I-004</button></lo>
        <lo><button id="I005" class="boton">I-005</button></lo>
        <lo><button id="I006" class="boton">I-006</button></lo>
        <lo><button id="I007" class="boton">I-007</button></lo>
        <lo><button id="I008" class="boton">I-008</button></lo>
        <lo><button id="I009" class="boton">I-009</button></lo>
        <lo><button id="I101" class="boton">I-101</button></lo>
        <lo><button id="I102" class="boton">I-102</button></lo>
        <lo><button id="I103" class="boton">I-103</button></lo>
        <lo><button id="I104" class="boton">I-104</button></lo>
        <lo><button id="I105" class="boton">I-105</button></lo>
        <lo><button id="I106" class="boton">I-106</button></lo>
        <lo><button id="I107" class="boton">I-107</button></lo>
        <lo><button id="I108" class="boton">I-108</button></lo>
        <lo><button id="I109" class="boton">I-109</button></lo>
        <lo><button id="I110" class="boton">I-110</button></lo>
        <lo><button id="I111" class="boton">I-111</button></lo>
        <lo><button id="I112" class="boton">I-112</button></lo>
        <lo><button id="I113" class="boton">I-113</button></lo>
        <lo><button id="I114" class="boton">I-114</button></lo>
        <lo><button id="I115" class="boton">I-115</button></lo>
        <lo><button id="AUDIOVISUALI" class="boton">AUDIOVISUAL I</button></lo>
    </ul>

    <ul id="lista3" class="lista">
        <lo><button id="J001" class="boton">J-001</button></lo>
        <lo><button id="J002" class="boton">J-002</button></lo>
        <lo><button id="J003" class="boton">J-003</button></lo>
        <lo><button id="J004" class="boton">J-004</button></lo>
        <lo><button id="J005" class="boton">J-005</button></lo>
        <lo><button id="J006" class="boton">J-006</button></lo>
        <lo><button id="J007" class="boton">J-007</button></lo>
        <lo><button id="J008" class="boton">J-008</button></lo>
    </ul>

    <script>
        document.querySelector('.logout').addEventListener('click', function(event) {
     event.preventDefault(); // Previene la acción por defecto del enlace
        var mensaje = 'Quiere cerrar sesión?'; // Cambia esto por el mensaje que desees
        var confirmacion = confirm(mensaje);
        if (confirmacion) {
            window.location.href = '../../../Index.php'; // Asegúrate de que esta es la página a la que quieres redirigir
        }
    });

    function addEventListeners(ids, edificio) {
    ids.forEach(id => {
        document.getElementById(id).addEventListener('click', function(event) {
            event.preventDefault();
            window.location.href = `${edificio}/${id}/disponibilidad.php`;
        });
    });
}

// Para EDIFICIOH
addEventListeners([
    'H001', 'H002', 'H003', 'H004', 'H005', 'H006',
    'H101', 'H102', 'H103', 'H104', 'H105', 'H106', 'H107', 'H108',
    'H109', 'H110', 'H111', 'H112', 'H113', 'H114',
    'H115', 'AUDIOVISUALH'
], 'EDIFICIOH');

// Para EDIFICIOI
addEventListeners([
    'I001', 'I002', 'I003', 'I004', 'I005', 'I006', 'I007', 'I008', 'I009',
    'I101', 'I102', 'I103', 'I104', 'I105', 'I106', 'I107', 'I108',
    'I109', 'I110', 'I111', 'I112', 'I113', 'I114', 'I115',
    'AUDIOVISUALI'
], 'EDIFICIOI');

// Para EDIFICIOJ
addEventListeners([
    'J001', 'J002', 'J003', 'J004', 'J005', 'J006', 'J007', 'J008'
], 'EDIFICIOJ');


    function mostrarLista(id) {
    var lista = document.getElementById(id);
    if (lista.style.display === 'block') {
    lista.style.display = 'none';
    } else {
    var listas = document.getElementsByClassName('lista');
    for (var i = 0; i < listas.length; i++) {
    listas[i].style.display = 'none';
    }
    lista.style.display = 'block';
    }
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
    </>
</body>
</html>