<?php
include('../basededatos/conexion.php');
session_start();
$id_usuario = $_SESSION['id_usuario']; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['file']) && !empty($_FILES['file']['name'])) {
        $image = $_FILES['file']['name'];
        $tempPath = $_FILES['file']['tmp_name'];

        // Determinar la carpeta de destino según el tipo de foto
        if (isset($_POST['tipo']) && $_POST['tipo'] === 'escritorio') {
            $uploadPath = '../imgs/imgs-escritorio/' . basename($image);
        } elseif (isset($_POST['tipo']) && $_POST['tipo'] === 'movil') {
            $uploadPath = '../imgs/imgs-movil/' . basename($image);
        } else {
            echo 'Error: Debe seleccionar un tipo de foto.';
            exit();
        }

        if (move_uploaded_file($tempPath, $uploadPath)) {
            // Recoger datos adicionales
            $titulo = mysqli_real_escape_string($conn, $_POST['titulo']);
            $tipo = (isset($_POST['tipo']) && $_POST['tipo'] === 'escritorio') ? 0 : 1; // 0 para escritorio, 1 para móvil
            $filtro = mysqli_real_escape_string($conn, $_POST['filtro']);

            // Guardar en la base de datos
            $query = "INSERT INTO imagenes (id_usuario, titulo, tipo_fondo, filtro, foto_path) VALUES ('$id_usuario', '$titulo', '$tipo', '$filtro', '$image')";

            if (mysqli_query($conn, $query)) {
                echo 'Imagen subida con éxito';
            } else {
                echo 'Error al guardar en la base de datos: ' . mysqli_error($conn);
            }
        } else {
            echo 'Error al subir la imagen';
        }
    } else {
        echo 'No se ha seleccionado ninguna imagen.';
    }
}
?>
