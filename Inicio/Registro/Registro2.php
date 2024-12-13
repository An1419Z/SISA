<?php
    include 'HolaMundo.php';

    if (isset($_POST['registro'])) {
        $nombre = $_POST['nombre'];
        $apellido_paterno = $_POST['ApellidoP'];
        $apellido_materno = $_POST['ApellidoM'];
        $usuario = $_POST['Usuario'];
        $correo = $_POST['correo'];
        $contra = password_hash($_POST['contra'], PASSWORD_DEFAULT); // Hashing de la contraseña

        // Verificar si el correo ya existe en cualquiera de las tablas
        $consultaCorreo = "
            SELECT * FROM `RegistroAdministrativos` WHERE `Correo` = '$correo'
            UNION
            SELECT * FROM `RegistroDocentes` WHERE `Correo` = '$correo'
            UNION
            SELECT * FROM `RegistroAlumnos` WHERE `Correo` = '$correo'";
        $resultado = mysqli_query($enlace, $consultaCorreo);

        if (mysqli_num_rows($resultado) > 0) {
            echo "<script>alert('El correo ya ha sido registrado'); </script>";
        } else {
            // Seleccionar la tabla adecuada según el tipo de usuario
            if ($usuario == 'Alumno') {
                $insertarDatos = "INSERT INTO RegistroAlumnos (Nombre, ApellidoP, ApellidoM, Usuario, Correo, Contrasena) 
                            VALUES ('$nombre', '$apellido_paterno', '$apellido_materno', '$usuario', '$correo', '$contra')";
            } elseif ($usuario == 'Docente') {
                $insertarDatos = "INSERT INTO RegistroDocentes (Nombre, ApellidoP, ApellidoM, Usuario, Correo, Contrasena) 
                            VALUES ('$nombre', '$apellido_paterno', '$apellido_materno', '$usuario', '$correo', '$contra')";
            } elseif ($usuario == 'Administrativo') {
                $insertarDatos = "INSERT INTO RegistroAdministrativos (Nombre, ApellidoP, ApellidoM, Usuario, Correo, Contrasena) 
                            VALUES ('$nombre', '$apellido_paterno', '$apellido_materno', '$usuario', '$correo', '$contra')";
            }

            if (mysqli_query($enlace, $insertarDatos)) {
                echo "<script>alert('Usuario registrado exitosamente');</script>";
                echo "<script>window.location.href = '../../Administrativo/Administrativo.php';</script>";
            } else {
                echo "Error: " . $insertarDatos . "<br>" . mysqli_error($enlace);
            }
        }
    }

    mysqli_close($enlace);
?>