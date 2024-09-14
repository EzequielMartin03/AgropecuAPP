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

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['usuario'];
            $password = $_POST['contrasena'];

            echo 'Username: ' . htmlspecialchars($username) . '<br>';
            echo 'Password: ' . htmlspecialchars($password) . '<br>';




            $user = $this->modeloUsuario->getUserByUsername($username);

            if ($user && password_verify($password, $user['Clave'])) {
                $_SESSION['authenticated'] = true;
                $_SESSION['user'] = $user;
                header('Location: ?c=inicio'); // Redirige al usuario a la página principal después del login
                exit();
            } else {
                echo 'Nombre de usuario o contraseña incorrectos';
            }
        } else {
            // Mostrar formulario de inicio de sesión
            include 'vistas/Usuario/loginUsuario.php';
        }
    }

    public function cerrarSesion() {
        // Destruir la sesión
        session_unset(); // Elimina todas las variables de sesión
        session_destroy(); // Destruye la sesión

        // Redirigir a la página de inicio de sesión o cualquier otra página
        header('Location: ?c=Usuario&a=Inicio');
        exit();
    }

    public function Ajustes() {
        require_once 'vistas/inicio/SideBar.php';
        require_once 'vistas/Usuario/indexAjustes.php';
        
    }   
}
?>
