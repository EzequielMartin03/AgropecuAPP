<?php

<<<<<<< HEAD
class aguatero {
    private $IdAguatero;
    private $NombreAguatero;
    private $DireccionAguatero;
    private $TelefonoAguatero;
    private $CuitAguatero;
    private $EstadoAguatero;

    public function __construct() {
        $this-> pdo = database::connection();
=======
class Aguatero {
    private $id_aguatero;
    private $nombre_aguatero;
    private $direccion_aguatero;
    private $telefono_aguatero;
    private $cuit_aguatero;

    public function __construct() {
>>>>>>> 80d9cf3793cae5d8d0dcba0297bb03da0b3a4661
     
    }


    public function getIdAguatero() {
<<<<<<< HEAD
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
        return $this->EstadoAguatero = $EstadoAguatero;
    }



    public function ListarAguatero() {
        try {
            $consulta=$this->pdo->prepare("SELECT * FROM aguateros WHERE EstadoAguatero = 'Activo' ;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e) {
            die($e->getMessage());

        }

    }
 
    public function InsertarAguatero(Aguatero $Aguatero) {
        try {
            $consulta = "INSERT INTO aguateros (NombreAguatero,DireccionAguatero,TelefonoAguatero,CuitAguatero,EstadoAguatero) VALUES (?,?,?,?,?);";
            $this->pdo->prepare($consulta)->execute(array(
                $Aguatero->getNombreAguatero(),
                $Aguatero->getDireccionAguatero(),
                $Aguatero->getTelefonoAguatero(),
                $Aguatero->getCuitAguatero(),
                'Activo'


            ));

        }catch(Exception $e) {
            die($e->getMessage());
        }

    }

    public function ActualizarAguatero(Aguatero $Aguatero) {
        try {
            $consulta = "UPDATE aguateros SET NombreAguatero = ?,DireccionAguatero = ?,TelefonoAguatero = ?,CuitAguatero = ? WHERE IdAguatero = ?;";
            $this->pdo->prepare($consulta)->execute(array(
                $Aguatero->getNombreAguatero(),
                $Aguatero->getDireccionAguatero(),
                $Aguatero->getTelefonoAguatero(),
                $Aguatero->getCuitAguatero(),
                $Aguatero-> getIdAguatero()
            ));
        }catch(Exception $e) {
            die($e->getMessage());
        }
    }


    public function EliminarAguatero(Aguatero $Aguatero) {
        try {
            $consulta = "UPDATE aguateros SET EstadoAguatero = 'Inactivo' WHERE IdAguatero = ?";
            $this->pdo->prepare($consulta)->execute(array(

                $Aguatero-> getIdAguatero()
            ));
        }catch(Exception $e) {
            die($e->getMessage());
        }
    }


    public function BuscarAguatero($termino) {
        $consulta = $this->pdo->prepare("SELECT * FROM aguateros WHERE (NombreAguatero LIKE ? OR CuitAguatero LIKE ?) AND EstadoAguatero = ?");
        $consulta->execute(array("%$termino%", "%$termino%",'Activo'));
        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }



=======
        return $this->id_aguatero;
    }

    public function getNombreAguatero() {
        return $this->nombre_aguatero;
    }

    public function getDireccionAguatero() {
        return $this->direccion_aguatero;
    }

    public function getTelefonoAguatero() {
        return $this->telefono_aguatero;
    }

    public function getCuitAguatero() {
        return $this->cuit_aguatero;
    }

    public function setIdAguatero($id_aguatero) {
        $this->id_aguatero = $id_aguatero;
    }

    public function setNombreAguatero($nombre_aguatero) {
        $this->nombre_aguatero = $nombre_aguatero;
    }

    public function setDireccionAguatero($direccion_aguatero) {
        $this->direccion_aguatero = $direccion_aguatero;
    }

    public function setTelefonoAguatero($telefono_aguatero) {
        $this->telefono_aguatero = $telefono_aguatero;
    }

    public function setCuitAguatero($cuit_aguatero) {
        $this->cuit_aguatero = $cuit_aguatero;
    }

>>>>>>> 80d9cf3793cae5d8d0dcba0297bb03da0b3a4661

}
