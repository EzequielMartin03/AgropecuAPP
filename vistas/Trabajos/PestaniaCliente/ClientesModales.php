
<!-- Modal para modificar -->
<div class="modal fade" id="ModificarCliente<?= $resultado->IdCliente ?>" tabindex="-1" aria-labelledby="ModificarClienteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModificarClienteLabel">Modificar Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formModificarCliente<?= $resultado->IdCliente ?>" method="POST" action="?c=cliente&a=Modificar">
                    <input type="hidden" name="IdCliente" value="<?= $resultado->IdCliente ?>">
                    <div class="mb-3">
                        <label for="Nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="Nombre" name="Nombre" value="<?= $resultado->Nombre ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="Direccion" class="form-label">Dirección</label>
                        <input type="text" class="form-control" id="Direccion" name="Direccion" value="<?= $resultado->Direccion ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="Telefono" class="form-label">Teléfono</label>
                        <input type="tel" class="form-control" id="Telefono" name="Telefono" value="<?= $resultado->Telefono ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="Cuit" class="form-label">Cuit</label>
                        <input type="number" class="form-control" id="Cuit" name="Cuit" value="<?= $resultado->Cuit ?>" required>
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

 <!-- Modal para eliminar -->
<div class="modal fade" id="EliminarCliente<?= $resultado->IdCliente ?>" tabindex="-1" aria-labelledby="EliminarClienteLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="EliminarClienteLabel">Eliminar Cliente</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>¿Estás seguro de que quieres eliminar a <strong><?= $resultado->Nombre ?></strong>?</p>
                        </div>
                        <div class="modal-footer">
                            <form method="POST" action="?c=cliente&a=Eliminar">
                                <input type="hidden" name="IdCliente" value="<?= $resultado->IdCliente ?>">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

