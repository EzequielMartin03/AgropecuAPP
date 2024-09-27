<!-- Modal Agregar Fumigador -->

<div class="modal fade" id="altaFumigadorModal" tabindex="-1" aria-labelledby="altaFumigadorModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="altaFumigadorModalLabel">Nuevo Fumigador</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="formAltaFumigador" method="POST" action="?c=Fumigador&a=Guardar">
                            <div class="mb-3">
                                <label for="Nombre" class="form-label">Nombre</label>
                                <input type="text"  class="form-control" id="Nombre" name="Nombre" required>
                            </div>
                            <div class="mb-3">
                                <label for="Direccion" class="form-label">Dirección</label>
                                <input type="text" class="form-control" id="Direccion" name="Direccion" required>
                            </div>
                            <div class="mb-3">
                                <label for="Telefono" class="form-label">Teléfono</label>
                                <input type="tel" class="form-control" id="Telefono" name="Telefono" required>
                            </div>
                            <div class="mb-3">
                                <label for="Cuit" class="form-label">Cuit</label>
                                <input type="number" class="form-control" id="Cuit" name="Cuit" required>
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



<!-- Modal Modificar Fumigador -->

<div class="modal fade" id="ModificarFumigador<?= $Fumigador->IdFumigador ?>" tabindex="-1" aria-labelledby="ModificarFumigadorLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="ModificarFumigadorLabel">Modificar Fumigador</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="formModificarFumigador<?= $Fumigador->IdFumigador ?>" method="POST" action="?c=Fumigador&a=Modificar">
                                                <input type="hidden" name="IdFumigador" value="<?= $Fumigador->IdFumigador ?>">
                                                <div class="mb-3">
                                                    <label for="Nombre" class="form-label">Nombre</label>
                                                    <input type="text" class="form-control" id="Nombre" name="Nombre" value="<?= $Fumigador->NombreFumigador ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="Direccion" class="form-label">Dirección</label>
                                                    <input type="text" class="form-control" id="Direccion" name="Direccion" value="<?= $Fumigador->DireccionFumigador ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="Telefono" class="form-label">Teléfono</label>
                                                    <input type="tel" class="form-control" id="Telefono" name="Telefono" value="<?= $Fumigador->TelefonoFumigador ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="Cuit" class="form-label">Cuit</label>
                                                    <input type="number" class="form-control" id="Cuit" name="Cuit" value="<?= $Fumigador->CuitFumigador ?>" required>
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


<!-- Modal Eliminar Fumigador -->
 
<div class="modal fade" id="EliminarFumigador<?= $Fumigador->IdFumigador ?>" tabindex="-1" aria-labelledby="EliminarFumigadorLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="EliminarFumigadorLabel">Eliminar Fumigador</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>¿Estás seguro de que quieres eliminar a <strong><?= $Fumigador->NombreFumigador ?></strong>?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <form method="POST" action="?c=Fumigador&a=Eliminar">
                                                <input type="hidden" name="IdFumigador" value="<?= $Fumigador->IdFumigador ?>">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


