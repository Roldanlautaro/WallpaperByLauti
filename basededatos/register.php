<?php
include("../basededatos/conexion.php");

$usuario = $_POST['user'];
$clave = $_POST['pass'];

// Consulta para verificar si el usuario ya existe (sin importar la clave)
$user = mysqli_query($conn, "SELECT usuario FROM usuarios WHERE usuario = '$usuario'");

if (mysqli_num_rows($user) > 0) {
    echo "<script type='text/javascript'>
            alert('Usuario ya existente');
            location.href='../basededatos/indexlogin.php';
          </script>";
} else {
    // Inserción de un nuevo usuario
    $insert = mysqli_query($conn, "INSERT INTO usuarios (usuario, clave) VALUES ('$usuario', '$clave')");

    if ($insert) {
        echo "<script type='text/javascript'>
                alert('Usuario creado con éxito');
                location.href='../basededatos/indexlogin.php';
              </script>";
    } else {
        echo "<script type='text/javascript'>
                alert('Error al crear usuario');
                location.href='../basededatos/indexlogin.php'; 
              </script>";
    }
}

// Liberar resultados y cerrar conexiones
mysqli_free_result($user);
mysqli_close($conn);
?>
