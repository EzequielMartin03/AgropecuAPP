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
        $Fumigador-> setNombreFumigador($_POST['NombreFumigador']);
        $Fumigador-> setDireccionFumigador($_POST['DireccionFumigador']);
        $Fumigador-> setTelefonoFumigador($_POST['TelefonoFumigador']);
        $Fumigador-> setCuitFumigador($_POST['CuitFumigador']);

        $this->modelo->InsertarFumigador($Fumigador);    

        header ("location:?c=Fumigador");
    }

    public function Modificar() {                           
        $Fumigador = new Fumigador();                                   
        $Fumigador -> setIdFumigador($_POST['IdFumigador']);
        $Fumigador-> setNombreFumigador($_POST['Nombre']);
        $Fumigador-> setDireccionFumigador($_POST['Direccion']);
        $Fumigador-> setTelefonoFumigador($_POST['Telefono']);
        $Fumigador-> setCuitFumigador($_POST['Cuit']);

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
