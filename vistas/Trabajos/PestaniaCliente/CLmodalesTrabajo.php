<!-- Modal para modificar -->
<div class="modal fade" id="ModificarTrabajo<?= $Trabajo->IdTrabajo ?>" tabindex="-1" aria-labelledby="ModificarTrabajoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModificarTrabajoLabel">Modificar Trabajo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formModificarTrabajo<?= $Trabajo->IdTrabajo ?>" method="POST" action="?c=trabajo&a=Modificar" >
                    <input type="hidden" name="IdTrabajo" value="<?= $Trabajo->IdTrabajo ?>">
                    
                    <!-- Campo Cliente -->
                    <div class="mb-3">
                        <label for="ClienteSelect<?= $Trabajo->IdTrabajo ?>" class="form-label">Cliente</label>
                        <select id="ClienteSelect<?= $Trabajo->IdTrabajo ?>" name="ClienteSelect" class="form-select">
                            <?php foreach ($clientes as $cliente): ?>
                                <option value="<?= $cliente->IdCliente ?>" <?= ($cliente->IdCliente == $Trabajo->IdCliente) ? 'selected' : '' ?>>
                                    <?= $cliente->Nombre ?> 
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <div id="invalidClienteSelect<?= $Trabajo->IdTrabajo ?>" class="invalid-feedback">Seleccione un cliente válido.</div>
                    </div>

                    <!-- Campo Aguatero -->
                    <div class="mb-3">
                        <label for="mySelect4<?= $Trabajo->IdTrabajo ?>" class="form-label">Aguatero</label>
                        <select id="mySelect4<?= $Trabajo->IdTrabajo ?>" name="aguatero[]" multiple="multiple" class="form-select select2">
                            <?php foreach ($ListaAguateros as $aguatero): ?>
                                <option value="<?= $aguatero->IdAguatero ?>" <?= in_array($aguatero->IdAguatero, $Trabajo->aguaterosSeleccionados) ? 'selected' : '' ?>>
                                    <?= $aguatero->NombreAguatero ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <div id="invalidAguatero<?= $Trabajo->IdTrabajo ?>" class="invalid-feedback"></div>
                    </div>

                    <!-- Campo Fumigador -->
                    <div class="mb-3">
                        <label for="mySelect5<?= $Trabajo->IdTrabajo ?>" class="form-label">Fumigador</label>
                        <select id="mySelect5<?= $Trabajo->IdTrabajo ?>" name="fumigador[]" multiple="multiple" class="form-select select2">
                            <?php foreach ($ListaFumigadores as $Fumigador): ?>
                                <option value="<?= $Fumigador->IdFumigador ?>" <?= in_array($Fumigador->IdFumigador, $Trabajo->fumigadoresSeleccionados) ? 'selected' : '' ?>>
                                    <?= $Fumigador->NombreFumigador ?> 
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <div id="invalidFumigador<?= $Trabajo->IdTrabajo ?>" class="invalid-feedback"></div>
                    </div>

                    <!-- Descripción -->
                    <div class="mb-3">
                        <label for="Descripcion<?= $Trabajo->IdTrabajo ?>" class="form-label">Descripción</label>
                        <input type="text" class="form-control" id="Descripcion<?= $Trabajo->IdTrabajo ?>" name="Descripcion" value="<?= $Trabajo->Descripcion ?>" >
                        <div id="invalidDescripcion<?= $Trabajo->IdTrabajo ?>" class="invalid-feedback"></div>
                    </div>

                    <!-- Cantidad de Hectáreas Trabajadas -->
                    <div class="mb-3">
                        <label for="CantidadHectareas<?= $Trabajo->IdTrabajo ?>" class="form-label">Cantidad de Hectáreas Trabajadas</label>
                        <input type="number" class="form-control" id="CantidadHectareas<?= $Trabajo->IdTrabajo ?>" name="CantidadHectareas" value="<?= $Trabajo->CantidadHectareasTrabajadas ?>" >
                        <div id="invalidCantidadHectareas<?= $Trabajo->IdTrabajo ?>" class="invalid-feedback"></div>
                    </div>

                    <!-- Número de Factura -->
                    <div class="mb-3">
                        <label for="NroFactura<?= $Trabajo->IdTrabajo ?>" class="form-label">Número de Factura</label>
                        <input type="number" class="form-control" id="NroFactura<?= $Trabajo->IdTrabajo ?>" name="NroFactura" value="<?= $Trabajo->NroFacturaAfip ?>">
                        <div id="invalidNroFactura<?= $Trabajo->IdTrabajo ?>" class="invalid-feedback"></div>
                    </div>

                    <!-- Fecha de Trabajo -->
                    <div class="mb-3">
                        <label for="FechaTrabajo<?= $Trabajo->IdTrabajo ?>" class="form-label">Fecha de Trabajo</label>
                        <input type="date" class="form-control" id="FechaTrabajo<?= $Trabajo->IdTrabajo ?>" name="FechaTrabajo" value="<?= $Trabajo->FechaTrabajo ?>" >
                        <div id="invalidFechaTrabajo<?= $Trabajo->IdTrabajo ?>" class="invalid-feedback"></div>
                    </div>

                    <!-- Fecha de Pago -->
                    <div class="mb-3">
                        <label for="FechaPago<?= $Trabajo->IdTrabajo ?>" class="form-label">Fecha de Pago</label>
                        <input type="date" class="form-control" id="FechaPago<?= $Trabajo->IdTrabajo ?>" name="FechaPago" value="<?= $Trabajo->FechaPago ?>" >
                        <div id="invalidFechaPago<?= $Trabajo->IdTrabajo ?>" class="invalid-feedback"></div>
                    </div>

                    <!-- Botones del Modal -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal Eliminar Trabajo -->
<div class="modal fade" id="EliminarTrabajo<?= $Trabajo->IdTrabajo ?>" tabindex="-1" aria-labelledby="EliminarTrabajoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EliminarTrabajoLabel">Eliminar Trabajo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>¿Estás seguro de que quieres eliminar el trabajo realizado el <strong><?= $Trabajo->FechaTrabajo ?></strong> del cliente: <strong><?= $Trabajo->Nombre ?></strong>?</p>
            </div>
            <div class="modal-footer">
                <form method="POST" action="?c=trabajo&a=EliminarTrabajo">
                    <input type="hidden" name="IdTrabajo" value="<?= $Trabajo->IdTrabajo ?>">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- JS de Select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>

    $(document).ready(function() {
// Inicialización por defecto de Select2 en el primer modal
$('.select2').select2({
    placeholder: "Seleccione una o más opciones",
    allowClear: true
});

// Re-inicializar Select2 en el modal que se abre
$('body').on('shown.bs.modal', function (e) {
    var modalId = $(e.target).attr('id'); // Obtiene el ID del modal que se abre
    $('#' + modalId + ' select[id^="mySelect4"]').select2({
        placeholder: "Seleccione una o más opciones",
        allowClear: true,
        dropdownParent: $('#' + modalId) // Asocia Select2 al modal abierto
    });
});
});

$(document).ready(function() {
$('.select2').select2({
    placeholder: "Seleccione una o más opciones",
    allowClear: true
});

$('body').on('shown.bs.modal', function (e) {
    var modalId = $(e.target).attr('id'); // Obtiene el ID del modal que se abre
    $('#' + modalId + ' select[id^="mySelect5"]').select2({
        placeholder: "Seleccione una o más opciones",
        allowClear: true,
        dropdownParent: $('#' + modalId) // Asocia Select2 al modal abierto
    });
});
});


</script>

        


