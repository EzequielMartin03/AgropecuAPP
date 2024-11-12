<?php

// Incluir el modelo Cliente.
require_once "modelos/cliente.php";

class clienteControlador {
    private $modelo; // Atributo para almacenar el modelo de cliente.

    // Constructor de la clase que inicializa el modelo.
    public function __construct() {
        $this->modelo = new Cliente(); // Crear una nueva instancia del modelo Cliente.
    }

    // Método inicio que lista los clientes o los busca en base a un termino de búsqueda.
    public function Inicio() {
        // Obtener la búsqueda de clientes desde la URL, si existe.
        $Busqueda = isset($_GET['q']) ? $_GET['q'] : ''; 

        // Si hay una búsqueda, buscar clientes; de lo contrario, lista todos los clientes.
        if (!empty($Busqueda)) {
            $clientes = $this->modelo->BuscarCliente($Busqueda);
        } else {
            $clientes = $this->modelo->ListarCliente();
        }
        
        // Cargar las vistas correspondientes.
        require_once "vistas/inicio/SideBar.php";
        require_once "vistas/clientes/indexClientes.php";
    }

    // Método para guardar un nuevo cliente.
    public function Guardar() {
        $cliente = new Cliente(); // Crear una nueva instancia del cliente.
        // Establecer los atributos del cliente desde el formulario.
        $cliente->setNombre($_POST['Nombre']);
        $cliente->setDireccion($_POST['Direccion']);
        $cliente->setTelefono($_POST['Telefono']);
        $cliente->setCuit($_POST['Cuit']);

        // Insertar el nuevo cliente en la base de datos.
        $this->modelo->InsertarCliente($cliente);    

        // Redirigir a la lista de clientes.
        header("location:?c=cliente");
    }

    // Método para modificar un cliente existente.
    public function ModificarCliente() {
        $cliente = new Cliente(); // Crear una nueva instancia del cliente.
        // Establecer el ID y otros atributos del cliente desde el formulario.
        $cliente->setIdCliente($_POST['IdCliente']);
        $cliente->setNombre($_POST['NombreModificar']);
        $cliente->setDireccion($_POST['DireccionModificar']);
        $cliente->setTelefono($_POST['TelefonoModificar']);
        $cliente->setCuit($_POST['CuitModificar']);

        // Actualizar el cliente en la base de datos.
        $this->modelo->ActualizarCliente($cliente);    

        // Redirigir a la lista de clientes.
        header("location:?c=cliente");
    }

    // Método para eliminar un cliente.
    public function EliminarCliente() {
        $cliente = new Cliente(); // Crear una nueva instancia del cliente.
        // Establecer el ID del cliente a eliminar desde el formulario.
        $cliente->setIdCliente($_POST['IdCliente']);
        
        // Eliminar el cliente de la base de datos.
        $this->modelo->EliminarCliente($cliente);    

        // Redirigir a la lista de clientes.
        header("location:?c=cliente");
    }

    // Método para obtener los CUITs de los clientes y devolverlos en formato JSON.
    public function ObtenerCuitsClientes() {
        $cuits = $this->modelo->obtenerCuitsClientes(); // Obtener los CUITs desde el modelo.
        echo json_encode($cuits); // Devolver los CUITs como JSON.
    }
}
