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

    

   

    public function InsertarTrabajo(TrabajoRealizado $trabajo, $fumigadores, $aguateros) {
        $fechaPago = empty($trabajo->getFechaPago()) ? null : $trabajo->getFechaPago();
        $NroFacturaAfip = empty($trabajo->getNroFacturaAfip()) ? null : $trabajo->getNroFacturaAfip();
        $IdUsuario = $_SESSION['IdUsuario'];
        
        // Insertar el trabajo en la tabla de trabajos
        $consulta = "INSERT INTO trabajorealizado (Descripcion, FechaTrabajo, FechaPago, CantidadHectareasTrabajadas, NroFacturaAfip, EstadoTrabajo, IdCliente, IdUsuario) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($consulta);
        $stmt->execute([
            $trabajo->getDescripcion(),
            $trabajo->getFechaTrabajo(),
            $fechaPago,
            $trabajo->getCantidadHectareasTrabajadas(),
            $NroFacturaAfip,
            'Activo',
            $trabajo->getIdCliente(),
            $IdUsuario
            
        ]);

        $idTrabajo = $this->pdo->lastInsertId();

        // Insertar las relaciones en la tabla trabajofumigador
        foreach ($fumigadores as $IdFumigador) {
            $consulta = "INSERT INTO fumigadortrabajo (IdTrabajo, IdFumigador, EstadoFumigadorTr) VALUES (?, ?, ?)";
            $stmt = $this->pdo->prepare($consulta);
            $stmt->execute([$idTrabajo, $IdFumigador, 'Activo']);
        }

     
        foreach ($aguateros as $IdAguatero) {
            $consulta = "INSERT INTO aguaterotrabajo (IdTrabajo, IdAguatero, EstadoAguateroTr) VALUES (?, ?, ?)";
            $stmt = $this->pdo->prepare($consulta);
            $stmt->execute([$idTrabajo, $IdAguatero, 'Activo']);
        }
        
    }


    public function EliminarTrabajo($IdTrabajo) {
        try {
            $consulta = "UPDATE trabajorealizado SET EstadoTrabajo = 'Inactivo' WHERE IdTrabajo = ?";
            $stmt = $this->pdo->prepare($consulta);
            $stmt->execute([$IdTrabajo]);

            $consulta = "UPDATE fumigadortrabajo SET EstadoFumigadorTr = 'Inactivo' WHERE IdTrabajo = ?";
            $stmt = $this->pdo->prepare($consulta);
            $stmt->execute([$IdTrabajo]);

            $consulta = "UPDATE aguaterotrabajo SET EstadoAguateroTr = 'Inactivo' WHERE IdTrabajo = ?";
            $stmt = $this->pdo->prepare($consulta);
            $stmt->execute([$IdTrabajo]);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function ActualizarTrabajo($trabajo) {
        $fechaPago = empty($trabajo->getFechaPago()) ? null : $trabajo->getFechaPago();
        $NroFacturaAfip = empty($trabajo->getNroFacturaAfip()) ? null : $trabajo->getNroFacturaAfip();


        $sql = "UPDATE trabajorealizado SET 
                    IdCliente = ?, 
                    CantidadHectareasTrabajadas = ?, 
                    FechaTrabajo = ?,
                    FechaPago = ?,
                    NroFacturaAfip = ?,
                    Descripcion = ? 
                WHERE IdTrabajo = ?";

        $stmt = $this->pdo->prepare($sql);
        
        $stmt->execute([
            $trabajo->getIdCliente(),
            $trabajo->getCantidadHectareasTrabajadas(),
            $trabajo->getFechaTrabajo(),
            $fechaPago,
            $NroFacturaAfip,
            $trabajo->getDescripcion(),
            $trabajo->getIdTrabajo() 
        ]);
    }

    public function ActualizarAguaterosTrabajo($idTrabajo, $aguateros) {
 
        $consulta = "DELETE FROM aguaterotrabajo WHERE IdTrabajo = ?";
        $stmt = $this->pdo->prepare($consulta);
        $stmt->execute([$idTrabajo]); 
    
     
        foreach ($aguateros as $idAguatero) {
            $consulta = "INSERT INTO aguaterotrabajo (IdTrabajo, IdAguatero, EstadoAguateroTr) VALUES (?, ?, ?)";
            $stmt = $this->pdo->prepare($consulta);
            $stmt->execute([$idTrabajo, $idAguatero,"Activo"]); 
        }
    }

    public function ActualizarFumigadoresTrabajo($idTrabajo, $fumigadores) {
 
        $consulta = "DELETE FROM fumigadortrabajo WHERE IdTrabajo = ?";
        $stmt = $this->pdo->prepare($consulta);
        $stmt->execute([$idTrabajo]); 
    
     
        foreach ($fumigadores as $IdFumigador) {
            $consulta = "INSERT INTO fumigadortrabajo (IdTrabajo, IdFumigador, EstadoFumigadorTr) VALUES (?, ?, ?)";
            $stmt = $this->pdo->prepare($consulta);
            $stmt->execute([$idTrabajo, $IdFumigador,"Activo"]); 
        }
    }
    
    

    public function FiltrarTrabajosFumigador($IdFumigador, $fechaInicio,$fechaFin) {
        try {
            $consulta = "
                SELECT fumigadores.IdFumigador, fumigadores.NombreFumigador, trabajorealizado.Descripcion, trabajorealizado.CantidadHectareasTrabajadas, trabajorealizado.FechaTrabajo
                FROM trabajorealizado  
                LEFT JOIN fumigadortrabajo ON trabajorealizado.IdTrabajo = fumigadortrabajo.IdTrabajo
                LEFT JOIN fumigadores ON fumigadortrabajo.IdFumigador = fumigadores.IdFumigador WHERE fumigadores.IdFumigador = ? AND trabajorealizado.FechaTrabajo BETWEEN ? AND ? AND trabajorealizado.EstadoTrabajo = 'Activo';";
            
            $stm = $this->pdo->prepare($consulta);
            $stm->execute([$IdFumigador, $fechaInicio,$fechaFin]);
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
        

       
    }

    public function FiltrarTrabajosCliente($IdCliente, $FechaInicio, $FechaFin) {
        $consulta = $this->pdo->prepare("
              SELECT 
                trabajorealizado.IdCliente, 
                trabajorealizado.IdTrabajo,
                trabajorealizado.Descripcion,
                trabajorealizado.CantidadHectareasTrabajadas,
                trabajorealizado.FechaTrabajo,
                trabajorealizado.FechaPago,
                trabajorealizado.NroFacturaAfip,
                clientes.Nombre,
                GROUP_CONCAT(DISTINCT fumigadores.NombreFumigador SEPARATOR ', ') AS NombreFumigador,
                GROUP_CONCAT(DISTINCT aguateros.NombreAguatero SEPARATOR ', ') AS NombreAguatero
                FROM 
                    trabajorealizado
                JOIN 
                    clientes ON trabajorealizado.IdCliente = clientes.IdCliente
                JOIN 
                    fumigadortrabajo ON trabajorealizado.IdTrabajo = fumigadortrabajo.IdTrabajo
                JOIN 
                    fumigadores ON fumigadortrabajo.IdFumigador = fumigadores.IdFumigador
                JOIN 
                    aguaterotrabajo ON trabajorealizado.IdTrabajo = aguaterotrabajo.IdTrabajo
                JOIN 
                    aguateros ON aguaterotrabajo.IdAguatero = aguateros.IdAguatero
                WHERE 
                    trabajorealizado.EstadoTrabajo = 'Activo' 
                    AND clientes.IdCliente = ? 
                    AND trabajorealizado.FechaTrabajo BETWEEN ? AND ?
                GROUP BY 
                    trabajorealizado.IdTrabajo, trabajorealizado.Descripcion, clientes.Nombre
");
        $consulta->execute([$IdCliente, $FechaInicio, $FechaFin]);
        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }

    public function FiltrarTrabajosAguatero($IdAguatero, $FechaInicio, $FechaFin) { 
        try {
            $consulta = "
                SELECT Aguateros.IdAguatero, Aguateros.NombreAguatero, trabajorealizado.Descripcion, trabajorealizado.CantidadHectareasTrabajadas, trabajorealizado.FechaTrabajo
                FROM trabajorealizado  
                LEFT JOIN aguaterotrabajo ON trabajorealizado.IdTrabajo = aguaterotrabajo.IdTrabajo
                LEFT JOIN aguateros ON aguaterotrabajo.IdAguatero = aguateros.IdAguatero
                WHERE aguateros.IdAguatero = ? 
                AND trabajorealizado.FechaTrabajo BETWEEN ? AND ? AND trabajorealizado.EstadoTrabajo = 'Activo';";
            
            $stm = $this->pdo->prepare($consulta);
            $stm->execute([$IdAguatero, $FechaInicio, $FechaFin]);
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function ObtenerAguaterosPorTrabajo($idTrabajo) {
       
        $consulta = "SELECT aguateros.IdAguatero FROM aguaterotrabajo 
                inner join aguateros ON aguaterotrabajo.IdAguatero =  aguateros.IdAguatero
                WHERE aguaterotrabajo.IdTrabajo = ? 
                AND aguateros.EstadoAguatero = 'Activo';
        " ; 
        $stmt = $this->pdo->prepare($consulta);
        $stmt->execute([$idTrabajo]);
        return $stmt->fetchAll(PDO::FETCH_COLUMN); 
    }


     public function ObtenerFumigadoresPorTrabajo($idTrabajo) {
        $consulta = "SELECT IdFumigador FROM Fumigadortrabajo WHERE IdTrabajo = ?";
        $stmt = $this->pdo->prepare($consulta);
        $stmt->execute([$idTrabajo]);
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
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
                JOIN Clientes ON trabajorealizado.IdCliente = Clientes.IdCliente
                WHERE FechaTrabajo BETWEEN ? AND ?";
        $stmt = $this->pdo->prepare($consulta);
        $stmt->execute([$FechaInicio, $FechaFin]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Totalhectareas() {
        $mes = date('n'); 
        $anio = date('Y'); 
    
        $consulta = "SELECT SUM(cantidadhectareastrabajadas) AS total_hectareas 
                     FROM trabajorealizado 
                     WHERE MONTH(FechaTrabajo) = ?
                     AND YEAR(FechaTrabajo) = ? ";
   
        $stmt = $this->pdo->prepare($consulta);
        $stmt->execute([$mes, $anio]); 
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado['total_hectareas'] ? $resultado['total_hectareas'] : 0;
    }

    public function TotalTrabajosMesActual() {
        $mes = date('n'); 
        $anio = date('Y'); 
    
        $consulta = "SELECT COUNT(trabajorealizado.IdTrabajo) AS total_Trabajos
                     FROM trabajorealizado 
                     WHERE MONTH(FechaTrabajo) = ?
                     AND YEAR(FechaTrabajo) = ? ";
   
        $stmt = $this->pdo->prepare($consulta);
        $stmt->execute([$mes, $anio]); 
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$resultado) {
            return 0; // Retorna 0 si no hay resultados.
        }else {
            return $resultado['total_Trabajos'];
            
        }
        
    }

    public function ClienteMasActivo() {
        $mes = date('n'); 
        $anio = date('Y'); 
    
        $consulta = "SELECT clientes.Nombre AS cliente, COUNT(trabajorealizado.IdTrabajo) AS cantidad_trabajos 
                  FROM trabajorealizado
                  INNER JOIN clientes ON trabajorealizado.IdCliente = clientes.IdCliente 
                  WHERE MONTH(FechaTrabajo) = ? AND YEAR(FechaTrabajo) = ? 
                  GROUP BY cliente 
                  ORDER BY cantidad_trabajos DESC 
                  LIMIT 1";
   
        $stmt = $this->pdo->prepare($consulta);
        $stmt->execute([$mes, $anio]); 
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        

        if (!$resultado) {
            return 0; // Retorna 0 si no hay resultados.
        }else {
            return $resultado['cliente'];
            
        }
    }

    public function HectareasPorMes() {
        $consulta = "
            SELECT 
                MONTH(FechaTrabajo) AS mes, 
                SUM(cantidadhectareastrabajadas) AS total_hectareas 
            FROM trabajorealizado 
            GROUP BY mes 
            ORDER BY mes
        ";

        $stmt = $this->pdo->prepare($consulta);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Inicializa un arreglo para los hectáreas trabajadas
        $hectareasMensuales = array_fill(1, 12, 0); // 12 meses inicializados a 0

        foreach ($resultados as $row) {
            $hectareasMensuales[(int)$row['mes']] = (float)$row['total_hectareas'];
        }

        return $hectareasMensuales;
    }

    public function ListarTrabajos() {
        try {
            $consulta = $this->pdo->prepare("
                SELECT trabajorealizado.IdCliente, trabajorealizado.IdTrabajo,trabajorealizado.Descripcion,trabajorealizado.CantidadHectareasTrabajadas,
                trabajorealizado.FechaTrabajo,trabajorealizado.FechaPago,trabajorealizado.NroFacturaAfip,
                 clientes.Nombre,GROUP_CONCAT(DISTINCT fumigadores.NombreFumigador SEPARATOR ', ') AS NombreFumigador,
                   GROUP_CONCAT(DISTINCT aguateros.NombreAguatero SEPARATOR ', ') AS NombreAguatero
            FROM trabajorealizado
            JOIN clientes ON trabajorealizado.IdCliente = clientes.IdCliente
            LEFT JOIN fumigadortrabajo ON trabajorealizado.IdTrabajo = fumigadortrabajo.IdTrabajo
            LEFT JOIN fumigadores ON fumigadortrabajo.IdFumigador = fumigadores.IdFumigador
            LEFT JOIN aguaterotrabajo ON trabajorealizado.IdTrabajo = aguaterotrabajo.IdTrabajo
            LEFT JOIN aguateros ON aguaterotrabajo.IdAguatero = aguateros.IdAguatero
            WHERE trabajorealizado.EstadoTrabajo = 'Activo' and clientes.EstadoCliente = 'Activo'
            GROUP BY trabajorealizado.IdTrabajo, trabajorealizado.Descripcion, clientes.Nombre

            ");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    

   

   
}
