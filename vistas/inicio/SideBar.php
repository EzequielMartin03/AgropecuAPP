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

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/SideBarStyle.css">
    

    
</head>
<body>

<div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-stretch px-3 pt-2 text-white min-vh-100">
                <a href="?c=Inicio" class="d-flex  text-decoration-none">
              
                    <img src="../assets/img/logo2.png" alt="AgropecuApp Logo" class="img-fluid d-block mx-auto d-lg-none" style="max-width: 100%;">
                    <img src="../assets/img/logo_agropecuapp.png" alt="AgropecuApp Logo" class="img-fluid d-none d-lg-block" style="max-width: 100%;">
            </a>
                   <hr>
                    <!-- Botones fijos alineados -->
                    <a href="?c=Cliente" class="btn btn-dark text-white w-100 mb-2 btn-sidebar">
                        <i class="bi-person fs-4"></i> <span class="ms-1 d-none d-sm-inline">Gestionar Clientes</span>
                    </a>
                    <a href="?c=Aguatero" class="btn btn-dark text-white w-100 mb-2  btn-sidebar">
                        <i class="bi-water fs-4"></i> <span class="ms-1 d-none d-sm-inline">Gestionar Aguateros</span>
                    </a>
                    <a href="?c=Fumigador" class="btn btn-dark text-white w-100 mb-2  btn-sidebar">
                        <i class="bi-gear fs-4"></i> <span class="ms-1 d-none d-sm-inline">Gestionar Fumigadores</span>
                    </a>
                   
                    <a href="?c=Trabajo" class="btn btn-dark text-white w-100 mb-2  btn-sidebar">
                        <i class="bi-briefcase fs-4"></i> <span class="ms-1 d-none d-sm-inline">Trabajos Realizados</span>
                    </a>
                    <a href="?c=Cobros" class="btn btn-dark text-white w-100 mb-2 btn-sidebar">
                        <i class="bi-cash fs-4"></i> <span class="ms-1 d-none d-sm-inline">Consultar Cobros</span>
                    </a>
                    <a href="?c=Usuario&a=GestionUsuarios" class="btn btn-dark text-white w-100 mb-2 btn-sidebar">
                        <i class="bi-people fs-4"></i> <span class="ms-1 d-none d-sm-inline">Gestionar Usuarios</span>
                    </a>
                    
                    
                    <div class="mt-auto">
                    <hr>
                    <div class="dropdown pb-4 " >
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                          
                            <span class="d-none d-sm-inline mx-1"> Hola <?php  $usuario = $_SESSION['user']['Usuario'];; echo $usuario ?>!</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                            <li><a class="dropdown-item" href="?c=Ajustes">Ajustes</a></li>
                            
                            <li><a class="dropdown-item" class="dropdown-item" href="?c=ajustes&a=Soporte">Formulario soporte</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="?c=Usuario&a=CerrarSesion">Cerrar Sesión</a></li>
                        </ul>
                    </div>
                    </div>
                </div>
            </div>


    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap CSS -->

 

    <!-- Validar modal-->
    <script src="../assets/js/validarModal.js"></script>


</body>
</html>
