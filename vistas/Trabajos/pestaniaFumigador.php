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


  </div>
</div>