<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="../assets/css/SideBarStyle.css"> 

    <link rel="stylesheet" href="../assets/css/indexTrabajo.css">


</head>
<body>

 <div class="container">
 <table class="table table-striped" id="tabla">
            <thead>
                <tr>
                    <th>Usuario</th>
                    
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
    <?php foreach ($Usuarios as $usuario): ?>
        <tr>
            <td><?= $usuario->Usuario ?></td>
            
            <td>
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModificarUsuario<?= $usuario->IdUsuario ?>">
                    <i class="bi-pencil"></i> Blanquear Clave
                </button>

                <div class="modal fade" id="ModificarUsuario<?= $usuario->IdUsuario ?>" tabindex="-1" aria-labelledby="ModificarUsuarioLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ModificarUsuarioLabel">Blanquear Usuario/Clave</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="formModificarUsuario" method="POST" action="?c=Usuario&a=BlanquearClaveUsuario">
                                    <input type="hidden" name="IdUsuario" value="<?= $usuario->IdUsuario ?>">
                                    <div class="mb-3">
                                        <label for="Usuario" class="form-label">Usuario</label>
                                        <input type="text" class="form-control" id="Usuario" name="Usuario" value="<?= $usuario->Usuario ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="Clave" class="form-label">Nueva Clave</label>
                                        <input type="password" class="form-control" id="Clave" name="Clave"required>
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

                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#EliminarUsuario<?= $usuario->IdUsuario ?>">
                    <i class="bi-trash"></i> Eliminar Usuario
                </button>

                <div class="modal fade" id="EliminarUsuario<?= $usuario->IdUsuario ?>" tabindex="-1" aria-labelledby="EliminarUsuarioLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="EliminarUsuarioLabel">Eliminar Usuario</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>¿Estás seguro de que quieres eliminar al usuario <strong><?= $usuario->Usuario ?></strong>?</p>
                            </div>
                            <div class="modal-footer">
                                <form method="POST" action="?c=usuario&a=Eliminar">
                                    <input type="hidden" name="IdUsuario" value="<?= $usuario->IdUsuario ?>">
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

         <!-- Botones flotantes -->

     <!-- Boton para nuevo trabajo -->
     <a href="#" class="btn btn-primary btn-add-work" data-bs-toggle="modal" data-bs-target="#AgregarUsuario">
    <i class="bi-plus-circle"></i> Nuevo Usuario
</a>
 </div>   

<!-- Modal para agregar un nuevo usuario -->
<div class="modal fade" id="AgregarUsuario" tabindex="-1" aria-labelledby="AgregarUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AgregarUsuarioLabel">Agregar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formAgregarUsuario" method="POST" action="?c=usuario&a=AgregarUsuario">
                    <div class="mb-3">
                        <label for="Usuario" class="form-label">Nombre de Usuario</label>
                        <input type="text" class="form-control" id="Usuario" name="Usuario" required>
                    </div>
                    <div class="mb-3">
                        <label for="Clave" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="Clave" name="Clave" required>
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


<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- CSS de Select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

<!-- JS de Select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
        
    
</body>
</html>