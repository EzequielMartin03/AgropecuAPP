<?php
session_start();
require_once "modelos/database.php";

// Verifica si el usuario está autenticado
function VerificarLogin() {
    // Lista de controladores y acciones permitidas sin login
    $AccionesPermitidas = [
        'Usuario' => ['Inicio', 'login']
    ];

    $ControladorActual = isset($_GET['c']) ? $_GET['c'] : 'Inicio';

    $AccionActual = isset($_GET['a']) ? $_GET['a'] : 'Inicio';

    // Si el usuario no está autenticado
    if (!isset($_SESSION['Autenticado']) || $_SESSION['Autenticado'] !== true) {
        // Si el controlador actual NO es Usuario o la acción no es permitida, redirige al login
        if (!isset($AccionesPermitidas[$ControladorActual]) || !in_array($AccionActual, $AccionesPermitidas[$ControladorActual])) {
            header('Location: ?c=Usuario&a=Inicio'); // Redirige al login
            exit();
        }
    }
}

// Verifica la autenticación antes de determinar el controlador
VerificarLogin();

// Determina el controlador y la acción
if (!isset($_GET["c"])) {
    require_once "controladores/InicioControlador.php";
    $controlador = new InicioControlador();
 
} else {
    $controlador = $_GET["c"];
    require_once "controladores/" . $controlador . "Controlador.php";    
    $controlador = ucwords($controlador) . "Controlador";

    if (class_exists($controlador)) {
        $controlador = new $controlador;
        $accion = isset($_GET['a']) ? $_GET['a'] : "Inicio";        

        // Verifica si el método (acción) existe en el controlador
        if (method_exists($controlador, $accion)) {
            call_user_func(array($controlador, $accion)); //Llama al método (accion) del controlador 
        } else {
            // si la accion no existe
            echo "Acción no encontrada";
        }
    } else {
        // si el controlador no existe
        echo "Controlador no encontrado";
    }
}
?>
