<?php 
date_default_timezone_set('america/argentina/buenos_aires');
$conn = mysqli_connect("localhost", "root", "", "wallpaper");

// Verificar si la conexión fue exitosa
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}
?>