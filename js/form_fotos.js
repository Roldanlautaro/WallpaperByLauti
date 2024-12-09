function selectOnlyThis(checkbox) { 

    const checkboxes = document.querySelectorAll('input[name="tipo"]');
    checkboxes.forEach((item) => {
        if (item !== checkbox) {
            item.checked = false;
        }
    });
}
// Jquery para alertas

$("#btn-subir-foto").click(function(event) {
    event.preventDefault(); // Evitar que el formulario se envíe automáticamente

    // Validar el formulario
    var titulo = $("#titulo").val();
    var tipoSeleccionado = $("input[name='tipo']:checked").length > 0;
    var filtro = $("select[name='filtro']").val();
    var archivo = $("#foto").val();

    // Comprobar si todos los campos están llenos
    if (titulo && tipoSeleccionado && filtro && archivo) {
        // Crear un objeto FormData con los datos del formulario
        var form = $("form")[0];
        var formData = new FormData(form);

        // Enviar la solicitud AJAX con jQuery
        $.ajax({
            url: "basededatos/upload.php",
            type: "POST",
            data: formData,
            processData: false, // No procesar los datos (es necesario para enviar FormData)
            contentType: false, // No establecer ningún tipo de contenido
            success: function(response) {
                // Mostrar la alerta de éxito
                Swal.fire({
                    title: "¡Buen trabajo!",
                    text: "La foto se ha subido con éxito.",
                    icon: "success",
                    confirmButtonText: "OK"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Redirigir a index.php cuando se haga clic en "OK"
                        window.location.href = "index.php";
                    }
                });
            },
            error: function() {
                // Mostrar una alerta de error si la solicitud falla
                Swal.fire({
                    title: "Error",
                    text: "Hubo un problema al subir la foto.",
                    icon: "error",
                    confirmButtonText: "OK"
                });
            }
        });
    } else {
        // Mostrar una alerta de error si el formulario no está completo
        Swal.fire({
            title: "Error",
            text: "Por favor, completa todos los campos antes de subir la foto.",
            icon: "error",
            confirmButtonText: "OK"
        });
    }
});
