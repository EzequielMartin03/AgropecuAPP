<?php

require_once "modelos/trabajoRealizado.php";
require_once "modelos/cliente.php";
require_once "modelos/fumigador.php";
require_once "modelos/aguatero.php";
require_once 'pdf/vendor/autoload.php';  // Ajusta la ruta según tu estructura de directorios


    use Dompdf\Dompdf;
    use Dompdf\Options;


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

        if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
            header('Location: ?c=Usuario&a=Inicio');
            exit();
        }


        
    }

    public function Inicio() {

       

        $currentTab = isset($_POST['tab']) ? $_POST['tab'] : 'todos';
       

        $clientes = $this->modeloCliente->ListarCliente();
        $ListaFumigadores = $this->modeloFumigador->ListarFumigador();
        $ListaAguateros = $this->modeloAguatero->ListarAguatero();
        $AllTrabajos = $this->modelo->ListarTrabajos();

      
        require_once "vistas/inicio/SideBar.php";
        require_once "vistas/Trabajos/indexTrabajo.php";
    }


    public function Guardar() {
        $trabajo = new TrabajoRealizado();
        $trabajo-> setIdCliente($_POST['nuevoClienteSelect']);
        $trabajo->setDescripcion($_POST['Descripcion']);
        $trabajo->setFechaTrabajo($_POST['FechaTrabajo']);
        $trabajo->setFechaPago($_POST['FechaPago']);
        $trabajo->setCantidadHectareasTrabajadas($_POST['Hectareas']);
        $trabajo->setNroFacturaAfip($_POST['NroFactura']);
    
        // Obtener los IDs seleccionados
        $fumigadores =  isset($_POST['mySelect2']) ? $_POST['mySelect2'] : [];
        $aguateros = isset($_POST['mySelect']) ? $_POST['mySelect'] : [];
    
        // Insertar el trabajo y las relaciones
        $this->modelo->InsertarTrabajo($trabajo, $fumigadores, $aguateros);
    
        
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
            $nombreCliente =  $resultados[0]->Nombre;
            $_SESSION['resultados_filtrados'] = $resultados;
            $_SESSION['NombreCliente'] = $nombreCliente;
            

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

    
    public function generarPDF() {
        // Verificar si los resultados están en la sesión
        if (!isset($_SESSION['resultados_filtrados'])) {
            die('No hay resultados para generar el PDF.');
        }
    
        $resultados = $_SESSION['resultados_filtrados'];
        $cliente = $_SESSION['NombreCliente'];
    
   
    
        // Crear una instancia de Dompdf
        $dompdf = new Dompdf();
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $options->set('isPhpEnabled', true);
        $dompdf->setOptions($options);
    
        // Obtener la plantilla HTML, pasarle $resultados
        ob_start();
        include './vistas/Informes/index.php'; // La plantilla HTML debe usar $resultados
        $html = ob_get_clean();
    
        // Cargar el HTML en Dompdf
        $dompdf->loadHtml($html);
    
        // Configurar el tamaño del papel y la orientación
        $dompdf->setPaper('A4', 'portrait');
    
        // Renderizar el PDF
        $dompdf->render();
    
        // Enviar el archivo PDF al navegador para descargar
        $dompdf->stream("reporte_cliente.pdf", ["Attachment" => true]);
    
        // Opcional: Limpiar la sesión después de generar el PDF
        unset($_SESSION['resultados_filtrados']);
    }


  
    
    
    
    
   
}
