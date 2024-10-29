<?php

class Cobros  {



    public function __construct() {
        $this->pdo = database::connection();
    }


    public function filtrarCobrosAbonados($fechaInicio, $fechaFin, $IdCliente) {

        try {
        $consulta = "SELECT clientes.Nombre,trabajorealizado.cantidadHectareasTrabajadas, trabajorealizado.Descripcion, trabajorealizado.FechaTrabajo, trabajorealizado.NroFacturaAfip
                FROM TrabajoRealizado
                JOIN Clientes  ON TrabajoRealizado.IdCliente = Clientes.IdCliente
                WHERE trabajorealizado.FechaTrabajo BETWEEN ? AND ?
                AND TrabajoRealizado.NroFacturaAfip IS NOT NULL AND trabajorealizado.EstadoTrabajo = 'Activo' AND clientes.IdCliente = ?;
                ";
        $stm = $this->pdo->prepare($consulta);
        $stm->execute([$fechaInicio, $fechaFin, $IdCliente]);
        return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }   


    }

    public function filtrarCobrosAdeudados($fechaInicio, $fechaFin, $IdCliente) {

        try {
        $consulta = "SELECT clientes.Nombre,trabajorealizado.cantidadHectareasTrabajadas, trabajorealizado.Descripcion, trabajorealizado.FechaTrabajo, trabajorealizado.NroFacturaAfip
                FROM TrabajoRealizado
                JOIN Clientes  ON TrabajoRealizado.IdCliente = Clientes.IdCliente
                WHERE trabajorealizado.FechaTrabajo BETWEEN ? AND ?
                AND TrabajoRealizado.NroFacturaAfip IS NULL AND trabajorealizado.EstadoTrabajo = 'Activo' AND clientes.IdCliente = ?;";
        $stm = $this->pdo->prepare($consulta);
        $stm->execute([$fechaInicio, $fechaFin, $IdCliente]);
        return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }   


    }
}