<?php 
include "../basededatos/conexion.php";  // Ruta relativa a conexion.php

$id = $_GET['id'];
$sql = "DELETE FROM usuarios WHERE id_usuario = '$id'";
mysqli_query($conn,$sql);

// Redirigir a la página de administración
header("Location: indexadmin.php");  // Ruta relativa a indexadmin.php
?>
