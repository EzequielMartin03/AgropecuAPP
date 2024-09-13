<?php

class Fumigador {
    private $IdFumigador;
    private $NombreFumigador;
    private $DireccionFumigador;
    private $TelefonoFumigador;
    private $CuitFumigador;

    public function __construct() {
        $this->pdo = database::connection();
    }

    public function getIdFumigador() {
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
    }

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
            $consulta = $this->pdo->prepare("SELECT * FROM fumigadores WHERE EstadoFumigador = 'Activo';");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function BuscarFumigador($termino) {
        $consulta = $this->pdo->prepare("SELECT * FROM fumigadores WHERE (NombreFumigador LIKE ? OR CuitFumigador LIKE ?) AND EstadoFumigador = ?");
        $consulta->execute(array("%$termino%", "%$termino%", 'Activo'));
        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }
}
