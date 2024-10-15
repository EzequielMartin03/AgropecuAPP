 

<!-- Modal para modificar cliente -->
<div class="modal fade" id="ModificarCliente<?= $cliente->IdCliente ?>" tabindex="-1" aria-labelledby="ModificarClienteLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="ModificarClienteLabel">Modificar Cliente</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="formModificarCliente" method="POST" action="?c=cliente&a=ModificarCliente">
                                        <input type="hidden" name="IdCliente" value="<?= $cliente->IdCliente ?>">
                                        <div class="mb-3">
                                            <label for="NombreModificar" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" id="NombreModificar" name="NombreModificar" value="<?= $cliente->Nombre ?>">
                                            <div id="errorNombreModificar" class="invalid-feedback"></div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="DireccionModificar" class="form-label">Dirección</label>
                                            <input type="text" class="form-control" id="DireccionModificar" name="DireccionModificar" value="<?= $cliente->Direccion ?>">
                                            <div id="errorDireccionModificar" class="invalid-feedback"></div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="TelefonoModificar" class="form-label">Teléfono</label>
                                            <input type="tel" class="form-control" id="TelefonoModificar" name="TelefonoModificar" value="<?= $cliente->Telefono ?>" >
                                            <div id="errorTelefonoModificar" class="invalid-feedback"></div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="CuitModificar" class="form-label">Cuit</label>
                                            <input type="number" class="form-control" id="CuitModificar" name="CuitModificar" value="<?= $cliente->Cuit ?>">
                                            <div id="errorCuitModificar" class="invalid-feedback"></div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>



<!-- Modal Eliminar -->
<div class="modal fade" id="EliminarCliente<?= $cliente->IdCliente ?>" tabindex="-1" aria-labelledby="EliminarClienteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EliminarClienteLabel">Eliminar Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>¿Estás seguro de que quieres eliminar a <strong><?= $cliente->Nombre ?></strong>?</p>
            </div>
            <div class="modal-footer">
                <form method="POST" action="?c=cliente&a=EliminarCliente">
                    <input type="hidden" name="IdCliente" value="<?= $cliente->IdCliente ?>">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>