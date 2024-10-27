document.addEventListener("DOMContentLoaded", function() {
    let formAltaCliente = document.getElementById("formAltaCliente");
    let formAltaAguatero = document.getElementById("formAltaAguatero");
    let formAltaFumigador = document.getElementById("formAltaFumigador");

    if (formAltaCliente) {
        formAltaCliente.addEventListener("submit", function(e) {
            e.preventDefault();
            fetch('http://localhost/MVCC/index.php/?c=Cliente&a=ObtenerCuitsClientes', {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(cuits => {
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
                console.error('Error:', error);
            });
        });
    }

    if (formAltaAguatero) {
        formAltaAguatero.addEventListener("submit", function(e) {
            e.preventDefault();
            fetch('http://localhost/MVCC/index.php/?c=Aguatero&a=ObtenerCuitsAguateros', {
                method: 'GET',
                headers: { 
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(cuits => {
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
                console.error('Error:', error);
            });
        });
    }

    if (formAltaFumigador) {
        formAltaFumigador.addEventListener("submit", function(e) {
            e.preventDefault();
            fetch('http://localhost/MVCC/index.php/?c=Fumigador&a=ObtenerCuitsFumigadores', {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(cuits => {
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
        let ExpresionNombre = /^[A-Za-zÁÉÍÓÚáéíóúÑñ' ]+$/;
        let expresionDireccion = /^[A-Za-zÁÉÍÓÚáéíóúÑñ0-9\s,.]+$/;
        let expresionTelefono = /^[0-9]{10}$/;
        let expresionCuit = /^[0-9]{11}$/;
        let valido = true;
    
        console.log(cuits);
    
    
        let nombreInput = document.getElementById(nombre);
        let cuitInput = document.getElementById(cuit);
        let direccionInput = document.getElementById(direccion);
        let telefonoInput = document.getElementById(telefono);
    
    
        document.getElementById(errorNombre).innerText = '';
        document.getElementById(errorCuit).innerText = '';
        document.getElementById(errorDireccion).innerText = '';
        document.getElementById(errorTelefono).innerText = '';
    
    
        nombreInput.classList.remove('is-invalid');
        cuitInput.classList.remove('is-invalid');
        direccionInput.classList.remove('is-invalid');
        telefonoInput.classList.remove('is-invalid');
    
        // Validar Nombre
        if (nombreInput.value == "" || !ExpresionNombre.test(nombreInput.value)) {
            nombreInput.classList.add('is-invalid');
            document.getElementById(errorNombre).innerText = 'El nombre ingresado es inválido.';
            valido = false;
        }
    
        // Validar Dirección
        if (direccionInput.value == "" || !expresionDireccion.test(direccionInput.value)) {
            direccionInput.classList.add('is-invalid');
            document.getElementById(errorDireccion).innerText = 'La dirección ingresada es inválida.';
            valido = false;
        }
    
        // Validar Teléfono
        if (telefonoInput.value == "" || !expresionTelefono.test(telefonoInput.value)) {
            telefonoInput.classList.add('is-invalid');
            document.getElementById(errorTelefono).innerText = 'El teléfono ingresado es inválido.';
            valido = false;
        }
    
    
    
        // Validar CUIT
        if (cuitInput.value == "" || !expresionCuit.test(cuitInput.value)) {
            cuitInput.classList.add('is-invalid');
            document.getElementById(errorCuit).innerText = 'El CUIT ingresado es inválido.';
            valido = false;
        }else  {
            if (cuits.includes(parseInt(cuitInput.value))) {
                cuitInput.classList.add('is-invalid');
                document.getElementById(errorCuit).innerText = 'El CUIT ingresado ya existe.';
                valido = false;
            }
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
                        'El registro ha sido enviado correctamente.',
                        'success'
                    ).then(() => {
                        document.getElementById(nombre).form.submit(); 
                    });
                }
            });
        }
    }
});
