<div>
    <form class="mt-3" id="formFiltrarAguatero" method="POST" action="?c=Trabajo&a=FiltrarTrabajoAguatero&tab=aguatero">
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="AguateroSelect" class="form-label">Selecciona Aguatero</label>
                <select id="AguateroSelect" class="form-select" name="AguateroSelect">
                    <?php foreach ($ListaAguateros as $aguatero): ?>
                        <option value="<?= $aguatero->IdAguatero ?>" 
                        <?php echo (isset($_SESSION['IdAguateroTR']) && $_SESSION['IdAguateroTR'] == $aguatero->IdAguatero) ? 'selected' : ''; ?>>
                        <?= $aguatero->NombreAguatero ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="row mb-3">
        <div class="col-md-4">
            <label for="fechaInicio" class="form-label">Fecha de Inicio</label>
            <input type="date" class="form-control" id="fechaInicio" name="fechaInicio" 
                value="<?php echo isset($_SESSION['fechaInicioAguatero']) ? $_SESSION['fechaInicioAguatero'] : ''; ?>" required>
        </div>
        <div class="col-md-4">
            <label for="fechaFin" class="form-label">Fecha de Fin</label>
            <input type="date" class="form-control" id="fechaFin" name="fechaFin" 
                value="<?php echo isset($_SESSION['fechaFinAguatero']) ? $_SESSION['fechaFinAguatero'] : ''; ?>" required>
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
    
                <th scope="col">Descripción</th>
                <th scope="col">Hectáreas</th>
                <th scope="col">Fecha de Trabajo</th>

            </tr>
        </thead>
        <tbody>
        <?php if (isset($ResultadoAguateros) && !empty($ResultadoAguateros)): ?>
                <?php foreach ($ResultadoAguateros as $Aguatero): ?>
                    <tr>
                        
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
