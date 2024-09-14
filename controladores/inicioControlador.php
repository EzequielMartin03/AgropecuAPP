<?php

class inicioControlador {
    private $modelo;

    public function _CONSTRUCT() {
       
        session_start(); // Iniciar la sesión

        // Verificar si el usuario no está autenticado
        if (!isset($_SESSION['usuario'])) {
            header("Location: index.php?c=Usuario&a=Inicio"); // Redirigir al login
            exit();
        }
    }

    public function Inicio() {
        $db = database::connection(); 
        require_once "vistas/inicio/SideBar.php";
        require_once "vistas/inicio/principal.php";
    }
}
