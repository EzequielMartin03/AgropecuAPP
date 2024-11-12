document.addEventListener("DOMContentLoaded", function() {

    // Obtiene el formulario con el id "formSoporte".
    const formSoporte = document.getElementById("formSoporte");

    // Verifica si el formulario existe en el DOM.
    if (formSoporte) {
        formSoporte.addEventListener("submit", function(e) {
            // Evita que el formulario se envíe de inmediato.
            e.preventDefault(); 
            // Llama a la función de validación del formulario con los parámetros necesarios.
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

    // Define la función para validar el formulario de soporte.
    function validarFormularioSoporte(nombre, email, mensaje, errorNombre, errorEmail, errorMensaje) {

        // Expresión regular para validar nombres (solo letras y espacios).
        let ExpresionNombre = /^[A-Za-zÁÉÍÓÚáéíóúÑñ' ]+$/;

        // Expresión regular para validar el formato del email.
        let expresionEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        
        let valido = true; // Variable para controlar si el formulario es válido.

        // Obtiene los elementos del DOM correspondientes a los campos de entrada.
        let nombreInput = document.getElementById(nombre);
        let emailInput = document.getElementById(email);
        let mensajeInput = document.getElementById(mensaje);

        // Limpia los mensajes de error previos.
        document.getElementById(errorNombre).innerText = '';
        document.getElementById(errorEmail).innerText = '';
        document.getElementById(errorMensaje).innerText = '';

        // Remueve la clase de error (si la tiene) de los campos de entrada.
        nombreInput.classList.remove('is-invalid');
        emailInput.classList.remove('is-invalid');
        mensajeInput.classList.remove('is-invalid');

        // Valida el campo Nombre.
        if (nombreInput.value == "" || !ExpresionNombre.test(nombreInput.value)) {
            // Si es inválido, agrega la clase de error y muestra el mensaje de error.
            nombreInput.classList.add('is-invalid');
            document.getElementById(errorNombre).innerText = 'El nombre ingresado es inválido.';
            valido = false; // Cambia el estado de válido a falso.
        }

        // Valida el campo Email.
        if (emailInput.value == "" || !expresionEmail.test(emailInput.value)) {
            // Si es inválido, agrega la clase de error y muestra el mensaje de error.
            emailInput.classList.add('is-invalid');
            document.getElementById(errorEmail).innerText = 'El email ingresado es inválido.';
            valido = false; // Cambia el estado de válido a falso.
        }

        // Valida el campo Mensaje.
        if (mensajeInput.value == "" || mensajeInput.value.length < 10) {
            // Si es inválido, agrega la clase de error y muestra el mensaje de error.
            mensajeInput.classList.add('is-invalid');
            document.getElementById(errorMensaje).innerText = 'El mensaje debe tener al menos 10 caracteres.';
            valido = false; // Cambia el estado de válido a falso.
        }

        // Si todas las validaciones son correctas (valido es verdadero).
        if (valido) {
            // Muestra una alerta de confirmación utilizando SweetAlert.
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
                // Si el usuario confirma la acción.
                if (result.isConfirmed) {
                    // Muestra un mensaje de éxito.
                    Swal.fire(
                        'Enviado!',
                        'El mensaje ha sido enviado correctamente.',
                        'success'
                    ).then(() => {
                        // Envía el formulario.
                        formSoporte.submit(); 
                    });
                }
            });
        }
    }
});
