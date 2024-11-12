<?php


require_once "modelos/aguatero.php";

class AguateroControlador {
    private $modelo;


    public function __construct() {
        $this->modelo = new Aguatero();
    }

    // Método de inicio que lista los aguateros o los busca en base a un término de búsqueda.
    public function Inicio() {
       
        // Obtener el término de búsqueda si existe en la solicitud GET.
        $termino = isset($_GET['q']) ? $_GET['q'] : ''; 

        // Si hay un término de búsqueda, se llama al método "BuscarAguatero".
        if (!empty($termino)) {
            $Aguateros = $this->modelo->BuscarAguatero($termino);
        } else {
            // De lo contrario, se llama al método "ListarAguatero" para listar todos.
            $Aguateros = $this->modelo->ListarAguatero();
        }

        // Se incluyen las vistas de barra lateral y de listado de aguateros.
        require_once "vistas/inicio/SideBar.php";
        require_once "vistas/aguateros/indexAguateros.php";
    }

    // Método para guardar un nuevo aguatero.
    public function Guardar() {
        // Se crea una nueva instancia de "Aguatero".
        $Aguatero = new Aguatero();
        // Se establecen los valores del nuevo aguatero a partir de los datos que vienen del formulario
        $Aguatero-> setNombreAguatero($_POST['NombreAguatero']);
        $Aguatero-> setDireccionAguatero($_POST['DireccionAguatero']);
        $Aguatero-> setTelefonoAguatero($_POST['TelefonoAguatero']);
        $Aguatero-> setCuitAguatero($_POST['CuitAguatero']);

        // Se llama al método "InsertarAguatero" para insertar el nuevo aguatero en la base de datos.
        $this->modelo->InsertarAguatero($Aguatero);    

        // Redirección a la página de aguateros.
        header ("location:?c=Aguatero");
    }

    // Método para modificar un aguatero existente.
    public function Modificar() {                           
        // Se crea una nueva instancia de "Aguatero".
        $Aguatero = new Aguatero();                                   
        // Se establecen los valores del aguatero a modificar a partir de los datos que vienen del formulario modificar.
        $Aguatero -> setIdAguatero($_POST['IdAguatero']);
        $Aguatero-> setNombreAguatero($_POST['NombreModificarAguatero']);
        $Aguatero-> setDireccionAguatero($_POST['DireccionModificarAguatero']);
        $Aguatero-> setTelefonoAguatero($_POST['TelefonoModificarAguatero']);
        $Aguatero-> setCuitAguatero($_POST['CuitModificarAguatero']);

        // Se llama al método "ActualizarAguatero" para actualizar el aguatero en la base de datos.
        $this->modelo->ActualizarAguatero($Aguatero);    

        // Redirección al apartado de aguateros.
        header ("location:?c=Aguatero");
    }

    // Método para marcar inactivo un aguatero.
    public function eliminar() {
        // Se crea una nueva instancia de "Aguatero".
        $Aguatero = new Aguatero();
        
        $Aguatero -> setIdAguatero($_POST['IdAguatero']);

        // Se llama al método "EliminarAguatero" para poner inactivo el aguatero de la base de datos.
        $this->modelo->EliminarAguatero($Aguatero);

        // Redirección al apartado de aguateros.
        header ("location:?c=Aguatero");
    }
    
    // Método para obtener una lista de CUITs de los aguateros.
    public function ObtenerCuitsAguateros() {
        // Llama al método del modelo para obtener los CUITs de los aguateros
        $cuits = $this->modelo->obtenerCuitsAguateros();
        echo json_encode($cuits);
    }
}

