
<table class="table table-striped" id="tabla">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Cuit</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clientes as $cliente): ?>
                    <tr>
                        <td><?= $cliente->IdCliente ?></td>
                        <td><?= $cliente->Nombre ?></td>
                        <td><?= $cliente->Direccion ?></td>
                        <td><?= $cliente->Telefono ?></td>
                        <td><?= $cliente->Cuit ?></td>
                        <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModificarCliente<?= $cliente->IdCliente ?>">
                                <i class="bi-pencil"></i> Modificar
                            </button>

                            <div class="modal fade" id="ModificarCliente<?= $cliente->IdCliente ?>" tabindex="-1" aria-labelledby="ModificarClienteLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="ModificarClienteLabel">Modificar Cliente</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="formModificarCliente<?= $cliente->IdCliente ?>" method="POST" action="?c=cliente&a=Modificar">
                                                <input type="hidden" name="IdCliente" value="<?= $cliente->IdCliente ?>">
                                                <div class="mb-3">
                                                    <label for="Nombre" class="form-label">Nombre</label>
                                                    <input type="text" class="form-control" id="Nombre" name="Nombre" value="<?= $cliente->Nombre ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="Direccion" class="form-label">Dirección</label>
                                                    <input type="text" class="form-control" id="Direccion" name="Direccion" value="<?= $cliente->Direccion ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="Telefono" class="form-label">Teléfono</label>
                                                    <input type="tel" class="form-control" id="Telefono" name="Telefono" value="<?= $cliente->Telefono ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="Cuit" class="form-label">Cuit</label>
                                                    <input type="number" class="form-control" id="Cuit" name="Cuit" value="<?= $cliente->Cuit ?>" required>
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

                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#EliminarCliente<?= $cliente->IdCliente ?>">
                                <i class="bi-trash"></i> Eliminar
                            </button>

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
                                            <form method="POST" action="?c=cliente&a=Eliminar">
                                                <input type="hidden" name="IdCliente" value="<?= $cliente->IdCliente ?>">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        