<?php

class Fumigador {
<<<<<<< HEAD
    private $IdFumigador;
    private $NombreFumigador;
    private $DireccionFumigador;
    private $TelefonoFumigador;
    private $CuitFumigador;

    public function __construct() {

        $this->pdo = database::connection();
=======
    private $id_fumigador;
    private $nombre_fumigador;
    private $direccion_fumigador;
    private $telefono_fumigador;
    private $cuit_fumigador;

    public function __construct() {
>>>>>>> 80d9cf3793cae5d8d0dcba0297bb03da0b3a4661
     
    }


    public function getIdFumigador() {
<<<<<<< HEAD
        return $this->IdFumigador;
    }

    public function getNombreFumigador() {
        return $this->NombreFumigador;
    }

    public function getDireccionFumigador() {
        return $this->DireccionFumigador;
    }

    public function getTelefonoFumigador() {
        return $this->TelefonoFumigador;
    }

    public function getCuitFumigador() {
        return $this->CuitFumigador;
=======
        return $this->id_fumigador;
    }

    public function getNombreFumigador() {
        return $this->nombre_fumigador;
    }

    public function getDireccionFumigador() {
        return $this->direccion_fumigador;
    }

    public function getTelefonoFumigador() {
        return $this->telefono_fumigador;
    }

    public function getCuitFumigador() {
        return $this->cuit_fumigador;
>>>>>>> 80d9cf3793cae5d8d0dcba0297bb03da0b3a4661
    }



    
<<<<<<< HEAD
    public function setIdFumigador($IdFumigador) {
        $this->IdFumigador = $IdFumigador;
    }

    public function setNombreFumigador($NombreFumigador) {
        $this->NombreFumigador = $NombreFumigador;
    }

    public function setDireccionFumigador($DireccionFumigador) {
        $this->DireccionFumigador = $DireccionFumigador;
    }

    public function setTelefonoFumigador($TelefonoFumigador) {
        $this->TelefonoFumigador = $TelefonoFumigador;
    }

    public function setCuitFumigador($CuitFumigador) {
        $this->CuitFumigador = $CuitFumigador;
    }



    public function ListarFumigador() {
        try {
            $consulta=$this->pdo->prepare("SELECT * FROM fumigadores WHERE EstadoFumigador = 'Activo' ;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e) {
            die($e->getMessage());

        }

    }

    public function BuscarFumigador($termino) {
        $consulta = $this->pdo->prepare("SELECT * FROM fumigadores WHERE (NombreFumigador LIKE ? OR CuitFumigador LIKE ?) AND EstadoFumigador = ?");
        $consulta->execute(array("%$termino%", "%$termino%",'Activo'));
        return $consulta->fetchAll(PDO::FETCH_OBJ);
=======
    public function setIdFumigador($id_fumigador) {
        $this->id_fumigador = $id_fumigador;
    }

    public function setNombreFumigador($nombre_fumigador) {
        $this->nombre_fumigador = $nombre_fumigador;
    }

    public function setDireccionFumigador($direccion_fumigador) {
        $this->direccion_fumigador = $direccion_fumigador;
    }

    public function setTelefonoFumigador($telefono_fumigador) {
        $this->telefono_fumigador = $telefono_fumigador;
    }

    public function setCuitFumigador($cuit_fumigador) {
        $this->cuit_fumigador = $cuit_fumigador;
>>>>>>> 80d9cf3793cae5d8d0dcba0297bb03da0b3a4661
    }


}
