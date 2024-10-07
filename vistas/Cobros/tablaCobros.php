

<table class="table table-striped" >
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

            <?php if (isset($cobros) && !empty($cobros)): ?>
    <?php foreach ($cobros as $cobro): ?>
        <tr>
            <td><?= $cobro->IdCobro ?></td>
            <td><?= $cobro->Nombre ?></td>
            <td><?= $cobro->Domicilio ?></td>
            <td><?= $cobro->Telefono ?></td>
            <td><?= $cobro->Cuit ?></td>
            <td>
                <a href="?c=Cobros&a=VerCobro&id=<?= $cobro->IdCobro ?>" class="btn btn-info"><i class="bi bi-eye-fill"></i></a>
            </td>
        </tr>
    <?php endforeach; ?>
<?php else: ?>
    <tr>
        <td colspan="6">No se encontraron cobros.</td>
    </tr>
<?php endif; ?>

            </tbody>
        </table>
        