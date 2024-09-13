
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
                <?php foreach ($Aguateros as $aguatero): ?>
                    <tr>
                        <td><?= $aguatero->IdAguatero ?></td>
                        <td><?= $aguatero->NombreAguatero ?></td>
                        <td><?= $aguatero->DireccionAguatero ?></td>
                        <td><?= $aguatero->TelefonoAguatero ?></td>
                        <td><?= $aguatero->CuitAguatero ?></td>
                        <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#Modificaraguatero<?= $aguatero->IdAguatero ?>">
                                <i class="bi-pencil"></i> Modificar
                            </button>

                            <div class="modal fade" id="Modificaraguatero<?= $aguatero->IdAguatero ?>" tabindex="-1" aria-labelledby="ModificaraguateroLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="ModificaraguateroLabel">Modificar aguatero</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="formModificaraguatero<?= $aguatero->IdAguatero ?>" method="POST" action="?c=aguatero&a=Modificar">
                                                <input type="hidden" name="IdAguatero" value="<?= $aguatero->IdAguatero ?>">
                                                <div class="mb-3">
                                                    <label for="NombreAguatero" class="form-label">Nombre</label>
                                                    <input type="text" class="form-control" id="NombreAguatero" name="NombreAguatero" value="<?= $aguatero->NombreAguatero ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="DireccionAguatero" class="form-label">Dirección</label>
                                                    <input type="text" class="form-control" id="DireccionAguatero" name="DireccionAguatero" value="<?= $aguatero->DireccionAguatero ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="TelefonoAguatero" class="form-label">Teléfono</label>
                                                    <input type="tel" class="form-control" id="TelefonoAguatero" name="TelefonoAguatero" value="<?= $aguatero->TelefonoAguatero ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="CuitAguatero" class="form-label">Cuit</label>
                                                    <input type="number" class="form-control" id="CuitAguatero" name="CuitAguatero" value="<?= $aguatero->CuitAguatero ?>" required>
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

                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Eliminaraguatero<?= $aguatero->IdAguatero ?>">
                                <i class="bi-trash"></i> Eliminar
                            </button>

                            <div class="modal fade" id="Eliminaraguatero<?= $aguatero->IdAguatero ?>" tabindex="-1" aria-labelledby="EliminaraguateroLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="EliminaraguateroLabel">Eliminar aguatero</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>¿Estás seguro de que quieres eliminar a <strong><?= $aguatero->NombreAguatero ?></strong>?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <form method="POST" action="?c=aguatero&a=Eliminar">
                                                <input type="hidden" name="IdAguatero" value="<?= $aguatero->IdAguatero ?>">
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