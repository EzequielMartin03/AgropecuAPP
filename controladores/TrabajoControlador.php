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
        $aguateros = isset($_POST['mySelect']) ? $_POST['mySelect' ] : [];
    
        // Insertar el trabajo y las relaciones
        $this->modelo->InsertarTrabajo($trabajo, $fumigadores, $aguateros);
    
        header("location:?c=Trabajo");
    }
    

   public function Modificar() {                           
  
    $Trabajo = new TrabajoRealizado();
    $Trabajo->setIdTrabajo($_POST['IdTrabajo']);
    
    $aguateros = $_POST['aguatero'];
    $fumigadores = $_POST['fumigador'];


    $Trabajo->setIdCliente($_POST['ClienteSelect']);
    $Trabajo->setCantidadHectareasTrabajadas($_POST['CantidadHectareas']);
    $Trabajo->setFechaTrabajo($_POST['FechaTrabajo']);
    $Trabajo->setDescripcion($_POST['Descripcion']);
    $Trabajo->setFechaPago($_POST['FechaPago']);


    $this->modelo->ActualizarTrabajo($Trabajo);    


    $this->modelo->ActualizarAguaterosTrabajo($Trabajo->getIdTrabajo(), $aguateros);
    $this->modelo->ActualizarFumigadoresTrabajo($Trabajo->getIdTrabajo(), $fumigadores);

    header("location:?c=Trabajo");
}


public function EliminarTrabajo() {
    if (isset($_POST['IdTrabajo'])) {
        $idTrabajo = $_POST['IdTrabajo'];

        $this->modelo->EliminarTrabajo($idTrabajo);
        header("Location: ?c=Trabajo"); 
    }
}

    public function filtrarPorCliente() {

            $ListaFumigadores = $this->modeloFumigador->ListarFumigador();
            $ListaAguateros = $this->modeloAguatero->ListarAguatero();
           
            $clientes = $this->modeloCliente->ListarCliente();

            $IdCliente = $_POST['ClienteSelect'];
            $fechaInicio = $_POST['fechaInicio'];
            $fechaFin = $_POST['fechaFin'];

        
            $resultados = $this->modelo->FiltrarTrabajosCliente($IdCliente, $fechaInicio, $fechaFin);
             

            // Guardar los resultados en la sesión
            $_SESSION['resultados_filtrados'] = $resultados;

            // Guardar el nombre del cliente
            $_SESSION['Nombre'] = $resultados[0]->Nombre;
            // Guardar las fechas de inicio y fin
            $_SESSION['fechainicio'] = $fechaInicio;
            $_SESSION['fechafin'] = $fechaFin;
            $_SESSION['Tipo'] = 'Cliente';

            foreach ($resultados as $resultado) {
                $resultado->aguaterosSeleccionados = $this->modelo->ObtenerAguaterosPorTrabajo($resultado->IdTrabajo);
                $resultado->fumigadoresSeleccionados = $this->modelo->ObtenerFumigadoresPorTrabajo($resultado->IdTrabajo);
            }
        

            require_once "vistas/inicio/SideBar.php";
            require_once "vistas/Trabajos/IndexTrabajo.php";

        
        

    }
    
    public function FiltrarTrabajoFumigador() {
        $IdFumigador = $_POST['FumigadorSelect'];
        $fechaInicio = $_POST['fechaInicio'];
        $fechaFin = $_POST['fechaFin'];
       

        if (isset($_POST['FumigadorSelect'], $_POST['fechaInicio'], $_POST['fechaFin'])) {
            $ResultadosFumigadores = $this->modelo->FiltrarTrabajosFumigador($IdFumigador, $fechaInicio, $fechaFin);
            $_SESSION['resultados_filtrados'] = $ResultadosFumigadores;
            $_SESSION['Nombre'] = $ResultadosFumigadores[0]->NombreFumigador;
            $_SESSION['Tipo'] = 'Fumigador';
        } else {
            $ResultadosFumigadores = [];
        }


        require_once "vistas/inicio/SideBar.php";
        require_once "vistas/Trabajos/IndexTrabajo.php";
        
    }


    public function FiltrarTrabajoAguatero() {
        $IdAguatero = $_POST['AguateroSelect'];
        $fechaInicio = $_POST['fechaInicio'];
        $fechaFin = $_POST['fechaFin'];
        if (isset($_POST['AguateroSelect'], $_POST['fechaInicio'], $_POST['fechaFin'])) {

            $ResultadoAguateros = $this->modelo->FiltrarTrabajosAguatero($IdAguatero,$fechaInicio, $fechaFin);
            $_SESSION['resultados_filtrados'] = $ResultadoAguateros;
            $_SESSION['Nombre'] = $ResultadoAguateros[0]->NombreAguatero;
            $_SESSION['Tipo'] = 'Aguatero';
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
            echo "<script>
            alert('No hay resultados para generar el PDF.');
            window.history.back(); 
          </script>";
         exit(); // Termina la ejecución aquí para que no intente seguir generando el PDF
        }
        
       
    
        $resultados = $_SESSION['resultados_filtrados'];

        $fechaI = new DateTime($_SESSION['fechainicio']);
        $fechaF = new DateTime($_SESSION['fechafin']);

        $_SESSION['fechainicio'] = $fechaI->format('d-m-Y');
        $_SESSION['fechafin'] = $fechaF->format('d-m-Y');
        
    
   
    
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
