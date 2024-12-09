<?php include('incluides/header.php'); ?>

<main>
    <div class="barra-movil">
        <h2>FONDOS 💻 DE PANTALLA PARA EL ESCRITORIO</h2>
        <div class="spinner"></div>
    </div>

    <!-- Filtros -->
    <div class="barra-movil">
        <div class="filtros-container">
            <button class="active" data-name="all">All</button>
            <button data-name="Anime">Anime</button>
            <button data-name="Animales">Animales</button>
            <button data-name="Peliculas">Peliculas</button>
            <button data-name="Series">Series</button>
            <button data-name="Paisajes">Paisajes</button>
            <button data-name="Videojuegos">Videojuegos</button>
        </div>
    </div>

    <!-- Fotos escritorio -->
    <div class="grid-container">
        <?php
        // Conexión a la base de datos
        $conn = mysqli_connect("localhost", "root", "", "wallpaper");

        // Verifica la conexión
        if (!$conn) {
            die("Error de conexión: " . mysqli_connect_error());
        }

        // Consulta para obtener imágenes de escritorio (tipo_fondo = 0)
        $queryEscritorio = "SELECT titulo, foto_path, filtro FROM imagenes WHERE tipo_fondo = 0";
        $resultEscritorio = mysqli_query($conn, $queryEscritorio);

        // Iterar sobre los resultados y mostrar cada imagen
        if (mysqli_num_rows($resultEscritorio) > 0) {
            while ($row = mysqli_fetch_assoc($resultEscritorio)) {
                $titulo = htmlspecialchars($row['titulo']);
                $fotoPath = "imgs/imgs-escritorio/" . $row['foto_path'];
                $filtro = htmlspecialchars($row['filtro']);

                echo "<div class='grid-item' data-name='$filtro'>
        <a href='wallpaper.php?img=$fotoPath&type=movil'>
            <img src='$fotoPath' alt='$titulo'>
        </a>
      </div>";
            }
        }

        // Cerrar la conexión
        mysqli_close($conn);
        ?>
    </div>
</main>

<?php include('incluides/footer.php'); ?>
<script src="js/script.js"></script>
<script src="js/wallpaper.js"></script>
</body>
</html>
