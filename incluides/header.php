<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" 
        rel="stylesheet"> <!-- Roboto -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"> <!-- Bootstrap -->
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" /> <!-- Dropzone -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.0/dist/sweetalert2.min.css"> <!-- SweetAlert2 CSS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.0/dist/sweetalert2.all.min.js"></script> <!-- SweetAlert2 JS -->
    <!-- Cambiar a rutas relativas -->
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/darkmode.css">
    <link rel="stylesheet" href="styles/form_subir.css">
    <link rel="icon" href="imgs/logoo.png">
    <title>WallpaperByLauti</title>
</head>

<body>

    <!-- Header -->
    <?php session_start(); // Asegúrate de que la sesión esté iniciada ?>

    <header>
        <nav>
            <div class="logo">
                <a href="index.php">
                    <!-- Cambiar ruta a relativa -->
                    <img src="imgs/logo.png" alt="logo-imagen" id="logo-header" style="width: 200px; height: auto;">
                </a>
            </div>

            <ul id="menuLista">
                <!-- Rutas relativas a las páginas -->
                <li><a href="index.php">INICIO</a></li>
                <li><a href="movile.php">MOVIL</a></li>
                <li><a href="escritorio.php">ESCRITORIO</a></li>
                <li><a href="configuracion.php">GUIA DE CONFIGURACION</a></li>

                <!-- label para el tema dark mode -->
                <li><label class="theme" id="darkmode" href="javascript:void(0)">
                        <input class="input" checked="checked" type="checkbox">
                        <svg width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round"
                            stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="icon icon-sun">
                            <circle r="5" cy="12" cx="12"></circle>
                            <line y2="3" y1="1" x2="12" x1="12"></line>
                            <line y2="23" y1="21" x2="12" x1="12"></line>
                            <line y2="5.64" y1="4.22" x2="5.64" x1="4.22"></line>
                            <line y2="19.78" y1="18.36" x2="19.78" x1="18.36"></line>
                            <line y2="12" y1="12" x2="3" x1="1"></line>
                            <line y2="12" y1="12" x2="23" x1="21"></line>
                            <line y2="18.36" y1="19.78" x2="5.64" x1="4.22"></line>
                            <line y2="4.22" y1="5.64" x2="19.78" x1="18.36"></line>
                        </svg>
                        <svg viewBox="0 0 24 24" class="icon icon-moon">
                            <path
                                d="m12.3 4.9c.4-.2.6-.7.5-1.1s-.6-.8-1.1-.8c-4.9.1-8.7 4.1-8.7 9 0 5 4 9 9 9 3.8 0 7.1-2.4 8.4-5.9.2-.4 0-.9-.4-1.2s-.9-.2-1.2.1c-1 .9-2.3 1.4-3.7 1.4-3.1 0-5.7-2.5-5.7-5.7 0-1.9 1.1-3.8 2.9-4.8zm2.8 12.5c.5 0 1 0 1.4-.1-1.2 1.1-2.8 1.7-4.5 1.7-3.9 0-7-3.1-7-7 0-2.5 1.4-4.8 3.5-6-.7 1.1-1 2.4-1 3.8-.1 4.2 3.4 7.6 7.6 7.6z">
                            </path>
                        </svg>
                    </label></li>
            </ul>
            <div class="menu-icon">
                <!-- Rutas relativas -->
                <img src="imgs/menu-hambur.png" class="icon-hamburger" onclick="mostrarMenu()">
            </div>

            <div class="header-right">
                <?php if (isset($_SESSION['usuario'])): ?>
                <div class="subir-foto">
                    <i class="bi bi-arrow-bar-up" onclick="window.location.href='foto_form.php'"></i>
                </div>

                <div class="usuario-logo">
                    <i class="bi bi-person-fill" alt="Usuario" onclick="toggleMenu()"></i>
                    <div class="dropdown" id="dropdownMenu" style="display: none;">
                        <!-- Rutas relativas -->
                        <a href="perfil.php">Perfil</a>
                        <a href="basededatos/logout.php">Salir</a>
                    </div>
                </div>
                <?php else: ?>
                <button class="btn-inicio" id="inicio-sesion"
                    onclick="window.location.href='basededatos/indexlogin.php'">Iniciar sesión</button>
                <button class="btn-inicio" id="registrarse"
                    onclick="window.location.href='basededatos/indexregister.php'">Registrarse</button>
                <?php endif; ?>
            </div>

        </nav>
    </header>

    <script>
        function toggleMenu() {
            const dropdown = document.getElementById("dropdownMenu");
            dropdown.style.display = dropdown.style.display === "none" ? "block" : "none";
        }
    </script>
