<?php
require_once 'modelos/Usuario.php';

class UsuarioControlador {
    private $modeloUsuario;

    public function __construct() {
        $this->modeloUsuario = new Usuario();
    }

    public function Inicio() {
        require_once 'vistas/Usuario/loginUsuario.php';
    }

    public function GestionUsuarios() {
        $Usuarios = $this->modeloUsuario->ListarUsuarios();
        require_once 'vistas/Inicio/SideBar.php';
        require_once 'vistas/Usuario/gestionUsuarios.php';
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['usuario'];
            $password = $_POST['contrasena'];

          

            $user = $this->modeloUsuario->getUserByUsername($username);

            if ($user && password_verify($password, $user['Clave'])) {
                $_SESSION['authenticated'] = true;
                $_SESSION['user'] = $user;
                header('Location: ?c=inicio'); 
                exit();
            } else {
                $error = 'Nombre de usuario o contraseña incorrectos';
                include 'vistas/Usuario/loginUsuario.php';
            }
        } else {
          
            include 'vistas/Usuario/loginUsuario.php';
        }
    }

    public function cerrarSesion() {
       
        session_unset(); 
        session_destroy(); 

     
        header('Location: ?c=Usuario&a=Inicio');
        exit();
    }

    public function Ajustes() {
        require_once 'vistas/inicio/SideBar.php';
        require_once 'vistas/Usuario/indexAjustes.php';
        
    }

    public function AgregarUsuario() { 
        $Usuario = $_POST['Usuario'];
        $Clave = $_POST['Clave'];
        $nuevoHash = password_hash($Clave, PASSWORD_DEFAULT);
        $this->modeloUsuario->InsertarUsuario($Usuario, $nuevoHash);
        
        header("Location: ?c=Usuario&a=GestionUsuarios");
    }
    
    public function BlanquearClaveUsuario() {
        $Usuario = $_POST['Usuario'];
        $NuevaClave = $_POST['Clave'];
        $IdUsuario = $_POST['IdUsuario'];
        $nuevoHash = password_hash($NuevaClave, PASSWORD_DEFAULT);
        $this->modeloUsuario->BlanquearClaveUsuario($IdUsuario, $Usuario, $nuevoHash);
        header("Location: ?c=Usuario&a=GestionUsuarios");
    }
}
?>
