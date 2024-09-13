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
    <!-- Boton para PDF -->
    <a href="#" class="btn btn-primary btn-add-work2">
        <i class="bi-file-text"></i> Detalle PDF
    
</a>
      

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
