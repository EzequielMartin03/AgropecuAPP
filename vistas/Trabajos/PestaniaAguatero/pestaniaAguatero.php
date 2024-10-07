<div>
    <form class="mt-3" method="POST" action="?c=Trabajo&a=FiltrarTrabajoAguatero&tab=aguatero">
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="AguateroSelect" class="form-label">Selecciona Aguatero</label>
                <select id="AguateroSelect" class="form-select" name="AguateroSelect">
                    <?php foreach ($ListaAguateros as $aguatero): ?>
                        <option value="<?= $aguatero->IdAguatero ?>"><?= $aguatero->NombreAguatero ?></option>
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
                <th scope="col">Aguatero</th>
                <th scope="col">Descripción</th>
                <th scope="col">Hectáreas</th>
                <th scope="col">Fecha de Trabajo</th>

            </tr>
        </thead>
        <tbody>
        <?php if (isset($ResultadoAguateros) && !empty($ResultadoAguateros)): ?>
                <?php foreach ($ResultadoAguateros as $Aguatero): ?>
                    <tr>
                        <td><?= $Aguatero->NombreAguatero ?></td>
                        <td><?= $Aguatero->Descripcion ?></td>
                        <td><?= $Aguatero->CantidadHectareasTrabajadas ?></td>
                        <td><?= $Aguatero->FechaTrabajo ?></td>
                        
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
