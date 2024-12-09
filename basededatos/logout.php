<?php
session_start();
session_unset();  // Elimina todas las variables de sesión
session_destroy(); // Destruye la sesión
header('Location: ../index.php'); // Redirige a la página principal
exit(); // Asegura que no se siga ejecutando el código
?>
