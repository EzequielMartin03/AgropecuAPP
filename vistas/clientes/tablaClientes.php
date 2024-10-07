
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
                        <td><?= $cliente->IdCliente ?></td>
                        <td><?= $cliente->Nombre ?></td>
                        <td><?= $cliente->Direccion ?></td>
                        <td><?= $cliente->Telefono ?></td>
                        <td><?= $cliente->Cuit ?></td>
                        <td>
                            <button type="button" class="btn btn-warning " data-bs-toggle="modal" data-bs-target="#ModificarCliente<?= $cliente->IdCliente ?>">
                                <i class="bi-pencil"></i>Modificar
                            </button>

                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#EliminarCliente<?= $cliente->IdCliente ?>">
                                <i class="bi-trash"></i>Eliminar
                            </button>


                            

                            <?php include './vistas/Clientes/clientesModales.php'; ?>

                           

                           
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        