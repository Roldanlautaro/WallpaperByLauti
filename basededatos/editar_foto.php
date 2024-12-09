<?php
include('conexion.php');

// Verificar si el usuario está logueado
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: indexlogin.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fotoPath = $_POST['foto_path'];
    $accion = $_POST['accion']; // Obtenemos el valor de la acción

    if ($accion == 'borrar') {
        // Eliminar la foto de la base de datos
        $query = "DELETE FROM imagenes WHERE foto_path = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $fotoPath);
        $stmt->execute();
    } elseif (isset($_POST['titulo'])) {
        // Si se quiere editar el título
        $nuevoTitulo = $_POST['titulo'];
        $query = "UPDATE imagenes SET titulo = ? WHERE foto_path = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $nuevoTitulo, $fotoPath);
        $stmt->execute();
    }

    header("Location: ../perfil.php");
    exit();
}
?>
