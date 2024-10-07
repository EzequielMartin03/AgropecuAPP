<!-- Modal para modificar -->
<div class="modal fade" id="ModificarTrabajo<?= $Trabajo->IdTrabajo ?>" tabindex="-1" aria-labelledby="ModificarTrabajoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModificarTrabajoLabel">Modificar Trabajo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formModificarTrabajo<?= $Trabajo->IdTrabajo ?>" method="POST" action="?c=trabajo&a=Modificar">
                    <input type="hidden" name="IdTrabajo" value="<?= $Trabajo->IdTrabajo ?>">
                    <div class="modal-body">
                        
                        <!-- Campo Cliente -->
                        <div class="mb-3">
                            <label for="ClienteSelect" class="form-label">Cliente</label>
                            <select id="ClienteSelect<?= $Trabajo->IdTrabajo ?>" name="ClienteSelect" class="form-select">
                                <?php foreach ($clientes as $cliente): ?>
                                    <option value="<?= $cliente->IdCliente ?>" <?= ($cliente->IdCliente == $Trabajo->IdCliente) ? 'selected' : '' ?>><?= $cliente->Nombre ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        
                        <!-- Campo Aguatero -->
                        <div class="mb-3">
                            
                            <select id="mySelect4<?= $trabajo->IdTrabajo ?>" name="aguatero[]" multiple="multiple" class="form-select select2">
                                <?php foreach ($ListaAguateros as $aguatero): ?>
                                    <option value="<?= $aguatero->IdAguatero ?>" 
                                        <?= in_array($aguatero->IdAguatero,  $Trabajo->aguaterosSeleccionados) ? 'selected' : '' ?>>
                                        <?= $aguatero->NombreAguatero ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                         <!-- Campo Fumigador -->
                         <div class="mb-3">
                            
                            <select id="mySelect5<?= $trabajo->IdTrabajo ?>" name="fumigador[]" multiple="multiple" class="form-select select2">
                                <?php foreach ($ListaFumigadores as $Fumigador): ?>
                                    <option value="<?= $Fumigador->IdFumigador ?>" 
                                        <?= in_array($Fumigador->IdFumigador,  $Trabajo->fumigadoresSeleccionados) ? 'selected' : '' ?>>
                                        <?= $Fumigador->NombreFumigador ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Descripción -->
                        <div class="mb-3">
                            <label for="Descripcion<?= $Trabajo->IdTrabajo ?>" class="form-label">Descripción</label>
                            <input type="text" class="form-control" id="Descripcion<?= $Trabajo->IdTrabajo ?>" name="Descripcion" value="<?= $Trabajo->Descripcion ?>" required>
                        </div>

                        <!-- Cantidad de Hectáreas Trabajadas -->
                        <div class="mb-3">
                            <label for="CantidadHectareas<?= $Trabajo->IdTrabajo ?>" class="form-label">Cantidad de Hectáreas Trabajadas</label>
                            <input type="number" class="form-control" id="CantidadHectareas<?= $Trabajo->IdTrabajo ?>" name="CantidadHectareas" value="<?= $Trabajo->CantidadHectareasTrabajadas ?>" required>
                        </div>

                        <!-- Fecha de Trabajo -->
                        <div class="mb-3">
                            <label for="FechaTrabajo<?= $Trabajo->IdTrabajo ?>" class="form-label">Fecha de Trabajo</label>
                            <input type="date" class="form-control" id="FechaTrabajo<?= $Trabajo->IdTrabajo ?>" name="FechaTrabajo" value="<?= $Trabajo->FechaTrabajo ?>" required>
                        </div>
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
    // Inicialización por defecto de Select2 en el primer modal
    $('.select2').select2({
        placeholder: "Seleccione una o más opciones",
        allowClear: true
    });

    // Re-inicializar Select2 en el modal que se abre
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

        



