<?php

class Usuario {
    private $id_usuario;
    private $usuario;
    private $clave;

    public function __construct() {
    }

    // Getters
    public function getIdUsuario() {
        return $this->id_usuario;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getClave() {
        return $this->clave;
    }

    // Setters
    public function setIdUsuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function setClave($clave) {
        $this->clave = $clave;
    }


}
