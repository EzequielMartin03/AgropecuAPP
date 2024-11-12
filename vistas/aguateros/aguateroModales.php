<!-- Modal Modificar Aguatero -->
<div class="modal fade" id="ModificarAguatero<?= $aguatero->IdAguatero ?>" tabindex="-1" aria-labelledby="ModificarAguateroLabel<?= $aguatero->IdAguatero ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModificarAguateroLabel<?= $aguatero->IdAguatero ?>">Modificar Aguatero</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formModificarAguatero<?= $aguatero->IdAguatero ?>" method="POST" action="?c=aguatero&a=Modificar">
                    <input type="hidden" name="IdAguatero" value="<?= $aguatero->IdAguatero ?>">

                    <div class="mb-3">
                        <label for="NombreModificarAguatero<?= $aguatero->IdAguatero ?>" class="form-label">Nombre</label>
                        <input type="text" class="form-control" placeholder="ingrese el nombre del aguatero" id="NombreModificarAguatero<?= $aguatero->IdAguatero ?>" name="NombreModificarAguatero" value="<?= $aguatero->NombreAguatero ?>">
                        <div id="errorNombreModificarAguatero<?= $aguatero->IdAguatero ?>" class="invalid-feedback"></div>
                    </div>

                    <div class="mb-3">
                        <label for="DireccionModificarAguatero<?= $aguatero->IdAguatero ?>" class="form-label">Dirección</label>
                        <input type="text" class="form-control" placeholder="ingrese la dirección del aguatero" id="DireccionModificarAguatero<?= $aguatero->IdAguatero ?>" name="DireccionModificarAguatero" value="<?= $aguatero->DireccionAguatero ?>">
                        <div id="errorDireccionModificarAguatero<?= $aguatero->IdAguatero ?>" class="invalid-feedback"></div>
                    </div>

                    <div class="mb-3">
                        <label for="TelefonoModificarAguatero<?= $aguatero->IdAguatero ?>" class="form-label">Teléfono</label>
                        <input type="tel" class="form-control" placeholder="ingrese el telefono del aguatero" id="TelefonoModificarAguatero<?= $aguatero->IdAguatero ?>" name="TelefonoModificarAguatero" value="<?= $aguatero->TelefonoAguatero ?>">
                        <div id="errorTelefonoModificarAguatero<?= $aguatero->IdAguatero ?>" class="invalid-feedback"></div>
                    </div>

                    <div class="mb-3">
                        <label for="CuitModificarAguatero<?= $aguatero->IdAguatero ?>" class="form-label">Cuit</label>
                        <input type="number" class="form-control" placeholder="ingrese el cuit del aguatero" id="CuitModificarAguatero<?= $aguatero->IdAguatero ?>" name="CuitModificarAguatero" value="<?= $aguatero->CuitAguatero ?>">
                        <div id="errorCuitModificarAguatero<?= $aguatero->IdAguatero ?>" class="invalid-feedback"></div>
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

<!-- Modal Eliminar Aguatero -->
<div class="modal fade" id="EliminarAguatero<?= $aguatero->IdAguatero ?>" tabindex="-1" aria-labelledby="EliminarAguateroLabel<?= $aguatero->IdAguatero ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EliminarAguateroLabel<?= $aguatero->IdAguatero ?>">Eliminar Aguatero</h5>
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

<script>
    // Función para guardar el CUIT en sessionStorage al abrir el modal
    function guardarCuitOriginal(cuit) {
        sessionStorage.setItem('cuitguardadoAguatero', cuit);
    }

    // Escucha el evento de apertura de este modal en específico
    document.getElementById('ModificarAguatero<?= $aguatero->IdAguatero ?>').addEventListener('shown.bs.modal', function () {
        guardarCuitOriginal('<?= $aguatero->CuitAguatero ?>');
    });
</script>