<?php

require_once "modelos/aguatero.php";

class AguateroControlador {
    private $modelo;


    public function __construct() {
        $this->modelo = new Aguatero();
    }

    public function Inicio() {
       
        $termino = isset($_GET['q']) ? $_GET['q'] : ''; 

        if (!empty($termino)) {
            $Aguateros = $this->modelo->BuscarAguatero($termino);
        } else {
            $Aguateros = $this->modelo->ListarAguatero();
        }

        require_once "vistas/inicio/SideBar.php";
        require_once "vistas/aguateros/indexAguateros.php";
    }

    public function Guardar() {
        $Aguatero = new Aguatero();
        $Aguatero-> setNombreAguatero($_POST['NombreAguatero']);
        $Aguatero-> setDireccionAguatero($_POST['DireccionAguatero']);
        $Aguatero-> setTelefonoAguatero($_POST['TelefonoAguatero']);
        $Aguatero-> setCuitAguatero($_POST['CuitAguatero']);

        $this->modelo->InsertarAguatero($Aguatero);    

        header ("location:?c=Aguatero");
    }

    public function Modificar() {                           
        $Aguatero = new Aguatero();                                   
        $Aguatero -> setIdAguatero($_POST['IdAguatero']);
        $Aguatero-> setNombreAguatero($_POST['NombreModificarAguatero']);
        $Aguatero-> setDireccionAguatero($_POST['DireccionModificarAguatero']);
        $Aguatero-> setTelefonoAguatero($_POST['TelefonoModificarAguatero']);
        $Aguatero-> setCuitAguatero($_POST['CuitModificarAguatero']);

        $this->modelo->ActualizarAguatero($Aguatero);    

        header ("location:?c=Aguatero");
    }

    public function eliminar() {
        $Aguatero = new Aguatero();
        $Aguatero -> setIdAguatero($_POST['IdAguatero']);
        $this->modelo->EliminarAguatero($Aguatero);    
        header ("location:?c=Aguatero");
    }
}
