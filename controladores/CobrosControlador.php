<?php

require_once "modelos/TrabajoRealizado.php";
require_once "modelos/cliente.php";

class CobrosControlador {
    private $modelo;

    public function __construct() {
        $this->modelo = new TrabajoRealizado();
        $this->modeloCliente = new Cliente();
    }

    public function Inicio() {
       
        $clientes = $this->modeloCliente->ListarCliente();
        
        require_once "vistas/inicio/SideBar.php";
        require_once "vistas/Cobros/indexCobros.php";
    }


    public function filtrarCobrosXFecha() { 
        $fechaInicio = $_POST['fechaInicio'];
        $fechaFin = $_POST['fechaFin'];

        $cobros = $this->modelo->filtrarCobrosXFecha($fechaInicio, $fechaFin); 

        require_once "vistas/Cobros/indexCobros.php";
    }

   
   

}
