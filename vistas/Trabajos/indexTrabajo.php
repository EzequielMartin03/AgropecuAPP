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

    <!-- CSS de DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">


    <link rel="stylesheet" href="../assets/css/indexTrabajo.css">
    
    <link rel="stylesheet" href="../assets/css/SideBarStyle.css">

    <title>Filtrar Trabajos</title>

  
</head>


<body>

<div class ="container">
    
<div class="col py-3">
    <!-- Pestañas de filtros -->
    <ul class="nav nav-tabs" id="filterTabs" role="tablist">
        
        <li class="nav-item" role="presentation">
            <button class="nav-link active " id="Cliente-tab" data-bs-toggle="tab" data-bs-target="#Cliente" type="button" role="tab" aria-controls="Cliente" aria-selected="true">Filtrar por Cliente</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="aguatero-tab" data-bs-toggle="tab" data-bs-target="#aguatero" type="button" role="tab" aria-controls="aguatero" aria-selected="false">Filtrar por Aguatero</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="fumigador-tab" data-bs-toggle="tab" data-bs-target="#fumigador" type="button" role="tab" aria-controls="fumigador" aria-selected="false">Filtrar por Fumigador</button>
        </li>
        
    </ul>
    
    <div class="tab-content" id="filterTabsContent">

    

    <div class="tab-pane fade show active" id="Cliente" role="tabpanel" aria-labelledby="Cliente-tab">
    
    <?php include 'vistas/Trabajos/PestaniaCliente/pestaniaCliente.php';?>
     </div>   

    <div class="tab-pane fade " id="aguatero" role="tabpanel" aria-labelledby="aguatero-tab">
    <?php include 'vistas/Trabajos/PestaniaAguatero/pestaniaAguatero.php';?>
    </div>

    <div class="tab-pane fade" id="fumigador" role="tabpanel" aria-labelledby="fumigador-tab">
    <?php include 'vistas/Trabajos/PestaniaFumigador/pestaniaFumigador.php';?>
    
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

<?php include 'vistas/Trabajos/ModalAltaTrabajo.php'; ?>

      

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- CSS de Select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

<!-- JS de Select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<!-- Tu JavaScript personalizado -->
<script src="../assets/js/indexTrabajoJS.js"></script>

<script src="../assets/js/ValidarAltaTrabajo.js"></script>

<script src="../assets/js/ValidarModificarTR.js"></script>

<?php
$tab = isset($_GET['tab']) ? $_GET['tab'] : null;


if (($tab == 'Cliente' ) || ($tab == 'aguatero' ) || ($tab == 'fumigador')): ?>

    <script>
        window.history.replaceState(null, null, '/MVCC/index.php/?c=Trabajo&tab=<?= $tab ?>');
    </script>
    
<?php endif; ?>

<script>
    document.getElementById('MostrarTrabajos').addEventListener('change', function() {
        const isChecked = this.checked;
        const tbody = document.getElementById('tbody');

        if (!isChecked) {
            // Limpia la tabla si se desmarca el checkbox
            tbody.innerHTML = '';
            return;
        }

        // Enviar solicitud AJAX al controlador cuando el checkbox está marcado
        fetch('?c=Trabajo&a=ListarTrabajos', {
            method: 'POST',
            body: JSON.stringify({ checkbox: isChecked }),
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            tbody.innerHTML = ''; // Limpia la tabla antes de agregar nuevos resultados

            // Itera sobre el objeto de datos y crea filas en la tabla
            data.forEach(trabajo => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${trabajo.Nombre}</td>
                    <td>${trabajo.Descripcion}</td>
                    <td>${trabajo.CantidadHectareasTrabajadas}</td>
                    <td>${trabajo.FechaTrabajo}</td>
                    <td>${trabajo.FechaPago}</td>
                    <td>${trabajo.NombreFumigador}</td>
                    <td>${trabajo.NombreAguatero}</td>
                    <td>${trabajo.NroFacturaAfip}</td>
                    <td>
                        <button type="button" class="btn btn-warning w-100" data-bs-toggle="modal" data-bs-target="#ModificarTrabajo${trabajo.IdTrabajo}">Modificar</button>
                        <button type="button" class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#EliminarTrabajo${trabajo.IdTrabajo}">
                            <i class="bi-trash"></i> Eliminar
                        </button>
                        ${trabajo.modal}
                    </td>
                `;
                tbody.appendChild(row);
            });
        })
        .catch(error => console.error('Error al obtener los resultados:', error));
    });
</script>

</body>
</html>
