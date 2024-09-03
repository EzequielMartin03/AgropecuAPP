<?php

require_once "modelos/database.php";

if(!isset($_GET["c"])) {
    require_once "controladores/InicioControlador.php";
    $controlador = new inicioControlador();
    call_user_func(array($controlador,"Inicio"));
}else{
    $controlador = $_GET["c"];
    require_once "controladores/".$controlador."Controlador.php";
    $controlador = ucwords($controlador)."Controlador";
    $controlador = new $controlador;
    $accion = isset($_GET['a']) ? $_GET['a'] : "Inicio";
    call_user_func(array($controlador,$accion));
}


?>