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

     <!-- Bootstrap JS -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <title>gestión Fumigadores</title>
    <link rel="stylesheet" href="../assets/css/SideBarStyle.css">
    <link rel="stylesheet" href="../assets/css/indexTrabajo.css">
</head>
<body>

    <div class="col py-3">
        
        <form class="d-flex mb-3 " method="GET" action="?c=Fumigador" >
            <input type="hidden" name="c" value="Fumigador">
            <input class="form-control me-2 w-50" type="search" placeholder="Buscar por nombre o CUIT" name="q" value="<?= isset($_GET['q']) ? $_GET['q'] : '' ?>">
            <button class="btn btn btn-success" type="submit">Buscar</button>
        </form>

        <!-- tabla de fumigadores -->
        <?php include './vistas/Fumigadores/tablaFumigadores.php' ?>

        <!-- Botón para dar de alta un fumigador -->
        <button type="button" class="btn btn-primary btn-add-work mb-3" data-bs-toggle="modal" data-bs-target="#altaFumigadorModal">
            <i class="bi-plus-circle"></i> Dar de alta Fumigador
        </button>
    </div>

    <!-- Modal para dar de alta un nuevo fumigador -->
    <?php include 'vistas/Fumigadores/AltaModalFumigador.php' ?>

     <!-- Alertas Js -->
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- Validar modales -->
    <script src="../assets/js/ValidarAlta.js"></script>
    <script src="../assets/js/ValidarModificar.js"></script>

    <script>
            // Enfocar el campo "Nombre" cuando el modal se muestra
            document.getElementById('altaFumigadorModal').addEventListener('shown.bs.modal', function () {
                document.getElementById('NombreFumigador').focus();
            });
    </script>

</body>
</html>
