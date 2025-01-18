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

        
 
    }

    public function Inicio() {

        $clientes = $this->modeloCliente->ListarCliente();
        $ListaFumigadores = $this->modeloFumigador->ListarFumigador();
        $ListaAguateros = $this->modeloAguatero->ListarAguatero();
        $resultadosTr = $this->modelo->ListarTrabajos();

        if ($_GET['c'] === 'Trabajo') {
           
            unset($_SESSION['fechaInicioCliente']);
            unset($_SESSION['fechaFinCliente']);
            unset($_SESSION['IdclienteTR']);
            
            unset($_SESSION['fechaInicioAguatero']);
            unset($_SESSION['fechaFinAguatero']);
            unset($_SESSION['IdAguateroTR']);   

            unset($_SESSION['fechaInicioFumigador']);
            unset($_SESSION['fechaFinFumigador']);
            unset($_SESSION['IdFumigadorTR']);
        }

       
        
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
        $Trabajo->setNroFacturaAfip($_POST['NroFactura']);
        $Trabajo->setFechaPago($_POST['FechaPago']);
    
        // Actualizamos el trabajo
        $this->modelo->ActualizarTrabajo($Trabajo);
        $this->modelo->ActualizarAguaterosTrabajo($Trabajo->getIdTrabajo(), $aguateros);
        $this->modelo->ActualizarFumigadoresTrabajo($Trabajo->getIdTrabajo(), $fumigadores);
    
        // Redirigir a filtrarPorCliente para que se ejecute la consulta con los filtros actuales
      
        header("Location: ?c=Trabajo&a=filtrarPorCliente");
        exit();
    }
    


    public function EliminarTrabajo() {
    if (isset($_POST['IdTrabajo'])) {
        $idTrabajo = $_POST['IdTrabajo'];

        $this->modelo->EliminarTrabajo($idTrabajo);
        header("Location: ?c=Trabajo"); 
    }
    }

    public function filtrarPorCliente() {
        // Verificar si los valores de los filtros llegaron por POST, de lo contrario usar los valores de la sesión
        $IdCliente = isset($_POST['ClienteSelect']) ? $_POST['ClienteSelect'] : $_SESSION['IdclienteTR'] ?? null;
        $fechaInicio = isset($_POST['fechaInicio']) ? $_POST['fechaInicio'] : $_SESSION['fechaInicioCliente'] ?? null;
        $fechaFin = isset($_POST['fechaFin']) ? $_POST['fechaFin'] : $_SESSION['fechaFinCliente'] ?? null;
    
        // Guardar los filtros en la sesión para que se mantengan
        if (isset($_POST['ClienteSelect'])) {
            $_SESSION['IdclienteTR'] = $IdCliente;
            $_SESSION['fechaInicioCliente'] = $fechaInicio;
            $_SESSION['fechaFinCliente'] = $fechaFin;
        }
    
        // Verificar que los filtros sean válidos (no vacíos)
        if (!$IdCliente || !$fechaInicio || !$fechaFin) {
            $_SESSION['mensajeAlerta'] = "Faltan filtros. Por favor, seleccione un cliente y un rango de fechas.";
            header("Location: ?c=Trabajo");
            exit();
        }
    
        // Ejecutar la consulta con los filtros recibidos o los de la sesión
        $resultados = $this->modelo->FiltrarTrabajosCliente($IdCliente, $fechaInicio, $fechaFin);
    
        // Verificar si hay resultados
        if (empty($resultados)) {
            $_SESSION['mensajeAlerta'] = "No se encontraron datos para el filtro seleccionado.";
            header("Location: ?c=Trabajo");
            exit();
        }
    
        // Recorremos los resultados para formatear las fechas
        foreach ($resultados as &$resultado) {
            $resultado->fechaTrabajoOriginal = $resultado->FechaTrabajo;
            $resultado->fechaPagoOriginal = $resultado->FechaPago;
    
            if ($resultado->FechaTrabajo) {
                $fechaI = new DateTime($resultado->FechaTrabajo);
                $resultado->FechaTrabajo = $fechaI->format('d-m-Y');
            } else {
                $resultado->FechaTrabajo = null;
            }
    
            if ($resultado->FechaPago) {
                $fechaF = new DateTime($resultado->FechaPago);
                $resultado->FechaPago = $fechaF->format('d-m-Y');
            } else {
                $resultado->FechaPago = null;
            }
        }
    
        // Guardar los resultados y otros datos en la sesión si hay resultados
        $_SESSION['resultados_filtrados'] = $resultados;
        $_SESSION['Nombre'] = $resultados[0]->Nombre;
        $_SESSION['Tipo'] = 'Cliente';
        $_SESSION['fechainicio'] = $fechaInicio;
        $_SESSION['fechafin'] = $fechaFin;
    
        // Obtener aguateros y fumigadores para cada trabajo
        foreach ($resultados as $resultado) {
            $resultado->aguaterosSeleccionados = $this->modelo->ObtenerAguaterosPorTrabajo($resultado->IdTrabajo);
            $resultado->fumigadoresSeleccionados = $this->modelo->ObtenerFumigadoresPorTrabajo($resultado->IdTrabajo);
        }
    
        // Cargar la vista con los resultados filtrados
        $clientes = $this->modeloCliente->ListarCliente();
        $ListaFumigadores = $this->modeloFumigador->ListarFumigador();
        $ListaAguateros = $this->modeloAguatero->ListarAguatero();
        $resultadosTr = $this->modelo->ListarTrabajos();

      
    
        require_once "vistas/inicio/SideBar.php";
        require_once "vistas/Trabajos/IndexTrabajo.php";
    }
    
    
    
    
    public function FiltrarTrabajoFumigador() {
        $IdFumigador = $_POST['FumigadorSelect'];
        $fechaInicio = $_POST['fechaInicio'];
        $fechaFin = $_POST['fechaFin'];
    
        $_SESSION['IdFumigadorTR'] = $IdFumigador;
        $_SESSION['fechaInicioFumigador'] = $fechaInicio;
        $_SESSION['fechaFinFumigador'] = $fechaFin;
    
        $ResultadosFumigadores = $this->modelo->FiltrarTrabajosFumigador($IdFumigador, $fechaInicio, $fechaFin);
    
        // Verificar si hay resultados
        if (empty($ResultadosFumigadores)) {
            $_SESSION['mensajeAlerta'] = "No se encontraron datos para el filtro seleccionado.";
        } else {
            // Formatear las fechas si hay resultados
            foreach ($ResultadosFumigadores as &$resultado) {
                $fechaI = new DateTime($resultado->FechaTrabajo);
                $resultado->FechaTrabajo = $fechaI->format('d-m-Y');
            }
    
            $_SESSION['resultados_filtrados'] = $ResultadosFumigadores;
            $_SESSION['Nombre'] = $ResultadosFumigadores[0]->NombreFumigador;
            $_SESSION['Tipo'] = 'Fumigador';
            $_SESSION['fechainicio'] = $fechaInicio;
            $_SESSION['fechafin'] = $fechaFin;
        }
    
        $clientes = $this->modeloCliente->ListarCliente();
        $ListaFumigadores = $this->modeloFumigador->ListarFumigador();
        $ListaAguateros = $this->modeloAguatero->ListarAguatero();
        $resultadosTr = $this->modelo->ListarTrabajos();
    
        require_once "vistas/inicio/SideBar.php";
        require_once "vistas/Trabajos/IndexTrabajo.php";
    }
    
    
    public function FiltrarTrabajoAguatero() {
        $IdAguatero = $_POST['AguateroSelect'];
        $fechaInicio = $_POST['fechaInicio'];
        $fechaFin = $_POST['fechaFin'];
    
        $_SESSION['IdAguateroTR'] = $IdAguatero;
        $_SESSION['fechaInicioAguatero'] = $fechaInicio;
        $_SESSION['fechaFinAguatero'] = $fechaFin;
    
        $ResultadoAguateros = $this->modelo->FiltrarTrabajosAguatero($IdAguatero, $fechaInicio, $fechaFin);
    
        // Verificar si hay resultados
        if (empty($ResultadoAguateros)) {
            $_SESSION['mensajeAlerta'] = "No se encontraron datos para el filtro seleccionado.";
        } else {
            // Formatear las fechas si hay resultados
            foreach ($ResultadoAguateros as &$resultado) {
                $fechaI = new DateTime($resultado->FechaTrabajo);
                $resultado->FechaTrabajo = $fechaI->format('d-m-Y');
            }
    
            $_SESSION['resultados_filtrados'] = $ResultadoAguateros;
            $_SESSION['Nombre'] = $ResultadoAguateros[0]->NombreAguatero;
            $_SESSION['Tipo'] = 'Aguatero';
            $_SESSION['fechainicio'] = $fechaInicio;
            $_SESSION['fechafin'] = $fechaFin;
        }
    
        $clientes = $this->modeloCliente->ListarCliente();
        $ListaFumigadores = $this->modeloFumigador->ListarFumigador();
        $ListaAguateros = $this->modeloAguatero->ListarAguatero();
        $resultadosTr = $this->modelo->ListarTrabajos();
    
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
         exit();
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
    
        // Cargar la plantilla HTML
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
        $dompdf->stream("reporte " . $_SESSION['fechainicio'] . "-" . $_SESSION['fechafin'] . " $_SESSION[Tipo]". " $_SESSION[Nombre]" .".pdf", ["Attachment" => true]);
    
        // Limpiar la sesión
        unset($_SESSION['resultados_filtrados']);
    }

   public function ListarTrabajos() {

    $resultados = $this->modelo->ListarTrabajos();
    foreach ($resultados as &$resultado) {
        ob_start();
        include 'vistas/Trabajos/PestaniaCliente/CLmodalesTrabajo.php';
        $resultado->modal = ob_get_clean(); 
    }
    echo json_encode($resultados);
    
    
   }

  



   
}
