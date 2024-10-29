<!-- Modal para nuevo cliente -->
<div class="modal fade" id="altaClienteModal" tabindex="-1" aria-labelledby="altaClienteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="altaClienteModalLabel">Nuevo Cliente</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="formAltaCliente" method="POST" action="?c=cliente&a=Guardar">
                            <div class="mb-3">
                                <label for="NombreCliente" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="NombreCliente" name="Nombre" placeholder="ingrese el nombre del cliente">
                                <div id="errorNombreCliente" class="invalid-feedback"></div>
                            </div>
                            <div class="mb-3">
                                <label for="DireccionCliente" class="form-label">Dirección</label>
                                <input type="text" class="form-control" id="DireccionCliente" name="Direccion" placeholder="ingrese la dirección del cliente">
                                <div id="errorDireccionCliente" class="invalid-feedback"></div>
                            </div>
                            <div class="mb-3">
                                <label for="TelefonoCliente" class="form-label">Teléfono</label>
                                <input type="tel" class="form-control" id="TelefonoCliente" name="Telefono" placeholder="ingrese el telefono del cliente" >
                                <div id="errortelefonoCliente" class="invalid-feedback"></div>
                            </div>
                            <div class="mb-3">
                                <label for="CuitCliente" class="form-label">Cuit</label>
                                <input type="number" class="form-control" id="CuitCliente" name="Cuit" placeholder="ingrese el CUIT del cliente">
                                <div id="errorCuitCliente" class="invalid-feedback"></div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" id="btnGuardar" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
