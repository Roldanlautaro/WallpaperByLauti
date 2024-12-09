<?php
include "../basededatos/conexion.php";  // Ruta relativa a conexion.php

session_start();

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    echo "<script type='text/javascript'>location.href='../indexlogin.php';</script>";  // Ruta relativa
    exit();
}

// Verifica si el usuario es admin
if ($_SESSION['tipo_usuario'] != 1) {
    echo "<script type='text/javascript'>
        alert('Acceso denegado: No tienes permisos para acceder a esta página.');
        location.href = '../indexlogin.php';  // Ruta relativa
    </script>";
    exit();
}

// Procesa el formulario de registro si se envió
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']); // Removemos password_hash para almacenar en texto plano
    $tipo_usuario = mysqli_real_escape_string($conn, $_POST['tipo_usuario']); // Obtenemos el tipo de usuario

    // Verifica si el usuario ya existe
    $checkUserQuery = "SELECT * FROM usuarios WHERE usuario = '$username'";
    $result = mysqli_query($conn, $checkUserQuery);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('El usuario ya existe'); window.location.href = 'indexadmin.php';</script>";  // Ruta relativa
    } else {
        // Guarda la contraseña en texto plano
        $sql = "INSERT INTO usuarios (usuario, clave, tipo_usuario) VALUES ('$username', '$password', '$tipo_usuario')";
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Usuario registrado con éxito'); window.location.href = 'indexadmin.php';</script>";  // Ruta relativa
        } else {
            echo "<script>alert('Error al registrar el usuario: " . mysqli_error($conn) . "'); window.location.href = 'indexadmin.php';</script>";  // Ruta relativa
        }
    }
}
?>

<!-- Archivo CSS de Bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!-- Archivo CSS de DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"/>

<?php 
// Recupera todos los usuarios menos el 'admin'
$sql = "SELECT id_usuario, usuario, clave, tipo_usuario FROM usuarios";
$resultado = mysqli_query($conn, $sql);
?>

<style>
/* Usa Bootstrap para simplificar los estilos */
.container {
    padding-top: 30px;
}
header {
    background-color: #B8DAFF;
    padding: 10px 20px;
}
</style>

<header>
    <div class="d-flex justify-content-between align-items-center">
        <h1>Tabla Admin</h1>
        <div>
            <button class="btn btn-primary" data-toggle="modal" data-target="#registerModal">REGISTRAR</button>
            <button class="btn btn-danger" onclick="window.location.href='logout.php'">SALIR</button>  
        </div>
    </div>
</header>

<div class="container">
    <div class="table-responsive">
        <table class="table table-bordered" id="tablausuarios">
        <thead>
    <tr class="table-primary">
        <th>ID</th>
        <th>USUARIO</th>
        <th>CONTRASEÑA</th>
        <th>TIPO DE USUARIO</th>  <!-- Nueva columna -->
        <th>ACCIONES</th>
    </tr>
</thead>
<tbody>
<?php while ($fila = mysqli_fetch_assoc($resultado)) { ?>
<tr>
    <td><?php echo $fila['id_usuario']; ?></td>
    <td><?php echo $fila['usuario']; ?></td>
    <td><?php echo $fila['clave']; ?></td> <!-- Muestra la contraseña almacenada -->
    <td><?php echo $fila['tipo_usuario']; ?></td>  <!-- Muestra el tipo de usuario -->
    <td>
        <a href="editar.php?id=<?php echo $fila['id_usuario']; ?>" class="btn btn-warning btn-sm">Editar</a>  
        <a href="eliminar.php?id=<?php echo $fila['id_usuario']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas borrar este usuario?');">Borrar</a>  
    </td>
</tr>
<?php } ?>
</tbody>
        </table>
    </div>
</div>

<!-- Modal para el registro de usuario -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="registerModalLabel">Registrar Nuevo Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="registerForm" method="POST">
          <div class="form-group">
            <label for="username">Usuario</label>
            <input type="text" class="form-control" id="username" name="username" required>
          </div>
          <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
          <!-- Campo para seleccionar el tipo de usuario -->
          <div class="form-group">
            <label for="tipo_usuario">Tipo de Usuario</label>
            <select class="form-control" id="tipo_usuario" name="tipo_usuario" required>
              <option value="0">Usuario Normal</option>
              <option value="1">Administrador</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Archivos JavaScript de jQuery y Bootstrap -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Archivo JavaScript de DataTables -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#tablausuarios').DataTable();
    });
</script>

