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
                                <label for="NombreFumigador" class="form-label">Nombre</label>
                                <input type="text"  class="form-control" id="NombreFumigador" name="NombreFumigador" placeholder="ingrese el nombre del fumigador" >
                                <div id="errorNombreFumigador" class="invalid-feedback"></div>
                            </div>
                            <div class="mb-3">
                                <label for="DireccionFumigador" class="form-label">Dirección</label>
                                <input type="text" class="form-control" id="DireccionFumigador" name="DireccionFumigador" placeholder="ingrese la dirección del fumigador" >
                                <div id="errorDireccionFumigador" class="invalid-feedback"></div>
                            </div>
                            <div class="mb-3">
                                <label for="TelefonoFumigador" class="form-label">Teléfono</label>
                                <input type="tel" class="form-control" id="TelefonoFumigador" name="TelefonoFumigador" placeholder="ingrese el telefono del fumigador" >
                                <div id="errorTelefonoFumigador" class="invalid-feedback"></div>
                            </div>
                            <div class="mb-3">
                                <label for="CuitFumigador" class="form-label">Cuit</label>
                                <input type="number" class="form-control" id="CuitFumigador" name="CuitFumigador" placeholder="ingrese el cuit del fumigador" >
                                <div id="errorCuitFumigador" class="invalid-feedback"></div>
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

