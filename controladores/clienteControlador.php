<?php

require_once "modelos/cliente.php";

class clienteControlador {
    private $modelo;

    public function __construct() {
        $this->modelo = new Cliente();
    }

    public function Inicio() {
        $clientes = $this->modelo->Listar();
        
        require_once "vistas/inicio/SideBar.php";
        require_once "vistas/clientes/indexClientes.php";
    }

    public function Guardar() {
        $cliente = new Cliente();
        $cliente-> setNombre($_POST['Nombre']);
        $cliente-> setDireccion($_POST['Direccion']);
        $cliente-> setTelefono($_POST['Telefono']);
        $cliente-> setCuit($_POST['Cuit']);

        $this->modelo->Insertar($cliente);    

        header ("location:?c=cliente");
    }

    public function Modificar() {                           
        $cliente = new Cliente();                                   
        $cliente -> setIdCliente($_POST['Id_cliente']);
        $cliente-> setNombre($_POST['Nombre']);
        $cliente-> setDireccion($_POST['Direccion']);
        $cliente-> setTelefono($_POST['Telefono']);
        $cliente-> setCuit($_POST['Cuit']);

        $this->modelo->Actualizar($cliente);    

        header ("location:?c=cliente");
    }

    public function eliminar() {
        $cliente = new Cliente();
        $cliente -> setIdCliente($_POST['Id_cliente']);
        
        $this->modelo->Eliminar($cliente);    

        header ("location:?c=cliente");
    }
}
