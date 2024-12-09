# 📸 WallpaperByLauti

## 🌟 Descripción general

**WallpaperByLauti** es una aplicación web diseñada para visualizar, subir y descargar wallpapers de alta calidad. El proyecto ofrece una experiencia intuitiva y visualmente atractiva para gestionar fondos de pantalla, ya sea para dispositivos móviles o de escritorio.  

Con funcionalidades avanzadas como filtros temáticos, un sistema de gestión de usuarios y una sección exclusiva para administradores, esta plataforma es ideal para personalizar tu dispositivo con los mejores wallpapers.

---

## 🖥️ Características principales

- **Inicio**: Visualiza los wallpapers más recientes subidos por otros usuarios y descárgalos fácilmente.
- **Móvil**: Accede a una colección de wallpapers diseñados para dispositivos móviles. Incluye filtros como:
  - All
  - Anime
  - Animales
  - Películas
  - Series
  - Paisajes
  - Videojuegos
- **Escritorio**: Encuentra wallpapers perfectos para pantallas de escritorio, con los mismos filtros temáticos que la sección móvil.
- **Guía de configuración**: Consejos y trucos para descargar y aplicar wallpapers en máxima calidad.
- **Perfil**: Administra tus fotos subidas, personaliza tu foto de perfil y edita o elimina los wallpapers que hayas subido.
- **Tabla admin** (solo para administradores):
  - Gestión de usuarios: Crear, editar y eliminar usuarios y administradores.
  - Asignación de roles: Promueve usuarios normales a administradores.
  - Seguridad avanzada para la manipulación de datos sensibles.

---

## 🛠️ Tecnologías utilizadas

El proyecto fue desarrollado utilizando las siguientes tecnologías y herramientas:

- **Lenguajes**: HTML, CSS, JavaScript, PHP.
- **Base de datos**: MySQL.
- **Frameworks y librerías**:
  - Bootstrap (diseño responsivo).
  - SweetAlert2 (alertas interactivas).
  - DataTables (tablas dinámicas para la sección de administración).

---

## 📸 Capturas de pantalla

### Pantalla de inicio
![Inicio](https://github.com/user-attachments/assets/e4a81e79-9f99-4921-964a-472698bd819b))

### Pantalla móvil
![Móvil](https://github.com/user-attachments/assets/88776196-5f17-4429-b39a-c177014fb3f1)

### Pantalla Escritorio
![Móvil](https://github.com/user-attachments/assets/88776196-5f17-4429-b39a-c177014fb3f1)

### Pantalla Descarga
![Móvil](https://github.com/user-attachments/assets/617f1f8b-3950-41a2-b785-e6a3c5537aa6)


### Pantalla Tabla Admin
![Móvil](https://github.com/user-attachments/assets/83a9834e-9d83-4190-8c79-bcce7b39028f)



### Perfil de usuario
![Perfil](https://github.com/user-attachments/assets/41a3f3dc-8f2a-4732-9022-32ba9a0d6d09)


---


---

## 🧠 ¿Qué aprendí con este proyecto?

Durante el desarrollo de este proyecto, adquirí y reforcé conocimientos en:

- **Manipulación de bases de datos**: Implementar operaciones CRUD (Crear, Leer, Actualizar y Eliminar) con validaciones de seguridad.
- **JavaScript avanzado**: Gestionar eventos y manipular el DOM dinámicamente.
- **Subida de archivos**: Usar Dropzone para simplificar la gestión de imágenes.
- **Roles y permisos**: Implementar seguridad en las secciones restringidas (usuarios vs administradores).
- **Diseño responsivo**: Garantizar que la aplicación se vea bien en dispositivos de diferentes tamaños.

---
---

## ⚙️ ¿Cómo instalar y usar el proyecto?

### Requisitos previos

1. Tener instalado **[XAMPP](https://www.apachefriends.org/es/index.html)**.
2. Tener un navegador web (como Google Chrome).
3. Descargar el proyecto desde este repositorio.

### Pasos para la configuración

1. **Descarga y descomprime el proyecto**:
   - Descarga el proyecto desde GitHub como archivo ZIP o clónalo con Git:
     ```bash
     git clone https://github.com/Roldanlautaro/WallpaperByLauti.git
     ```
   - Copia la carpeta del proyecto a la ruta:  
     ```
     C:\xampp\htdocs\
     ```

2. **Configura la base de datos**:
   - Inicia XAMPP y activa los módulos **Apache** y **MySQL**.
   - Abre **phpMyAdmin** desde `http://localhost/phpmyadmin`.
   - Crea una base de datos llamada `wallpaperbylauti`.
   - Importa el archivo SQL del proyecto:
     - Ve a la pestaña **Importar**.
     - Selecciona el archivo `wallpaperbylauti.sql` ubicado en la carpeta del proyecto.
     - Haz clic en **Continuar**.

3. **Configura las credenciales de la base de datos**:
   - Abre el archivo `config.php` en el directorio raíz del proyecto.
   - Asegúrate de que las credenciales coincidan con tu configuración de XAMPP:
     ```php
     <?php
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "wallpaperbylauti";
     ?>
     ```

4. **Ejecuta el proyecto**:
   - Abre tu navegador y ve a:  
     ```
     http://localhost/WallpaperByLauti
     ```

---

¡Espero que disfrutes explorando este proyecto tanto como yo disfruté creándolo! 😄
