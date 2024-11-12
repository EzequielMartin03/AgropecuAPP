document.addEventListener("DOMContentLoaded", function() {
    // Selecciona todos los formularios que empiezan con "formModificarCliente"
    const formsModificarCliente = document.querySelectorAll("form[id^='formModificarCliente']");
    const formsModificarAguatero = document.querySelectorAll("form[id^='formModificarAguatero']");
    const formsModificarFumigador = document.querySelectorAll("form[id^='formModificarFumigador']");

    formsModificarCliente.forEach(formModificarCliente => {
        formModificarCliente.addEventListener("submit", function(e) {
            e.preventDefault();

            // Obtén el IdCliente desde el input oculto
            const idCliente = formModificarCliente.querySelector('input[name="IdCliente"]').value;
            let cuitOriginal = sessionStorage.getItem('cuitguardadoCliente');

           
                fetch('http://localhost/MVCC/index.php/?c=Cliente&a=ObtenerCuitsClientes', {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json' // Especifica el tipo de contenido
                    }
                })
                .then(response => response.json()) // Convierte la respuesta a JSON
                .then(cuits => {
                    validarFormulario(
                        `NombreModificar${idCliente}`,
                        `CuitModificar${idCliente}`,
                        `DireccionModificar${idCliente}`,
                        `TelefonoModificar${idCliente}`,
                        `errorNombreModificar${idCliente}`,
                        `errorCuitModificar${idCliente}`,
                        `errorDireccionModificar${idCliente}`,
                        `errorTelefonoModificar${idCliente}`,
                        formModificarCliente,
                        cuitOriginal,
                        cuits
                    );
                  
                })
                .catch(error => {
                    console.error('Error:', error); // Manejo de errores
                });
            });

           
        });


    

    
    formsModificarAguatero.forEach(formModificarAguatero => {
        formModificarAguatero.addEventListener("submit", function(e) {
            e.preventDefault();

            // Obtén el IdCliente desde el input oculto
            const IdAguatero = formModificarAguatero.querySelector('input[name="IdAguatero"]').value;
            let cuitOriginal = sessionStorage.getItem('cuitguardadoAguatero');

            formModificarAguatero.addEventListener("submit", function(e) {
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

            validarFormulario(
                `NombreModificarAguatero${IdAguatero}`,
                `CuitModificarAguatero${IdAguatero}`,
                `DireccionModificarAguatero${IdAguatero}`,
                `TelefonoModificarAguatero${IdAguatero}`,
                `errorNombreModificarAguatero${IdAguatero}`,
                `errorCuitModificarAguatero${IdAguatero}`,
                `errorDireccionModificarAguatero${IdAguatero}`,
                `errorTelefonoModificarAguatero${IdAguatero}`,
                formModificarAguatero,
                cuitOriginal,
                cuits
            );
            
        });

    });

        });

    });

    formsModificarFumigador.forEach(formsModificarFumigador => {
        formsModificarFumigador.addEventListener("submit", function(e) {
            e.preventDefault();

            // Obtén el IdCliente desde el input oculto
            const IdFumigador = formsModificarFumigador.querySelector('input[name="IdFumigador"]').value;
            let cuitOriginal = sessionStorage.getItem('cuitguardadoFumigador');
            formsModificarFumigador.addEventListener("submit", function(e) {
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

            validarFormulario(
                `Nombre${IdFumigador}`,
                `Cuit${IdFumigador}`,
                `Direccion${IdFumigador}`,
                `Telefono${IdFumigador}`,
                `errorNombreFumigador${IdFumigador}`,
                `errorCuitFumigador${IdFumigador}`,
                `errorDireccionFumigador${IdFumigador}`,
                `errorTelefonoFumigador${IdFumigador}`,
                formsModificarFumigador,
                cuitOriginal,
                cuits
            );
            
        });

    });

        });

    });

    function validarFormulario(nombre, cuit, direccion, telefono, errorNombre, errorCuit, errorDireccion, errorTelefono, form, cuitOriginal, cuits) {
        let ExpresionNombre = /^[A-Za-zÁÉÍÓÚáéíóúÑñ' ]+$/;
        let expresionDireccion = /^[A-Za-zÁÉÍÓÚáéíóúÑñ0-9\s,.]+$/;
        let expresionTelefono = /^[0-9]{10}$/;
        let expresionCuit = /^[0-9]{11}$/;
        let valido = true;
       

        const nombreInput = document.getElementById(nombre);
        const cuitInput = document.getElementById(cuit);
        const direccionInput = document.getElementById(direccion);
        const telefonoInput = document.getElementById(telefono);

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
        
        } else if (cuitInput.value !== cuitOriginal) {
            
            const cuitIngresado = parseInt(cuitInput.value);
                    if (cuits.includes(cuitIngresado)) {
                        cuitInput.classList.add('is-invalid');
                        document.getElementById(errorCuit).innerText = 'El CUIT ingresado ya se encuentra registrado.';
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
                        form.submit();
                    });
                }
            });
        }
    }

});
