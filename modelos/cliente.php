<?php

class Cliente {
    private $IdCliente;
    private $Nombre;
    private $Direccion;
    private $Telefono;
    private $Cuit;

    public function __construct() {
        $this->pdo = database::connection();
    }

    public function getIdCliente() {
        return $this->IdCliente;
    }

    public function getNombre() {
        return $this->Nombre;
    }

    public function getDireccion() {
        return $this->Direccion;
    }

    public function getTelefono() {
        return $this->Telefono;
    }

    public function getCuit() {
        return $this->Cuit;
    }

    public function setIdCliente($IdCliente) {
        $this->IdCliente = $IdCliente;
    }

    public function setNombre($Nombre) {
        $this->Nombre = $Nombre;
    }

    public function setDireccion($Direccion) {
        $this->Direccion = $Direccion;
    }

    public function setTelefono($Telefono) {
        $this->Telefono = $Telefono;
    }

    public function setCuit($Cuit) {
        $this->Cuit = $Cuit;
    }

    public function ListarCliente() {
        try {
            $consulta = $this->pdo->prepare("SELECT * FROM CLIENTES WHERE EstadoCliente = 'Activo';");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    

    public function InsertarCliente(Cliente $cliente) {
        try {
            $consulta = "INSERT INTO CLIENTES (Nombre, Direccion, Telefono, Cuit, EstadoCliente) VALUES (?, ?, ?, ?, ?);";
            $this->pdo->prepare($consulta)->execute(array(
                $cliente->getNombre(),
                $cliente->getDireccion(),
                $cliente->getTelefono(),
                $cliente->getCuit(),
                'Activo'
            ));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function ActualizarCliente(Cliente $cliente) {
        try {
            $consulta = "UPDATE CLIENTES SET Nombre = ?, Direccion = ?, Telefono = ?, Cuit = ? WHERE IdCliente = ?;";
            $this->pdo->prepare($consulta)->execute(array(
                $cliente->getNombre(),
                $cliente->getDireccion(),
                $cliente->getTelefono(),
                $cliente->getCuit(),
                $cliente->getIdCliente()
            ));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function EliminarCliente(Cliente $cliente) {
        try {
            $consulta = "UPDATE CLIENTES SET EstadoCliente = 'Inactivo' WHERE IdCliente = ?";
            $this->pdo->prepare($consulta)->execute(array(
                $cliente->getIdCliente()
            ));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function obtenerCuitsClientes() {
        $query = "SELECT Cuit FROM clientes where EstadoCliente = 'Activo'"; // Cambia 'clientes' y 'cuit' según tu tabla y campo
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN); // Devuelve un array de CUITs
    }
    
    public function BuscarCliente($Busqueda) {
        $consulta = $this->pdo->prepare("SELECT * FROM clientes WHERE (Nombre LIKE ? OR Cuit LIKE ?) AND EstadoCliente = ?");
        $consulta->execute(array("%$Busqueda%", "%$Busqueda%", 'Activo'));
        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }


}