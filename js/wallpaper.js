// Seleccionamos todas las imágenes de la galería
const images = document.querySelectorAll('.grid-item img');

// Añadimos un evento de clic a cada imagen
images.forEach(image => {
    image.addEventListener('click', function() {
        // Obtener la ruta de la imagen desde el atributo data-img
        const imgSrc = this.getAttribute('data-img');
        
        // Redirigir a wallpaper.php con el parámetro de la imagen
        window.location.href = `wallpaper.php?img=${encodeURIComponent(imgSrc)}`;
    });
});


