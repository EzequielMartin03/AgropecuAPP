<?php

class Usuario {
    private $IdUsuario;
    private $Usuario;
    private $clave;

    public function __construct() {
        $this->pdo = database::connection();
    }

    // Getters
    public function getIdUsuario() {
        return $this->IdUsuario;
    }

    public function getUsuario() {
        return $this->Usuario;
    }

    public function getClave() {
        return $this->clave;
    }

    // Setters
    public function setIdUsuario($IdUsuario) {
        $this->IdUsuario = $IdUsuario;
    }

    public function setUsuario($Usuario) {
        $this->Usuario = $Usuario;
    }

    public function setClave($clave) {
        $this->clave = $clave;
    }
 
        public function getUserByUsername($username) {
            $stmt = $this->pdo->prepare("SELECT * FROM usuario WHERE Usuario = ?");
            $stmt->execute([$username]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    
    
    

}
