<?php if (isset($resultados) && !empty($resultados)): ?>
                <?php foreach ($resultados as $Trabajo): ?>
                    <tr>
                        <td><?= $Trabajo->Nombre ?></td>
                        <td><?= $Trabajo->Descripcion ?></td>
                        <td><?= $Trabajo->CantidadHectareasTrabajadas ?></td>
                        <td><?= $Trabajo->FechaTrabajo ?></td>
                        <td><?= $Trabajo->FechaPago ?></td>
                        <td><?php echo $Trabajo->NombreFumigador ? $Trabajo->NombreFumigador : 'No Asignado'; ?></td>
                        <td><?php echo $Trabajo->NombreAguatero ? $Trabajo->NombreAguatero : 'No Asignado'; ?></td>
                        <td><?= $Trabajo->NroFacturaAfip ?></td>
                        <td>
                        <button type="button" class="btn btn-warning w-100" data-bs-toggle="modal" data-bs-target="#ModificarTrabajo<?= $Trabajo->IdTrabajo ?>">Modificar</button>


                            <!-- Botón para eliminar -->
                            <button type="button" class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#EliminarTrabajo<?= $Trabajo->IdTrabajo ?>">
                                <i class="bi-trash"></i> Eliminar
                            </button>

                            <?php include 'vistas/Trabajos/PestaniaCliente/ClientesModales.php'; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">No se encontraron resultados.</td>
                </tr>
            <?php endif; ?>

