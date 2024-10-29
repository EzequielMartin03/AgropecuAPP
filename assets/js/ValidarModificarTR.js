document.addEventListener("DOMContentLoaded", function() {

    const forms = document.querySelectorAll("form[id^='formModificarTrabajo']");
    forms.forEach(form => {
        form.addEventListener("submit", function(e) {
            e.preventDefault(); 

            const trabajoId = form.querySelector('input[name="IdTrabajo"]').value;
            
            validarFormularioTrabajo(
                `ClienteSelect${trabajoId}`,
                `mySelect4${trabajoId}`,
                `mySelect5${trabajoId}`,
                `Descripcion${trabajoId}`,
                `CantidadHectareas${trabajoId}`,
                `NroFactura${trabajoId}`,
                `FechaTrabajo${trabajoId}`,
                `FechaPago${trabajoId}`,
                `invalidClienteSelect${trabajoId}`,
                `invalidAguatero${trabajoId}`,
                `invalidFumigador${trabajoId}`,
                `invalidDescripcion${trabajoId}`,
                `invalidCantidadHectareas${trabajoId}`,
                `invalidNroFactura${trabajoId}`,
                `invalidFechaTrabajo${trabajoId}`,
                `invalidFechaPago${trabajoId}`,
                form
            );
        });
    });

    function validarFormularioTrabajo(cliente, aguatero, fumigador, descripcion, hectareas, factura, fechaTrabajo, fechaPago, 
                                      errorCliente, errorAguatero, errorFumigador, errorDescripcion, errorHectareas, 
                                      errorFactura, errorFechaTrabajo, errorFechaPago, form) {

        let valido = true;

        // Obtener elementos de los campos
        const clienteInput = document.getElementById(cliente);
        const aguateroInput = document.getElementById(aguatero);
        const fumigadorInput = document.getElementById(fumigador);
        const descripcionInput = document.getElementById(descripcion);
        const hectareasInput = document.getElementById(hectareas);
        const facturaInput = document.getElementById(factura);
        const fechaTrabajoInput = document.getElementById(fechaTrabajo);
        const fechaPagoInput = document.getElementById(fechaPago);

        // Limpiar mensajes de error previos
        document.getElementById(errorCliente).innerText = '';
        document.getElementById(errorAguatero).innerText = '';
        document.getElementById(errorFumigador).innerText = '';
        document.getElementById(errorDescripcion).innerText = '';
        document.getElementById(errorHectareas).innerText = '';
        document.getElementById(errorFactura).innerText = '';
        document.getElementById(errorFechaTrabajo).innerText = '';
        document.getElementById(errorFechaPago).innerText = '';

        // Limpiar estilos de error previos
        clienteInput.classList.remove('is-invalid');
        aguateroInput.classList.remove('is-invalid');
        fumigadorInput.classList.remove('is-invalid');
        descripcionInput.classList.remove('is-invalid');
        hectareasInput.classList.remove('is-invalid');
        facturaInput.classList.remove('is-invalid');
        fechaTrabajoInput.classList.remove('is-invalid');
        

        

        if (aguateroInput.selectedOptions.length === 0) {
            aguateroInput.classList.add('is-invalid');
            document.getElementById(errorAguatero).innerText = 'Seleccione al menos un aguatero.';
            valido = false;
        }

        if (fumigadorInput.selectedOptions.length === 0) {
            fumigadorInput.classList.add('is-invalid');
            document.getElementById(errorFumigador).innerText = 'Seleccione al menos un fumigador.';
            valido = false;
        }

        if (descripcionInput.value.trim() === "") {
            descripcionInput.classList.add('is-invalid');
            document.getElementById(errorDescripcion).innerText = 'Ingrese una descripción válida.';
            valido = false;
        }

        if (hectareasInput.value.trim() === "" || parseFloat(hectareasInput.value) <= 0) {
            hectareasInput.classList.add('is-invalid');
            document.getElementById(errorHectareas).innerText = 'Ingrese una cantidad de hectáreas válida.';
            valido = false;
        }


        if (fechaTrabajoInput.value.trim() === "") {
            fechaTrabajoInput.classList.add('is-invalid');
            document.getElementById(errorFechaTrabajo).innerText = 'Ingrese una fecha de trabajo válida.';
            valido = false;
        }

        

        // Si el formulario es válido, mostrar la confirmación
        if (valido) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "Confirma que los datos son correctos",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, guardar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Guardado!',
                        'El trabajo ha sido modificado correctamente.',
                        'success'
                    ).then(() => {
                        form.submit(); 
                    });
                }
            });
        }
    }
});
