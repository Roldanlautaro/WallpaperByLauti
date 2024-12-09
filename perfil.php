<?php
ob_start();
include('incluides/header.php');
include('basededatos/conexion.php');

// Verificar si el usuario está logueado
if (!isset($_SESSION['usuario'])) {
    header('Location: basededatos/indexlogin.php');
    exit();
}

// Obtener información del usuario logueado
$usuario = $_SESSION['usuario'];
$query = "SELECT id_usuario, usuario, foto_perfil FROM usuarios WHERE usuario = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();
$userData = $result->fetch_assoc();
$idUsuario = $userData['id_usuario'];
$nombre = $userData['usuario'];
$fotoPerfil = $userData['foto_perfil'] ? $userData['foto_perfil'] : 'imgs/default-profile.png';

// Manejar la subida de la foto
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['foto_perfil'])) {
    $targetDir = "imgs/imgs-perfil/";
    $targetFile = $targetDir . basename($_FILES['foto_perfil']['name']);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES['foto_perfil']['tmp_name']);
    if ($check !== false) {
        if (move_uploaded_file($_FILES['foto_perfil']['tmp_name'], $targetFile)) {
            $query = "UPDATE usuarios SET foto_perfil = ? WHERE usuario = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ss", $targetFile, $usuario);
            $stmt->execute();
            header("Location: perfil.php");
            exit();
        } else {
            echo "Hubo un error al subir la imagen.";
        }
    } else {
        echo "El archivo no es una imagen válida.";
    }
}

// Obtener las fotos subidas por el usuario
$querySubidas = "SELECT titulo, foto_path, tipo_fondo FROM imagenes WHERE id_usuario = ?";
$stmtSubidas = $conn->prepare($querySubidas);
$stmtSubidas->bind_param("i", $idUsuario);
$stmtSubidas->execute();
$resultSubidas = $stmtSubidas->get_result();
?>

<main>
    <section class="wallpaper-container">
        <div class="foto-perfil">
            <div class="marco-perfil" onclick="document.getElementById('fotoInput').click();">
                <img src="<?php echo $fotoPerfil; ?>" alt="Foto de perfil">
            </div>

            <form id="uploadForm" action="perfil.php" method="POST" enctype="multipart/form-data" style="display: none;">
                <input type="file" id="fotoInput" name="foto_perfil" accept="image/*" onchange="document.getElementById('uploadForm').submit();">
            </form>
        </div>

        <h3><?php echo htmlspecialchars($nombre); ?></h3>
    </section>

    <section>
        <div class="likes-subidas-container">
            <div class="tab-container">
                <button onclick="showSection('subidas')" class="tab-button" id="subidas-tab">FOTOS SUBIDAS</button>
            </div>

            <div class="section-content" id="subidas-section">
                <?php
                if ($resultSubidas->num_rows > 0) {
                    while ($foto = $resultSubidas->fetch_assoc()) {
                        $fotoPath = htmlspecialchars($foto['foto_path']);
                        $titulo = htmlspecialchars($foto['titulo']);
                        $tipoFondo = $foto['tipo_fondo'];
                        $carpeta = $tipoFondo == 1 ? 'imgs/imgs-movil/' : 'imgs/imgs-escritorio/';

                        echo '<div class="uploaded-photo">';
                        echo '<img src="' . $carpeta . $fotoPath . '" alt="Foto subida" onclick="openModal(\'' . $fotoPath . '\', \'' . $titulo . '\')">';
                        echo '</div>';
                    }
                } else {
                    echo '<p>No has subido ninguna foto todavía.</p>';
                }
                ?>
            </div>
        </div>
    </section>
</main>
<!-- Modal para editar título y eliminar foto -->
<div id="photoModal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2>Editar Foto</h2>
        <form id="editForm" method="POST" action="basededatos/editar_foto.php">
            <input type="hidden" name="foto_path" id="fotoPath">
            <input type="hidden" name="accion" id="accion"> <!-- Campo para especificar la acción -->
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" id="titulo" required>
            
            <!-- Botón para guardar cambios con clase personalizada -->
            <button type="button" class="save-changes-btn" onclick="guardarCambios()">Guardar Cambios</button>
            
            <!-- Botón para eliminar foto con clase personalizada -->
            <button type="button" class="delete-photo-btn" onclick="eliminarFoto()">Eliminar Foto</button>
        </form>
    </div>
</div>




<script src="js/script.js"></script>
<script src="js/modal.js"></script>
<script src="js/alert.js"></script>
<?php include('incluides/footer.php'); ?>
