<?php

require_once "modelos/TrabajoRealizado.php";

class CobrosControlador {
    private $modelo;

    public function __construct() {
        $this->modelo = new TrabajoRealizado();
    }

    public function Inicio() {
       
        
        require_once "vistas/inicio/SideBar.php";
        require_once "vistas/inicio/principal.php";
    }


    public function FiltarCobrosXFecha() { 
        $fechaInicio = $_POST['FechaInicio'];
        $fechaFin = $_POST['FechaFin'];

        $resultadosCobros = $this->modelo->filtrarCobrosXFecha($fechaInicio, $fechaFin);
    }

   
   

}
