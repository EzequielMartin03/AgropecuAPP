<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="../assets/css/indexTrabajo.css">

    <title>Filtrar Trabajos</title>

    <style>
  /* Asegúrate de que el overlay no esté cubriendo el contenido del modal */
.modal-backdrop {
  z-index: 1040; /* Asegúrate de que el z-index del backdrop sea menor que el del modal */
}

/* Asegúrate de que el modal tenga un z-index alto para que el contenido sea accesible */
.modal {
  z-index: 1050;
}


.select2-container--default .select2-results {
  z-index: 1060; /* Ajusta el z-index según sea necesario */
}



    </style>
</head>


<body>

<div class ="container">
    
<div class="col py-3">
    <!-- Pestañas de filtros -->
    <ul class="nav nav-tabs" id="filterTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="todos-tab" data-bs-toggle="tab" data-bs-target="#todos" type="button" role="tab" aria-controls="todos" aria-selected="false">Todos los Trabajos</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link " id="Cliente-tab" data-bs-toggle="tab" data-bs-target="#Cliente" type="button" role="tab" aria-controls="Cliente" aria-selected="true">Filtrar por Cliente</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="aguatero-tab" data-bs-toggle="tab" data-bs-target="#aguatero" type="button" role="tab" aria-controls="aguatero" aria-selected="false">Filtrar por Aguatero</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="fumigador-tab" data-bs-toggle="tab" data-bs-target="#fumigador" type="button" role="tab" aria-controls="fumigador" aria-selected="false">Filtrar por Fumigador</button>
        </li>
        
    </ul>

    

    <!-- Contenido de las pestañas -->
    <div class="tab-content" id="filterTabsContent">

        <div class="tab-pane fade show active" id="todos" role="tabpanel" aria-labelledby="todos-tab">
        <div class="table-container mt-4">
                <table class="table table-striped">
                    <thead>
                        <tr>
                          
                            <th scope="col">Cliente</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Hectareas</th>
                            <th scope="col">Fecha de Trabajo</th>
                            <th scope="col">Fecha de Pago</th>
                            <th scope="col">Numero de Factura</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                  
                        <?php foreach ($AllTrabajos as $Trabajo): ?>
                            <tr>
                            
                                <td><?= $Trabajo->Nombre ?></td>
                                <td><?= $Trabajo->Descripcion ?></td>
                                <td><?= $Trabajo->CantidadHectareasTrabajadas ?></td>
                                <td><?= $Trabajo->FechaTrabajo ?></td>
                                <td><?= $Trabajo->FechaPago ?></td>
                                <td><?= $Trabajo->NroFacturaAfip ?></td>
                                <td>
                <!-- Botón para modificar -->
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModificarTrabajo<?= $Trabajo->IdCliente ?>">
                    <i class="bi-pencil"></i> Modificar
                </button>

                <!-- Modal para modificar -->
                <div class="modal fade" id="ModificarTrabajo<?= $Trabajo->IdCliente ?>" tabindex="-1" aria-labelledby="ModificarTrabajoLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ModificarTrabajoLabel">Modificar Cliente</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="formModificarTrabajo<?= $resultado->IdCliente ?>" method="POST" action="?c=cliente&a=Modificar">
                                    <input type="hidden" name="IdCliente" value="<?= $resultado->IdCliente ?>">
                                    <div class="mb-3">
                                        <label for="Nombre" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" id="Nombre" name="Nombre" value="<?= $resultado->Nombre ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="Direccion" class="form-label">Dirección</label>
                                        <input type="text" class="form-control" id="Direccion" name="Direccion" value="<?= $resultado->Direccion ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="Telefono" class="form-label">Teléfono</label>
                                        <input type="tel" class="form-control" id="Telefono" name="Telefono" value="<?= $resultado->Telefono ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="Cuit" class="form-label">Cuit</label>
                                        <input type="number" class="form-control" id="Cuit" name="Cuit" value="<?= $resultado->Cuit ?>" required>
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
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#EliminarCliente<?= $Trabajo->IdCliente ?>">
                    <i class="bi-trash"></i> Eliminar
                </button>

                <!-- Modal para eliminar -->
                <div class="modal fade" id="EliminarCliente<?= $Trabajo->IdCliente ?>" tabindex="-1" aria-labelledby="EliminarClienteLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="EliminarTrabajoLabel">Eliminar Cliente</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>¿Estás seguro de que quieres eliminar a <strong><?= $resultado->Nombre ?></strong>?</p>
                            </div>
                            <div class="modal-footer">
                                <form method="POST" action="?c=cliente&a=Eliminar">
                                    <input type="hidden" name="IdCliente" value="<?= $Trabajo->IdCliente ?>">
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
            </div>
        </div>


          


        <!-- Pestaña Cliente -->
        <div class="tab-pane fade show" id="Cliente" role="tabpanel" aria-labelledby="Cliente-tab">
            <div>
                <form class="mt-3" method="POST" action="?c=Trabajo&a=filtrarPorCliente&tab=Cliente">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <input type="hidden" name="tab" value="Cliente">
                            <label for="ClienteSelect" class="form-label">Selecciona Cliente</label>
                            <select id="ClienteSelect" class="form-select" name="ClienteSelect">
                            <?php foreach ($clientes as $cliente): ?>

                                <option value="<?= $cliente->IdCliente ?>"><?= $cliente->Nombre ?></option>

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
                            
                            <th scope="col">Cliente</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Hectareas</th>
                            <th scope="col">Fecha de Trabajo</th>
                            <th scope="col">Fecha de Pago</th>
                            <th scope="col">Numero de Factura</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if (isset($resultados) && !empty($resultados)): ?>
    <?php foreach ($resultados as $resultado): ?>
        <tr>
          
            <td><?= $resultado->Nombre ?></td>
            <td><?= $resultado->Descripcion ?></td>
            <td><?= $resultado->CantidadHectareasTrabajadas ?></td>
            <td><?= $resultado->FechaTrabajo ?></td>
            <td><?= $resultado->FechaPago ?></td>
            <td><?= $resultado->NroFacturaAfip ?></td>
            <td>
                <!-- Botón para modificar -->
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModificarCliente<?= $resultado->IdCliente ?>">
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
                                <form id="formModificarCliente<?= $resultado->IdCliente ?>" method="POST" action="?c=cliente&a=Modificar">
                                    <input type="hidden" name="IdCliente" value="<?= $resultado->IdCliente ?>">
                                    <div class="mb-3">
                                        <label for="Nombre" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" id="Nombre" name="Nombre" value="<?= $resultado->Nombre ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="Direccion" class="form-label">Dirección</label>
                                        <input type="text" class="form-control" id="Direccion" name="Direccion" value="<?= $resultado->Direccion ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="Telefono" class="form-label">Teléfono</label>
                                        <input type="tel" class="form-control" id="Telefono" name="Telefono" value="<?= $resultado->Telefono ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="Cuit" class="form-label">Cuit</label>
                                        <input type="number" class="form-control" id="Cuit" name="Cuit" value="<?= $resultado->Cuit ?>" required>
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
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#EliminarCliente<?= $resultado->IdCliente ?>">
                    <i class="bi-trash"></i> Eliminar
                </button>

                <!-- Modal para eliminar -->
                <div class="modal fade" id="EliminarCliente<?= $resultado->IdCliente ?>" tabindex="-1" aria-labelledby="EliminarClienteLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="EliminarClienteLabel">Eliminar Cliente</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>¿Estás seguro de que quieres eliminar a <strong><?= $resultado->Nombre ?></strong>?</p>
                            </div>
                            <div class="modal-footer">
                                <form method="POST" action="?c=cliente&a=Eliminar">
                                    <input type="hidden" name="IdCliente" value="<?= $resultado->IdCliente ?>">
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
        </div>

        <!-- Pestaña Aguatero -->
        <div class="tab-pane fade " id="aguatero" role="tabpanel" aria-labelledby="aguatero-tab">
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
        </div>

        <!-- Pestaña Fumigador -->
        <div class="tab-pane fade" id="fumigador" role="tabpanel" aria-labelledby="fumigador-tab">
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

<!-- Botones flotantes -->
<a href="#" class="btn btn-primary btn-add-work" data-bs-toggle="modal" data-bs-target="#altaClienteModal">
    <i class="bi-plus-circle"></i> Nuevo Trabajo
</a>
<a href="#" class="btn btn-primary btn-add-work2">
    <i class="bi-file-text"></i> Detalle PDF
</a>

</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- CSS de Select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

<!-- JS de Select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<!-- Tu JavaScript personalizado -->
<script src="../assets/js/indexTrabajoJS.js"></script>


</body>


</html>
