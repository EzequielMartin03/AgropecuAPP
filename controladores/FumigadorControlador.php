<?php

require_once "modelos/fumigador.php";

class FumigadorControlador {
    private $modelo;


    public function __construct() {
        $this->modelo = new Fumigador();
    }

    public function Inicio() {
       
        $termino = isset($_GET['q']) ? $_GET['q'] : ''; 
       
        if (!empty($termino)) {
            
            $Fumigadores = $this->modelo->BuscarFumigador($termino);
        } else {
            
            $Fumigadores = $this->modelo->ListarFumigador();
        }
        
        require_once "vistas/inicio/SideBar.php";
        require_once "vistas/Fumigadores/indexFumigador.php";
    }

    public function Guardar() {
        $Fumigador = new Fumigador();
        $Fumigador-> setNombre($_POST['Nombre']);
        $Fumigador-> setDireccion($_POST['Direccion']);
        $Fumigador-> setTelefono($_POST['Telefono']);
        $Fumigador-> setCuit($_POST['Cuit']);

        $this->modelo->InsertarFumigador($Fumigador);    

        header ("location:?c=Fumigador");
    }

    public function Modificar() {                           
        $Fumigador = new Fumigador();                                   
        $Fumigador -> setIdFumigador($_POST['IdFumigador']);
        $Fumigador-> setNombre($_POST['Nombre']);
        $Fumigador-> setDireccion($_POST['Direccion']);
        $Fumigador-> setTelefono($_POST['Telefono']);
        $Fumigador-> setCuit($_POST['Cuit']);

        $this->modelo->ActualizarFumigador($Fumigador);    

        header ("location:?c=Fumigador");
    }

    public function eliminar() {
        $Fumigador = new Fumigador();
        $Fumigador -> setIdFumigador($_POST['IdFumigador']);
        
        $this->modelo->EliminarFumigador($Fumigador);    

        header ("location:?c=Fumigador");
    }
}