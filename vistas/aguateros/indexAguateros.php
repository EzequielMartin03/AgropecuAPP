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
    
    <title>aguateros</title>
    <link rel="stylesheet" href="../assets/css/SideBarStyle.css">
    <link rel="stylesheet" href="../assets/css/indexAguateros.css">
 
</head>
<body>

    <div class="col py-3">
        
      

        <form class="d-flex mb-3 " method="GET" action="index.php" >
            <input type="hidden" name="c" value="aguatero">
            <input class="form-control me-2 w-50" type="search" placeholder="Buscar por Nombre o Cuit/Cuil" name="q" value="<?= isset($_GET['q']) ? $_GET['q'] : '' ?>">
            <button class="btn btn btn-success" type="submit">Buscar</button>
        </form>

        <div class="modal fade" id="altaaguateroModal" tabindex="-1" aria-labelledby="altaaguateroModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="altaaguateroModalLabel">Nuevo aguatero</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="formAltaaguatero" method="POST" action="?c=aguatero&a=Guardar">
                            <div class="mb-3">
                                <label for="NombreAguatero" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="NombreAguatero" name="NombreAguatero" required>
                            </div>
                            <div class="mb-3">
                                <label for="DireccionAguatero" class="form-label">Dirección</label>
                                <input type="text" class="form-control" id="DireccionAguatero" name="DireccionAguatero" required>
                            </div>
                            <div class="mb-3">
                                <label for="TelefonoAguatero" class="form-label">Teléfono</label>
                                <input type="tel" class="form-control" id="TelefonoAguatero" name="TelefonoAguatero" required>
                            </div>
                            <div class="mb-3">
                                <label for="CuitAguatero" class="form-label">Cuit</label>
                                <input type="number" class="form-control" id="CuitAguatero" name="CuitAguatero" required>
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

        <table class="table table-striped" id="tabla">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Cuit</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($Aguateros as $aguatero): ?>
                    <tr>
                        <td><?= $aguatero->IdAguatero ?></td>
                        <td><?= $aguatero->NombreAguatero ?></td>
                        <td><?= $aguatero->DireccionAguatero ?></td>
                        <td><?= $aguatero->TelefonoAguatero ?></td>
                        <td><?= $aguatero->CuitAguatero ?></td>
                        <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#Modificaraguatero<?= $aguatero->IdAguatero ?>">
                                <i class="bi-pencil"></i> Modificar
                            </button>

                            <div class="modal fade" id="Modificaraguatero<?= $aguatero->IdAguatero ?>" tabindex="-1" aria-labelledby="ModificaraguateroLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="ModificaraguateroLabel">Modificar aguatero</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="formModificaraguatero<?= $aguatero->IdAguatero ?>" method="POST" action="?c=aguatero&a=Modificar">
                                                <input type="hidden" name="IdAguatero" value="<?= $aguatero->IdAguatero ?>">
                                                <div class="mb-3">
                                                    <label for="NombreAguatero" class="form-label">Nombre</label>
                                                    <input type="text" class="form-control" id="NombreAguatero" name="NombreAguatero" value="<?= $aguatero->NombreAguatero ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="DireccionAguatero" class="form-label">Dirección</label>
                                                    <input type="text" class="form-control" id="DireccionAguatero" name="DireccionAguatero" value="<?= $aguatero->DireccionAguatero ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="TelefonoAguatero" class="form-label">Teléfono</label>
                                                    <input type="tel" class="form-control" id="TelefonoAguatero" name="TelefonoAguatero" value="<?= $aguatero->TelefonoAguatero ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="CuitAguatero" class="form-label">Cuit</label>
                                                    <input type="number" class="form-control" id="CuitAguatero" name="CuitAguatero" value="<?= $aguatero->CuitAguatero ?>" required>
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

                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Eliminaraguatero<?= $aguatero->IdAguatero ?>">
                                <i class="bi-trash"></i> Eliminar
                            </button>

                            <div class="modal fade" id="Eliminaraguatero<?= $aguatero->IdAguatero ?>" tabindex="-1" aria-labelledby="EliminaraguateroLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="EliminaraguateroLabel">Eliminar aguatero</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>¿Estás seguro de que quieres eliminar a <strong><?= $aguatero->NombreAguatero ?></strong>?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <form method="POST" action="?c=aguatero&a=Eliminar">
                                                <input type="hidden" name="IdAguatero" value="<?= $aguatero->IdAguatero ?>">
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
        
        <button type="button" class="btn btn-primary btn-add-work mb-3" data-bs-toggle="modal" data-bs-target="#altaaguateroModal">
            <i class="bi-plus-circle"></i> Dar de alta aguatero
        </button>
         
    </div>

   

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
