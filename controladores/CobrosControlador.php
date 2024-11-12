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

        $_SESSION['Select'] = $selectCobro;
        $_SESSION['ClienteCobros'] = $cliente;
        $_SESSION['fechaInicio'] = $fechaInicio;
        $_SESSION['fechaFin'] = $fechaFin;

       
        if($_POST['cobroSelect2'] == 1) {
            $cobros = $this->modelo->filtrarCobrosAdeudados($fechaInicio, $fechaFin, $cliente);

        }else {
            $cobros = $this->modelo->filtrarCobrosAbonados($fechaInicio, $fechaFin, $cliente); 

        }
        $clientes = $this->modeloCliente->ListarCliente();
        
        require_once "vistas/inicio/SideBar.php";
        require_once "vistas/Cobros/indexCobros.php";
    }

  




   
   

}
