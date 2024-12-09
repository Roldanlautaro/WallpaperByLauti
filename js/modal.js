function openModal(fotoPath, tituloActual) {
    document.getElementById("fotoPath").value = fotoPath;
    document.getElementById("titulo").value = tituloActual;
    document.getElementById("photoModal").style.display = "block";
}

function closeModal() {
    document.getElementById("photoModal").style.display = "none";
}

window.onclick = function(event) {
    if (event.target == document.getElementById("photoModal")) {
        closeModal();
    }
};

