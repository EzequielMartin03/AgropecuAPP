<?php


class ajustesControlador {


    public function inicio() {
        require_once "./vistas/inicio/SideBar.php";
        require_once "./vistas/Ajustes/indexAjustes.php";    
    }

    public function Soporte() {
        require_once "./vistas/inicio/SideBar.php";
        require_once "./vistas/Ajustes/Soporte.php";
    }
}
