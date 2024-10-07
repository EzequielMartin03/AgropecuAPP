  



<div class="table-container mt-4">
        <table class="table table-striped">
            <thead>
                <tr>
                  
                    <th scope="col">Cliente</th>
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
            <tbody>
          
                <?php foreach ($AllTrabajos as $Trabajo): ?>
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



        <?php include 'vistas/Trabajos/PestaniaTodos/TodosModales.php'; ?>



        <!-- Botón para eliminar -->
        <button type="button" class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#EliminarCliente<?= $Trabajo->IdCliente ?>">
            <i class="bi-trash"></i> Eliminar
        </button>

        <!-- Modal para eliminar -->
        <div class="modal fade" id="EliminarCliente<?= $Trabajo->IdCliente ?>" tabindex="-1" aria-labelledby="EliminarClienteLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="EliminarTrabajoLabel">Eliminar Cliente</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>¿Estás seguro de que quieres eliminar a <strong><?= $Trabajo->Nombre ?></strong>?</p>
                    </div>
                    <div class="modal-footer">
                        <form method="POST" action="?c=cliente&a=Eliminar">
                            <input type="hidden" name="IdCliente" value="<?= $Trabajo->IdCliente ?>">
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
