<!DOCTYPE html>
<html>
<head>
    <title>Registrar</title>
  
    <!-- Librería Bootstrap (ruta absoluta) -->
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

<form class="form-control" action="register.php" method="POST">
  <p class="title">Registrar</p>
  <div class="input-field">
    <input type="text" class="input" name="user" required="required" autocomplete="new-text">
    <label class="label" for="input">Usuario</label>
  </div>
  <div class="input-field">
    <input type="password" class="input" name="pass" required="required" autocomplete="new-password">
    <label class="label" for="input">Contraseña</label>
  </div>
  <button type="submit" class="submit-btn">Registrar</button>
</form>

</body>
</html>
