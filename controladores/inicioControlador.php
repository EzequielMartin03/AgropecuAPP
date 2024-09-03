<?php

class inicioControlador {
    private $modelo;

    public function _CONSTRUCT() {
        //$this-> modelo new  Producto();
    }

    public function Inicio() {

        $db = database::connection(); 
        require_once "vistas/inicio/SideBar.php";
        require_once "vistas/inicio/principal.php";
    }
}