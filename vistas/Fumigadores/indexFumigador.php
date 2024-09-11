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
    
    <title>Fumigadores</title>
    <link rel="stylesheet" href="../assets/css/SideBarStyle.css">

    <link rel="stylesheet" href="../assets/css/indexFumigadores.css">
</head>
<body>

    <div class="col py-3">
        
        <form class="d-flex mb-3 " method="GET" action="index.php" >
            <input type="hidden" name="c" value="Fumigador">
            <input class="form-control me-2 w-50" type="search" placeholder="Buscar por nombre o CUIT" name="q" value="<?= isset($_GET['q']) ? $_GET['q'] : '' ?>">
            <button class="btn btn btn-success" type="submit">Buscar</button>
        </form>

        <div class="modal fade" id="altaFumigadorModal" tabindex="-1" aria-labelledby="altaFumigadorModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="altaFumigadorModalLabel">Nuevo Fumigador</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="formAltaFumigador" method="POST" action="?c=Fumigador&a=Guardar">
                            <div class="mb-3">
                                <label for="Nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="Nombre" name="Nombre" required>
                            </div>
                            <div class="mb-3">
                                <label for="Direccion" class="form-label">Dirección</label>
                                <input type="text" class="form-control" id="Direccion" name="Direccion" required>
                            </div>
                            <div class="mb-3">
                                <label for="Telefono" class="form-label">Teléfono</label>
                                <input type="tel" class="form-control" id="Telefono" name="Telefono" required>
                            </div>
                            <div class="mb-3">
                                <label for="Cuit" class="form-label">Cuit</label>
                                <input type="number" class="form-control" id="Cuit" name="Cuit" required>
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
                <?php foreach ($Fumigadores as $Fumigador): ?>
                    <tr>
                        <td><?= $Fumigador->IdFumigador ?></td>
                        <td><?= $Fumigador->NombreFumigador ?></td>
                        <td><?= $Fumigador->DireccionFumigador ?></td>
                        <td><?= $Fumigador->TelefonoFumigador ?></td>
                        <td><?= $Fumigador->CuitFumigador ?></td>
                        <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModificarFumigador<?= $Fumigador->IdFumigador ?>">
                                <i class="bi-pencil"></i> Modificar
                            </button>

                            <div class="modal fade" id="ModificarFumigador<?= $Fumigador->IdFumigador ?>" tabindex="-1" aria-labelledby="ModificarFumigadorLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="ModificarFumigadorLabel">Modificar Fumigador</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="formModificarFumigador<?= $Fumigador->IdFumigador ?>" method="POST" action="?c=Fumigador&a=Modificar">
                                                <input type="hidden" name="IdFumigador" value="<?= $Fumigador->IdFumigador ?>">
                                                <div class="mb-3">
                                                    <label for="Nombre" class="form-label">Nombre</label>
                                                    <input type="text" class="form-control" id="Nombre" name="Nombre" value="<?= $Fumigador->Nombre ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="Direccion" class="form-label">Dirección</label>
                                                    <input type="text" class="form-control" id="Direccion" name="Direccion" value="<?= $Fumigador->Direccion ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="Telefono" class="form-label">Teléfono</label>
                                                    <input type="tel" class="form-control" id="Telefono" name="Telefono" value="<?= $Fumigador->Telefono ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="Cuit" class="form-label">Cuit</label>
                                                    <input type="number" class="form-control" id="Cuit" name="Cuit" value="<?= $Fumigador->Cuit ?>" required>
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

                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#EliminarFumigador<?= $Fumigador->IdFumigador ?>">
                                <i class="bi-trash"></i> Eliminar
                            </button>

                            <div class="modal fade" id="EliminarFumigador<?= $Fumigador->IdFumigador ?>" tabindex="-1" aria-labelledby="EliminarFumigadorLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="EliminarFumigadorLabel">Eliminar Fumigador</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>¿Estás seguro de que quieres eliminar a <strong><?= $Fumigador->Nombre ?></strong>?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <form method="POST" action="?c=Fumigador&a=Eliminar">
                                                <input type="hidden" name="IdFumigador" value="<?= $Fumigador->IdFumigador ?>">
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
        
        <button type="button" class="btn btn-primary btn-add-work mb-3" data-bs-toggle="modal" data-bs-target="#altaFumigadorModal">
            <i class="bi-plus-circle"></i> Dar de alta Fumigador
        </button>
         
    </div>

   

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
