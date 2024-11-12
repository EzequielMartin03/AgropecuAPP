<?php

require_once "modelos/trabajoRealizado.php";

class inicioControlador {
    private $modeloTrabajo;
    
    public function __construct() {
        $this->modeloTrabajo = new TrabajoRealizado();
        
    }


    public function Inicio() { 

        $totalHectareas = $this->modeloTrabajo->Totalhectareas();
        $totalTrabajos = $this->modeloTrabajo->TotaltrabajosMesActual();
        $ClienteMasActivo = $this->modeloTrabajo->ClienteMasActivo();
        $Hectareasmensuales = $this->modeloTrabajo->HectareasPorMes();


        require_once "vistas/inicio/SideBar.php";
        require_once "vistas/inicio/principal.php";
    }

    



}
