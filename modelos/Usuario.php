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
            $stm = $this->pdo->prepare("SELECT * FROM usuario WHERE Usuario = ?");
            $stm->execute([$username]);
            return $stm->fetch(PDO::FETCH_ASSOC);
        }

        public function ListarUsuarios() {
            try {
                $consulta = $this->pdo->prepare("SELECT * FROM usuario;");
                $consulta->execute();
                return $consulta->fetchAll(PDO::FETCH_OBJ);
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function InsertarUsuario($Usuario, $clave) {
            try {
                $consulta = $this->pdo->prepare("INSERT INTO usuario (Usuario, Clave) VALUES (?, ?)");
                $consulta->execute(array($Usuario, $clave));
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function BlanquearClaveUsuario($IdUsuario, $Usuario, $clave) {
            try {
                $consulta = $this->pdo->prepare("UPDATE usuario SET Clave = ?, Usuario = ? WHERE IdUsuario = ?");
                $consulta->execute(array($clave,$Usuario,$IdUsuario));
                
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
    
    
    

}
