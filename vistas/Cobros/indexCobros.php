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
       
                  
 <div>
                <form class="mt-3" method="POST" action="?c=Cobros&a=filtrarCobros">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <input type="hidden" name="tab" value="cobro">
                            <label for="cobroSelect" class="form-label">Selecciona cliente</label>
                            <select id="cobroSelect" class="form-select" name="cobroSelect">
                            <?php foreach ($clientes as $cliente): ?>

                                <option value="<?= $cliente->IdCliente ?>"><?= $cliente->Nombre ?></option>

                            <?php endforeach; ?>
                              
                            </select>
                        </div>
                        <div class="col-md-4">
                            <input type="hidden" name="tab" value="cobro">
                            <label for="cobroSelect2" class="form-label">Selecciona tipo de filtro</label>
                            <select id="cobroSelect2" class="form-select" name="cobroSelect2">
                                <option value="1">Trabajos Adeudados</option>
                                <option value="2">Trabajos Abonados</option>
                              
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
            </div>



            <table class="table table-striped" >
            <thead>
                <tr>
                    
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Hectareas</th>
                    <th>Fecha</th>
                    <th>Nro. Factura</th>
                </tr>
            </thead>
            <tbody>

            <?php if (isset($cobros) && !empty($cobros)): ?>
    <?php foreach ($cobros as $cobro): ?>
        <tr>
            <td><?= $cobro->Nombre ?></td>
            <td><?= $cobro->Descripcion ?></td>
            <td><?= $cobro->cantidadHectareasTrabajadas ?></td>
            <td><?= $cobro->FechaTrabajo ?></td>
            <td><?= $cobro->NroFacturaAfip ?></td>
            
        </tr>
    <?php endforeach; ?>
<?php else: ?>
    <tr>
        <td colspan="6">No se encontraron cobros.</td>
    </tr>
<?php endif; ?>

            </tbody>
        </table>
        

    </div>


    
<!-- Bootstrap JS -->
<script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
        window.history.replaceState(null, null, '/MVCC/index.php/?c=cobros');
    </script>
</body>
</html>