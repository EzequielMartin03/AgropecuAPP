<?php


class Aguatero {
    // Atributos de la clase "Aguatero".
    private $IdAguatero;
    private $NombreAguatero;
    private $DireccionAguatero;
    private $TelefonoAguatero;
    private $CuitAguatero;
    private $EstadoAguatero;

    // Constructor que inicializa la conexión a la base de datos.
    public function __construct() {
        $this->pdo = database::connection();
    }

    // Métodos "get" para obtener los valores de los atributos.
    public function getIdAguatero() {
        return $this->IdAguatero;
    }

    public function getNombreAguatero() {
        return $this->NombreAguatero;
    }

    public function getDireccionAguatero() {
        return $this->DireccionAguatero;
    }

    public function getTelefonoAguatero() {
        return $this->TelefonoAguatero;
    }

    public function getCuitAguatero() {
        return $this->CuitAguatero;
    }

    public function getEstadoAguatero() {
        return $this->EstadoAguatero;
    }

    // Métodos "set" para asignar valores a los atributos.
    public function setIdAguatero($IdAguatero) {
        $this->IdAguatero = $IdAguatero;
    }

    public function setNombreAguatero($NombreAguatero) {
        $this->NombreAguatero = $NombreAguatero;
    }

    public function setDireccionAguatero($DireccionAguatero) {
        $this->DireccionAguatero = $DireccionAguatero;
    }

    public function setTelefonoAguatero($TelefonoAguatero) {
        $this->TelefonoAguatero = $TelefonoAguatero;
    }

    public function setCuitAguatero($CuitAguatero) {
        $this->CuitAguatero = $CuitAguatero;
    }

    public function setEstadoAguatero($EstadoAguatero) {
        $this->EstadoAguatero = $EstadoAguatero;
    }

    // Método para listar todos los aguateros activos.
    public function ListarAguatero() {
        try {
            $consulta = "SELECT * FROM aguateros WHERE EstadoAguatero = 'Activo';";
            $stmt =  $this->pdo->prepare($consulta); 
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    // Método para insertar un nuevo registro de aguatero en la base de datos.
    public function InsertarAguatero(Aguatero $Aguatero) {
        try {
            $consulta = "INSERT INTO aguateros (NombreAguatero, DireccionAguatero, TelefonoAguatero, CuitAguatero, EstadoAguatero) VALUES (?, ?, ?, ?, ?);";
            $stmt = $this->pdo->prepare($consulta);
            $stmt->execute(array(
                $Aguatero->getNombreAguatero(),
                $Aguatero->getDireccionAguatero(),
                $Aguatero->getTelefonoAguatero(),
                $Aguatero->getCuitAguatero(),
                'Activo'
            ));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    // Método para actualizar los datos de un aguatero existente en la base de datos.
    public function ActualizarAguatero(Aguatero $Aguatero) {
        try {
            $consulta = "UPDATE aguateros SET NombreAguatero = ?, DireccionAguatero = ?, TelefonoAguatero = ?, CuitAguatero = ? WHERE IdAguatero = ?;";
            $stmt = $this->pdo->prepare($consulta);
            $stmt->execute(array(
                $Aguatero->getNombreAguatero(),
                $Aguatero->getDireccionAguatero(),
                $Aguatero->getTelefonoAguatero(),
                $Aguatero->getCuitAguatero(),
                $Aguatero->getIdAguatero()
            ));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    // Método para marcar un aguatero como "Inactivo" en la base de datos.
    public function EliminarAguatero(Aguatero $Aguatero) {
        try {
            $consulta = "UPDATE aguateros SET EstadoAguatero = 'Inactivo' WHERE IdAguatero = ?";
            $stmt = $this->pdo->prepare($consulta);
            $stmt->execute(array(
                $Aguatero->getIdAguatero()
            ));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    // Método para buscar aguateros activos según un término de búsqueda en nombre o CUIT.
    public function BuscarAguatero($termino) {
        $consulta = "SELECT * FROM aguateros WHERE (NombreAguatero LIKE ? OR CuitAguatero LIKE ?) AND EstadoAguatero = ?";
        $stmt = $this->pdo->prepare($consulta);
        $stmt->execute(array("%$termino%", "%$termino%", 'Activo'));
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Método para obtener una lista de CUITs de aguateros activos.
    public function obtenerCuitsAguateros() {
        $consulta = "SELECT CuitAguatero FROM aguateros where EstadoAguatero = 'Activo';"; 
        $stmt = $this->pdo->prepare($consulta);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN); // Devuelve un array de CUITs
    }
}
