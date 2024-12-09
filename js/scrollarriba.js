// Boton para ir hacia arriba


const scrollTopButton = document.getElementById("scrollTopButton");

// Añade un evento de scroll al window
window.addEventListener("scroll", function () {
    // Muestra el botón cuando el usuario ha desplazado 50% de la altura de la página
    if (document.body.scrollTop > window.innerHeight / 2 || document.documentElement.scrollTop > window.innerHeight / 2) {
        scrollTopButton.style.display = "block";
    } else {
        scrollTopButton.style.display = "none";
    }
});

// Añade un evento de clic al botón
scrollTopButton.addEventListener("click", function () {
    // Desplaza suavemente al principio de la página
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});

