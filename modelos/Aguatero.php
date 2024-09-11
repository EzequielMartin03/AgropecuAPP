<?php

class aguatero {
    private $IdAguatero;
    private $NombreAguatero;
    private $DireccionAguatero;
    private $TelefonoAguatero;
    private $CuitAguatero;
    private $EstadoAguatero;

    public function __construct() {
        $this-> pdo = database::connection();
     
    }


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




}
