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
        $this->pdo = database::connection();
    }

    // Getters
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

    // Setters
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
                SELECT tr.*, c.Nombre
                FROM trabajorealizado tr
                JOIN clientes c ON tr.IdCliente = c.IdCliente
                WHERE tr.EstadoTrabajo = 'Activo'
            ");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function InsertarTrabajo(TrabajoRealizado $trabajo, $fumigadores, $aguateros) {
        // Insertar el trabajo en la tabla de trabajos
        $query = "INSERT INTO trabajorealizado (Descripcion, FechaTrabajo, FechaPago, CantidadHectareasTrabajadas, NroFacturaAfip, EstadoTrabajo, IdCliente) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            $trabajo->getDescripcion(),
            $trabajo->getFechaTrabajo(),
            $trabajo->getFechaPago(),
            $trabajo->getCantidadHectareasTrabajadas(),
            $trabajo->getNroFacturaAfip(),
            'Activo',
            $trabajo->getIdCliente()
        ]);

        $idTrabajo = $this->pdo->lastInsertId();

        // Insertar las relaciones en la tabla trabajo_fumigador
        foreach ($fumigadores as $IdFumigador) {
            $query = "INSERT INTO fumigadortrabajo (IdTrabajo, IdFumigador) VALUES (?, ?)";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$idTrabajo, $IdFumigador]);
        }

        // Insertar las relaciones en la tabla trabajo_aguatero
        foreach ($aguateros as $IdAguatero) {
            $query = "INSERT INTO aguaterotrabajo (IdTrabajo, IdAguatero) VALUES (?, ?)";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$idTrabajo, $IdAguatero]);
        }
        header ("location:?c=Trabajo");
    }

    public function FiltrarTrabajosFumigador($IdFumigador, $FechaInicio, $FechaFin) {
        // Consulta el trabajo solo si está dentro del rango de fechas
        $query = "SELECT * FROM trabajorealizado WHERE IdFumigador = ? AND FechaTrabajo BETWEEN ? AND ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$IdFumigador, $FechaInicio, $FechaFin]);
        $trabajo = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($trabajo) {
            // Obtener fumigadores relacionados si el trabajo está dentro del rango de fechas
            $query = "SELECT IdFumigador FROM trabajo_fumigador WHERE IdTrabajo = ? AND FechaTrabajo BETWEEN ? AND ?";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$IdFumigador, $FechaInicio, $FechaFin]);
            $fumigadores = $stmt->fetchAll(PDO::FETCH_COLUMN);

            return [
                'trabajo' => $trabajo,
                'fumigadores' => $fumigadores,
            ];
        }

        // Si no se encuentra el trabajo en el rango de fechas, devolver null
        return null;
    }

    public function FiltrarTrabajosCliente($IdCliente, $FechaInicio, $FechaFin) {
        $consulta = "SELECT trabajorealizado.*, clientes.Nombre 
                     FROM trabajorealizado 
                     JOIN clientes ON trabajorealizado.IdCliente = clientes.IdCliente
                     WHERE trabajorealizado.IdCliente = ? 
                     AND trabajorealizado.FechaTrabajo BETWEEN ? AND ?
                     ORDER BY trabajorealizado.FechaTrabajo DESC";
                     
        $stm = $this->pdo->prepare($consulta);
        $stm->execute([$IdCliente, $FechaInicio, $FechaFin]);
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }

    public function FiltrarTrabajosAguatero($IdAguatero, $FechaInicio, $FechaFin) { 
        try {
            $consulta = "
                SELECT Aguateros.NombreAguatero, trabajorealizado.Descripcion, trabajorealizado.CantidadHectareasTrabajadas, trabajorealizado.FechaTrabajo 
                FROM trabajorealizado  
                LEFT JOIN trabajo_aguatero ON trabajorealizado.IdTrabajo = trabajo_aguatero.IdTrabajo
                LEFT JOIN aguateros ON trabajo_aguatero.IdAguatero = aguateros.IdAguatero
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
        $query = "SELECT trabajorealizado.IdTrabajo, 
                 trabajorealizado.CantidadHectareasTrabajadas, 
                 trabajorealizado.Descripcion,
                 trabajorealizado.FechaTrabajo,
                 trabajorealizado.FechaPago, 
                 Clientes.Nombre 
                FROM trabajorealizado
                INNER JOIN Clientes ON trabajorealizado.IdCliente = Clientes.IdCliente
                WHERE FechaTrabajo BETWEEN ? AND ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$FechaInicio, $FechaFin]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
