<!-- Pestaña Cliente -->
<div>
    <form class="mt-3" method="POST" action="?c=Trabajo&a=filtrarPorCliente&tab=Cliente">
        <div class="row mb-3">
            <div class="col-md-4">
                <input type="hidden" name="tab" value="Cliente">
                <label for="ClienteSelect" class="form-label">Selecciona Cliente</label>
                <select id="ClienteSelect" class="form-select" name="ClienteSelect">
                    <?php foreach ($clientes as $cliente): ?>
                        <option value="<?= $cliente->IdCliente ?>"><?= $cliente->Nombre ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="fechaInicio" class="form-label">Fecha de Inicio</label>
                <input type="date" class="form-control" id="fechaInicio" name="fechaInicio">
            </div>
            <div class="col-md-4">
                <label for="fechaFin" class="form-label">Fecha de Fin</label>
                <input type="date" class="form-control" id="fechaFin" name="fechaFin">
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary col-md-8">
            <i class="bi bi-search"></i> Filtrar
        </button>
    </form>
</div>

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
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#EliminarTrabajo<?= $Trabajo->IdTrabajo ?>?>">
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
        </tbody>
    </table>
</div>
