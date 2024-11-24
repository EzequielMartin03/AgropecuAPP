<!-- Pestaña Cliente -->
<div>



    <form class="mt-3" method="POST" action="?c=Trabajo&a=filtrarPorCliente&tab=Cliente">
        <div class="row mb-3">
            <div class="col-md-4">
                <input type="hidden" name="tab" value="Cliente">
                <label for="ClienteSelect" class="form-label">Selecciona Cliente</label>
                <select id="ClienteSelect" class="form-select" name="ClienteSelect">
                    <?php foreach ($clientes as $cliente): ?>
                        <option value="<?= $cliente->IdCliente ?>" 
                        <?php echo (isset($_SESSION['IdclienteTR']) && $_SESSION['IdclienteTR'] == $cliente->IdCliente) ? 'selected' : ''; ?>>
                        <?= $cliente->Nombre ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
        </div>
      
        
        <div class="row mb-3">
        <div class="col-md-4">
            <label for="fechaInicio" class="form-label">Fecha de Inicio</label>
            <input type="date" class="form-control" id="fechaInicio" name="fechaInicio" 
                value="<?php echo isset($_SESSION['fechaInicioCliente']) ? $_SESSION['fechaInicioCliente'] : ''; ?>" required>
        </div>
        <div class="col-md-4">
            <label for="fechaFin" class="form-label">Fecha de Fin</label>
            <input type="date" class="form-control" id="fechaFin" name="fechaFin" 
                value="<?php echo isset($_SESSION['fechaFinCliente']) ? $_SESSION['fechaFinCliente'] : ''; ?>" required>
        </div>
        
    </div>

        <button type="submit" class="btn btn-primary col-md-8">
            <i class="bi bi-search"></i> Filtrar
        </button>
    </form>
    
    
</div>

<div class="table-container mt-4">
<?php include 'vistas/Trabajos/PestaniaCliente/tablaClienteTrabajo.php';?>
</div>
