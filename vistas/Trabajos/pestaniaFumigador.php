  <!-- Pestaña Fumigador -->
  
            <div>
                <form class="mt-3">
                    <input type="hidden" name="tab" value="Fumigador">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="fumigadorSelect" class="form-label">Selecciona Fumigador</label>
                            <select id="fumigadorSelect" class="form-select">
                                <option value="fumigador1">Fumigador 1</option>
                                <option value="fumigador2">Fumigador 2</option>
                                <option value="fumigador3">Fumigador 3</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="fechaInicio" class="form-label">Fecha de Inicio</label>
                            <input type="date" class="form-control" id="fechaInicio">
                        </div>
                        <div class="col-md-4">
                            <label for="fechaFin" class="form-label">Fecha de Fin</label>
                            <input type="date" class="form-control" id="fechaFin">
                        </div>
                    </div>
                    
                    <button type="button" class="btn btn-primary mt-3">Filtrar</button>
                </form>
            </div>

            <div class="table-container mt-4">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Aguatero</th>
                            <th scope="col">Fumigador</th>
                            <th scope="col">Hectareas</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Cliente 1</td>
                            <td>Aguatero 1</td>
                            <td>Fumigador 1</td>
                            <td>10</td>
                            <td>2024-08-25</td>
                            <td>
                                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#altaClienteModal">
                                    <i class="bi-pencil"></i> Modificar
                                </button>
                                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#altaClienteModal">
                                    <i class="bi-trash"></i> Eliminar
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal para Nuevo Trabajo -->
 
<form action="?c=Trabajo&a=Guardar" method="post">
<div class="modal fade" id="altaClienteModal" tabindex="-1" aria-labelledby="altaClienteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="altaClienteModalLabel">Nuevo Trabajo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="nuevoTrabajoForm">
          <div class="mb-3">
            <label for="nuevoClienteSelect" class="form-label">Cliente</label>
            <select id="nuevoClienteSelect" name="nuevoClienteSelect" class="form-select">
            <?php foreach ($clientes as $cliente): ?>

                <option value="<?= $cliente->IdCliente ?>"><?= $cliente->Nombre ?></option>

                <?php endforeach; ?>
            </select>
          </div>
       
            <label for="myselect" class="form-label">Aguatero</label>
            <select id="mySelect" name="mySelect[]" multiple="multiple" style="width: 100%;">
            <?php foreach ($ListaAguateros as $aguatero): ?>

                <option value="<?= $aguatero->IdAguatero ?>"><?= $aguatero->NombreAguatero ?></option>

            <?php endforeach; ?>
            </select>
      
          <div class="mb-3">
            <label for="myselect2" class="form-label">Fumigador</label>
            <select id="mySelect2" name="mySelect2[]" multiple="multiple" style="width: 100%;">

            <?php foreach ($ListaFumigadores as $fumigador): ?>

                <option value="<?= $fumigador->IdFumigador ?>"><?= $fumigador->NombreFumigador ?></option>

            <?php endforeach; ?>
              
            <!-- Agrega más opciones según sea necesario -->
            </select>
          
          </div>
         <div class="mb-3">
            <label for="nuevoHectareas" class="form-label">Hectareas</label>
            <input type="number" class="form-control" id="Hectareas" name="Hectareas" >
          </div>
          <div class="mb-3">
            <label for="nuevoDescripcion" class="form-label">Descripción</label>
            <input type="text" class="form-control" id="Descripcion" name="Descripcion">
          </div>
          <div class="mb-3">
            <label for="nuevoNroFactura" class="form-label">Numero de Factura</label>
            <input type="number" class="form-control" id="NroFactura" name="NroFactura">
          </div>
          <div class="mb-3">
            <label for="nuevoNroFactura" class="form-label">Fecha De Pago</label>
            <input type="date" class="form-control" id="NroFactura" name="FechaPago">
          </div>
          <div class="mb-3">
            <label for="nuevoFecha" class="form-label">Fecha Trabajo</label>
            <input type="date" class="form-control" id="Fecha" name="FechaTrabajo">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </div>
         </form>
  </div>
</div>