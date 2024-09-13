<?php

require_once "modelos/cliente.php";

class clienteControlador {
    private $modelo;


    public function __construct() {
        $this->modelo = new Cliente();
    }

    public function Inicio() {
       
<<<<<<< HEAD
        $termino = isset($_GET['q']) ? $_GET['q'] : ''; 
       
        if (!empty($termino)) {
            
            $clientes = $this->modelo->BuscarCliente($termino);
        } else {
            
            $clientes = $this->modelo->ListarCliente();
        }
=======
        $clientes = $this->modelo->Listar();
>>>>>>> 80d9cf3793cae5d8d0dcba0297bb03da0b3a4661
        
        require_once "vistas/inicio/SideBar.php";
        require_once "vistas/clientes/indexClientes.php";
    }

    public function Guardar() {
        $cliente = new Cliente();
        $cliente-> setNombre($_POST['Nombre']);
        $cliente-> setDireccion($_POST['Direccion']);
        $cliente-> setTelefono($_POST['Telefono']);
        $cliente-> setCuit($_POST['Cuit']);

<<<<<<< HEAD
        $this->modelo->InsertarCliente($cliente);    
=======
        $this->modelo->Insertar($cliente);    
>>>>>>> 80d9cf3793cae5d8d0dcba0297bb03da0b3a4661

        header ("location:?c=cliente");
    }

    public function Modificar() {                           
        $cliente = new Cliente();                                   
<<<<<<< HEAD
        $cliente -> setIdCliente($_POST['IdCliente']);
=======
        $cliente -> setIdCliente($_POST['Id_cliente']);
>>>>>>> 80d9cf3793cae5d8d0dcba0297bb03da0b3a4661
        $cliente-> setNombre($_POST['Nombre']);
        $cliente-> setDireccion($_POST['Direccion']);
        $cliente-> setTelefono($_POST['Telefono']);
        $cliente-> setCuit($_POST['Cuit']);

<<<<<<< HEAD
        $this->modelo->ActualizarCliente($cliente);    
=======
        $this->modelo->Actualizar($cliente);    
>>>>>>> 80d9cf3793cae5d8d0dcba0297bb03da0b3a4661

        header ("location:?c=cliente");
    }

    public function eliminar() {
        $cliente = new Cliente();
<<<<<<< HEAD
        $cliente -> setIdCliente($_POST['IdCliente']);
        
        $this->modelo->EliminarCliente($cliente);    
=======
        $cliente -> setIdCliente($_POST['Id_cliente']);
        
        $this->modelo->Eliminar($cliente);    
>>>>>>> 80d9cf3793cae5d8d0dcba0297bb03da0b3a4661

        header ("location:?c=cliente");
    }
}
