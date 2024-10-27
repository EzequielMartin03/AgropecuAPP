<div>
    <form class="mt-3" method="POST" action="?c=Trabajo&a=FiltrarTrabajoFumigador&tab=fumigador">
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="FumigadorSelect" class="form-label">Selecciona Fumigador</label>
                <select id="FumigadorSelect" class="form-select" name="FumigadorSelect">
                    <?php foreach ($ListaFumigadores as $Fumigador): ?>
                        <option value="<?= $Fumigador->IdFumigador ?>"><?= $Fumigador->NombreFumigador ?></option>
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
    <table id="TrFumigador" class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Fumigador</th>
                <th scope="col">Descripción</th>
                <th scope="col">Hectáreas</th>
                <th scope="col">Fecha de Trabajo</th>
            </tr>
        </thead>
        <tbody>
        <?php if (isset($ResultadosFumigadores) && !empty($ResultadosFumigadores)): ?>
            <?php foreach ($ResultadosFumigadores as $resultado): ?>
                <tr>
                    <td><?= htmlspecialchars($resultado->NombreFumigador) ?></td>
                    <td><?= htmlspecialchars($resultado->Descripcion) ?></td>
                    <td><?= htmlspecialchars($resultado->CantidadHectareasTrabajadas) ?></td>
                    <td><?= htmlspecialchars($resultado->FechaTrabajo) ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">No se encontraron resultados.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>

