<?php
session_start();
require_once "modelos/database.php";

// Verifica si el usuario está autenticado
function checkAuth() {
    // Lista de controladores y acciones permitidas sin autenticación
    $allowedActions = [
        'Usuario' => ['Inicio', 'login'] // Aquí defines las acciones que no requieren autenticación
    ];

    $currentController = isset($_GET['c']) ? $_GET['c'] : 'Inicio';
    $currentAction = isset($_GET['a']) ? $_GET['a'] : 'Inicio';

    // Si el usuario NO está autenticado
    if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
        // Si el controlador actual NO es Usuario o la acción no es permitida, redirige al login
        if (!isset($allowedActions[$currentController]) || !in_array($currentAction, $allowedActions[$currentController])) {
            header('Location: ?c=Usuario&a=Inicio'); // Redirige al login
            exit();
        }
    }
}

// Verifica la autenticación antes de determinar el controlador
checkAuth();

// Determina el controlador y la acción
if (!isset($_GET["c"])) {
    require_once "controladores/InicioControlador.php";
    $controlador = new InicioControlador();
    $accion = "Inicio";
} else {
    $controlador = $_GET["c"];
    require_once "controladores/" . $controlador . "Controlador.php";
    $controlador = ucwords($controlador) . "Controlador";

    // Asegúrate de que el controlador existe antes de instanciarlo
    if (class_exists($controlador)) {
        $controlador = new $controlador;
        $accion = isset($_GET['a']) ? $_GET['a'] : "Inicio";

        // Verifica si el método (acción) existe en el controlador
        if (method_exists($controlador, $accion)) {
            call_user_func(array($controlador, $accion));
        } else {
            // Maneja el caso en que la acción no existe
            echo "Acción no encontrada";
        }
    } else {
        // Maneja el caso en que el controlador no existe
        echo "Controlador no encontrado";
    }
}
?>
