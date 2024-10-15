     <!-- Modal Alta aguatero -->
     <div class="modal fade" id="altaaguateroModal" tabindex="-1" aria-labelledby="altaaguateroModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="altaaguateroModalLabel">Nuevo aguatero</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="formAltaAguatero" method="POST" action="?c=aguatero&a=Guardar">
                            <div class="mb-3">
                                <label for="NombreAguatero" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="NombreAguatero" name="NombreAguatero" >
                                <div id="errorNombreAguatero" class="invalid-feedback"></div>
                            </div>
                            <div class="mb-3">
                                <label for="DireccionAguatero" class="form-label">Dirección</label>
                                <input type="text" class="form-control" id="DireccionAguatero" name="DireccionAguatero" >
                                <div id="errorDireccionAguatero" class="invalid-feedback"></div>
                            </div>
                            <div class="mb-3">
                                <label for="TelefonoAguatero" class="form-label">Teléfono</label>
                                <input type="tel" class="form-control" id="TelefonoAguatero" name="TelefonoAguatero" >
                                <div id="errorTelefonoAguatero" class="invalid-feedback"></div>
                            </div>
                            <div class="mb-3">
                                <label for="CuitAguatero" class="form-label">Cuit</label>
                                <input type="number" class="form-control" id="CuitAguatero" name="CuitAguatero">
                                <div id="errorCuitAguatero" class="invalid-feedback"></div>
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