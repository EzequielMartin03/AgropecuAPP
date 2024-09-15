<?php

require_once "modelos/cliente.php";

class clienteControlador {
    private $modelo;

    public function __construct() {
        $this->modelo = new Cliente();
    }

    public function Inicio() {
        $clientes = $this->modelo->ListarCliente();
        
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
        $cliente -> setIdCliente($_POST['Id_cliente']);
        $cliente-> setNombre($_POST['Nombre']);
        $cliente-> setDireccion($_POST['Direccion']);
        $cliente-> setTelefono($_POST['Telefono']);
        $cliente-> setCuit($_POST['Cuit']);

        $this->modelo->ActualizarCliente($cliente);    

        header ("location:?c=cliente");
    }

    public function EliminarCliente() {
        $cliente = new Cliente();
        $cliente -> setIdCliente($_POST['Id_cliente']);
        
        $this->modelo->Eliminar($cliente);    

        header ("location:?c=cliente");
    }

   

}
