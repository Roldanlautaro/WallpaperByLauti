<?php
include("../basededatos/conexion.php");

$usuario = $_POST['user'];
$clave = $_POST['pass'];

// Consulta para obtener usuario, clave y tipo_usuario
$user = mysqli_query($conn, "SELECT id_usuario, usuario, clave, tipo_usuario FROM usuarios WHERE usuario = '$usuario' AND clave = '$clave'");

if ($row = mysqli_fetch_assoc($user)) {
    $var_pass = $row["clave"];
    $var_usuario = $row["usuario"];
    $id_usuario = $row["id_usuario"];
    $tipo_usuario = $row["tipo_usuario"]; // Tipo de usuario (1 = admin, 0 = normal)
}

if (@$var_usuario && @$var_pass == $clave) {
    session_start();
    $_SESSION['usuario'] = $usuario;
    $_SESSION['id_usuario'] = $id_usuario;
    $_SESSION['tipo_usuario'] = $tipo_usuario; // Guardar el tipo de usuario en sesión

    if ($tipo_usuario == 1) {
        // Si es admin, redirige a indexadmin.php
        echo "<script type='text/javascript'>location.href='../basededatos/indexadmin.php'</script>";
    } else {
        // Si es un usuario normal, redirige a otra página
        echo "<script type='text/javascript'>
                alert('Inicio de sesión exitoso');
                location.href='../index.php'</script>"; 
    }
} else {
    echo "<script type='text/javascript'>
            alert('Usuario o contraseña incorrectos');
            location.href='../basededatos/indexlogin.php'; 
        </script>";
}

mysqli_free_result($user);
mysqli_close($conn); // Cerrar la conexión con $conn
?>
