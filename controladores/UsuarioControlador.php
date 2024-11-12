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
            $Usuario = $_POST['usuario'];
            $password = $_POST['contrasena'];

            $user = $this->modeloUsuario->ConsultarUsuario($Usuario);

            if ($user && password_verify($password, $user['Clave'])) {
                $_SESSION['Autenticado'] = true;
                $_SESSION['user'] = $user['Usuario'];
                header('Location: ?c=inicio'); 
                exit();
            } else {
                $error = 'Nombre de usuario o contraseña incorrectos';
                include 'vistas/Usuario/loginUsuario.php';
            }
    }
    

    public function cerrarSesion() {
       
        session_unset(); 
        session_destroy(); 

        header('Location: ?c=Usuario&a=Inicio');
        exit();
    }

    public function AgregarUsuario() { 
        $Usuario = $_POST['Usuario'];
        $Clave = $_POST['Clave'];
        $nuevoHash = password_hash($Clave, PASSWORD_DEFAULT);
        $this->modeloUsuario->InsertarUsuario($Usuario, $nuevoHash);
        
        header("Location: ?c=Usuario&a=GestionUsuarios");
    }

    public function Eliminar() {
        $IdUsuario = $_POST['IdUsuario'];
        $this->modeloUsuario->Eliminar($IdUsuario);
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

    public function EnviarMail() {
     
        $Mensaje = $_POST['MensajeSoporte'];
        $Email = $_POST['EmailSoporte'];
        $Nombre = $_POST['NombreSoporte']; 

        $to = "ezequielmartin093@gmail.com"; 
        $subject = "mensaje de {$Nombre} ";
        $message = "
        nombre: {$Nombre}
        email: {$Email}
        mensaje: {$Mensaje}";
        $headers = "From: ezequielmartin093@gmail.com"; 
        if(mail($to, $subject, $message, $headers)) {
            header("Location: ?c=Cliente&a=Inicio");
        } else {
            echo "Error al enviar el correo.";
        }

    }
}

