<?php
class TrabajoRealizado {
<<<<<<< HEAD
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
=======
    private $id_trabajo;
    private $id_fumigador;
    private $id_aguatero;
    private $cantidad_hectareas_trabajadas;
    private $fecha_fumigacion;
    private $descripcion;
    private $fecha_pago;
    private $id_usuario;
    private $id_cliente;
    private $nro_factura_afip;
>>>>>>> 80d9cf3793cae5d8d0dcba0297bb03da0b3a4661

    public function __construct() {
  
        $this->pdo = database::connection();
    }

    // Getters
    public function getIdTrabajo() {
<<<<<<< HEAD
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
            // Consulta con JOIN para obtener el nombre del cliente
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
    

    // public function InsertarTrabajo(TrabajoRealizado $trabajoRealizado) {
    //     try {
    //         // Adjust the query to include only the necessary columns
    //         $consulta = "INSERT INTO trabajorealizado(IdFumigador, IdAguatero, CantidadHectareasTrabajadas, FechaTrabajo,FechaPago, Descripcion, IdUsuario, IdCliente, NroFacturaAfip, EstadoTrabajo) 
    //                      VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    //         // Execute the query with the correct number of values
    //         $this->pdo->prepare($consulta)->execute(array(
    //             $trabajoRealizado->IdFumigador,
    //             $trabajoRealizado->IdAguatero,
    //             $trabajoRealizado->CantidadHectareasTrabajadas,
    //             $trabajoRealizado->FechaTrabajo,
    //             $trabajoRealizado->FechaPago,
    //             $trabajoRealizado->Descripcion,
    //             '1', // IdUsuario
    //             $trabajoRealizado->IdCliente,
    //             $trabajoRealizado->NroFacturaAfip,
    //             'Activo' // EstadoTrabajo
    //         ));
    
    //     } catch (Exception $e) {
    //         die($e->getMessage());
    //     }
    // }


    
        public function InsertarTrabajo(TrabajoRealizado $trabajo, $fumigadores, $aguateros) {
            // Insertar el trabajo en la tabla de trabajos
            $query = "INSERT INTO trabajorealizado (Descripcion, FechaTrabajo, FechaPago, CantidadHectareasTrabajadas, NroFacturaAfip,EstadoTrabajo,IdCliente) VALUES (?, ?, ?, ?, ?,?,?)";
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
            
    // Debugging: Verifica los datos de fumigadores y aguateros
    echo "Fumigadores: " . implode(", ", $fumigadores) . "<br>";
    echo "Aguateros: " . implode(", ", $aguateros) . "<br>";
    echo "IdTrabajo: " . $idTrabajo . "<br>";
       
    
            // Insertar las relaciones en la tabla trabajo_fumigador
            foreach ($fumigadores as $idFumigador) {
                $query = "INSERT INTO fumigadortrabajo (IdTrabajo, IdFumigador) VALUES (?, ?)";
                $stmt = $this->pdo->prepare($query);
                $stmt->execute([$idTrabajo, $idFumigador]);
            }
    
            // Insertar las relaciones en la tabla trabajo_aguatero
            foreach ($aguateros as $idAguatero) {
                $query = "INSERT INTO aguaterotrabajo (IdTrabajo, IdAguatero) VALUES (?, ?)";
                $stmt = $this->pdo->prepare($query);
                $stmt->execute([$idTrabajo, $idAguatero]);
            }
        }
    
        public function FiltrarTrabajosFumigador($idTrabajo, $fechaInicio, $fechaFin) {
            // Consulta el trabajo solo si está dentro del rango de fechas
            $query = "SELECT * FROM trabajorealizado WHERE id = ? AND FechaTrabajo BETWEEN ? AND ?";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$idTrabajo, $fechaInicio, $fechaFin]);
            $trabajo = $stmt->fetch(PDO::FETCH_ASSOC);
        
            if ($trabajo) {
                // Obtener fumigadores relacionados si el trabajo está dentro del rango de fechas
                $query = "SELECT IdFumigador FROM TrabajoFumigador WHERE IdTrabajo = ? AND FechaTrabajo BETWEEN ? AND ?";
                $stmt = $this->pdo->prepare($query);
                $stmt->execute([$idTrabajo, $fechaInicio, $fechaFin]);
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

        // Hacemos un JOIN con la tabla cliente para obtener el nombre del cliente
        $consulta = "SELECT trabajorealizado.*, clientes.Nombre 
                     FROM trabajorealizado 
                     JOIN clientes ON trabajorealizado.IdCliente = clientes.IdCliente
                     WHERE trabajorealizado.IdCliente = ? 
                     AND trabajorealizado.FechaTrabajo BETWEEN ? AND ?
                     ORDER BY trabajorealizado.FechaTrabajo DESC";
                     
        $stm = $this->pdo->prepare($consulta);
        $stm->execute(array(
            $IdCliente,
            $FechaInicio,
            $FechaFin
        ));
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }
    

     public function FiltrarTrabajosAguatero($IdAguatero, $FechaInicio, $FechaFin) { 
   try {
     
      $consulta = "
         
         select Aguateros.NombreAguatero, trabajorealizado.Descripcion,trabajorealizado.CantidadHectareasTrabajadas,trabajorealizado.FechaTrabajo from trabajorealizado  LEFT JOIN aguaterotrabajo ON trabajorealizado.IdTrabajo = aguaterotrabajo.IdTrabajo
        LEFT JOIN aguateros ON aguaterotrabajo.IdAguatero = aguateros.IdAguatero
        WHERE aguateros.IdAguatero = ? AND trabajorealizado.FechaTrabajo BETWEEN ? AND ?;
        ";

            
      $stm = $this->pdo->prepare($consulta);
       $stm->execute(array($IdAguatero, $FechaInicio, $FechaFin));
            
       return $stm->fetchAll(PDO::FETCH_OBJ);
    
   } catch (Exception $e) {
       die($e->getMessage());
    }
 }
    

    // public function FiltrarTrabajosFumigador($IdFumigador,$FechaInicio, $FechaFin) { 

    //     $consulta = "SELECT * FROM trabajorealizado WHERE IdFumigador = ? AND FechaTrabajo BETWEEN ? AND ? ORDER BY FechaTrabajo DESC";
    //     $stm = $this->pdo->prepare($consulta);
    //     $stm->execute(array(
    //         $IdFumigador,
    //         $FechaInicio,
    //         $FechaFin
    //     ));
    //     return $stm->fetchAll(PDO::FETCH_OBJ);
    // }








=======
        return $this->id_trabajo;
    }

    public function getIdFumigador() {
        return $this->id_fumigador;
    }

    public function getIdAguatero() {
        return $this->id_aguatero;
    }

    public function getCantidadHectareasTrabajadas() {
        return $this->cantidad_hectareas_trabajadas;
    }

    public function getFechaFumigacion() {
        return $this->fecha_fumigacion;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getFechaPago() {
        return $this->fecha_pago;
    }

    public function getIdUsuario() {
        return $this->id_usuario;
    }

    public function getIdCliente() {
        return $this->id_cliente;
    }

    public function getNroFacturaAfip() {
        return $this->nro_factura_afip;
    }

    // Setters
    public function setIdTrabajo($id_trabajo) {
        $this->id_trabajo = $id_trabajo;
    }

    public function setIdFumigador($id_fumigador) {
        $this->id_fumigador = $id_fumigador;
    }

    public function setIdAguatero($id_aguatero) {
        $this->id_aguatero = $id_aguatero;
    }

    public function setCantidadHectareasTrabajadas($cantidad_hectareas_trabajadas) {
        $this->cantidad_hectareas_trabajadas = $cantidad_hectareas_trabajadas;
    }

    public function setFechaFumigacion($fecha_fumigacion) {
        $this->fecha_fumigacion = $fecha_fumigacion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setFechaPago($fecha_pago) {
        $this->fecha_pago = $fecha_pago;
    }

    public function setIdUsuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    public function setIdCliente($id_cliente) {
        $this->id_cliente = $id_cliente;
    }

    public function setNroFacturaAfip($nro_factura_afip) {
        $this->nro_factura_afip = $nro_factura_afip;
    }


>>>>>>> 80d9cf3793cae5d8d0dcba0297bb03da0b3a4661
}
