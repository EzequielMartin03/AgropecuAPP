<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f7f7f7;
        }

        .login-container {
            background-color: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .login-container img {
            max-width: 80%;
            height: auto;
            margin-bottom: 20px;
            display: block;
            margin-left: auto;
            margin-right: auto;
            filter: drop-shadow(2px 4px 6px rgba(0, 0, 0, 0.2));
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-control {
            margin-bottom: 20px;
        }

        .btn-primary {
            background-color: #ffc107;
            border: none;
            width: 100%;
            padding: 10px;
        }

        .btn-primary:hover {
            background-color: #e0a800;
        }

        .login-container a {
            text-align: center;
            display: block;
            margin-top: 10px;
            color: #007bff;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <img src="../assets/img/logo_agropecuapp.png" alt="AgropecuApp Logo">

        
        <form action="?c=Usuario&a=login" method="POST">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Correo Electrónico" name="usuario" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Contraseña" name="contrasena" required>
            </div>
            <button type="submit" class="btn btn-primary" style="background-color: #fca218; border-color: #fca218;">Ingresar</button>
        </form>

      
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
