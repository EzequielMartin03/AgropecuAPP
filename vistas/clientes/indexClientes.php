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
    
    <title>Clientes</title>
    <link rel="stylesheet" href="../assets/css/SideBarStyle.css">
<<<<<<< HEAD

    <link rel="stylesheet" href="../assets/css/indexClientes.css">
</head>
<body>

    <div class="col py-3">
        
        <!-- barra de busqueda -->
        <form class="d-flex mb-3 " method="GET" action="index.php" >
            <input type="hidden" name="c" value="cliente">
            <input class="form-control me-2 w-50" type="search" placeholder="Buscar por nombre o CUIT" name="q" value="<?= isset($_GET['q']) ? $_GET['q'] : '' ?>">
            <button class="btn btn btn-success" type="submit">Buscar</button>
        </form>

        <!-- Modal para nuevo cliente -->
=======
</head>
<body>
    <div class="col py-3">
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#altaClienteModal">
            <i class="bi-plus-circle"></i> Dar de alta cliente
        </button>

>>>>>>> 80d9cf3793cae5d8d0dcba0297bb03da0b3a4661
        <div class="modal fade" id="altaClienteModal" tabindex="-1" aria-labelledby="altaClienteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="altaClienteModalLabel">Nuevo Cliente</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="formAltaCliente" method="POST" action="?c=cliente&a=Guardar">
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
<<<<<<< HEAD
            <!-- Tabla de Clientes -->
            <?php include './vistas/Clientes/tablaClientes.php'; ?>

        <!-- Botón para dar de alta un cliente -->
        <button type="button" class="btn btn-primary btn-add-work mb-3" data-bs-toggle="modal" data-bs-target="#altaClienteModal">
            <i class="bi-plus-circle"></i> Dar de alta cliente
        </button>
         
    </div>

   

=======

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
                <?php foreach ($clientes as $cliente): ?>
                    <tr>
                        <td><?= $cliente->Id_cliente ?></td>
                        <td><?= $cliente->Nombre ?></td>
                        <td><?= $cliente->Direccion ?></td>
                        <td><?= $cliente->Telefono ?></td>
                        <td><?= $cliente->Cuit ?></td>
                        <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModificarCliente<?= $cliente->Id_cliente ?>">
                                <i class="bi-pencil"></i> Modificar
                            </button>

                            <div class="modal fade" id="ModificarCliente<?= $cliente->Id_cliente ?>" tabindex="-1" aria-labelledby="ModificarClienteLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="ModificarClienteLabel">Modificar Cliente</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="formModificarCliente<?= $cliente->Id_cliente ?>" method="POST" action="?c=cliente&a=Modificar">
                                                <input type="hidden" name="Id_cliente" value="<?= $cliente->Id_cliente ?>">
                                                <div class="mb-3">
                                                    <label for="Nombre" class="form-label">Nombre</label>
                                                    <input type="text" class="form-control" id="Nombre" name="Nombre" value="<?= $cliente->Nombre ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="Direccion" class="form-label">Dirección</label>
                                                    <input type="text" class="form-control" id="Direccion" name="Direccion" value="<?= $cliente->Direccion ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="Telefono" class="form-label">Teléfono</label>
                                                    <input type="tel" class="form-control" id="Telefono" name="Telefono" value="<?= $cliente->Telefono ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="Cuit" class="form-label">Cuit</label>
                                                    <input type="number" class="form-control" id="Cuit" name="Cuit" value="<?= $cliente->Cuit ?>" required>
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

                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#EliminarCliente<?= $cliente->Id_cliente ?>">
                                <i class="bi-trash"></i> Eliminar
                            </button>

                            <div class="modal fade" id="EliminarCliente<?= $cliente->Id_cliente ?>" tabindex="-1" aria-labelledby="EliminarClienteLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="EliminarClienteLabel">Eliminar Cliente</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>¿Estás seguro de que quieres eliminar a <strong><?= $cliente->Nombre ?></strong>?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <form method="POST" action="?c=cliente&a=Eliminar">
                                                <input type="hidden" name="Id_cliente" value="<?= $cliente->Id_cliente ?>">
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
    </div>

>>>>>>> 80d9cf3793cae5d8d0dcba0297bb03da0b3a4661
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
