  



<div class="table-container mt-4">
        <table class="table table-striped">
            <thead>
                <tr>
                  
                    <th scope="col">Cliente</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Hectareas</th>
                    <th scope="col">Fecha de Trabajo</th>
                    <th scope="col">Fecha de Pago</th>
                    <th scope="col">Numero de Factura</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
          
                <?php foreach ($AllTrabajos as $Trabajo): ?>
                    <tr>
                    
                        <td><?= $Trabajo->Nombre ?></td>
                        <td><?= $Trabajo->Descripcion ?></td>
                        <td><?= $Trabajo->CantidadHectareasTrabajadas ?></td>
                        <td><?= $Trabajo->FechaTrabajo ?></td>
                        <td><?= $Trabajo->FechaPago ?></td>
                        <td><?= $Trabajo->NroFacturaAfip ?></td>
                        <td>
        <!-- Botón para modificar -->
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModificarTrabajo<?= $Trabajo->IdCliente ?>">
            <i class="bi-pencil"></i> Modificar
        </button>

        <!-- Modal para modificar -->
        <div class="modal fade" id="ModificarTrabajo<?= $Trabajo->IdTrabajo ?>" tabindex="-1" aria-labelledby="ModificarTrabajoLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModificarTrabajoLabel">Modificar Cliente</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="formModificarTrabajo<?= $Trabajo->IdCliente ?>" method="POST" action="?c=cliente&a=Modificar">
                            <input type="hidden" name="IdCliente" value="<?= $Trabajo->IdCliente ?>">
                            <div class="mb-3">
                                <label for="Nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="Nombre" name="Nombre" value="<?= $Trabajo->Descripcion ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="Direccion" class="form-label">Dirección</label>
                                <input type="text" class="form-control" id="Direccion" name="Direccion" value="<?= $Trabajo->CantidadHectareasTrabajadas ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="Telefono" class="form-label">Teléfono</label>
                                <input type="tel" class="form-control" id="Telefono" name="Telefono" value="<?= $Trabajo->FechaPago?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="Cuit" class="form-label">Cuit</label>
                                <input type="number" class="form-control" id="Cuit" name="Cuit" value="<?= $Trabajo->NroFacturaAfip ?>" required>
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

        <!-- Botón para eliminar -->
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#EliminarCliente<?= $Trabajo->IdCliente ?>">
            <i class="bi-trash"></i> Eliminar
        </button>

        <!-- Modal para eliminar -->
        <div class="modal fade" id="EliminarCliente<?= $Trabajo->IdCliente ?>" tabindex="-1" aria-labelledby="EliminarClienteLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="EliminarTrabajoLabel">Eliminar Cliente</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>¿Estás seguro de que quieres eliminar a <strong><?= $Trabajo->Nombre ?></strong>?</p>
                    </div>
                    <div class="modal-footer">
                        <form method="POST" action="?c=cliente&a=Eliminar">
                            <input type="hidden" name="IdCliente" value="<?= $Trabajo->IdCliente ?>">
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
    </div>
