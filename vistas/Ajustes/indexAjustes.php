<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
       
        form {
            padding: 20px; /* Espaciado interno */
            width: 500px; /* Ancho del formulario */
        }
    </style>
</head>
<body>
<div class="container">
    <h3>Formulario de soporte</h3>
<form id="formSoporte" method="POST" action=" ?c=Usuario&a=EnviarMail">
                    <div class="mb-3">
                        <label for="Nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="Nombre" name="Nombre" >
                        <div id="errorNombre" class="invalid-feedback">Por favor ingresa tu nombre.</div>
                    </div>
                    <div class="mb-3">
                        <label for="Email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="Email" name="Email" >
                        <div id="errorEmail" class="invalid-feedback">Por favor ingresa un correo electrónico válido.</div>
                    </div>
                    <div class="mb-3">
                        <label for="Mensaje" class="form-label">Mensaje</label>
                        <textarea class="form-control" id="Mensaje" name="Mensaje" rows="4" ></textarea>
                        <div id="errorMensaje" class="invalid-feedback">Por favor ingresa tu mensaje.</div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnEnviar" class="btn btn-primary">Enviar</button>
                    </div>
                </form>

</div>

</body>
</html>