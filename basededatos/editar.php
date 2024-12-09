<?php 
include "../basededatos/conexion.php";  // Ruta relativa a conexion.php

$id = $_GET['id'];
$sql = "SELECT * FROM usuarios WHERE id_usuario = '$id'";
$resultado = mysqli_query($conn, $sql);

$fila = mysqli_fetch_array($resultado);
?>

<!-- Rutas de librerías externas permanecen igual -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card text-center mx-auto">
                <div class="card-header bg-primary text-white">
                    EDITAR PERSONA
                </div>
                <div class="card-body">
                    <form method="GET">
                        <input type="hidden" name="id" value="<?php echo $fila['id_usuario']; ?>">

                        <div class="form-group">
                            <label>Usuario</label>
                            <input type="text" class="form-control" name="user" id="user" value="<?php echo $fila['usuario']; ?>" placeholder="Usuario">
                        </div>
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input type="text" class="form-control" name="pass" id="pass" value="<?php echo $fila['clave']; ?>" placeholder="Clave">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="editar" onclick="return checkChanges();">Editar</button>
                            <a href="indexadmin.php" class="btn btn-secondary" role="button">Volver</a>  <!-- Ruta relativa a indexadmin.php -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function checkChanges() {
        const originalUser = "<?php echo $fila['usuario']; ?>";
        const originalPass = "<?php echo $fila['clave']; ?>";
        const currentUser = document.getElementById('user').value;
        const currentPass = document.getElementById('pass').value;

        // Mostrar confirmación solo si los valores han cambiado
        if (currentUser !== originalUser || currentPass !== originalPass) {
            return confirm('¿Estás seguro de que deseas editar este usuario?');
        }
        // No mostrar alerta si no se cambió nada
        return true;
    }
</script>

<?php 
if (isset($_GET['editar'])) {
    $idp = $_GET['id'];    
    $user = $_GET['user'];
    $pass = $_GET['pass'];
    
    if ($user != null || $pass != null) {
        $sql = "UPDATE usuarios SET usuario = '$user', clave = '$pass' WHERE id_usuario = '$idp'";
        mysqli_query($conn, $sql);
        header("Location: indexadmin.php");  // Ruta relativa a indexadmin.php
    }    
}
?>
