document.addEventListener("DOMContentLoaded", function() {
    const formNuevoTrabajo = document.getElementById("nuevoTrabajoForm");

    if (formNuevoTrabajo) {
        formNuevoTrabajo.addEventListener("submit", function(e) {
            e.preventDefault();
            validarFormulario(
                "nuevoClienteSelect",
                "mySelect",
                "mySelect2",
                "Hectareas",
                "Descripcion",
                "NroFactura",
                "FechaPago",
                "Fecha",
                "errorClienteTrabajo",
                "errorAguateroTrabajo",
                "errorFumigadorTrabajo",
                "errorHectareasTrabajo",
                "errorDescripcionTrabajo",
                "errorNroFacturaTrabajo",
                "errorFechaPagoTrabajo",
                "errorFechaTrabajo"
            );
        });
    }

    function validarFormulario(cliente, aguatero, fumigador, hectareas, descripcion, nroFactura, fechaPago, fechaTrabajo, errorCliente, errorAguatero, errorFumigador, errorHectareas, errorDescripcion, errorNroFactura, errorFechaPago, errorFechaTrabajo) {
        let valido = true;

        // Limpiar mensajes de error previos
        document.getElementById(errorCliente).innerText = '';
        document.getElementById(errorAguatero).innerText = '';
        document.getElementById(errorFumigador).innerText = '';
        document.getElementById(errorHectareas).innerText = '';
        document.getElementById(errorDescripcion).innerText = '';
        document.getElementById(errorNroFactura).innerText = '';
        document.getElementById(errorFechaPago).innerText = '';
        document.getElementById(errorFechaTrabajo).innerText = '';

        // Obtener los elementos del formulario
        const clienteSelect = document.getElementById(cliente);
        const aguateroSelect = document.getElementById(aguatero);
        const fumigadorSelect = document.getElementById(fumigador);
        const hectareasInput = document.getElementById(hectareas);
        const descripcionInput = document.getElementById(descripcion);
        const nroFacturaInput = document.getElementById(nroFactura);
        const fechaPagoInput = document.getElementById(fechaPago);
        const fechaTrabajoInput = document.getElementById(fechaTrabajo);

        clienteSelect.classList.remove('is-invalid');
        aguateroSelect.classList.remove('is-invalid');
        fumigadorSelect.classList.remove('is-invalid');
        hectareasInput.classList.remove('is-invalid');
        descripcionInput.classList.remove('is-invalid');
        nroFacturaInput.classList.remove('is-invalid');
        fechaPagoInput.classList.remove('is-invalid');
        fechaTrabajoInput.classList.remove('is-invalid');

        // Validar Cliente
        if (clienteSelect.value == "") {
            clienteSelect.classList.add('is-invalid');
            document.getElementById(errorCliente).innerText = "Por favor, selecciona un cliente.";
            valido = false;
        }

        // Validar Aguateros
        if (aguateroSelect.selectedOptions.length == 0) {
            aguateroSelect.classList.add('is-invalid');
            document.getElementById(errorAguatero).innerText = "Por favor, selecciona al menos un aguatero.";
            valido = false;
        }

        // Validar Fumigadores
        if (fumigadorSelect.selectedOptions.length == 0) {
            fumigadorSelect.classList.add('is-invalid');
            document.getElementById(errorFumigador).innerText = "Por favor, selecciona al menos un fumigador.";
            valido = false;
        }

        // Validar Hectáreas
        if (hectareasInput.value == "" || hectareasInput.value <= 0) {
            hectareasInput.classList.add('is-invalid');
            document.getElementById(errorHectareas).innerText = "Por favor, ingresa un número de hectáreas válido.";
            valido = false;
        }

        // Validar Descripción
        if (descripcionInput.value == "") {
            descripcionInput.classList.add('is-invalid');
            document.getElementById(errorDescripcion).innerText = "Por favor, ingresa una descripción.";
            valido = false;
        }

       
        // Validar Fecha de Trabajo
        if (fechaTrabajoInput.value == "") {
            fechaTrabajoInput.classList.add('is-invalid');
            document.getElementById(errorFechaTrabajo).innerText = "Por favor, selecciona una fecha de trabajo.";
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
                        'Trabajo Cargado correctamente.',
                        'success'
                    ).then(() => {
                        formNuevoTrabajo.submit();
                    });
                }
            });
        }
    }
});
