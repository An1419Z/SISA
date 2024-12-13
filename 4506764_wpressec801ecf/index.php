<?php

    $servidor = "fdb1030.awardspace.net";
    $usuario = "4506764_wpressec801ecf";
    $clave = "JqcK]*+e43J%p6VI";
    $baseDeDatos = "4506764_wpressec801ecf";

    $enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form action="#" name="4506764_wpressec801ecf" method="post">

        <input type="text" name="nombre" placeholder="nombre">
        <input type="text" name="usuario" placeholder="usuario">
        <input type="email" name="correo" placeholder="correo">
        <input type="text" name="contra" placeholder="contra">

        <input type="submit" name="registro">
        <input type="reset">

    </form>
</body>
</html>

<?php

    if(isset($_POST['registro'])){
    
        $nombre = $_POST['nombre'];
        $usuario = $_POST['usuario'];
        $correo = $_POST['correo'];
        $contra = $_POST['contra'];

        $insertarDatos = "INSERT INTO `Registro` (`Nombre`, `Usuario`, `Correo`, `Contraseña`) VALUES ('$nombre', '$usuario', '$correo', '$contra')";

        $ejecutarInsertar = mysqli_query($enlace, $insertarDatos);
    }
?>