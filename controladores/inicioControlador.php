<?php

<<<<<<< HEAD
require_once "modelos/TrabajoRealizado.php";

class inicioControlador {
    private $modeloo;

    public function _CONSTRUCT() {
        $db = database::connection();
        $this->modeloo = new TrabajoRealizado($db);
        
        
=======
class inicioControlador {
    private $modelo;

    public function _CONSTRUCT() {
        //$this-> modelo new  Producto();
>>>>>>> 80d9cf3793cae5d8d0dcba0297bb03da0b3a4661
    }

    public function Inicio() {

<<<<<<< HEAD
       
        
        
        require_once "vistas/inicio/SideBar.php";
        require_once "vistas/inicio/principal.php";
    }

 
=======
        $db = database::connection(); 
        require_once "vistas/inicio/SideBar.php";
        require_once "vistas/inicio/principal.php";
    }
>>>>>>> 80d9cf3793cae5d8d0dcba0297bb03da0b3a4661
}