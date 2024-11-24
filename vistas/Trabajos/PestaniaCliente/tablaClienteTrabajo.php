<table id="TrCliente" class="table table-striped ">
        <thead>
            <tr>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Hectareas</th>
                    <th scope="col">Fecha de Trabajo</th>
                    <th scope="col">fecha de Pago</th>
                    <th scope="col">Fumigadores</th>
                    <th scope="col">Aguateros</th>
                    <th scope="col">Numero de Factura</th>
                    <th scope="col">Acciones</th>
                  
            </tr>
        </thead>
        <tbody id ="tbody">
        <?php if (isset($resultados) && !empty($resultados)): ?>
                <?php foreach ($resultados as $Trabajo): ?>
                    <tr>
                        <td><?= $Trabajo->Descripcion ?></td>
                        <td><?= $Trabajo->CantidadHectareasTrabajadas ?></td>
                        <td><?= $Trabajo->FechaTrabajo ?></td>
                        <td><?=  ($Trabajo->FechaPago) ? $Trabajo->FechaPago : 'Fecha no ingresada'; ?></td>
                        <td><?= $Trabajo->NombreFumigador?></td>
                        <td><?= $Trabajo->NombreAguatero?></td>
                        <td><?=  ($Trabajo->NroFacturaAfip) ? $Trabajo->NroFacturaAfip : 'numero de factura no ingresada'; ?></td>
                        <td>
                        <button type="button" class="btn btn-warning w-100" data-bs-toggle="modal" data-bs-target="#ModificarTrabajo<?= $Trabajo->IdTrabajo ?>">Modificar</button>


                            <!-- Botón para eliminar -->
                            <button type="button" class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#EliminarTrabajo<?= $Trabajo->IdTrabajo ?>">
                                <i class="bi-trash"></i> Eliminar
                            </button>

                            <?php include 'vistas/Trabajos/PestaniaCliente/CLmodalesTrabajo.php'; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
           
            <?php endif; ?>


        </tbody>
    </table>
