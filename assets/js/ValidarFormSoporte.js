document.addEventListener("DOMContentLoaded", function() {
    const formSoporte = document.getElementById("formSoporte");

    if (formSoporte) {
        formSoporte.addEventListener("submit", function(e) {
            e.preventDefault(); // Evitar el envío inmediato del formulario
            validarFormularioSoporte(
                "NombreSoporte",
                "EmailSoporte",
                "MensajeSoporte",
                "errorNombre",
                "errorEmail",
                "errorMensaje"
            );
        });
    }

    function validarFormularioSoporte(nombre, email, mensaje, errorNombre, errorEmail, errorMensaje) {
        let ExpresionNombre = /^[A-Za-zÁÉÍÓÚáéíóúÑñ' ]+$/;
        let expresionEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        let valido = true;

        let nombreInput = document.getElementById(nombre);
        let emailInput = document.getElementById(email);
        let mensajeInput = document.getElementById(mensaje);

        // Limpiar mensajes de error previos
        document.getElementById(errorNombre).innerText = '';
        document.getElementById(errorEmail).innerText = '';
        document.getElementById(errorMensaje).innerText = '';

        nombreInput.classList.remove('is-invalid');
        emailInput.classList.remove('is-invalid');
        mensajeInput.classList.remove('is-invalid');

        // Validar Nombre
        if (nombreInput.value.trim() === "" || !ExpresionNombre.test(nombreInput.value)) {
            nombreInput.classList.add('is-invalid');
            document.getElementById(errorNombre).innerText = 'El nombre ingresado es inválido.';
            valido = false;
        }

        // Validar Email
        if (emailInput.value.trim() === "" || !expresionEmail.test(emailInput.value)) {
            emailInput.classList.add('is-invalid');
            document.getElementById(errorEmail).innerText = 'El email ingresado es inválido.';
            valido = false;
        }

        // Validar Mensaje
        if (mensajeInput.value.trim() === "" || mensajeInput.value.length < 10) {
            mensajeInput.classList.add('is-invalid');
            document.getElementById(errorMensaje).innerText = 'El mensaje debe tener al menos 10 caracteres.';
            valido = false;
        }

        // Si todo es válido, mostrar confirmación
        if (valido) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "Confirma que los datos son correctos",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, enviar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Enviado!',
                        'El mensaje ha sido enviado correctamente.',
                        'success'
                    ).then(() => {
                        
                        formSoporte.submit(); 
                    });
                }
            });
        }
    }
});
