<!-- Modal para Nuevo Trabajo -->
<form action="?c=Trabajo&a=Guardar" method="post">
    <div class="modal fade" id="altaClienteModal" tabindex="-1" aria-labelledby="altaClienteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="altaClienteModalLabel">Nuevo Trabajo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="nuevoTrabajoForm">
                        <div class="mb-3">
                            <label for="nuevoClienteSelect" class="form-label">Cliente</label>
                            <select id="nuevoClienteSelect" name="nuevoClienteSelect" class="form-select">
                                <?php foreach ($clientes as $cliente): ?>
                                    <option value="<?= $cliente->IdCliente ?>"><?= $cliente->Nombre ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <label for="myselect" class="form-label">Aguatero</label>
                        <select id="mySelect" name="mySelect[]" multiple="multiple" style="width: 100%;">
                            <?php foreach ($ListaAguateros as $aguatero): ?>
                                <option value="<?= $aguatero->IdAguatero ?>"><?= $aguatero->NombreAguatero ?></option>
                            <?php endforeach; ?>
                        </select>

                        <div class="mb-3">
                            <label for="myselect2" class="form-label">Fumigador</label>
                            <select id="mySelect2" name="mySelect2[]" multiple="multiple" style="width: 100%;">
                                <?php foreach ($ListaFumigadores as $fumigador): ?>
                                    <option value="<?= $fumigador->IdFumigador ?>"><?= $fumigador->NombreFumigador ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="nuevoHectareas" class="form-label">Hectareas</label>
                            <input type="number" class="form-control" id="Hectareas" name="Hectareas">
                        </div>

                        <div class="mb-3">
                            <label for="nuevoDescripcion" class="form-label">Descripción</label>
                            <input type="text" class="form-control" id="Descripcion" name="Descripcion">
                        </div>

                        <div class="mb-3">
                            <label for="nuevoNroFactura" class="form-label">Numero de Factura</label>
                            <input type="number" class="form-control" id="NroFactura" name="NroFactura">
                        </div>

                        <div class="mb-3">
                            <label for="nuevoFechaPago" class="form-label">Fecha De Pago</label>
                            <input type="date" class="form-control" id="FechaPago" name="FechaPago">
                        </div>

                        <div class="mb-3">
                            <label for="nuevoFecha" class="form-label">Fecha Trabajo</label>
                            <input type="date" class="form-control" id="Fecha" name="FechaTrabajo">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    
</script>
