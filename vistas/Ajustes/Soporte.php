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
            margin-top: 70px

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
            <label for="Nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="Nombre" name="Nombre">
            <div id="errorNombre" class="invalid-feedback">Por favor ingresa tu nombre.</div>
        </div>
        <div class="mb-3">
            <label for="Email" class="form-label">Email</label>
            <input type="email" class="form-control" id="Email" name="Email">
            <div id="errorEmail" class="invalid-feedback">Por favor ingresa un correo electrónico válido.</div>
        </div>
        <div class="mb-3">
            <label for="Mensaje" class="form-label">Mensaje</label>
            <textarea class="form-control" id="Mensaje" name="Mensaje" rows="4"></textarea>
            <div id="errorMensaje" class="invalid-feedback">Por favor ingresa tu mensaje.</div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" id="btnEnviar" class="btn btn-primary">Enviar</button>
        </div>
    </form>
</div>
<script src = "assets/js/ValidarModal.js" ></script>
</body>
</html>
