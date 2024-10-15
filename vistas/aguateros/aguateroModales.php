
   

<!-- Modal modificar aguatero -->

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
                                                    <label for="NombreModificarAguatero" class="form-label">Nombre</label>
                                                    <input type="text" class="form-control" id="NombreModificarAguatero" name="NombreModificarAguatero" value="<?= $aguatero->NombreAguatero ?>" >
                                                </div>
                                                <div class="mb-3">
                                                    <label for="DireccionModificarAguatero" class="form-label">Dirección</label>
                                                    <input type="text" class="form-control" id="DireccionModificarAguatero" name="DireccionModificarAguatero" value="<?= $aguatero->DireccionAguatero ?>" >
                                                </div>
                                                <div class="mb-3">
                                                    <label for="TelefonoModificarAguatero" class="form-label">Teléfono</label>
                                                    <input type="tel" class="form-control" id="TelefonoModificarAguatero" name="TelefonoModificarAguatero" value="<?= $aguatero->TelefonoAguatero ?>" >
                                                </div>
                                                <div class="mb-3">
                                                    <label for="CuitModificarAguatero" class="form-label">Cuit</label>
                                                    <input type="number" class="form-control" id="CuitModificarAguatero" name="CuitModificarAguatero" value="<?= $aguatero->CuitAguatero ?>" >
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

<!-- Modal Eliminar aguatero -->
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