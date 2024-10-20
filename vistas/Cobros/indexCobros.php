<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
      
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">
    
    <link rel="stylesheet" href="../assets/css/indexTrabajo.css">
    <link rel="stylesheet" href="../assets/css/SideBarStyle.css">


</head>
<body>


<div class ="container">
    
    <div class="col py-3">
        <!-- Pestañas de filtros -->
        <ul class="nav nav-tabs" id="filterTabs" role="tablist">
            
            <li class="nav-item" role="presentation">
                <button class="nav-link active " id="TrabajosPagos-tab" data-bs-toggle="tab" data-bs-target="#TrabajosPagos" type="button" role="tab" aria-controls="TrabajosPagos" aria-selected="true">Trabajos Adeudados</button>
            </li>
          
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="TrabajosAdeudados-tab" data-bs-toggle="tab" data-bs-target="#TrabajosAdeudados" type="button" role="tab" aria-controls="TrabajosAdeudados" aria-selected="false">Trabajos Pagos</button>
            </li>
            
        </ul>
    
    
        
        <div class="tab-content" id="filterTabsContent">
        <div class="tab-pane fade show active" id="TrabajosPagos" role="tabpanel" aria-labelledby="TrabajosPagos-tab">
            <?php include 'vistas/Cobros/PestaniaPagos/indexPagos.php';?>
         </div>   
    
    
        <div class="tab-pane fade" id="TrabajosAdeudados" role="tabpanel" aria-labelledby="TrabajosAdeudados-tab">
        </div>

    </div>


    
<!-- Bootstrap JS -->
<script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>