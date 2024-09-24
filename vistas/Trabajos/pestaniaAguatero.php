
     <div>
                <form class="mt-3" method="POST" action="?c=Trabajo&a=FiltrarTrabajoAguatero&tab=aguatero">
                    <div class="row mb-3">
                        <div class="col-md-4">
            
                            <label for="AguateroSelect" class="form-label">Selecciona Aguatero</label>
                            <select id="AguateroSelect" class="form-select" name="AguateroSelect">
                            <?php foreach ($ListaAguateros as $aguatero): ?>

                                <option value="<?= $aguatero->IdAguatero ?>"><?= $aguatero->NombreAguatero ?></option>

                            <?php endforeach; ?>
                              
                            </select>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="fechaInicio" class="form-label">Fecha de Inicio</label>
                            <input type="date" class="form-control" id="fechaInicio" name="fechaInicio">
                        </div>
                        <div class="col-md-4">
                            <label for="fechaFin" class="form-label">Fecha de Fin</label>
                            <input type="date" class="form-control" id="fechaFin" name="fechaFin">
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary col-md-8">
                        <i class="bi bi-search"></i> Filtrar
                    </button>
                </form>
            </div>

            <div class="table-container mt-4">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            
                            <th scope="col">Aguatero</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Hectareas</th>
                            <th scope="col">Fecha de Trabajo</th>

                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if (isset($ResultadoAguateros) && !empty($ResultadoAguateros)): ?>
                            <?php foreach ($ResultadoAguateros as $Aguatero): ?>
                                <tr>
                                
                                    <td><?= $Aguatero->NombreAguatero ?></td>
                                    <td><?= $Aguatero->Descripcion ?></td>
                                    <td><?= $Aguatero->CantidadHectareasTrabajadas ?></td>
                                    <td><?= $Aguatero->FechaTrabajo ?></td>
                                    <td>
                                        <!-- Botón para modificar -->
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModificarCliente<?= $Aguatero->IdCliente ?>">
                                            <i class="bi-pencil"></i> Modificar
                                        </button>

                                        <!-- Modal para modificar -->
                                        <div class="modal fade" id="ModificarCliente<?= $resultado->IdCliente ?>" tabindex="-1" aria-labelledby="ModificarClienteLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="ModificarClienteLabel">Modificar Cliente</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="formModificarCliente<?= $Aguatero->IdCliente ?>" method="POST" action="?c=cliente&a=Modificar">

                                                            <input type="hidden" name="tab" value="Aguatero">
                                                            <input type="hidden" name="IdCliente" value="<?= $Aguatero->IdCliente ?>">
                                                            <div class="mb-3">
                                                                <label for="Nombre" class="form-label">Nombre</label>
                                                                <input type="text" class="form-control" id="Nombre" name="Nombre" value="<?= $Aguatero->Nombre ?>" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="Direccion" class="form-label">Dirección</label>
                                                                <input type="text" class="form-control" id="Direccion" name="Direccion" value="<?= $Aguatero->Direccion ?>" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="Telefono" class="form-label">Teléfono</label>
                                                                <input type="tel" class="form-control" id="Telefono" name="Telefono" value="<?= $Aguatero->Telefono ?>" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="Cuit" class="form-label">Cuit</label>
                                                                <input type="number" class="form-control" id="Cuit" name="Cuit" value="<?= $Aguatero->Cuit ?>" required>
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
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#EliminarCliente<?= $Aguatero->IdCliente ?>">
                                            <i class="bi-trash"></i> Eliminar
                                        </button>

                                        <!-- Modal para eliminar -->
                                        <div class="modal fade" id="EliminarCliente<?= $Aguatero->IdCliente ?>" tabindex="-1" aria-labelledby="EliminarClienteLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="EliminarClienteLabel">Eliminar Cliente</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>¿Estás seguro de que quieres eliminar a <strong><?= $Aguatero->Nombre ?></strong>?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form method="POST" action="?c=cliente&a=Eliminar">
                                                            <input type="hidden" name="IdCliente" value="<?= $Aguatero->IdCliente ?>">
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
                        <?php else: ?>
                            <tr>
                                <td colspan="6">No se encontraron resultados.</td>
                            </tr>
                        <?php endif; ?>

                    </tbody>
                </table>
            </div>
