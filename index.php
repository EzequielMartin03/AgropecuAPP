<?php
session_start();
require_once "modelos/database.php";

// Verifica si el usuario está autenticado
function checkAuth() {
    // Si el usuario no está autenticado
    if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
        // Si el usuario está intentando acceder a la página de inicio de sesión, no redirijas
        $currentPage = isset($_GET['c']) ? $_GET['c'] : 'Inicio';
        if ($currentPage !== 'Usuario') {
            header('Location: ?c=Usuario&a=Inicio');
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
