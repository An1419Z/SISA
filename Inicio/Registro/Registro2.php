<?php
    include 'Index2.php';

    if (isset($_POST['registro'])) {
        $nombre = $_POST['nombre'];
        $usuario = $_POST['usuario'];
        $correo = $_POST['correo'];
        $contra = password_hash($_POST['contra'], PASSWORD_DEFAULT); // Hashing de la contraseña

        // Verificar si el usuario ya existe
        $consultaUsuario = "SELECT * FROM `Registro` WHERE `Usuario` = '$usuario' OR `Correo` = '$correo'";
        $resultado = mysqli_query($enlace, $consultaUsuario);

        if (mysqli_num_rows($resultado) > 0) {
            echo "<script>alert('El usuario o el correo ya están registrados');</script>";
        } else {
            $insertarDatos = "INSERT INTO `Registro` (`Nombre`, `Usuario`, `Correo`, `Contraseña`) VALUES ('$nombre', '$usuario', '$correo', '$contra')";

            if (mysqli_query($enlace, $insertarDatos)) {
                echo "<script>alert('Usuario registrado exitosamente');</script>";
                echo "<script>window.location.href = '../../Index.html';</script>";
            } else {
                echo "Error: " . $insertarDatos . "<br>" . mysqli_error($enlace);
            }
        }
    }

    mysqli_close($enlace);
?>
