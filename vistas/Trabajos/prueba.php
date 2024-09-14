            
<?php

$password = 'test123';

// Generar un nuevo hash para la contraseña
$hash = password_hash($password, PASSWORD_DEFAULT);

// Mostrar el nuevo hash generado
echo 'Hash generado: ' . $hash . '<br>';

// Verificar la contraseña con el hash generado
if (password_verify($password, $hash)) {
    echo 'La contraseña es válida.';
} else {
    echo 'La contraseña es incorrecta.';
}


