<?php

class Usuario {
    private $IdUsuario;
    private $Usuario;
    private $clave;

    public function __construct() {
        $this->pdo = database::connection();
    }

 
    public function getIdUsuario() {
        return $this->IdUsuario;
    }

    public function getUsuario() {
        return $this->Usuario;
    }

    public function getClave() {
        return $this->clave;
    }

 
    public function setIdUsuario($IdUsuario) {
        $this->IdUsuario = $IdUsuario;
    }

    public function setUsuario($Usuario) {
        $this->Usuario = $Usuario;
    }

    public function setClave($clave) {
        $this->clave = $clave;
    }
 
        public function ConsultarUsuario($Usuario) {
            $stmt = $this->pdo->prepare("SELECT * FROM usuario WHERE Usuario = ?");
            $stmt->execute([$Usuario]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function ListarUsuarios() {
            try {
                $consulta = "SELECT * FROM usuario WHERE EstadoUsuario = 'Activo'";
                $stmt = $this->pdo->prepare($consulta);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_OBJ);
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

        public function Eliminar($IdUsuario) {
            try {
                $consulta = $this->pdo->prepare("UPDATE usuario SET EstadoUsuario = 'Inactivo' WHERE IdUsuario = ?");
                $consulta->execute(array($IdUsuario));
                
            } catch (Exception $e) {
                die($e->getMessage());
            }
    }

    
    
    

}
