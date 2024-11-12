// Espera a que el contenido del DOM se cargue completamente
document.addEventListener("DOMContentLoaded", function() {
    // Obtiene los formularios por sus IDs
    let formAltaCliente = document.getElementById("formAltaCliente");
    let formAltaAguatero = document.getElementById("formAltaAguatero");
    let formAltaFumigador = document.getElementById("formAltaFumigador");

    // Verifica si el formulario de alta cliente existe
    if (formAltaCliente) {
        // Agrega un evento al formulario cuando se envía
        formAltaCliente.addEventListener("submit", function(e) {
            e.preventDefault(); // Previene el comportamiento por defecto del formulario
            // Realiza una solicitud GET para obtener los CUITs de los clientes
            fetch('http://localhost/MVCC/index.php/?c=Cliente&a=ObtenerCuitsClientes', {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json' // Especifica el tipo de contenido
                }
            })
            .then(response => response.json()) // Convierte la respuesta a JSON
            .then(cuits => {
                // Llama a la función de validación con los datos del formulario y los CUITs obtenidos
                validarFormulario(
                    "NombreCliente",
                    "CuitCliente",
                    "DireccionCliente",
                    "TelefonoCliente",
                    "errorNombreCliente",
                    "errorCuitCliente",
                    "errorDireccionCliente",
                    "errortelefonoCliente",
                    cuits // Pasa el array de CUITs a la función
                );
            })
            .catch(error => {
                console.error('Error:', error); // Manejo de errores
            });
        });
    }

    // Verifica si el formulario de alta aguatero existe
    if (formAltaAguatero) {
        // Agrega un evento al formulario cuando se envía
        formAltaAguatero.addEventListener("submit", function(e) {
            e.preventDefault(); // Previene el comportamiento por defecto del formulario
            // Realiza una solicitud GET para obtener los CUITs de los aguateros
            fetch('http://localhost/MVCC/index.php/?c=Aguatero&a=ObtenerCuitsAguateros', {
                method: 'GET',
                headers: { 
                    'Content-Type': 'application/json' // Especifica el tipo de contenido
                }
            })
            .then(response => response.json()) // Convierte la respuesta a JSON
            .then(cuits => {
                // Llama a la función de validación con los datos del formulario y los CUITs obtenidos
                validarFormulario(
                    "NombreAguatero",
                    "CuitAguatero",
                    "DireccionAguatero",
                    "TelefonoAguatero",
                    "errorNombreAguatero",
                    "errorCuitAguatero",
                    "errorDireccionAguatero",
                    "errorTelefonoAguatero",
                    cuits // Pasa el array de CUITs a la función
                );
            })
            .catch(error => {
                console.error('Error:', error); // Manejo de errores
            });
        });
    }

    // Verifica si el formulario de alta fumigador existe
    if (formAltaFumigador) {
        // Agrega un evento al formulario cuando se envía
        formAltaFumigador.addEventListener("submit", function(e) {
            e.preventDefault(); // Previene el comportamiento por defecto del formulario
            // Realiza una solicitud GET para obtener los CUITs de los fumigadores
            fetch('http://localhost/MVCC/index.php/?c=Fumigador&a=ObtenerCuitsFumigadores', {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json' // Especifica el tipo de contenido
                }
            })
            .then(response => response.json()) // Convierte la respuesta a JSON
            .then(cuits => {
                // Llama a la función de validación con los datos del formulario y los CUITs obtenidos
                validarFormulario(
                    "NombreFumigador",
                    "CuitFumigador",
                    "DireccionFumigador",
                    "TelefonoFumigador",
                    "errorNombreFumigador",
                    "errorCuitFumigador",
                    "errorDireccionFumigador",
                    "errorTelefonoFumigador",
                    cuits // Pasa el array de CUITs a la función
                );
            });
        });
    }

    // La función de validación para el formulario de alta
    function validarFormulario(nombre,cuit, direccion, telefono, errorNombre, errorCuit, errorDireccion, errorTelefono,cuits) {
        // Definición de expresiones regulares para la validación
        let ExpresionNombre = /^[A-Za-zÁÉÍÓÚáéíóúÑñ\s']+$/;
        let expresionDireccion = /^[A-Za-zÁÉÍÓÚáéíóúÑñ0-9\s,.]+$/;
        let expresionTelefono = /^[0-9]+$/;
        let expresionCuit = /^[0-9]{11}$/; // Se espera un CUIT de 11 dígitos
        let valido = true; // Variable para determinar si el formulario es válido
    
    
        // Obtiene los inputs por su ID
        let nombreInput = document.getElementById(nombre);
        let cuitInput = document.getElementById(cuit);
        let direccionInput = document.getElementById(direccion);
        let telefonoInput = document.getElementById(telefono);
    
        // Limpia los mensajes de error anteriores
        document.getElementById(errorNombre).innerText = '';
        document.getElementById(errorCuit).innerText = '';
        document.getElementById(errorDireccion).innerText = '';
        document.getElementById(errorTelefono).innerText = '';
    
        // Remueve las clases de error de los inputs
        nombreInput.classList.remove('is-invalid');
        cuitInput.classList.remove('is-invalid');
        direccionInput.classList.remove('is-invalid');
        telefonoInput.classList.remove('is-invalid');
    
        // Validar Nombre
        if (nombreInput.value == "" || !ExpresionNombre.test(nombreInput.value)) {
            nombreInput.classList.add('is-invalid'); // Agrega clase de error
            document.getElementById(errorNombre).innerText = 'El nombre ingresado es inválido.'; // Muestra mensaje de error
            valido = false; // Marca como no válido
        }
    
        // Validar Dirección
        if (direccionInput.value == "" || !expresionDireccion.test(direccionInput.value)) {
            direccionInput.classList.add('is-invalid'); // Agrega clase de error
            document.getElementById(errorDireccion).innerText = 'La dirección ingresada es inválida.'; // Muestra mensaje de error
            valido = false; // Marca como no válido
        }
    
        // Validar Teléfono
        if (telefonoInput.value == "" || !expresionTelefono.test(telefonoInput.value)) {
            telefonoInput.classList.add('is-invalid'); // Agrega clase de error
            document.getElementById(errorTelefono).innerText = 'El teléfono ingresado es inválido.'; // Muestra mensaje de error
            valido = false; // Marca como no válido
        }
    
        // Validar CUIT
        if (cuitInput.value == "" || !expresionCuit.test(cuitInput.value)) {
            cuitInput.classList.add('is-invalid'); // Agrega clase de error
            document.getElementById(errorCuit).innerText = 'El CUIT ingresado es inválido.'; // Muestra mensaje de error
            valido = false; // Marca como no válido
        } else  {
            // Verifica si el CUIT ingresado ya existe
            if (cuits.includes(parseInt(cuitInput.value))) {
                cuitInput.classList.add('is-invalid'); // Agrega clase de error
                document.getElementById(errorCuit).innerText = 'El CUIT ingresado ya existe.'; // Muestra mensaje de error
                valido = false; // Marca como no válido
            }
        }
    
        // Si todo es válido, mostrar confirmación
        if (valido) {
            // Muestra una alerta de confirmación
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
                // Si se confirma, muestra un mensaje de éxito y envía el formulario
                if (result.isConfirmed) {
                    Swal.fire(
                        'Enviado!',
                        'El registro ha sido enviado correctamente.',
                        'success'
                    ).then(() => {
                        document.getElementById(nombre).form.submit(); // Envía el formulario
                    });
                }
            });
        }
    }
});
