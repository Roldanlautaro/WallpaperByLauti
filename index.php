<?php include('incluides/header.php'); ?>

<main>

    <div class="barra-movil">
        <h2>ALGUNOS 🔥 FONDOS DE PANTALLA PARA EL MOVIL</h2>
        <div class="spinner"></div>
    </div>

    <!-- Botón para subir al principio -->
    <button id="scrollTopButton" class="scroll-top-button" title="Volver arriba">⬆</button>

    <!-- Fotos móviles -->
    <div class="grid-container">
        <?php
        // Conexión a la base de datos
        $conn = mysqli_connect("localhost", "root", "", "wallpaper");

        // Verifica la conexión
        if (!$conn) {
            die("Error de conexión: " . mysqli_connect_error());
        }

        // Consulta para obtener las imágenes de tipo móvil (tipo_fondo = 1)
        $queryMovil = "SELECT titulo, foto_path FROM imagenes WHERE tipo_fondo = 1";
        $resultMovil = mysqli_query($conn, $queryMovil);

        // Iterar sobre los resultados y mostrar cada imagen
        if (mysqli_num_rows($resultMovil) > 0) {
            while ($row = mysqli_fetch_assoc($resultMovil)) {
                $titulo = htmlspecialchars($row['titulo']);
                $fotoPath = "imgs/imgs-movil/" . $row['foto_path'];
                ?>
                <div class='grid-item' data-name='movil'>
                    <a href='wallpaper.php?img=<?php echo $fotoPath; ?>&type=movil'>
                        <img src='<?php echo $fotoPath; ?>' alt='<?php echo $titulo; ?>'>
                    </a>
                </div>
                <?php
            }
        }
        ?>
    </div>

    <div class="barra-movil">
        <button class="btn" onclick="location.href='movile.php'">👉 Mas fondos para el movil</button>
    </div>

    <div class="barra-escritorio">
        <h2>ALGUNOS 💻 FONDOS DE PANTALLA PARA EL ESCRITORIO</h2>
        <div class="spinner"></div>
    </div>

    <!-- Fotos escritorio -->
    <div class="grid-container">
        <?php
        // Consulta para obtener las imágenes de tipo escritorio (tipo_fondo = 0)
        $queryEscritorio = "SELECT titulo, foto_path FROM imagenes WHERE tipo_fondo = 0";
        $resultEscritorio = mysqli_query($conn, $queryEscritorio);

        // Iterar sobre los resultados y mostrar cada imagen
        if (mysqli_num_rows($resultEscritorio) > 0) {
            while ($row = mysqli_fetch_assoc($resultEscritorio)) {
                $titulo = htmlspecialchars($row['titulo']);
                $fotoPath = "imgs/imgs-escritorio/" . $row['foto_path'];
                ?>
                <div class='grid-item' data-name='escritorio'>
                    <a href='wallpaper.php?img=<?php echo $fotoPath; ?>&type=escritorio'>
                        <img src='<?php echo $fotoPath; ?>' alt='<?php echo $titulo; ?>'>
                    </a>
                </div>
                <?php
            }
        }

        // Cerrar la conexión
        mysqli_close($conn);
        ?>
    </div>

    <div class="barra-movil">
        <button class="btn" onclick="location.href='escritorio.php'">👉 Mas fondos para el pc</button>
    </div>

</main>

<?php include('incluides/footer.php'); ?>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="js/script.js"></script>
<script src="js/scrollarriba.js"></script>
<script src="js/wallpaper.js"></script>

</body>
</html>
