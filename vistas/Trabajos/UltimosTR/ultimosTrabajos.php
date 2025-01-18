<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Últimos Trabajos Realizados</title>
    <!-- Agrega el enlace a los estilos de DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
</head>
<body>
    <div class="container">
        <h2>Últimos Trabajos Realizados</h2>

        <!-- Verificamos si hay resultados -->
        <table id="tablaTrabajos" class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Cliente</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Hectáreas</th>
                    <th scope="col">Fecha de Trabajo</th>
                    <th scope="col">Fecha de Pago</th>
                    <th scope="col">Fumigadores</th>
                    <th scope="col">Aguateros</th>
                    <th scope="col">Número de Factura</th>
                </tr>
            </thead>
            <tbody id="tbody">
                <?php if (isset($resultadosTr) && !empty($resultadosTr)): ?>
                    <?php foreach ($resultadosTr as $trabajo): ?>
                        <tr>
                            <td><?= $trabajo->Nombre ?></td>
                            <td><?= $trabajo->Descripcion ?></td>
                            <td><?= $trabajo->CantidadHectareasTrabajadas ?></td>
                            <td><?= date('d/m/Y', strtotime($trabajo->FechaTrabajo)) ?></td>
                            <td><?= ($trabajo->FechaPago) ? date('d/m/Y', strtotime($trabajo->FechaPago)) : 'Fecha no ingresada'; ?></td>
                            <td><?= $trabajo->NombreFumigador ?></td>
                            <td><?= $trabajo->NombreAguatero ?></td>
                            <td><?= ($trabajo->NroFacturaAfip) ? $trabajo->NroFacturaAfip : 'Número de factura no ingresada'; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7">No hay trabajos registrados.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Agrega los scripts necesarios para DataTables -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tablaTrabajos').DataTable({
                "paging": true,        // Habilita la paginación de la tabla
                "lengthMenu": [5, 10, 25, 50],  // Opciones de elementos por página
                "pageLength": 5,       // Número de filas por página por defecto
                "searching": true,     // Habilita la funcionalidad de búsqueda
                "ordering": true,      // Habilita la ordenación de las columnas
                "info": true,          // Muestra información sobre la tabla, como el número de entradas
                "language": {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sSearch": "Buscar:",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    }
                }
            });
        });
    </script>
</body>
</html>
