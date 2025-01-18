document.addEventListener("DOMContentLoaded", function() {
    // Obtiene los formularios por sus IDs
    let formCliente = document.getElementById("formFiltrarPorCliente");
    let formAguatero = document.getElementById("formFiltrarAguatero");
    let formFumigador = document.getElementById("formFiltrarFumigador");

    if (formCliente) {
        formCliente.addEventListener("submit", function(event) {
            let fechaInicio = formCliente.querySelector("#fechaInicio").value;
            let fechaFin = formCliente.querySelector("#fechaFin").value;

            if (fechaInicio > fechaFin) {
                event.preventDefault();
                alert("La fecha de inicio no puede ser posterior a la fecha de fin.");
            }
        });
    }

    if (formAguatero) {
        formAguatero.addEventListener("submit", function(event) {
            let fechaInicio = formAguatero.querySelector("#fechaInicio").value;
            let fechaFin = formAguatero.querySelector("#fechaFin").value;

            if (fechaInicio > fechaFin) {
                event.preventDefault();
                alert("La fecha de inicio no puede ser posterior a la fecha de fin.");
            }
        });
    }

    if (formFumigador) {
        formFumigador.addEventListener("submit", function(event) {
            let fechaInicio = formFumigador.querySelector("#fechaInicio").value;
            let fechaFin = formFumigador.querySelector("#fechaFin").value;

            if (fechaInicio > fechaFin) {
                event.preventDefault();
                alert("La fecha de inicio no puede ser posterior a la fecha de fin.");
            }
        });
    }
});
