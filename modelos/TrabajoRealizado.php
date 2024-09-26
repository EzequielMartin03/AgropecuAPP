<?php
class TrabajoRealizado {
    private $IdTrabajo;
    private $IdFumigador;
    private $IdAguatero;
    private $CantidadHectareasTrabajadas;
    private $FechaTrabajo;
    private $Descripcion;
    private $FechaPago;
    private $IdUsuario;
    private $IdCliente;
    private $NroFacturaAfip;

    public function __construct() {
        $this-> pdo = database::connection();
    }


    public function getIdTrabajo() {
        return $this->IdTrabajo;
    }

    public function getIdFumigador() {
        return $this->IdFumigador;
    }

    public function getIdAguatero() {
        return $this->IdAguatero;
    }

    public function getCantidadHectareasTrabajadas() {
        return $this->CantidadHectareasTrabajadas;
    }

    public function getFechaTrabajo() {
        return $this->FechaTrabajo;
    }

    public function getDescripcion() {
        return $this->Descripcion;
    }

    public function getFechaPago() {
        return $this->FechaPago;
    }

    public function getIdUsuario() {
        return $this->IdUsuario;
    }

    public function getIdCliente() {
        return $this->IdCliente;
    }

    public function getNroFacturaAfip() {
        return $this->NroFacturaAfip;
    }


    public function setIdTrabajo($IdTrabajo) {
        $this->IdTrabajo = $IdTrabajo;
    }

    public function setIdFumigador($IdFumigador) {
        $this->IdFumigador = $IdFumigador;
    }

    public function setIdAguatero($IdAguatero) {
        $this->IdAguatero = $IdAguatero;
    }

    public function setCantidadHectareasTrabajadas($CantidadHectareasTrabajadas) {
        $this->CantidadHectareasTrabajadas = $CantidadHectareasTrabajadas;
    }

    public function setFechaTrabajo($FechaTrabajo) {
        $this->FechaTrabajo = $FechaTrabajo;
    }

    public function setDescripcion($Descripcion) {
        $this->Descripcion = $Descripcion;
    }

    public function setFechaPago($FechaPago) {
        $this->FechaPago = $FechaPago;
    }

    public function setIdUsuario($IdUsuario) {
        $this->IdUsuario = $IdUsuario;
    }

    public function setIdCliente($IdCliente) {
        $this->IdCliente = $IdCliente;
    }

    public function setNroFacturaAfip($NroFacturaAfip) {
        $this->NroFacturaAfip = $NroFacturaAfip;
    }



    public function ListarTrabajos() {
        try {
            $consulta = $this->pdo->prepare("
                SELECT trabajorealizado.*, clientes.Nombre
                FROM trabajorealizado
                JOIN clientes ON trabajorealizado.IdCliente = clientes.IdCliente
                WHERE trabajorealizado.EstadoTrabajo = 'Activo';

            ");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    public function InsertarTrabajo(TrabajoRealizado $trabajo, $fumigadores, $aguateros) {
      
        $consulta = "INSERT INTO trabajorealizado (Descripcion, FechaTrabajo, FechaPago, CantidadHectareasTrabajadas, NroFacturaAfip, EstadoTrabajo, IdCliente) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stm = $this->pdo->prepare($consulta);
        $stm->execute([
            $trabajo->getDescripcion(),
            $trabajo->getFechaTrabajo(),
            $trabajo->getFechaPago(),
            $trabajo->getCantidadHectareasTrabajadas(),
            $trabajo->getNroFacturaAfip(),
            'Activo',
            $trabajo->getIdCliente()
        ]);

        $idTrabajo = $this->pdo->lastInsertId();

       
        foreach ($fumigadores as $IdFumigador) {
            $consulta = "INSERT INTO fumigadortrabajo (IdTrabajo, IdFumigador) VALUES (?, ?)";
            $stm = $this->pdo->prepare($consulta);
            $stm->execute([$idTrabajo, $IdFumigador]);
        }

     
        foreach ($aguateros as $IdAguatero) {
            $consulta = "INSERT INTO aguaterotrabajo (IdTrabajo, IdAguatero) VALUES (?, ?)";
            $stm = $this->pdo->prepare($consulta);
            $stm->execute([$idTrabajo, $IdAguatero]);
        }
        header ("location:?c=Trabajo");
    }




    public function FiltrarTrabajosFumigador($IdFumigador, $FechaInicio, $FechaFin) {
        try {
        $consulta = "SELECT trabajorealizado.*, trabajofumigador.IdFumigador 
                  FROM trabajorealizado
                  JOIN trabajofumigador ON trabajorealizado.IdTrabajo = trabajofumigador.IdTrabajo
                  WHERE trabajofumigador.IdFumigador = ? 
                  AND trabajorealizado.FechaTrabajo BETWEEN ? AND ?";
        
        $stm = $this->pdo->prepare($consulta);
        $stm->execute([$IdFumigador, $FechaInicio, $FechaFin]);
        
        return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    public function FiltrarTrabajosCliente($IdCliente, $FechaInicio, $FechaFin) {
        try {
        $consulta = "SELECT trabajorealizado.*, clientes.Nombre 
                     FROM trabajorealizado 
                     JOIN clientes ON trabajorealizado.IdCliente = clientes.IdCliente
                     WHERE trabajorealizado.IdCliente = ? 
                     AND trabajorealizado.FechaTrabajo BETWEEN ? AND ?
                     ORDER BY trabajorealizado.FechaTrabajo DESC";
                     
        $stm = $this->pdo->prepare($consulta);
        $stm->execute([$IdCliente, $FechaInicio, $FechaFin]);
        return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    public function FiltrarTrabajosAguatero($IdAguatero, $FechaInicio, $FechaFin) { 
        try {
            $consulta = "
                SELECT Aguateros.NombreAguatero, trabajorealizado.Descripcion, trabajorealizado.CantidadHectareasTrabajadas, trabajorealizado.FechaTrabajo 
                FROM trabajorealizado  
                LEFT JOIN aguaterotrabajo ON trabajorealizado.IdTrabajo =  aguaterotrabajo.IdTrabajo
                LEFT JOIN aguateros ON aguaterotrabajo.IdAguatero = aguateros.IdAguatero
                WHERE aguateros.IdAguatero = ? 
                AND trabajorealizado.FechaTrabajo BETWEEN ? AND ?";
            
            $stm = $this->pdo->prepare($consulta);
            $stm->execute([$IdAguatero, $FechaInicio, $FechaFin]);
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    public function filtrarCobrosXFecha($FechaInicio, $FechaFin) {
        try {
        $consulta = "SELECT trabajorealizado.IdTrabajo, 
                 trabajorealizado.CantidadHectareasTrabajadas, 
                 trabajorealizado.Descripcion,
                 trabajorealizado.FechaTrabajo,
                 trabajorealizado.FechaPago, 
                 Clientes.Nombre 
                FROM trabajorealizado
                INNER JOIN Clientes ON trabajorealizado.IdCliente = Clientes.IdCliente
                WHERE FechaTrabajo BETWEEN ? AND ?";
        $stm = $this->pdo->prepare($consulta);
        $stm->execute([$FechaInicio, $FechaFin]);
        return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


}
