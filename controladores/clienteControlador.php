<?php

require_once "modelos/cliente.php";

class clienteControlador {
    private $modelo;

    public function __construct() {
        $this->modelo = new Cliente();
    }

    public function Inicio() {
        $Busqueda = isset($_GET['q']) ? $_GET['q'] : ''; 

        if (!empty($Busqueda)) {
            $clientes = $this->modelo->BuscarCliente($Busqueda);
        } else {
            $clientes = $this->modelo->ListarCliente();
        }
        
        require_once "vistas/inicio/SideBar.php";
        require_once "vistas/clientes/indexClientes.php";
    }

    public function Guardar() {
        $cliente = new Cliente();
        $cliente-> setNombre($_POST['Nombre']);
        $cliente-> setDireccion($_POST['Direccion']);
        $cliente-> setTelefono($_POST['Telefono']);
        $cliente-> setCuit($_POST['Cuit']);

        $this->modelo->InsertarCliente($cliente);    

        header ("location:?c=cliente");
    }

    public function ModificarCliente() {                           
        $cliente = new Cliente();                                   
        $cliente -> setIdCliente($_POST['IdCliente']);
        $cliente-> setNombre($_POST['NombreModificar']);
        $cliente-> setDireccion($_POST['DireccionModificar']);
        $cliente-> setTelefono($_POST['TelefonoModificar']);
        $cliente-> setCuit($_POST['CuitModificar']);

        $this->modelo->ActualizarCliente($cliente);    

        header ("location:?c=cliente");

    }

    public function EliminarCliente() {
        $cliente = new Cliente();
        $cliente -> setIdCliente($_POST['IdCliente']);
        
        $this->modelo->EliminarCliente($cliente);    

        header ("location:?c=cliente");
    }

    public function ObtenerCuitsClientes() {
        $cuits = $this->modelo->obtenerCuitsClientes();
        echo json_encode($cuits);
    }

   

}
