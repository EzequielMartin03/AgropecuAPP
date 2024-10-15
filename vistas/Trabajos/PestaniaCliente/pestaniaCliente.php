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
         <?php include 'vistas/Trabajos/PestaniaCliente/tablaClienteTrabajo.php';?>
        </tbody>
    </table>
</div>
