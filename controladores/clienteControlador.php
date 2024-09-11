<?php

require_once "modelos/cliente.php";

class clienteControlador {
    private $modelo;


    public function __construct() {
        $this->modelo = new Cliente();
    }

    public function Inicio() {
       
        $termino = isset($_GET['q']) ? $_GET['q'] : ''; 
       
        if (!empty($termino)) {
            
            $clientes = $this->modelo->BuscarCliente($termino);
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

    public function Modificar() {                           
        $cliente = new Cliente();                                   
        $cliente -> setIdCliente($_POST['IdCliente']);
        $cliente-> setNombre($_POST['Nombre']);
        $cliente-> setDireccion($_POST['Direccion']);
        $cliente-> setTelefono($_POST['Telefono']);
        $cliente-> setCuit($_POST['Cuit']);

        $this->modelo->ActualizarCliente($cliente);    

        header ("location:?c=cliente");
    }

    public function eliminar() {
        $cliente = new Cliente();
        $cliente -> setIdCliente($_POST['IdCliente']);
        
        $this->modelo->EliminarCliente($cliente);    

        header ("location:?c=cliente");
    }
}
