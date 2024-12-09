function openModal(fotoPath, titulo) {
    // Setear los valores en el modal
    document.getElementById('fotoPath').value = fotoPath;
    document.getElementById('titulo').value = titulo;
    
    // Mostrar el modal
    document.getElementById('photoModal').style.display = 'block';
}

// Función para cerrar el modal
function closeModal() {
    document.getElementById('photoModal').style.display = 'none';
}

// Función para guardar cambios con SweetAlert2
function guardarCambios() {
    Swal.fire({
        title: '¿Estás seguro?',
        text: '¿Deseas guardar los cambios realizados?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Guardar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            // Enviar el formulario de edición
            document.getElementById('editForm').submit();
        }
    });
}

// Función para eliminar foto con SweetAlert2
// Función para eliminar foto con SweetAlert2
function eliminarFoto() {
    Swal.fire({
        title: '¿Estás seguro?',
        text: '¿Deseas eliminar esta foto?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            // Indicar que la acción es eliminar
            document.getElementById('accion').value = 'borrar';  // Añadir la acción de "borrar"
            // Enviar el formulario de edición (el que ahora también incluye la acción de borrar)
            document.getElementById('editForm').submit();
        }
    });
}


   
