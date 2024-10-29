<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="../assets/css/login.css">
</head>
<body>

    <div class="login-container">
        <img src="../assets/img/logo_agropecuapp.png" alt="AgropecuApp Logo">
        
            <!-- Mostrar el error si existe -->
        <?php if (!empty($error)): ?>
            <div class="alert alert-danger">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>
            
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
