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
    <link rel="stylesheet" href="../assets/css/SideBarStyle.css">

    <title>Filtrar Trabajos</title>

    <style>
       
        .modal-backdrop {
        z-index: 1040; 
        }

        .modal {
        z-index: 1050;
        }
        .select2-container--default .select2-results {
        z-index: 1060; 
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
    <div class="tab-content" id="filterTabsContent">

    <div class="tab-pane fade show active" id="todos" role="tabpanel" aria-labelledby="todos-tab">
    <?php include 'vistas/Trabajos/pestaniaTodos.php';?>
    </div>

    <div class="tab-pane fade show" id="Cliente" role="tabpanel" aria-labelledby="Cliente-tab">
    <?php include 'vistas/Trabajos/pestaniaCliente.php';?>
     </div>   

    <div class="tab-pane fade " id="aguatero" role="tabpanel" aria-labelledby="aguatero-tab">
    <?php include 'vistas/Trabajos/pestaniaAguatero.php';?>
    </div>

    <div class="tab-pane fade" id="fumigador" role="tabpanel" aria-labelledby="fumigador-tab">
    <?php include 'vistas/Trabajos/pestaniaFumigador.php';?>
    </div>
</div>

    <!-- Botones flotantes -->
     <!-- Boton para nuevo trabajo -->
    <a href="#" class="btn btn-primary btn-add-work" data-bs-toggle="modal" data-bs-target="#altaClienteModal">
    <i class="bi-plus-circle"></i> Nuevo Trabajo
</a>

<form action="?c=Trabajo&a=generarPDF" method="POST">
    <!-- Boton para PDF -->
   <button type="submit" class="btn btn-primary btn-add-work2">
        <i class="bi-file-text"></i> Detalle PDF
    
</button>

</form>


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
