<?php

class Aguatero {
    private $id_aguatero;
    private $nombre_aguatero;
    private $direccion_aguatero;
    private $telefono_aguatero;
    private $cuit_aguatero;

    public function __construct() {
     
    }


    public function getIdAguatero() {
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


}
