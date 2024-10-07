       
 <div>
                <form class="mt-3" method="POST" action="?c=Cobros&a=FiltarCobrosXFecha">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <input type="hidden" name="tab" value="cobro">
                            <label for="cobroSelect" class="form-label">Selecciona cliente</label>
                            <select id="cobroSelect" class="form-select" name="cobroSelect">
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

                <?php include 'vistas/Cobros/tablaCobros.php';?>
            </div>

            

            
            </div>