document.getElementById("formAltaCliente").addEventListener("submit", function(e) {
    e.preventDefault();

    let ExpresionNombre =/^[A-Za-zÁÉÍÓÚáéíóúÑñ]+\s[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/
    let expresionDireccion =  /^[A-Za-zÁÉÍÓÚáéíóúÑñ]+\s\d+$/;
    let expresiontelefono = /^[0-9]{10}$/;
    let expresionCuit = /^[0-9]{11}$/;

    let valido = true;
  

    let Nombre = document.getElementById("Nombre");
    let Cuit = document.getElementById("Cuit");
    let Direccion = document.getElementById("Direccion");
    let Telefono = document.getElementById("Telefono");

    document.getElementById('errorNombre').innerText = '';
    document.getElementById('errorCuit').innerText = '';
    document.getElementById('errorDireccion').innerText = '';
    document.getElementById('errortelefono').innerText = '';
    

    Nombre.classList.remove('is-invalid');
    Cuit.classList.remove('is-invalid');
    Direccion.classList.remove('is-invalid');
    Telefono.classList.remove('is-invalid');

    if (Nombre.value == "" || !ExpresionNombre.test(Nombre.value)) {
        Nombre.classList.add('is-invalid');
        document.getElementById('errorNombre').innerText = 'El nombre ingresado es invalido.';
        valido = false;
        return;
    }
    if (Direccion.value == "" || !expresionDireccion.test(Direccion.value)) {
        Direccion.classList.add('is-invalid');
        document.getElementById('errorDireccion').innerText = 'La dirección ingresada es invalida.';
        valido = false;
        return;
    }

    if (Telefono.value == "" || !expresiontelefono.test(Telefono.value)) {
        Telefono.classList.add('is-invalid');
        document.getElementById('errortelefono').innerText = 'El telefono ingresado es invalido.';
        valido = false;
        return;
    }

    if (Cuit.value == "") {
        Cuit.classList.add('is-invalid');
        document.getElementById('errorCuit').innerText = 'El CUIT ingresado es invalido.';
        valido = false;
        return;
    }

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
                    // Mostrar alerta de éxito sin recargar la página
                    Swal.fire(
                        'Enviado!',
                        'El registro ha sido enviado correctamente.',
                        'success'
                    ).then(() => {
                        // Después de la alerta de éxito, envía el formulario con JS
                        document.getElementById('formAltaCliente').submit();
                    });
                }
            });
        }
    });
