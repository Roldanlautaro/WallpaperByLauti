<?php
include('incluides/header.php');
include('basededatos/conexion.php');
?>

<main>
  <section class="wallpaper-container">
    <?php
    if (isset($_GET['img']) && isset($_GET['type'])) {
        $image = $_GET['img'];
        $type = $_GET['type']; // 'movil' o 'escritorio'
        echo '<img src="' . htmlspecialchars($image) . '" alt="Wallpaper seleccionado">';

        $imageName = basename($image);

        // Determina la ruta de descarga según el tipo
        if ($type === 'movil') {
            // Primero verifica en la carpeta de imágenes subidas por el usuario
            $downloadPath = 'imgs/imgs-movil/' . $imageName; 
            // Si no la encuentra, busca en la carpeta de imágenes predeterminadas
            if (!file_exists($downloadPath)) {
                $downloadPath = 'imgs/imgs-movil/imgs-download/' . $imageName;
            }
        } elseif ($type === 'escritorio') {
            $downloadPath = 'imgs/imgs-escritorio/' . $imageName;
        } else {
            echo 'Tipo de imagen no válido.';
            exit;
        }
    } else {
        echo 'No se ha seleccionado ninguna imagen.';
    }
    ?>

    <?php if (isset($downloadPath)): ?>
        <!-- Botón de descargar -->
        <div class="download-button-container">
          <a href="<?= htmlspecialchars($downloadPath) ?>" download="<?= htmlspecialchars(pathinfo($imageName, PATHINFO_FILENAME) . '.png') ?>" class="download-button">Descargar</a>
        </div>
      </div>
    <?php endif; ?>
  </section>
</main>

<script src="js/script.js"></script>

<?php include('incluides/footer.php'); ?>
