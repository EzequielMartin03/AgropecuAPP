<?php

require_once "modelos/cobros.php";
require_once "modelos/cliente.php";

class CobrosControlador {
    private $modelo;

    public function __construct() {
        $this->modelo = new Cobros();
        $this->modeloCliente = new Cliente();
    }

    public function Inicio() {
       
        $clientes = $this->modeloCliente->ListarCliente();
        
        require_once "vistas/inicio/SideBar.php";
        require_once "vistas/Cobros/indexCobros.php";
    }


    public function filtrarCobros() {
        $cliente = $_POST['cobroSelect'];
        $selectCobro = $_POST['cobroSelect2'];
        $fechaInicio = $_POST['fechaInicio'];
        $fechaFin = $_POST['fechaFin'];

        if($_POST['cobroSelect2'] == 1) {
            $cobros = $this->modelo->filtrarCobrosAbonados($fechaInicio, $fechaFin); 

        }else {
            $cobros = $this->modelo->filtrarCobrosAdeudados($fechaInicio, $fechaFin); 

        }
        $clientes = $this->modeloCliente->ListarCliente();
        require_once "vistas/inicio/SideBar.php";
        require_once "vistas/Cobros/indexCobros.php";
    }

  




   
   

}
