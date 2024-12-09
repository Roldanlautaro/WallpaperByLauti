<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
  
    <!-- Librería Bootstrap (remanece la ruta absoluta) -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <!-- Archivo CSS relativo -->
    <link rel="stylesheet" href="../styles/login.css">

    <!-- Font Awesome (ruta absoluta) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Librerías JS relativas -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</head>
<body OnLoad="NoBack();">

<?php
session_start(); // Inicia la sesión
if (isset($_SESSION['usuario'])) {
    header("Location: ../index.php"); // Redirige a la página principal si ya está logueado
    exit();
}
?>

<form class="form-control" action="login.php" method="POST">
    <p class="title">Login</p>
    <div class="input-field">
        <input type="text" class="input" name="user" required="required" autocomplete="new-text">
        <label class="label" for="input">Usuario</label>
    </div>
    <div class="input-field">
        <input type="password" class="input" name="pass" required="required" autocomplete="new-password">
        <label class="label" for="input">Contraseña</label>
    </div>
    <button type="submit" class="submit-btn">Iniciar sesión</button>
</form>

</body>
</html>
