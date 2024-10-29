<!-- Modal para Nuevo Trabajo -->
<form action="?c=Trabajo&a=Guardar" method="post" id="nuevoTrabajoForm">
    <div class="modal fade" id="altaClienteModal" tabindex="-1" aria-labelledby="altaClienteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="altaClienteModalLabel">Nuevo Trabajo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nuevoClienteSelect" class="form-label">Cliente</label>
                        <select id="nuevoClienteSelect" name="nuevoClienteSelect" class="form-select">
                            <?php foreach ($clientes as $cliente): ?>
                                <option value="<?= $cliente->IdCliente ?>"><?= $cliente->Nombre ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div id="errorClienteTrabajo" class="invalid-feedback"></div>
                    </div>

                    <div class="mb-3">
                        <label for="mySelect" class="form-label">Aguatero</label>
                        <select id="mySelect" name="mySelect[]" multiple="multiple" style="width: 100%;">
                            <?php foreach ($ListaAguateros as $aguatero): ?>
                                <option value="<?= $aguatero->IdAguatero ?>"><?= $aguatero->NombreAguatero ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div id="errorAguateroTrabajo" class="invalid-feedback"></div>
                    </div>

                    <div class="mb-3">
                        <label for="mySelect2" class="form-label">Fumigador</label>
                        <select id="mySelect2" name="mySelect2[]" multiple="multiple" style="width: 100%;">
                            <?php foreach ($ListaFumigadores as $fumigador): ?>
                                <option value="<?= $fumigador->IdFumigador ?>"><?= $fumigador->NombreFumigador ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div id="errorFumigadorTrabajo" class="invalid-feedback"></div>
                    </div>

                    <div class="mb-3">
                        <label for="Hectareas" class="form-label">Hectáreas</label>
                        <input type="number" class="form-control" id="Hectareas" name="Hectareas" placeholder="ingrese la cantidad de hectáreas trabajadas">
                        <div id="errorHectareasTrabajo" class="invalid-feedback"></div>
                    </div>

                    <div class="mb-3">
                        <label for="Descripcion" class="form-label">Descripción</label>
                        <input type="text" class="form-control" id="Descripcion" name="Descripcion" placeholder="ingrese la descripción del trabajo">
                        <div id="errorDescripcionTrabajo" class="invalid-feedback"></div>
                    </div>

                    <div class="mb-3">
                        <label for="NroFactura" class="form-label">Número de Factura</label>
                        <input type="number" class="form-control" id="NroFactura" name="NroFactura" placeholder="ingrese el número de factura">
                        <div id="errorNroFacturaTrabajo" class="invalid-feedback"></div>
                    </div>

                    <div class="mb-3">
                        <label for="FechaPago" class="form-label">Fecha De Pago</label>
                        <input type="date" class="form-control" id="FechaPago" name="FechaPago" placeholder="ingrese la fecha de pago">
                        <div id="errorFechaPagoTrabajo" class="invalid-feedback"></div>
                    </div>

                    <div class="mb-3">
                        <label for="Fecha" class="form-label">Fecha Trabajo</label>
                        <input type="date" class="form-control" id="Fecha" name="FechaTrabajo" placeholder="ingrese la fecha del trabajo">
                        <div id="errorFechaTrabajo" class="invalid-feedback"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button id="btnGuardar" type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</form>
