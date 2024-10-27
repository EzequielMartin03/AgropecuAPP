<table id="TrCliente" class="table table-striped ">
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
           
               
            <?php endif; ?>


        </tbody>
    </table>

<script>
        
  $(document).ready(function() {
    // Inicializa DataTables en la tabla con el ID miTabla
    $('#TrCliente').DataTable({
      "paging": true,        // Habilitar la paginación
      "lengthMenu": [5, 10, 25, 50],  // Opciones de elementos por página
      "pageLength": 5,       // Número de filas por página por defecto
      "searching": true,     // Habilitar la búsqueda
      "ordering": true,      // Habilitar la ordenación
      "info": true           // Mostrar información de la tabla
    });
  });
</script>
