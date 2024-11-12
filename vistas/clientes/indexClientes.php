<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">
  
    <title>Clientes</title>
    <link rel="stylesheet" href="../assets/css/SideBarStyle.css">
    <link rel="stylesheet" href="../assets/css/indexTrabajo.css">
</head>
<body>
    <div class="col py-3">
        <!-- Barra de búsqueda -->
        <form class="d-flex mb-3" method="GET" action="?c=cliente">
            <input type="hidden" name="c" value="cliente">
            <input class="form-control me-2 w-50" type="search" placeholder="Buscar por nombre o CUIT" name="q" value="<?= isset($_GET['q']) ? $_GET['q'] : '' ?>">
            <button class="btn btn-success" type="submit">Buscar</button>
        </form>

        <!-- Botón para dar de alta un cliente -->
        <button type="button" class="btn btn-primary mb-3 btn-add-work" data-bs-toggle="modal" data-bs-target="#altaClienteModal">
            <i class="bi-plus-circle"></i> Dar de alta cliente
        </button>

        

        <!-- Tabla de Clientes -->
        <?php include './vistas/Clientes/tablaClientes.php'; ?>
        <?php include './vistas/Clientes/AltamodalCliente.php'; ?>

    
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Alertas Js -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


        <!-- Validar modales -->
        <script src="../assets/js/ValidarAlta.js"></script>
        <script src="../assets/js/ValidarModificar.js"></script>


        <script>
            // Enfocar el campo "Nombre" cuando el modal se muestra
            document.getElementById('altaClienteModal').addEventListener('shown.bs.modal', function () {
                document.getElementById('NombreCliente').focus();
            });

            document.getElementById('altaClienteModal').addEventListener('shown.bs.modal', function () {
                document.getElementById('NombreCliente').focus();
            });
        </script>
   
</body>
</html>
