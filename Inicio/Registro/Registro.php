<?php

    $servidor = "fdb1030.awardspace.net";
    $usuario = "4506764_wpressec801ecf";
    $clave = "JqcK]*+e43J%p6VI";
    $baseDeDatos = "4506764_wpressec801ecf";

    $enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Integral de Servicios Académicos</title>
    <link rel="stylesheet" href="Registro.css">
	<link rel="icon" href="../../Recursos Visuales/Logo.jpg" type="image/x-icon">
</head>
<body>
    <header class="header">
        <h2 class="title">SISTEMA INTEGRAL DE SERVICIOS ACADÉMICOS®</h2>
    </header>
    <div class="outer-container">
        <div class="login-container">
            <form class="login-form" onsubmit="handleLogin(event)" action="#" name="4506764_wpressec801ecf" method="post">
                <p>NOMBRE COMPLETO</p>
                <input type="text" style="text-align: center;" id="nombre" name="nombre">
                <p>USUARIO</p>
                <input type="text" style="text-align: center;" id="usuario" name="usuario" placeholder="(al, dc, ad)00000000">
                <p>CORREO</p>
                <input type="text" style="text-align: center;" id="correo" name="correo">
                <p>CONTRASEÑA</p>
                <input type="password" style="text-align: center;" id="contrasena" name="contra">
                <button type="submit" name="registro" class="button">REGISTRAR</button>
            </form>
        </div>
        <img src="../../Recursos Visuales/Logo.jpg" alt="Emblema SISU" class="logo">
    </div>
    <footer class="footer">
        <h3 class="institution-name">Universidad Tecnológica de Ciudad Juárez©</h3>
    </footer>
    <script>
        function handleLogin(event) {
    event.preventDefault();

    var nombre = document.getElementById("nombre").value;
    var usuario = document.getElementById("usuario").value;   

    // ... (otros campos)

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'tu_archivo_php.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (xhr.status === 200) {
            // Manejar la respuesta del servidor
            alert(xhr.responseText); // Mostrar un mensaje de éxito o error
        } else {
            console.error('Request failed.  Returned status of ' + xhr.status);
        }
    };
    xhr.send('nombre=' + nombre + '&usuario=' + usuario + '...'); // Enviar los datos del formulario
}
    </script>
</body>
</html>

<?php

if (isset($_POST['registro'])) {
    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $correo = $_POST['correo'];
    $contra = password_hash($_POST['contra'], PASSWORD_DEFAULT); // Hashea la contraseña por seguridad

    // Sentencia preparada para evitar inyecciones SQL
    $stmt = $enlace->prepare("INSERT INTO Registro (Nombre, Usuario, Correo, Contraseña) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nombre, $usuario, $correo, $contra);

    if ($stmt->execute()) {
        // Inserción exitosa
        echo '<script>alert("Usuario registrado exitosamente"); window.location.href = "../../Index.html";</script>';
    } else {
        // Error en la inserción
        echo "Error al registrar usuario: " . $stmt->error;
    }

    $stmt->close();
}

?>