<?php

require_once "modelos/trabajoRealizado.php";
require_once "modelos/cliente.php";
require_once "modelos/fumigador.php";
require_once "modelos/aguatero.php";

class TrabajoControlador {
    private $modelo;
    private $modeloCliente;
    private $modeloFumigador;
    private $modeloAguatero;


    public function __construct() {
        $this->modelo = new TrabajoRealizado();
        $this->modeloCliente = new Cliente();
        $this->modeloFumigador = new Fumigador();
        $this->modeloAguatero = new Aguatero();


        
    }

    public function Inicio() {

       

        $currentTab = isset($_POST['tab']) ? $_POST['tab'] : 'todos';
       

        $clientes = $this->modeloCliente->ListarCliente();
        $fumigadoress = $this->modeloFumigador->ListarFumigador();
        $ListaAguateros = $this->modeloAguatero->ListarAguatero();
        $AllTrabajos = $this->modelo->ListarTrabajos();

      
        require_once "vistas/inicio/SideBar.php";
        require_once "vistas/Trabajos/indexTrabajo.php";
    }

    // public function Guardar() {
    //     $Trabajo = new TrabajoRealizado();
    //     $Trabajo-> setIdFumigador($_POST['nuevoFumigadorSelect']);
    //     $Trabajo-> setIdAguatero($_POST['nuevoAguateroSelect']);
    //     $Trabajo-> setIdCliente($_POST['nuevoClienteSelect']);
    //     $Trabajo-> setCantidadHectareasTrabajadas($_POST['Hectareas']);
    //     $Trabajo-> setFechaTrabajo($_POST['FechaTrabajo']);
    //     $Trabajo-> setDescripcion($_POST['Descripcion']);
    //     $Trabajo-> setFechaPago($_POST['FechaPago']);
    //     //$Trabajo-> setIdUsuario($_POST['IdUsuario']);
    //     $Trabajo-> setNroFacturaAfip($_POST['NroFactura']);


    //     $this->modelo->InsertarTrabajo($Trabajo);    

    //     header ("location:?c=Trabajo");
    // }

    public function Guardar() {
        $trabajo = new TrabajoRealizado();
        $trabajo->setDescripcion($_POST['Descripcion']);
        $trabajo->setFechaTrabajo($_POST['FechaTrabajo']);
        $trabajo->setFechaPago($_POST['FechaPago']);
        $trabajo->setCantidadHectareasTrabajadas($_POST['Hectareas']);
        $trabajo->setNroFacturaAfip($_POST['NroFactura']);
    
        // Obtener los IDs seleccionados
        $fumigadores = isset($_POST['nuevoFumigadorSelect']) ? $_POST['nuevoFumigadorSelect'] : [];
        $aguateros = isset($_POST['nuevoAguateroSelect']) ? $_POST['nuevoAguateroSelect'] : [];
    
        // Insertar el trabajo y las relaciones
        $this->modelo->InsertarTrabajo($trabajo, $fumigadores, $aguateros);
    
        header("Location: ?c=Trabajo");
    }
    

    public function Modificar() {                           
        $Trabajo = new TrabajoRealizado();
        $Trabajo-> setIdTrabajo($_POST['IdTrabajo']);
        $Trabajo-> setIdFumigador($_POST['IdFumigador']);
        $Trabajo-> setIdAguatero($_POST['IdAguatero']);
        $Trabajo-> setIdCliente($_POST['IdCliente']);
        $Trabajo-> setCantidadhectareasTrabajas($_POST['CantidadhectareasTrabajas']);
        $Trabajo-> setFechaTrabajo($_POST['FechaTrabajo']);
        $Trabajo-> setDescripcion($_POST['Descripcion']);

        $this->modelo->ActualizarTrabajo($Trabajo);    


        header ("location:?c=Trabajo");
    }

    public function eliminar() {
        $Trabajo = new TrabajoRealziado();
        $Trabajo -> setIdTrabajo($_POST['IdTrabajo']);
        
        $this->modelo->EliminarTrabajo($Trabajo);    

        header ("location:?c=Trabajo");
    }
    public function filtrarPorCliente() {
            
            $IdCliente = $_POST['ClienteSelect'];
            $fechaInicio = $_POST['fechaInicio'];
            $fechaFin = $_POST['fechaFin'];
            $resultados = $this->modelo->FiltrarTrabajosCliente($IdCliente, $fechaInicio, $fechaFin);
            $clientes = $this->modeloCliente->ListarCliente();
            $AllTrabajos = $this->modelo->ListarTrabajos();

            require_once "vistas/inicio/SideBar.php";
            require_once "vistas/Trabajos/IndexTrabajo.php"; 
        

    }
    

    public function FiltrarTrabajoFumigador() {
        $IdFumigador = $_POST['IdFumigador'];
        $fechaInicio -> $_POST['FechaInicio'];
        $fechaFin -> $_POST['FechaFin'];

        $resultados = $this->modelo->FiltrarTrabajosFumigador($IdFumigador,$fechaInicio, $fechaFin);

   
        require_once "vistas/Trabajos/IndexTrabajo.php";
        
    }

    public function FiltrarTrabajoAguatero() {
        $IdAguatero = $_POST['AguateroSelect'];
        $fechaInicio = $_POST['fechaInicio'];
        $fechaFin = $_POST['fechaFin'];
        if (isset($_POST['AguateroSelect'], $_POST['fechaInicio'], $_POST['fechaFin'])) {

            $ResultadoAguateros = $this->modelo->FiltrarTrabajosAguatero($IdAguatero,$fechaInicio, $fechaFin);
        } else {
            header ("location:?c=Trabajo");
        }
      

     
        $AllTrabajos = $this->modelo->ListarTrabajos();
        $ListaAguateros = $this->modeloAguatero->ListarAguatero();
        require_once "vistas/inicio/SideBar.php";
        require_once "vistas/Trabajos/IndexTrabajo.php";
        
    }
   
}
