<?php

require_once "modelos/TrabajoRealizado.php";

class inicioControlador {
    private $modeloo;

    public function _CONSTRUCT() {
        $db = database::connection();
        $this->modeloo = new TrabajoRealizado($db);
        
        
    }

    public function Inicio() {

       
        
        
        require_once "vistas/inicio/SideBar.php";
        require_once "vistas/inicio/principal.php";
    }

 
}