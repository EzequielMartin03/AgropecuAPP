<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">

    <title>AgropecuApp</title>
</head>
<body>
    <!-- Content area -->
    <div class="container py-3">
        <!-- Panel de Indicadores Clave -->
        <h1 class="my-4 text-center">Panel de Indicadores Clave</h1>
        <div class="row">
            <!-- Total de Hectáreas Trabajadas -->
            <div class="col-md-4 indicator-card">
                <div class="card">
                    <div class="card-header">
                        Total de Hectáreas Trabajadas
                    </div>
                    <div class="card-body">
                        <h2 class="card-text">200 Hectáreas</h2> <!-- Aquí va el dato dinámico -->
                        <p>Hectáreas trabajadas hasta la fecha del mes en curso.</p>
                    </div>
                </div>
            </div>
            <!-- Cantidad de Trabajos Realizados -->
            <div class="col-md-4 indicator-card">
                <div class="card">
                    <div class="card-header">
                        Cantidad de Trabajos Realizados
                    </div>
                    <div class="card-body">
                        <h2 class="card-text">45 Trabajos</h2> <!-- Aquí va el dato dinámico -->
                        <p>Trabajos completados hasta la fecha del mes en curso.</p>
                    </div>
                </div>
            </div>
            <!-- Cliente Más Activo -->
            <div class="col-md-4 indicator-card">
                <div class="card">
                    <div class="card-header">
                        Cliente Más Activo
                    </div>
                    <div class="card-body">
                        <h2 class="card-text">Juan Pérez</h2> <!-- Aquí va el dato dinámico -->
                        <p>Cliente con la mayor cantidad de trabajos o hectáreas trabajadas.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bienvenida -->
        <div class="col py-3">
            <h1>Bienvenido/a a AgropecuApp</h1>
            <h3>Seleccione en el menú donde desea dirigirse!</h3>
            <h4>Gracias por utilizar nuestros servicios!</h4>
        </div>
    </div>

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
