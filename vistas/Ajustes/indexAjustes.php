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
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            overflow: hidden; /* Bloquea el scroll de la página */
        }

        h2 {
            color: #007bff;
            text-align: center;
            margin-bottom: 30px;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Centra todo el contenido vertical y horizontalmente */
        }

        .form-container {
            max-width: 700px; /* Ajustar el tamaño del formulario */
            margin-left: 200px; /* Añadir espacio extra a la izquierda */
            margin-right: auto; /* Mantener centrado, pero con un pequeño desplazamiento a la izquierda */
            padding: 20px;
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

            <br><br>

            <!-- Panel de Restauración -->
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Restaurar Base de Datos</h4>
                    <p>Selecciona un archivo SQL para restaurar la base de datos a un estado anterior.</p>
                    
                    <form action="index.php?c=Ajustes&a=restaurarBackup" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
