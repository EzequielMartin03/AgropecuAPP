
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

                            

                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Eliminaraguatero<?= $aguatero->IdAguatero ?>">
                                <i class="bi-trash"></i> Eliminar
                            </button>

                            <?php include 'vistas/Aguateros/aguateroModales.php'; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>