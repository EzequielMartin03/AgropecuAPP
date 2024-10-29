<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Soporte</title>
    
    <style>
        html {
            overflow: hidden;
        }

        form {
            padding: 20px; /* Espaciado interno */
            width: 500px; /* Ancho del formulario */
            background-color: #f8f9fa; /* Color de fondo */
            border: 1px solid #ddd; /* Borde del formulario */
            border-radius: 10px; /* Bordes redondeados */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra suave */
            margin-left: 300px;
            margin-top: 70px;
        }

        h3 {
            text-align: center; /* Centra el título */
        }
    </style>
</head>
<body>

<div class="main-content">
    <form id="formSoporte" method="POST" action="?c=Usuario&a=EnviarMail">
        <h3>Formulario de soporte</h3>
        <div class="mb-3">
            <label for="NombreSoporte" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="NombreSoporte" name="NombreSoporte" >
            <div id="errorNombre" class="invalid-feedback"></div>
        </div>
        <div class="mb-3">
            <label for="EmailSoporte" class="form-label">Email</label>
            <input type="email" class="form-control" id="EmailSoporte" name="EmailSoporte" >
            <div id="errorEmail" class="invalid-feedback"></div>
        </div>
        <div class="mb-3">
            <label for="MensajeSoporte" class="form-label">Mensaje</label>
            <textarea class="form-control" id="MensajeSoporte" name="MensajeSoporte" rows="4" ></textarea>
            <div id="errorMensaje" class="invalid-feedback"></div>
        </div>
        <button type="submit" id="btnEnviar" class="btn btn-primary">Enviar</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../assets/js/ValidarFormSoporte.js"></script>
</body>
</html>
