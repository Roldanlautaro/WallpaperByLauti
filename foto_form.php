<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet"> <!-- Roboto -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="styles/form_subir.css">
    <link rel="icon" href="imgs/logoo.png">
    <title>WallpaperByLauti</title>
</head>

<body class="body-subir-foto">
    <main>
        <section>
            <div class="container">
                <div class="form_area">
                    <p class="title">SUBIR FOTO</p>
                    <form action="basededatos/upload.php" method="POST" enctype="multipart/form-data">

                        <div class="form_group">
                            <label class="sub_title" for="titulo">Título</label>
                            <input id="titulo" name="titulo" placeholder="Nombre de la foto" class="form_style"
                                type="text" required>
                        </div>
                        <div class="form_group">
                            <label class="sub_title">Tipo de foto</label>
                            <div class="checkbox_group">
                                <label class="checkbox-label">
                                    <input type="checkbox" name="tipo" value="escritorio"
                                        onclick="selectOnlyThis(this)">
                                    Escritorio
                                </label>
                                <label>
                                    <input type="checkbox" name="tipo" value="movil" onclick="selectOnlyThis(this)">
                                    Móvil
                                </label>
                            </div>
                        </div>
                        <div class="form_group">
                            <label class="sub_title">Filtro</label>
                            <select name="filtro">
                                <option value="Anime" selected>Anime</option>
                                <option value="Animales">Animales</option>
                                <option value="Peliculas">Películas</option>
                                <option value="Series">Series</option>
                                <option value="Paisajes">Paisajes</option>
                                <option value="Videojuegos">Videojuegos</option>
                                <option value="Otro">Otro</option>
                            </select>
                        </div>
                        <div class="form_group">
                            <label class="sub_title" for="foto">Seleccionar Foto</label>
                            <input id="foto" name="file" class="form_style" type="file" required>
                        </div>
                        <div class="form_group">
                            <button id="btn-subir-foto" class="btn-foto" type="button">Subir foto</button>
                        </div>

                    </form>
                </div>
            </div>
        </section>

        <!-- jQuery  -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="js/form_fotos.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>
