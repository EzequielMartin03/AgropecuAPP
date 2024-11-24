<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajustes - Backup y Restauración</title>

    <!-- Incluir Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/indexTrabajo.css">
    
    <link rel="stylesheet" href="../assets/css/SideBarStyle.css">

    <!-- Estilos personalizados -->
    <style>
        body {
          
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        h4 {
            color: #007bff;
        }

        .container {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .form-container {
            max-width: 700px;
            width: 100%; /* Asegura que se ajuste al ancho de pantalla en móviles */
            padding: 15px;
        }

        .card {
            padding: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .btn-primary, .btn-secondary {
            width: 100%;
            padding: 12px;
            font-size: 16px;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-group input {
            padding: 10px;
            border-radius: 5px;
        }

        .card-body {
            background-color: #f9f9f9;
            border-radius: 10px;
        }

        /* --- Media Queries para Responsividad --- */
        @media (max-width: 768px) {
            .form-container {
                padding: 10px; /* Reducir padding en tabletas */
            }

            .card {
                margin-bottom: 15px; /* Reducir espacio entre tarjetas */
            }

            .btn-primary, .btn-secondary {
                font-size: 14px; /* Reducir tamaño de texto en botones */
                padding: 10px;
            }

            .form-group input {
                font-size: 14px;
                padding: 8px; /* Reducir tamaño en campos de entrada */
            }
        }

        @media (max-width: 576px) {
            .form-container {
                padding: 5px;
            }

            h4 {
                font-size: 18px; /* Reducir tamaño del título en móviles */
            }

            .btn-primary, .btn-secondary {
                font-size: 14px;
                padding: 8px; /* Botones más compactos */
            }

            .form-group label {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
          
            <!-- Panel de Respaldo -->
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Generar Respaldo</h4>
                    <p>Haz clic en el botón para generar un respaldo de la base de datos. Este archivo te permitirá restaurar los datos más tarde.</p>
                    
                    <form action="index.php?c=Ajustes&a=descargarBackup" method="POST">
                        <button type="submit" class="btn btn-primary">Descargar Backup</button>
                    </form>
                </div>
            </div>

            <!-- Panel de Restauración -->
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Restaurar Base de Datos</h4>
                    <p>Selecciona un archivo SQL para restaurar la base de datos a un estado anterior.</p>
                    
                    <form action="index.php?c=Ajustes&a=restaurarBackup" method="POST" enctype="multipart/form-data">
                        <div class="form-group mb-3">
                            <label for="sql_file">Selecciona el archivo SQL:</label>
                            <input type="file" name="sql_file" id="sql_file" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-secondary" name="submit">Restaurar Base de Datos</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Incluir Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>



</body>
</html>
