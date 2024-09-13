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

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/SideBarStyle.css">

    <title>Filtrar Trabajos</title>
    
</head>
<body>
    <!-- Sidebar JS -->
    <script src="assets/js/SideBarJS.js"></script>

    <div class="container-fluid">
        <div class="row flex-nowrap">
            <!-- Sidebar -->
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-stretch px-3 pt-2 text-white min-vh-100">
                    <a href="Bienvenida.html" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline">AgropecuApp</span>
                    </a>

                    <hr>
                   
                    <a href="?c=cliente" class="btn btn-dark text-white w-100 mb-2 btn-sidebar">
                        <i class="bi-person fs-4"></i> <span class="ms-1 d-none d-sm-inline">Gestionar Clientes</span>
                    </a>

                    <a href="aguateros.html" class="btn btn-dark text-white w-100 mb-2 btn-sidebar">
                        <i class="bi-water fs-4"></i> <span class="ms-1 d-none d-sm-inline">Gestionar Aguateros</span>
                    </a>

                    <a href="fumigadores.html" class="btn btn-dark text-white w-100 mb-2 btn-sidebar">
                        <i class="bi-gear fs-4"></i> <span class="ms-1 d-none d-sm-inline">Gestionar Fumigadores</span>
                    </a>
                    
                    <a href="trabajos.html" class="btn btn-dark text-white w-100 mb-2 btn-sidebar">
                        <i class="bi-briefcase fs-4"></i> <span class="ms-1 d-none d-sm-inline">Trabajos Realizados</span>
                    </a>

                    <a href="cobros.html" class="btn btn-dark text-white w-100 mb-2 btn-sidebar">
                        <i class="bi-cash fs-4"></i> <span class="ms-1 d-none d-sm-inline">Gestionar Cobros</span>
                    </a>

                    <hr>
                    <div class="dropdown pb-4">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="d-none d-sm-inline mx-1">EzequielMartin</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                            <li><a class="dropdown-item" href="#">Ajustes</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Cerrar Sesión</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- Content area -->
            <div class="col py-3">
                <!-- Your content here -->
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
