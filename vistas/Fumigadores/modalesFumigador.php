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
                        <label for="Nombre<?= $Fumigador->IdFumigador ?>" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="Nombre<?= $Fumigador->IdFumigador ?>" name="Nombre<?= $Fumigador->IdFumigador ?>" value="<?= $Fumigador->NombreFumigador ?>" >
                        <div id = "errorNombreFumigador<?= $Fumigador->IdFumigador ?>" class="invalid-feedback"></div> 
                    </div>
                    <div class="mb-3">
                        <label for="Direccion<?= $Fumigador->IdFumigador ?>" class="form-label">Dirección</label>
                        <input type="text" class="form-control" id="Direccion<?= $Fumigador->IdFumigador ?>" name="Direccion<?= $Fumigador->IdFumigador ?>" value="<?= $Fumigador->DireccionFumigador ?>">
                        <div id = "errorDireccionFumigador<?= $Fumigador->IdFumigador ?>" class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label for="Telefono<?= $Fumigador->IdFumigador ?>" class="form-label">Teléfono</label>
                        <input type="tel" class="form-control" id="Telefono<?= $Fumigador->IdFumigador ?>" name="Telefono<?= $Fumigador->IdFumigador ?>" value="<?= $Fumigador->TelefonoFumigador ?>" >
                        <div id = "errorTelefonoFumigador<?= $Fumigador->IdFumigador ?>" class="invalid-feedback"></div> 
                    </div>
                    <div class="mb-3">
                        <label for="Cuit<?= $Fumigador->IdFumigador ?>" class="form-label">Cuit</label>
                        <input type="number" class="form-control" id="Cuit<?= $Fumigador->IdFumigador ?>" name="Cuit<?= $Fumigador->IdFumigador ?>" value="<?= $Fumigador->CuitFumigador ?>">
                        <div id = "errorCuitFumigador<?= $Fumigador->IdFumigador ?>" class="invalid-feedback"></div> 
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
